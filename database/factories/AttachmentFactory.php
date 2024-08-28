<?php

namespace Database\Factories;

use App\Models\Report;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attachment>
 */
class AttachmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fileName = $this->faker->file(storage_path('app/public'), storage_path('app/public'), false);
        $filePath = 'public/' . Str::after($fileName, 'storage/');
        return [
            "report_id" => Report::all('id')->random(),
            "file_name" => basename($fileName),
            "file_path" => $filePath,
        ];
    }
}
