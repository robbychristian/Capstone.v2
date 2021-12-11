<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisasterAffectedStreetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disaster_affected_streets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('disaster_id');
            $table->string('affected_streets');
            $table->integer('number_families_affected');
            $table->softDeletes();
            $table->foreign('disaster_id')
                ->references('id')
                ->on('disaster_reports')
                ->onDelete('cascade')
                ->onUpdate(('cascade'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disaster_affected_streets');
    }
}
