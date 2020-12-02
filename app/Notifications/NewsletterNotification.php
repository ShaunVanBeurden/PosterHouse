<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewsletterNotification extends Notification
{
    use Queueable;

    private $newsletter;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($newsletter)
    {
        $this->newsletter = $newsletter;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        if ($notifiable->notify){
            return ['mail'];
        }else{
            return [];
        }
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        // hier moet nog gekeken worden wat jacques wil
        $data = [
            'title' => $this->newsletter->title,
            'intro' => $this->newsletter->body,
            'paragraphs' => $this->newsletter->paragraphs
        ];
        return (new MailMessage)->view(
            'email.show', $data);
//                    ->greeting('Dit is de nieuwe nieuwsbrief van het NationaalJeugdOntbijt!')
//                    ->title($this->newsletter->title)
//                    ->line($this->newsletter->body)
//                    ->line('Nationaal Jeugd Ontbijt bedankt u voor uw deelname!');
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
            'newsletter' => $this->newsletter
        ];
    }
}
