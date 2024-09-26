<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BazarListSummaryNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $bazarListItems;

    public function __construct($bazarListItems)
    {
        $this->bazarListItems = $bazarListItems;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $mailMessage = (new MailMessage)
            ->subject('Your Daily Bazar List Summary')
            ->greeting('Hello ' . $notifiable->name . ',')
            ->line('Here is your Bazar List summary:');

        foreach ($this->bazarListItems as $item) {
            $mailMessage->line($item->product->name . ' - Quantity: ' . $item->quantity);
        }

        $mailMessage->line('Thank you for using our Bazar List App!');

        return $mailMessage;
    }
}
