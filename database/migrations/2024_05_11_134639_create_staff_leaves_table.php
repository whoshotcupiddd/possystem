<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('staff_leaves', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('staffCode');
            $table->string('staffName');
            $table->string('leaveType');
            $table->integer('numberOfLeaveDays');
            $table->date('fromDate');
            $table->date('toDate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('staff_leaves');
    }
};
