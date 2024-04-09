<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('store_product_id');
            // $table->unsignedBigInteger('user_id');
            $table->morphs('cartable');
            $table->float('count');
            $table->double('price');
            $table->double('product_buy_price');
            $table->double('discount')->default(0);
            $table->double('total_price');
            $table->timestamps();

            $table->foreign('store_product_id')
                ->references('id')
                ->on('store_products')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
};
