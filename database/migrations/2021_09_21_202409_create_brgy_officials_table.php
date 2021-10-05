<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrgyOfficialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brgy_officials', function (Blueprint $table) {
            $table->id('id');
            $table->string('email');
            $table->string('password');
            $table->string('name');
            $table->integer('user_role');
            $table->string('brgy_position');
            $table->string('brgy_loc');
            $table->string('contact_no');
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
        Schema::dropIfExists('brgy_officials');
    }
}
