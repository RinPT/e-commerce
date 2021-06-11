<?php

namespace App\Models;

use App\Models\Countries;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Http\Controllers\UserAddressController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $table = 'users';

    protected $fillable = [
        'name',
        'surname',
        'username',
        'email',
        'password',
        'photo',
        'status',
        'group',
        'store',
        'last_logged_ipaddress'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function addresses() {
        return $this->hasMany(UserAddress::class);
    }

}
