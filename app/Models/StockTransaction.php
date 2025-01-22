<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockTransaction extends Model {
    use HasFactory;

    protected $fillable = [
        'id',
        'product_id',
        'user_id',
        'type',
        'quantity',
        'date',
        'status',
        'notes'   
    ];

    public function product() {
        return $this->belongsTo(Products::class, 'product_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}