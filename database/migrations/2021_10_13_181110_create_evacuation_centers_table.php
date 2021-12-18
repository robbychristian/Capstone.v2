<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvacuationCentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evacuation_centers', function (Blueprint $table) {
            $table->id();
            $table->string('added_by');
            $table->string('evac_name');
            $table->string('evac_latitude');
            $table->string('evac_longitude');
            $table->string('nearest_landmark');
            $table->string('brgy_loc');
            $table->string('phone_no');
            $table->string('capacity');
            $table->string('availability');
            $table->boolean('is_approved');
            $table->softDeletes();
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
        Schema::dropIfExists('evacuation_centers');
    }
}
