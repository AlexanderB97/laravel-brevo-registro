<?php

namespace App\Http\Controllers;

use App\Jobs\SendWelcomeEmailJob;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class RegisterController extends Controller
{
    /**
     * Muestra el formulario de registro.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Valida los datos, crea el usuario y despacha el envio del correo de bienvenida.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'string', 'email:rfc,dns', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'email.unique' => 'Este correo electrónico ya se encuentra registrado.',
            'password.confirmed' => 'Las contraseñas ingresadas no coinciden.',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // Nivel 1 (envio directo con el Mailable encolado):
        // Mail::to($user->email)->send(new WelcomeUserMail($validated));

        // Nivel 4: el Job dedicado se encarga del envio en segundo plano.
        SendWelcomeEmailJob::dispatch($user);

        return back()->with('success', '¡Usuario registrado con éxito! Correo de bienvenida enviado.');
    }
}
