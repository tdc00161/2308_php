<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_tokens extends Model
{
    use HasFactory;

    protected $fillable = [
        'invite_token',
        'sender_user_id',
    ];
}
