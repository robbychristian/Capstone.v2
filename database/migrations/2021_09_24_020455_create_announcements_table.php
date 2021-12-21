<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnouncementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brgy_id')->nullable();
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->string('name');
            $table->string('brgy_loc');
            $table->string('title');
            $table->string('body');
            $table->boolean('approved');
            $table->timestamps();
            $table->softDeletes();
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
            //$table->foreign('brgy_position')
            //        ->references('brgy_position')
            //        ->on('brgy_officials')
            //        ->onDelete('cascade');
            //$table->foreign('name')
            //        ->references('name')
            //        ->on('brgy_officials')
            //        ->onDelete('cascade');
            //$table->foreign('brgy_loc')
            //        ->references('brgy_loc')
            //        ->on('brgy_officials')
            //        ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('announcements');
    }
}
