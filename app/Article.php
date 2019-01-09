<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelFollow\Traits\CanBeBookmarked;
use Overtrue\LaravelFollow\Traits\CanBeLiked;
use Spatie\Activitylog\Traits\LogsActivity;

class Article extends Model
{
    use CanBeLiked, CanBeBookmarked, LogsActivity;

    protected $fillable = [
        'title', 'body', 'image', 'status'
    ];

    /**
     * @project VirtualClinic - Dec/2018
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @project VirtualClinic - Dec/2018
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @project VirtualClinic - Dec/2018
     *
     * @param $value
     * @return string
     */
    public function getImageAttribute($value)
    {
        return asset($value ? $value : 'assets/global/img/no-image.png');
    }
}
