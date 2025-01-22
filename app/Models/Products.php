<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model {
    use HasFactory;

    protected $fillable = [
        'id',
        'category_id',
        'supplier_id',
        'name',
        'sku',
        'description',
        'purchase_price',
        'selling_price',
        'quantity',
        'minimum_stock',
        'image'
    ];
    
    public function category() {
        return $this->belongsTo(Categories::class, 'category_id');
    }

    public function supplier() {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    public function transactions()
    {
        return $this->hasMany(StockTransaction::class, 'product_id');
    }

    public function attributes()
    {
        return $this->hasMany(ProductAttributes::class, 'product_id');
    }
}