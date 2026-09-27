<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a nuestra plataforma</title>
</head>
<body style="margin:0; padding:0; background-color:#f4f6f8; font-family:Arial, Helvetica, sans-serif;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#f4f6f8; padding:40px 0;">
        <tr>
            <td align="center">
                <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="max-width:600px; background-color:#ffffff; border-radius:8px; box-shadow:0 2px 8px rgba(0, 0, 0, 0.08);">
                    <tr>
                        <td style="padding:40px 32px;">
                            <h1 style="margin:0 0 16px; font-size:24px; color:#111827;">¡Hola, {{ $nombre }}!</h1>

                            <p style="margin:0 0 16px; font-size:16px; line-height:1.6; color:#374151;">
                                Gracias por registrarte en nuestra plataforma. Nos alegra mucho que formes parte de nuestra comunidad.
                            </p>

                            <p style="margin:0 0 24px; font-size:16px; line-height:1.6; color:#374151;">
                                A partir de ahora ya podés acceder con el correo electrónico y la contraseña que elegiste al registrarte.
                            </p>

                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td style="background-color:#e0f2fe; border-radius:6px; padding:16px; text-align:center;">
                                        <p style="margin:0; font-size:16px; font-weight:bold; color:#0369a1;">
                                            Registro completado exitosamente.
                                        </p>
                                    </td>
                                </tr>
                            </table>

                            <p style="margin:24px 0 0; font-size:14px; color:#6b7280;">
                                Saludos,<br>
                                El equipo de {{ config('app.name') }}
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
