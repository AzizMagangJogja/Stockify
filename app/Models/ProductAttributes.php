<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttributes extends Model {
    use HasFactory;

    protected $fillable = [
        'id',
        'product_id',
        'name',
        'value'
    ];

    public function product() {
        return $this->belongsTo(Products::class, 'product_id');
    }
}