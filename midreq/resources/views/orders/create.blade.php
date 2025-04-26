<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('products.index') }}">E-Commerce</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            <div class="navbar-nav me-auto">
                <a class="nav-link" href="{{ route('products.index') }}">Products</a>
                <a class="nav-link" href="{{ route('categories.index') }}">Categories</a>
                <a class="nav-link" href="{{ route('orders.index') }}">Orders</a>
            </div>
            </div>
    </div>
</nav>

<div class="container mt-4">
    <h2>Place Order</h2>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('orders.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="customer_name" class="form-label">Customer Name</label>
            <input type="text" name="customer_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="customer_email" class="form-label">Customer Email</label>
            <input type="email" name="customer_email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="product_id" class="form-label">Select Product</label>
            <select name="product_id" id="product_id" class="form-control" required>
                <option value="">-- Select Product --</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}" data-price="{{ $product->price }}" data-stock="{{ $product->quantity }}">
                        {{ $product->name }} - ₱{{ number_format($product->price, 2) }} ({{ $product->quantity }} in stock)
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="order_quantity" class="form-label">Quantity</label>
            <input type="number" name="order_quantity" id="order_quantity" class="form-control" min="1" value="1" required>
            @error('order_quantity')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Total Price</label>
            <input type="text" id="total_price" class="form-control" readonly value="₱0.00">
        </div>

        <input type="hidden" name="status" value="pending">

        <button type="submit" class="btn btn-success" id="submit-button">Place Order</button>
    </form>
</div>

<script>
    const productSelect = document.getElementById('product_id');
    const quantityInput = document.getElementById('order_quantity');
    const totalPriceInput = document.getElementById('total_price');

    function updateTotalPrice() {
        const selectedOption = productSelect.options[productSelect.selectedIndex];
        const price = parseFloat(selectedOption.getAttribute('data-price')) || 0;
        const quantity = parseInt(quantityInput.value) || 0;
        const total = price * quantity;
        totalPriceInput.value = '₱' + total.toFixed(2);
    }

    productSelect.addEventListener('change', updateTotalPrice);
    quantityInput.addEventListener('input', updateTotalPrice);

    updateTotalPrice();
</script>

</body>
</html>
