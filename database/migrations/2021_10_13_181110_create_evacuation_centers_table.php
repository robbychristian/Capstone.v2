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
            $table->unsignedBigInteger('brgy_id')->nullable();
            $table->unsignedBigInteger('admin_id')->nullable();
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

            $table->foreign('brgy_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate(('cascade'));
            $table->foreign('admin_id')
                ->references('id')
                ->on('admins')
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
        Schema::dropIfExists('evacuation_centers');
    }
}
