<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepairRequestsTable extends Migration
{

    public function up()
    {
        Schema::create('repair_requests', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade'); // Foreign Key referencing users, nullable
            $table->string('name'); 
            $table->string('phone'); 
            $table->string('email')->nullable(); 
            $table->string('service_type'); // e.g., telefoon, laptop
            $table->text('description'); // Description of the repair request
            $table->enum('status', ['ingediend', 'in behandeling', 'voltooid']); // Status of the request
            $table->timestamps(); // created_at and updated_at timestamps
        });
    }
    public function down()
    {
        Schema::dropIfExists('repair_requests');
    }
}
