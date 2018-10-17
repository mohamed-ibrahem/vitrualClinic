<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /** @var array $fillable */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'info'
    ];

    /** @var array $hidden */
    protected $hidden = [
        'password', 'remember_token', 'role_id', 'info'
    ];

    /** @var array $casts */
    protected $casts = [
        'info' => 'collection'
    ];

    protected $appends = [
        'profile_pic'
    ];

    /**
     * @project VirtualClinic
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * @project VirtualClinic
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function specialities()
    {
        return $this->belongsToMany(speciality::class);
    }

    /**
     * @project VirtualClinic
     *
     * @param $role
     * @return Boolean
     */
    public function hasRole($role)
    {
        if (! $role instanceof Role) {
            if (! is_numeric($role))
                $role = Role::where('name', $role)->first();
            else
                $role = Role::find($role);
        }

        return $this->role->is($role);
    }

    /**
     * @project VirtualClinic
     *
     * @param $roles
     * @return bool
     */
    public function hasRoles($roles)
    {
        foreach ($roles as $role) {
            if ( $this->hasRole($role) )
                return true;
        }

        return false;
    }

    /**
     * @return string
     */
    public function getProfilePicAttribute()
    {
        return asset($this->info->get('profile_pic', 'assets\layout\img\avatar.png'));
    }
}
