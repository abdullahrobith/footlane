<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Binafy\LaravelCart\Cartable;


class Products extends Model implements Cartable
{
    use HasFactory;
    protected $table = 'products'; // Sesuaikan dengan nama tabel kalian

    public function category()
    {
        return $this->belongsTo(Categories::class, 'product_category_id');
    }
    public function getPrice(): float
    {
        return $this->price;
    }
    public function getName(): string
    {
        return $this->name;
    }

}