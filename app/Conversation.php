<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    /** @var array $fillable */
    protected $fillable = [
        'user_one', 'user_two'
    ];

    protected $with = [
        'messages'
    ];

    /**
     * @project VirtualClinic - Jan/2019
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages()
    {
        return $this->hasMany(Message::class, 'conversation_id');
    }

    /**
     * @project VirtualClinic - Jan/2019
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userOne()
    {
        return $this->belongsTo(User::class, 'user_one');
    }

    /**
     * @project VirtualClinic - Jan/2019
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userTwo()
    {
        return $this->belongsTo(User::class, 'user_two');
    }

    /**
     * @project VirtualClinic - Jan/2019
     *
     * @param $form
     * @return Model
     */
    public function send($form)
    {
        $data = [
            'type' => $form['type'],
            'message' => $form['message'],
            'images' => $form['images'],
            'user_id' => auth()->id()
        ];

        return $this->messages()->create($data);
    }
}
