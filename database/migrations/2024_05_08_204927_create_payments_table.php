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
        $table->string('card_number')->nullable();
        $table->string('expiration_date')->nullable();
        $table->string('cvv')->nullable();
        $table->string('cardholder_name')->nullable();
        $table->unsignedBigInteger('order_id');
        $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        $table->string('payment_method');
        $table->decimal('amount_paid', 10, 2)->nullable();
        $table->decimal('change', 10, 2)->nullable();
        $table->timestamps(); 
    });
}

    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
