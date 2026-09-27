<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * Correo de bienvenida para usuarios recien registrados.
 *
 * No implementa ShouldQueue porque el envio en segundo plano lo gestiona
 * el Job dedicado App\Jobs\SendWelcomeEmailJob (estrategia Nivel 4).
 */
class WelcomeUserMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Datos del usuario registrado.
     *
     * @var array<string, mixed>
     */
    public array $userData;

    /**
     * Create a new message instance.
     *
     * @param  array<string, mixed>  $userData
     */
    public function __construct(array $userData)
    {
        $this->userData = $userData;
    }

    /**
     * Build the message.
     */
    public function build(): static
    {
        return $this->subject('¡Bienvenido a nuestra plataforma!')
            ->view('emails.welcome')
            ->with([
                'nombre' => $this->userData['name'],
            ]);
    }
}
