<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ResultsRequested extends Notification
{
    protected $scan;

    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($scan)
    {
        $this->scan = $scan;
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
        $message = '';
        foreach ($this->scan->scanmodel->themes as $theme) {
            $message .= $theme->title . '<br>';
            foreach ($theme->questions as $question) {
                foreach ($this->scan->measures->where('question_id', $question->id) as $measure) {
                    $message .= $measure->measure . '<br>';
                }
            }
        }
        return (new MailMessage)
                    ->subject('Hier zijn de resultaten van de sessie ' . $this->scan->title)
                    ->line('Hieronder volgen de resultaten van de sessie ' . $this->scan->title)
                    ->line($message)
                    ->action('Bekijk de sessie', url('/scan/' . $this->scan->id))
                    ->line('Bedankt voor het gebruiken van de Participatiescan');
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