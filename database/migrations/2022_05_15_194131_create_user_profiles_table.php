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
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('user_id');
            $table->morphs('profilable');
            $table->string('phone1')->nullable();
            $table->string('phone2')->nullable();
            $table->string('home_phone')->nullable();
            $table->string('address')->nullable();
            $table->string('job')->nullable();
            $table->enum('type',['doctor','student','supplier'])->nullable();
            $table->double('credit')->default(0);
            $table->double('total_paid')->default(0);
            $table->double('total_earned')->default(0);
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
        Schema::dropIfExists('user_profiles');
    }
};
