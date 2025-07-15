<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';
    protected $guarded = [];

    public function items()
    {
        return $this->hasMany(CartItem::class);
    }

    // Opsional: untuk hitung total harga
    public function calculatedPriceByQuantity()
    {
        return $this->items->sum(function ($item) {
            return $item->itemable ? $item->itemable->price * $item->quantity : 0;
        });
    }
}
