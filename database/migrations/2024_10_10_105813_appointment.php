<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Service;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->foreignIdFor(User::class)->constrained()->onDelete('cascade'); // FK
            $table->foreignIdFor(Service::class)->constrained()->onDelete('cascade'); // FK
            $table->date('date');
            $table->time('time');
            $table->string('status')->default('pending'); // For status of the appointment (e.g. pending, confirmed, canceled)
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
