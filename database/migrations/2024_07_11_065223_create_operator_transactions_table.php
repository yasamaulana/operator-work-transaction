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
        Schema::create('operator_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('submitted_by');
            $table->date('submitted_when');
            $table->string('site_code');
            $table->string('activity');
            $table->string('uom');
            $table->string('block');
            $table->string('task');
            $table->time('start');
            $table->time('end');
            $table->string('mesin_id');
            $table->integer('fuel');
            $table->string('check_by');
            $table->date('when_check');
            $table->string('verified_by');
            $table->date('when_verified');
            $table->string('duty');
            $table->string('reason')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operator_transactions');
    }
};