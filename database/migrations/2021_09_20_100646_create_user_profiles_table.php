<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id('id');
            $table->string('user_email');
            $table->string('middle_name');
            $table->string('home_add');
            $table->string('contact_no');
            $table->string('birth_day');
            $table->string('profile_pic');
            $table->timestamps();
            $table->foreign('user_email')
                ->references('email')
                ->on('users')
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
        Schema::dropIfExists('user_profiles');
    }
}
