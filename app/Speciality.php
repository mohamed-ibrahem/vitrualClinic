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

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
