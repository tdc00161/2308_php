<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class category_name extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert([
            ['no' => '0', 'name' => '전체']
            ,['no' => '1', 'name' => '정치']
            ,['no' => '2', 'name' => '경제']
            ,['no' => '3', 'name' => '세계']
            ,['no' => '4', 'name' => '테크']
            ,['no' => '5', 'name' => '노동']
            ,['no' => '6', 'name' => '환경']
            ,['no' => '7', 'name' => '인권']
            ,['no' => '8', 'name' => '사회']
            ,['no' => '9', 'name' => '문화']
            ,['no' => '10', 'name' => '라이프']
        ]);
    }
}
