<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    /** @var array $fillable */
    protected $fillable = [
        'name', 'display_name'
    ];

    /** @var bool $timestamps */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * @user mohamed-ibrahim 2018
     *
     * @param $query
     * @return mixed
     */
    public function scopeTop($query)
    {
        return $query->with('users')->get()
            ->map(function ($speciality) {
                return [
                    'label' => $speciality->display_name,
                    'value' => $speciality->users->count()
                ];
            })
            ->sortByDesc(function ($speciality) {
                return $speciality['value'];
            });
    }

    /**
     * @user mohamed-ibrahim 2018
     *
     * @param $query
     * @return mixed
     */
    public function scopeHaveDoctors($query)
    {
        return $query->Top()->filter(function($specialty) {
            return $specialty['value'];
        });
    }
}
