<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SellerDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seller_id');
            $table->foreignId('item_id');
            $table->double('item_price');
            $table->integer('item_quantity');
            $table->double('sub_total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seller_details');
    }
}
