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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('user_id');
            $table->morphs('orderable');
            $table->date('date');
            $table->string('address')->nullable();
            $table->double('discount')->default(0);
            $table->double('total_products_buy_price');
            $table->double('total');
            $table->double('total_after_discount');
            $table->double('paid');
            $table->double('left');
            $table->enum('status', ['open', 'closed'])->default('open');
            $table->enum('type', ['buy', 'sell', 'return'])->default('sell');
            $table->softDeletes();
            $table->timestamps();

            // $table->foreign('user_id')
            //     ->references('id')
            //     ->on('users')
            //     ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
