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
        Schema::create('services', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('service_name');
            $table->text('description');
            $table->decimal('price', 8, 2);
            $table->integer('duration'); // in minutes
            $table->integer('stock_quantity')->nullable(); // Only for webshop
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
