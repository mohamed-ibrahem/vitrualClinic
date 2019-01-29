<?php

namespace App;

use App\Events\MessageSeen;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /** @var array $appends */
    protected $appends = ['humans_time'];

    /** @var array $fillable */
    public $fillable = [
        'type',
        'message',
        'images',
        'is_seen',
        'user_id',
        'conversation_id',
    ];

    /** @var array $casts */
    protected $casts = [
        'images' => 'array'
    ];

    /**
     * @project VirtualClinic - Jan/2019
     *
     * @return mixed
     */
    public function getHumansTimeAttribute()
    {
        $date = $this->created_at;
        $now = $date->now();

        return $date->diffForHumans($now, true);
    }

    /**
     * @project VirtualClinic - Jan/2019
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function conversation()
    {
        return $this->belongsTo(Conversation::class);
    }

    /**
     * @project VirtualClinic - Jan/2019
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @project VirtualClinic - Jan/2019
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sender()
    {
        return $this->user();
    }

    public function seen()
    {
        $this->update([
            'is_seen' => 1
        ]);

        broadcast(new MessageSeen($this))->toOthers();
    }
}
