<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /** @var array $fillable */
    protected $fillable = [
        'name', 'display_name'
    ];

    /** @var bool $timestamps */
    public $timestamps = false;

    /**
     * @project VirtualClinic
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasMany(User::class);
    }

    /**
     * @project VirtualClinic
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeAdmins(Builder $query)
    {
        return $query->where('name', 'admin')->first();
    }

    /**
     * @project VirtualClinic
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeDoctors(Builder $query)
    {
        return $query->where('name', 'doctor')->first();
    }

    /**
     * @project VirtualClinic
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeUsers(Builder $query)
    {
        return $query->whereIn('name', ['doctor', 'members'])->get();
    }

    /**
     * @project VirtualClinic
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeMembers(Builder $query)
    {
        return $query->where('name', 'member')->first();
    }
}
