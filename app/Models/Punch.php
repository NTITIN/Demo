<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Punch extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $dates = [
        'punchin', 
        'punchout'
    ];
    
    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    public function getTimingAttribute(): int
    {
       if ($this->punchout) {
           return $this->punchout->diffInSeconds($this->punchin);
       }
       return 0;
    }
    
}
