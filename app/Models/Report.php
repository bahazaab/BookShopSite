<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "category",
        "title",
        "description",
        "content",
        "date",
        "status"
        ];

        public static function getNextID()
    {
        $current_id = Report::latest('id')->first()->id;
        if ($current_id) {
            return ++$current_id;
        } else {
            return 1;
        }
    }
}
