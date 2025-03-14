<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PreUser extends Model
{
    protected $fillable = [
        'token',
        'email',
        'expired_at',
    ];
}
