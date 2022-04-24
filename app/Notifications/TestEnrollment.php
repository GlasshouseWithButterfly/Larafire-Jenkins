<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TestEnrollment extends Notification
{
    use Queueable;
    private $enrollmentData;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($enrollmentData)
    {
        $this->enrollmentData = $enrollmentData;
        // dd($this->enrollmentData);
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        // dd($this->enrollmentData['body']);
        return (new MailMessage)
                    ->line($this->enrollmentData['body'])
                    ->action($this->enrollmentData['enroll_text'], $this->enrollmentData['url'])
                    ->line($this->enrollmentData['thankyou']);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}