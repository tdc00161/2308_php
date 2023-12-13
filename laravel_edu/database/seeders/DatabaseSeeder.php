<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        // 더미 데이터 삽입용 팩토리 호출
        // 더미 생성시 주의점 : 다량건을 할 경우 컴퓨터가 버텨내지 못할 수 있음
        // 5,000~1만건 정도의 데이터를 돌림
        // 30만건을 넣을 경우 8gb 기준으로 5,000건 *60번 돌림
        // $cnt = 0;
        // while($cnt < 60) {
        // \App\Models\Board::factory()->create();
        // $cnt++;           
        // }
        // 개별 시더 실행: php artisan db:seed --class=파일명

        // $cnt = 0;
        // while($cnt < 60) {
        //     \App\Models\Board::factory(10)->create();
        //     $cnt++;
        // }

    }    
}
