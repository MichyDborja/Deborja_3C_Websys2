<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'price', 'quantity', 'category_id'];
    public $timestamps = true;
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function orders()
{
    return $this->hasMany(Order::class);
}

}
