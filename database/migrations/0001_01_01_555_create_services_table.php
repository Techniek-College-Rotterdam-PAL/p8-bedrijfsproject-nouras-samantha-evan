<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('services', function (Blueprint $table) {
        $table->engine = 'InnoDB'; // Ensure the engine is InnoDB
        $table->id(); // Creates an unsigned big integer 'id' column
        $table->string('name'); // Service name
        $table->timestamps(); // Timestamps
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

