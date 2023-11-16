<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;

    protected $primaryKey = 'b_id';

    //fillable 
   protected $fillable = [
       'b_title',
       'b_content'
   ];
}
