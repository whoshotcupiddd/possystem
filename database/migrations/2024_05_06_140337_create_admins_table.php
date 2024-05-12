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
        Schema::create('admins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('adminCode')->unique();
            $table->string('adminName');
            $table->string('adminPassword');
            $table->string('adminPhoneNum');
            $table->string('adminEmail');
            $table->date('DeploymentDate');
            $table->string('image', 255)->nullable(); // Assuming StaffPhoto can be nullable
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
