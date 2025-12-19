<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('client_name');
            $table->string('client_email');
            $table->string('status')->default('pending');
            $table->decimal('total_amount', 10, 2);
            $table->string('shipping_address');
            $table->string('city');
            $table->string('state');
            $table->string('postal_code');
            $table->json('items');
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
