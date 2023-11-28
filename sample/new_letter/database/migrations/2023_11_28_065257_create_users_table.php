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
        Schema::create('users', function (Blueprint $table) {
            $table->id('u_id');
            $table->string('email',50)->unique();
            $table->string('password',20);
            $table->string('passwordchk',20);
            $table->string('nickname',50);
            $table->dateTime('birth');
            $table->char('gender',1);
            $table->char('career',1);
            $table->char('grade',1);
            $table->string('interest')->nullable();
            $table->char('agree_age',1);
            $table->char('agree_use',1);
            $table->char('agree_per',1);
            $table->char('agree_mk',1)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
