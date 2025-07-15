<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');  // FOREIGN KEY ke orders.id
            $table->unsignedBigInteger('product_id');  // FOREIGN KEY ke product.id
            $table->unsignedInteger('quantity')->default(1);  // quantity, default 1
            $table->decimal('unit_price', 10, 2);  // unit price
            $table->decimal('subtotal', 10, 2);  // subtotal
            $table->timestamps();
            // Foreign key constraints
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('product')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
