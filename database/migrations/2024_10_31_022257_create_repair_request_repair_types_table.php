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
        Schema::create('repair_request_repair_type', function (Blueprint $table) {
            $table->foreignId('request_id')->constrained('repair_requests')->onDelete('cascade');
            $table->foreignId('repair_id')->constrained('repair_types')->onDelete('cascade');
            $table->primary(['request_id', 'repair_id']);
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repair_request_repair_types');
    }
};
