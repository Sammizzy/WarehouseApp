<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['stock_item_id', 'customer_id', 'quantity', 'order_date'];

    public function stockItem()
    {
        return $this->belongsTo(StockItem::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
