<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class Cart extends Model
{
    use HasFactory;

    public $fillable = [
        "user_id",
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public static function discountedPrice($unitPrice, $discountRate)
    {
        $discountAmount = $unitPrice * $discountRate;
        $discountedPrice = $unitPrice - $discountAmount;
        return $discountedPrice;
    }

   /*  public function getItemTotal($price, $discount, $quantity, $quantity_discount, $quantity_for_discount)
    {

        // Retrieve product and order details
        $basePrice = $price;
        $discountRate = $discount / 100;
        $quantityDiscountRate = $quantity_discount / 100;
        $orderQuantity = $quantity;
        $discountQuantityThreshold = $quantity_for_discount;

        // Calculate discounted price for one unit :
        $discountedPrice = self::discountedPrice($basePrice, $discountRate);

        //dd([$basePrice, $discountRate, $quantityDiscountRate, $orderQuantity, $discountQuantityThreshold]);



        // Determine if quantity discount applies
        if ($orderQuantity >= $discountQuantityThreshold && $discountQuantityThreshold !== 0) {
            // Calculate total price with quantity discount
            $unitsNumberOnQuantityDiscount = (int)($orderQuantity / $discountQuantityThreshold) * $discountQuantityThreshold;
            $remainingUnits = $orderQuantity % $discountQuantityThreshold;

            // Calculate quantity discount on Discounted price for one unit :
            $newDiscountedPrice = self::discountedPrice($discountedPrice, $quantityDiscountRate);

            $total = $newDiscountedPrice * $unitsNumberOnQuantityDiscount
                + $discountedPrice * $remainingUnits;
        } else {
            // Calculate total price without quantity discount
            $total = $discountedPrice * $orderQuantity;
        }

        // Return total price rounded to three decimal places
        return round($total, 3);
    } */

    public static function getItems()
    {
        $cart_items = [];
        foreach (OrderItem::where('cart_id', Auth::user()->cart->id)->get() as $item) {
            //$total = ($item->book->price * (1 - $item->book->discount * 0.01)) * $item->quantity;
            $cart_items[] = [
                "id" => $item->id,
                "image_url" => $item->book->image_url,
                "bookName" => $item->book->name,
                "quantity" => $item->quantity,
                "bookPrice" => $item->book->price,
                "bookDiscount" => $item->book->discount,
                "bookQuantityDiscount" => $item->book->quantity_discount,
                "bookQuantityForDiscount" => $item->book->quantity_for_discount,
                "total" => $item->getTotal(
                    $item->book->price,
                    $item->book->discount,
                    $item->quantity,
                    $item->book->quantity_discount,
                    $item->book->quantity_for_discount,
                ),
            ];
        }

        return $cart_items;
    }

    public static function getTotal()
    {
        $items_total = 0;
        $discount = 0;
        foreach (OrderItem::where('cart_id', Auth::user()->cart->id)->get() as $item) {
            $items_total += $item->getTotal(
                $item->book->price,
                $item->book->discount,
                $item->quantity,
                $item->book->quantity_discount,
                $item->book->quantity_for_discount,
            );
        }
        $total = $items_total * (1 - $discount * 0.01);
        return $total;
    }
}
