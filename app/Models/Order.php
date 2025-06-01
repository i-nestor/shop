<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model {
    use HasFactory;

    protected $fillable = ['customer_name', 'status', 'comment', 'product_id', 'quantity', 'created_at'];

    protected $attributes = [
        'status' => 'Новый',
        'quantity' => 1
    ];

    public function product(): BelongsTo {
        return $this->belongsTo(Product::class);
    }

    public function getTotalPriceAttribute() {
        return $this->product->price * $this->quantity;
    }
}
