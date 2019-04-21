<?php

namespace App\Models;

use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Builder;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        //scope that will remove superadmin from every search
        // static::addGlobalScope('noSuperadmin', function (Builder $builder) {
        //     $builder->whereHas('roles', function ($query) {
        //         $query->where('name', '!=', 'superadmin');
        //     });
        // });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded  = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //returns list of users without superadmin
    public function scopeUserList($query)
    {
        return $query->whereHas('roles', function ($query) {
            $query->where('name', '!=', 'superadmin');
        });
    }

    /**
     * Scope a query to only include not yet verified users a.k.a new users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNew($query)
    {
        return $query->where('enabled', 0);
    }

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
