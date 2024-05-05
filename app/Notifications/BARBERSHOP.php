<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BARBERSHOP extends Notification
{
    use Queueable;

    protected $nombre, $fecha, $hora, $servicio, $token;

    /**
     * Create a new notification instance.
     */
    public function __construct($nombre, $fecha, $hora, $servicio, $token)
    {
        $this-> nombre = $nombre;
        $this-> fecha = $fecha;
        $this-> hora = $hora;
        $this-> servicio = $servicio;
        $this-> token = $token;
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
                    ->subject('Confirmación de reserva de cita en Barbershop')
                    ->line('Estimado/a '.$this->nombre)
                    ->line('Nos complace confirmar su reserva de cita en Barbershop.')
                    ->line('A continuación, encontrará los detalles de su cita:')
                    ->line('Fecha: '.$this->fecha)
                    ->line('Hora: '.$this->hora)
                    ->line('Servicio(s) reservado(s): '.$this->servicio)
                    ->line('')                    
                    ->line('Para cancelar su cita, haga clic en el siguiente enlace:')
                    ->action('Cancelar Cita', url('home.cancelaCita/'.$this->token))
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
