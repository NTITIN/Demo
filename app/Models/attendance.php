<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class attendance extends Model
{
    use HasFactory, SoftDeletes;

    public function user()
    {
        return $this->hasOne(User::class, 'user_id', 'id');
    }
}
