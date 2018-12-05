<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getFullnameAttribute()
    {
        return ($this->firstname. ' ' .$this->lastname);
    }
    public function getRoleAttribute()
    {
        return $this->getRoleNames()->first();
    }


    //disbale/enable/toggle user acount access
    public function disableAccess()
    {
        $this->enabled = false;
        return $this;
    }
    public function enableAccess()
    {
        $this->enabled = true;
        return $this;
    }
    public function toggleAccess()
    {
        $this->enabled = $this->enabled ? false : true;
        return $this;
    }
}
