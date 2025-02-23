<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAuthCodes extends Model
{
    protected $fillable = [
        'user_id',
        'code',
        'expired_at',
    ];
}
