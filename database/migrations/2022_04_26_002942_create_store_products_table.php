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
        Schema::create('store_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('store_id');
            $table->unsignedBigInteger('unit_id');
            $table->unsignedInteger('count');
            $table->double('buy_price');
            $table->double('trade_price');
            $table->double('discount')->default(0);
            $table->double('price');
            $table->date('expire_date')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('CASCADE');

            $table->foreign('unit_id')
                ->references('id')
                ->on('units')
                ->onDelete('CASCADE');

            $table->foreign('store_id')
                ->references('id')
                ->on('stores')
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
        Schema::dropIfExists('store_products');
    }
};
