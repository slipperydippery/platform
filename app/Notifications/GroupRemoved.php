<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class GroupRemoved extends Notification
{
    protected $group;

    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($group)
    {
        $this->group = $group;
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
        return (new MailMessage)
                    ->subject('Groepssessie ' . $this->group->title . ' is verwijderd')
                    ->line('De groepssessie ' . $this->group->title . ' waar jij aan deelnam is verwijderd door de beheerder. Je zal de sessie dus niet meer zien op je startpagina volgende keer dat je inlogt.')
                    ->line('Kom naar de Participatie.scan om de overzicht van je sessies te bekijken, of om een nieuwe sessie te starten!')
                    ->action('Ga naar de Participatie.scan', url('/'))
                    ->line('Bedankt!');
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
