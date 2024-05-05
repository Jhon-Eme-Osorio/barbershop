<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CitaCanceladaNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    protected $nombre;

    public function __construct($nombre)
    {
        $this->nombre = $nombre;
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
            ->subject('Cancelación de su cita en Barbershop')
            ->line('Estimado/a ' . $this->nombre)
            ->line('Lamentamos informarle que su cita programada en Barbershop ha sido cancelada debido a problemas internos en nuestra agenda de citas.')
            ->line('Nos disculpamos sinceramente por cualquier inconveniente que esto pueda causar.')
            ->line('Le animamos a que visite nuestra página web nuevamente para programar una nueva cita en un horario conveniente para usted.')
            ->action('BARBERSHOP', url('/'))
            ->line('Estamos comprometidos a brindarle el mejor servicio y esperamos tener la oportunidad de atenderle pronto.')
            ->line('')
            ->line('Telefono: +34 12 345 67 89')
            ->line('Ubicación: Plaza España')
            ->line('Esperamos verte pronto en Barbershop para brindarte el mejor servicio de cuidado personal!')
            ->line(' ')
            ->line('Gracias por confiar en nosotros!');
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
