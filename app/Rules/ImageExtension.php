<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ImageExtension implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'svg'];
        $isImageName = false;

        foreach ($imageExtensions as $extension) {
            if (str_ends_with(strtolower($value), '.' . $extension)) {
                $isImageName = true;
            }
        }

        if (!$isImageName) {
            $fail('The :attribute must be a valid image URL.');
        }
    }
}
