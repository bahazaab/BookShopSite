<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "location",
        "date",
        "discount",
        "total",
        "note",
        "status",
        "payment_method",
    ];

    public function customer()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function Items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public static function getNextID()
    {
        $current_id = Order::latest('id')->first()->id;
        if ($current_id) {
            return ++$current_id;
        } else {
            return 1;
        }
    }

    public static function getItems(int $order_id)
    {
        $order_items = [];
        foreach (OrderItem::all()->where('order_id', $order_id) as $item) {
            //$total = ($item->book->price * (1 - $item->book->discount * 0.01)) * $item->quantity;
            $order_items[] = [
                "id" => $item->id,
                "book_id" => $item->book->id,
                "bookName" => $item->book->name,
                "quantity" => $item->quantity,
                "bookPrice" => $item->book->price,
                "bookDiscount" => $item->book->discount,
                "bookQuantityDiscount"=> $item->book->quantity_discount,
                "bookQuantityForDiscount"=> $item->book->quantity_for_discount,
                "total" => $item->getTotal(),
            ];
        }

        return $order_items;
    }

    public static function getTotal($order_id, $discount)
    {
        $items_total = 0;
        foreach (OrderItem::all()->where('order_id', $order_id) as $item) {
            $items_total += $item->getTotal();
        }
        $total = $items_total * (1-$discount * 0.01 );
        return $total;
    }
}
