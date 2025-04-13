<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword as ResetPasswordNotification;
use Illuminate\Notifications\Messages\MailMessage;

class CustomResetPasswordNotification extends ResetPasswordNotification
{
    /**
     * Construct the notification.
     *
     * @param  string  $token
     * @return void
     */
    public function __construct($token)
    {
        parent::__construct($token);
    }

    /**
     * Mendapatkan URL untuk reset password.
     *
     * @param  string  $token
     * @return string
     */
    public function toMail($notifiable)
    {
        $url = url('resetpw/' . $this->token);

        return (new MailMessage)
                    ->line('Klik tombol di bawah ini untuk reset password Anda.')
                    ->action('Reset Password', $url)
                    ->line('Jika Anda tidak merasa melakukan permintaan reset password, abaikan email ini.');
    }
}
