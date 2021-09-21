<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuidelinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guidelines', function (Blueprint $table) {
            $table->id('id');
            $table->string('disaster');
            $table->string('before');
            $table->string('during');
            $table->string('after');
            $table->string('aria_selected');
            $table->string('nav_link_class');
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
        Schema::dropIfExists('guidelines');
    }
}
