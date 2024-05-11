<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up():void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->decimal('price', 8, 2)->default(0); // Adding a price field
        });
    }

    public function down():void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('price'); // Dropping the price field if the migration is rolled back
        });
    }
};
