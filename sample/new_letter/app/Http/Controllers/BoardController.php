<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Board;

class BoardController extends Controller
{
    public function index(){
        $responseData = Board::get();
        return $responseData;
    }

    // $sql = DB::insert('insert into users (email, nickname) values (?, ?)')

    // $arr = [
    //     'abcd123@gmail.com',
    //     '강순이'
    // ]

    // $result = DB::table('users')
    //          ->where('','=','')
    
}
