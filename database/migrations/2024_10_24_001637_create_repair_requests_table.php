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
            $table->foreignId('device_model_id')->constrained('device_models')->onDelete('cascade'); // Foreign Key referencing device_models
            $table->foreignId('device_type_id')->constrained('device_types')->onDelete('cascade'); // Foreign Key referencing device_types
            $table->string('name');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->text('description')->nullable(); // Description of the repair request, nullable
            $table->enum('status', ['ingediend', 'in behandeling', 'voltooid'])->default('ingediend'); // Status of the request
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('repair_requests');
    }
}
 