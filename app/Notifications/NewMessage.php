<?php

namespace App\Notifications;

use App\Http\Resources\MessageResource;
use App\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use NotificationChannels\FCM\FCMMessage;

class NewMessage extends Notification
{
    use Queueable;

    /** @var Message */
    public $message;

    /**
     * Create a new notification instance.
     *
     * @param $message
     */
    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'fcm'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('New message in, waiting for your answer')
                    ->line($this->message->sender->name . ' has sent you a new message on the app and we are waiting for an early reply');
    }

    public function toFCM($notifiable)
    {
        return (new FCMMessage())
            ->notification([
                'title' => $this->message->sender->name,
                'body' => $this->message->message
            ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return MessageResource::make($this->message);
    }
}
