<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisasterReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disaster_reports', function (Blueprint $table) {
            $table->id();
            $table->string('type_disaster');
            $table->string('name_disaster');
            $table->string('month_disaster');
            $table->string('day_disaster');
            $table->string('year_disaster');
            $table->string('barangay');
            $table->integer('families_affected');
            $table->integer('individuals_affected');
            $table->integer('evacuees');
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
        Schema::dropIfExists('disaster_reports');
    }
}
