<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    /** @var bool $timestamps */
    public $timestamps = false;

    /** @var array $fillable */
    protected $fillable = [
        'value', 'extra', 'key'
    ];

    /** @var array $casts */
    protected $casts = [
        'value' => 'collection',
        'extra' => 'collection'
    ];

    /**
     * @user mohamed-ibrahim 2018
     *
     * @param $key
     * @param null $default
     * @return null
     */
    public function search($key, $default = null)
    {
        $option = $this->where('key', $key)->first();
        if ($option) return $option->value;

        return $default;
    }

    public function add($key, $value, $extra = null)
    {
        return $this->updateOrCreate([
            'key' => $key
        ], [
            'value' => $value,
            'extra' => $extra
        ]);
    }

    public function addArray(array $data)
    {
        foreach ($data as $key => $value) {
            $this->add($key, $value);
        }
    }
}
