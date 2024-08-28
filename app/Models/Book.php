<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "description",
        "image_url",
        "author",
        "price",
        "publication_date",
        "discount",
        "quantity_discount",
        "quantity_for_discount"
    ];

    public function categories(){
        return $this->belongsToMany(Category::class,"category_book");
    }

    public function priceAfterDiscount()
    {
        $discountedPrice = $this->price * (1 - $this->discount * 0.01);
        return round($discountedPrice, 3);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function getStarsRate()
    {
        $total_of_stars_number = $this->ratings->sum("stars_number");
        $ratings_number = $this->ratings->count();
        $stars_rate = $total_of_stars_number / $ratings_number;
        return round($stars_rate, 1);
    }

    public function hasRatings()
    {
        return $this->ratings->count() != 0;
    }
}
