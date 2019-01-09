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
        'message',
        'is_seen',
        'deleted_from_sender',
        'deleted_from_receiver',
        'user_id',
        'conversation_id',
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
        if ($this->where(function ($q) {
            $q->where('user_id', '!=', auth()->id())
                ->where('is_seen', 0);
        })->update([
            'is_seen' => 1
        ]))
            broadcast(new MessageSeen($this))->toOthers();
    }
}
