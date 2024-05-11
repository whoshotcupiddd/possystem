<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('card_number');
            $table->string('expiration_date');
            $table->string('cvv');
            $table->string('cardholder_name');
            $table->timestamps();
        });
    }

};
