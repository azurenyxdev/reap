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
        Schema::create('tinvestortrxes', function (Blueprint $table) {
            $table->id();
            $table->string('invest_id')->unique();
            $table->string('investor_id');
            $table->date('invest_startdate');
            $table->date('invest_enddate');
            $table->tinyinteger('status'); // 0=inactive/finished paid, 1=active/ongoing
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
        Schema::dropIfExists('tinvestortrxes');
    }
};
