<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewAccount extends Notification
{
    use Queueable;

    public $account;


    public function __construct($account)
    {
        $this->account = $account;
    }


    public function via(object $notifiable): array
    {
        return ['mail','database'];
    }


    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)

                    ->line('Vous avez une nouvelle inscription')
                    ->action("voir sur l'application Action", url('/'))
                    ->line('Thank you for using our application!');
    }


    public function toArray(object $notifiable): array
    {
        return [
            "id"=> $this->account['id'],
            "society_name"=> $this->account['society_name'],
        ];
    }
}
