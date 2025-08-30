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
        Schema::table('stock_cars', function (Blueprint $table) {
            $table->enum('status', ['available', 'sold', 'reserved', 'hot_offer', 'in_delivery'])->default('available')->change();
            $table->string('specification_file')->nullable()->after('price');
            $table->text('description')->nullable()->after('specification_file');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('stock_cars', function (Blueprint $table) {
            $table->enum('status', ['available', 'sold', 'reserved', 'hot_offer'])->default('available')->change();
            $table->dropColumn(['specification_file', 'description']);
        });
    }
};
