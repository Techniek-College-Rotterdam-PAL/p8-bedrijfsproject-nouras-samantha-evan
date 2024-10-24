<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Address;


return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('repair_requests', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->foreignIdFor(User::class)->constrained()->onDelete('cascade'); // Foreign Key referencing users
            $table->foreignIdFor(Address::class)->constrained()->onDelete('cascade'); // Foreign Key referencing addresses
            $table->string('service_type'); // e.g., phone, laptop
            $table->text('description'); // Description of the request
            $table->string('status'); // e.g., submitted, in progress, completed
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
};
