<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        "order_id",
        "book_id",
        "quantity"
    ];

    public final function book()
    {
        return $this->belongsTo(Book::class);
    }

    public static function discountedPrice($unitPrice, $discountRate)
    {
        $discountAmount = $unitPrice * $discountRate;
        $discountedPrice = $unitPrice - $discountAmount;
        return $discountedPrice;
    }


    public function getTotal()
    {
        // Retrieve product and order details
        $basePrice = $this->book->price;
        $discountRate = $this->book->discount / 100;
        $quantityDiscountRate = $this->book->quantity_discount / 100;
        $orderQuantity = $this->quantity;
        $discountQuantityThreshold = $this->book->quantity_for_discount;

        // Calculate discounted price for one unit :
        $discountedPrice = self::discountedPrice($basePrice, $discountRate);

        // Determine if quantity discount applies
        if ($orderQuantity >= $discountQuantityThreshold) {
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
    }
}
