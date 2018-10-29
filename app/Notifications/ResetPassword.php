<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;

class ResetPassword extends Notification
{
    use Queueable;

    /** @var string $token */
    public $token;

    /** @var \Closure $toMailCallback */
    public static $toMailCallback;

    /**
     * @project VirtualClinic - Oct/2018
     * ResetPassword constructor.
     *
     * @param $token
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * @project VirtualClinic - Oct/2018
     *
     * @param $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * @project VirtualClinic - Oct/2018
     *
     * @param $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable)
    {
        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable, $this->token);
        }

        return (new MailMessage)
            ->subject(Lang::getFromJson('Reset Password Notification'))
            ->line(Lang::getFromJson('You are receiving this email because we received a password reset request for your account.'))
            ->action(Lang::getFromJson('Reset Password'), url(
                config('app.url').
                route('password.reset', $this->token, false)
            ))
            ->line(Lang::getFromJson('If you did not request a password reset, no further action is required.'));
    }

    /**
     * @project VirtualClinic - Oct/2018
     *
     * @param $callback
     * @return void
     */
    public static function toMailUsing($callback)
    {
        static::$toMailCallback = $callback;
    }
}
