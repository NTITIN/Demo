<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class LeadDetails extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'date',
        'camp_name',
        'agent_name',
        'email_address',
        'salution',
        'first_name',
        'last_name',
        'prospects_link',
        'comp_name',
        'comp_link',
        'address',
        'jobtitle',
        'phone_no',
        'direct_no',
        'city',
        'state',
        'country',
        'industry',
        'zipcode',
        'emp_size',
        'website',
        'asset_title',
        'timestamp',
        'agent_remark',
        'address_link',
        'custom_quest1',
        'custom_quest2',
        'custom_quest3',
        'custom_quest4',
        'custom_quest5',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'user_id', 'id');
    }
    public function ipcounts()
    {
        return $this->hasMany(IPCount::class, 'user_id', 'id');
    }
}
