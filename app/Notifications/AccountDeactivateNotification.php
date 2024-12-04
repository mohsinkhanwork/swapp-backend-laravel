<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AccountDeactivateNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public String $name)
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
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('Account Deactivation Confirmation')
                    ->greeting("Hi $this->name")
                    ->line("We're sorry to see you go, but we've received your request to permanently deactivate your SkillSwap account. We want to confirm that your account has been successfully deactivated. Please note that this action is irreversible, and you will no longer have access to your account or any associated data.")
                    ->line('Thank you for being a part of the SkillSwap community. We wish you all the best in your future endeavors.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
