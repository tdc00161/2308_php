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
        Schema::create('items', function (Blueprint $table) {
            $table->id(); //id
            $table->string('content', 255); // 내용
            $table->char('completed', 1); // 완료여부
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();
            $table->softDeletes(); // delete_at 를 자동으로 생성해줌
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
};
