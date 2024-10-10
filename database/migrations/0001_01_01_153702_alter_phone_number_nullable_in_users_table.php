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
    Schema::table('users', function (Blueprint $table) {
        $table->string('phone_number')->nullable(false)->change(); // Make phone_number required again
    });
}

public function down(): void
{
    Schema::table('users', function (Blueprint $table) {
        $table->string('phone_number')->nullable()->change(); // Optionally make it nullable again
    });
}

};
