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
        Schema::create('tinvestors', function (Blueprint $table) {
            $table->id();
            $table->string('investor_id')->unique();
            $table->string('name');
            $table->string('identity_number')->unique();
            $table->string('phone');
            $table->text('address');
            $table->string('email')->unique();
            $table->date('join_date');
            $table->timestamps();
            $table->string('created_by');
            $table->string('updated_by');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tinvestors');
    }
};
