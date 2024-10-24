<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id('appointment_id'); // Primary key for appointments
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Unsigned big integer for users
            $table->foreignId('service_id')->constrained('services')->onDelete('cascade'); // Unsigned big integer for services
            
            $table->date('date'); // Date of the appointment
            $table->time('time'); // Time of the appointment
            $table->string('status')->default('pending'); // Default status is 'pending'
            
            $table->timestamps(); // Timestamps
        });
    }
        public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
//test