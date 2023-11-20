<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory, SoftDeletes;

    //model내에 작성된 이름명은 정해진 아이들이기때문에 다르게 작성할 시 오류가 날 수 있다.

    // 디폴트 설정
    protected $attributes = [
        'completed' => '0'
    ];

    // 화이트 리스트 설정
    protected $fillable = [
        'content'
    ];

    // 데이트 설정
    protected $dates = [
        'completed_at'
    ];


    // API로 JSON을 파싱할 때 TimeZone을 맞추는 설정
    protected function serializeDate(DateTimeInterface $date) {
        return $date->format('Y-m-d H:i:s');

    }

}
