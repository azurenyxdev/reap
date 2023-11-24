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
        Schema::create('tinvestortrxhistories', function (Blueprint $table) {
            $table->id();
            $table->string('history_no')->unique();
            $table->string('invest_id');
            $table->integer('amount');
            $table->date('invest_startdate');
            $table->date('invest_enddate');
            $table->integer('lengthofinvest');
            $table->tinyinteger('profitpercentage');
            $table->integer('profit');
            $table->integer('penalty')->default(0);
            $table->integer('total_payment');
            $table->integer('remaining_payment');
            $table->tinyinteger('status'); // 0=inactive/finished paid, 1=active/ongoing, 2=early payment
            $table->string('remark')->nullable();
            $table->string('attachment')->nullable();
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
        Schema::dropIfExists('tinvestortrxhistories');
    }
};
