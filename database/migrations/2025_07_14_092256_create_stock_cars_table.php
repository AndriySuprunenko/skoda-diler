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
        Schema::create('stock_cars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('status', ['available', 'sold', 'reserved', 'hot_offer'])->default('available');
            $table->enum('condition', ['new', 'used'])->default('used');
            $table->integer('mileage')->nullable();
            $table->string('vin')->nullable();
            $table->json('gallery')->nullable();
            $table->string('color')->nullable();
            $table->string('engine_power')->nullable();
            $table->string('transmission')->nullable();
            $table->string('engine_volume')->nullable();
            $table->string('fuel_consumption')->nullable();
            $table->text('configuration')->nullable();
            $table->unsignedBigInteger('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_cars');
    }
};
