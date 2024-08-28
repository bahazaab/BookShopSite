<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('author');
            $table->text('description');
            $table->string('image_url');
            $table->date('publication_date');
            $table->string('price');
            $table->string('discount')->nullable();
            $table->decimal('quantity_discount', 8, 2)->nullable();
            $table->integer('quantity_for_discount', 0, 1)->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
        
    }
};
