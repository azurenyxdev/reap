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
        Schema::create('tinvestortrx_installments', function (Blueprint $table) {
            $table->id();
            $table->string('history_no');
            $table->integer('index');
            $table->integer('installment_amount');
            $table->date('duedate');
            $table->date('actual_paymentdate')->nullable();
            $table->integer('late_compensation')->default(0);
            $table->tinyinteger('ispaid'); // 0=not paid, 1=paid
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
        Schema::dropIfExists('tinvestortrx_installments');
    }
};
