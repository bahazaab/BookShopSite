<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "username",
        "email",
        "phone",
        "address",
        "postal_code",
        "avatar",
        "theme",
        "language",
        ];
}
