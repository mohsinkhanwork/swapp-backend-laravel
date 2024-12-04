<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdRejectedNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public String $title, public String $reason, public String $ad_id)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                ->subject('Ad Rejected')
                ->line("Your '$this->title' Ad is rejected due to the following reason: ")
                ->line("' $this->reason '")
                ->line("Please make the required changes and resubmit for approval.")
                ->line("Check more details on your panel.");
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'id'=>$this->ad_id,
            'type'=>'ad',
            'title'=>"Ad Rejected",
            'description'=>"Your Ad Campaign is rejected.",
        ];
    }
}
