<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepairRequestsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('repair_requests', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('name'); // Name of the person submitting the request
            $table->string('phone'); // Phone number of the person submitting the request
            $table->string('email')->nullable(); // Email of the person submitting the request, nullable
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade'); // Foreign Key referencing users, nullable
            $table->foreignId('address_id')->constrained('addresses')->onDelete('cascade'); // Foreign Key referencing addresses
            $table->string('service_type'); // e.g., telefoon, laptop
            $table->text('description'); // Description of the repair request
            $table->enum('status', ['ingediend', 'in behandeling', 'voltooid']); // Status of the request
            $table->timestamps(); // created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('repair_requests');
    }
}
