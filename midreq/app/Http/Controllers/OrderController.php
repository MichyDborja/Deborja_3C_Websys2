<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
    
        $orders = Order::with('customer', 'product')
            ->when($search, function ($query, $search) {
                $query->whereHas('customer', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                })->orWhere('status', 'like', "%{$search}%");
            })
            ->get();
    
        return view('orders.index', compact('orders'));
    }
    

    public function create(Request $request)
    {
        $products = Product::all();
        $selectedProduct = null;
        $totalPrice = 0;
        $quantity = 1;

        if ($request->product_id) {
            $selectedProduct = Product::find($request->product_id);
            if ($selectedProduct) {
                $quantity = max(1, (int) $request->order_quantity);
                $totalPrice = $selectedProduct->price * $quantity;
            }
        }

        return view('orders.create', compact('products', 'selectedProduct', 'totalPrice', 'quantity'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email',
            'product_id' => 'required|exists:products,id',
            'order_quantity' => 'required|integer|min:1',
        ]);
    
        $customer = Customer::firstOrCreate(
            ['email' => $request->customer_email],
            ['name' => $request->customer_name]
        );
    
        $product = Product::findOrFail($request->product_id);
    
        if ($request->order_quantity > $product->quantity) {
            return back()->with('error', "Sorry, only {$product->quantity} item(s) are available.");
        }
    
        $totalPrice = $product->price * $request->order_quantity;
    
        Order::create([
            'customer_id' => $customer->id,
            'product_id' => $product->id,
            'order_quantity' => $request->order_quantity,
            'total_price' => $totalPrice,
            'status' => 'pending',
        ]);
    
        $product->decrement('quantity', $request->order_quantity);
    
        return redirect()->route('orders.index')->with('success', 'Order placed successfully!');
    }
    
    public function edit($id)
    {
        $order = Order::with('product')->findOrFail($id);
        $products = Product::all();

        return view('orders.edit', compact('order', 'products'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,shipped,delivered,cancelled',
        ]);

        $order = Order::findOrFail($id);

        $order->update([
            'status' => $request->status,
        ]);

        return redirect()->route('orders.index')->with('success', 'Order status updated successfully!');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Order deleted successfully!');
    }
}
