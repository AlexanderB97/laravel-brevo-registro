<?php

namespace App\Jobs;

use App\Mail\WelcomeUserMail;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SendWelcomeEmailJob implements ShouldQueue
{
    use Queueable;

    /**
     * Cantidad maxima de intentos antes de marcar el trabajo como fallido.
     */
    public int $tries = 3;

    /**
     * Create a new job instance.
     */
    public function __construct(public User $user)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->user->email)->send(new WelcomeUserMail(['name' => $this->user->name]));
    }
}
