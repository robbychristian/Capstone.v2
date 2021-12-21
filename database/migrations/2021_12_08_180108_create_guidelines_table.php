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
            $table->id();
            $table->unsignedBigInteger('brgy_id')->nullable();
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->string('issued_by');
            $table->string('disaster');
            $table->string('time');
            $table->string('guideline');
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
        Schema::dropIfExists('guidelines');
    }
}
