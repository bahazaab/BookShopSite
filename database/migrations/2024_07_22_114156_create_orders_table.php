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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->date('date');
            $table->string('location');
            $table->decimal('discount', 8, 2)->default(0);
            $table->decimal('total', 8, 2);
            $table->string('note');
            $table->enum('status', ['Pending','Shipped','Delivered','Canceled '])->default('Pending');
            $table->enum('payment_method', ['Credit card','Debit card','Cash'])->default('Cash');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
