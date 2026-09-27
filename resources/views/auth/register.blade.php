<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 40px 16px;
            background-color: #f4f6f8;
            font-family: Arial, Helvetica, sans-serif;
            color: #111827;
        }

        .card {
            max-width: 440px;
            margin: 0 auto;
            padding: 32px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        h1 {
            margin: 0 0 24px;
            font-size: 24px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-size: 14px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px 12px;
            font-size: 15px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
        }

        input:focus {
            outline: none;
            border-color: #0369a1;
        }

        .error {
            display: block;
            margin-top: 6px;
            font-size: 13px;
            color: #dc2626;
        }

        .success {
            margin-bottom: 20px;
            padding: 12px;
            font-size: 14px;
            color: #16a34a;
            background-color: #f0fdf4;
            border: 1px solid #16a34a;
            border-radius: 6px;
        }

        button {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            font-weight: bold;
            color: #ffffff;
            background-color: #0369a1;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background-color: #075985;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Registro de Usuario</h1>

        @if(session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('register.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Nombre Completo</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}">
                @error('name')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}">
                @error('email')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password">
                @error('password')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirmar Contraseña</label>
                <input type="password" id="password_confirmation" name="password_confirmation">
            </div>

            <button type="submit">Registrarse</button>
        </form>
    </div>
</body>
</html>
