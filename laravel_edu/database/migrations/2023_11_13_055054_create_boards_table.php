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
        // 모델 명은 단수로 -> 복수로 생성됨.
        Schema::create('boards', function (Blueprint $table) {
            // 글번호, 제목, 내용, 작성일, 수정일, 삭제일자
            $table->id(); // big_int, pk, auto_increment 
            // id() 안에 값을 설정안할 경우, 기본값으로 id 가 컬럼명으로 설정되어짐.
            $table->string('title', 50); //var_char(50), not null 이 디폴트 값
            // ->nullable() : null 을 허용하고 싶을 때 사용하는 것
            // ->index();
            $table->string('content', 1000); //var_char(1000), not null
            //(첫번째는 컬럼명 , 두번째는 해당 조건)
            $table->timestamps(); // created_at, updated_at, null 허용
            // $table->timestamp('created_at')->default('CURRENT_TIMESTAMP'); // 
            // $table->timestamp('updated_at')->default('CURRENT_TIMESTAMP'); // 
            $table->softDeletes();// deleted_at,  nullable() : null 허용


        });
    }








    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boards');
    }
}; 
