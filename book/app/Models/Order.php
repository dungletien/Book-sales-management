<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'quantity',
        'total_price',
        'address'
    ];


    public function book()
    {
        return $this->belongsTo(Book::class);
    }


    public function calculateTotalPrice()
    {
        if ($this->book) {
            $this->total_price = $this->quantity * $this->book->price;
        }
    }


    protected static function boot()
    {
        parent::boot();

        static::saving(function ($order) {
            $order->calculateTotalPrice();
        });
    }
}
