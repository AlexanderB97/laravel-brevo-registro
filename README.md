# Registro de Usuarios con Brevo SMTP — Laravel 13

Trabajo práctico de la materia Programación IV, Tecnicatura Universitaria en Programación (UTN).

Sistema de registro de usuarios con validaciones avanzadas, envío automatizado de correo de bienvenida mediante Brevo SMTP y procesamiento asíncrono con colas (Queues) de Laravel.

## Tecnologías utilizadas

- Laravel 13
- Blade (motor de plantillas)
- SQLite (base de datos)
- Brevo (servicio SMTP para envío de correos transaccionales)
- Sistema de colas de Laravel (Queue database driver)

## Funcionalidades

- Formulario de registro con validaciones completas:
  - Nombre: requerido, mínimo 3 caracteres, máximo 255
  - Correo: requerido, formato válido (RFC + verificación DNS), único en la base de datos
  - Contraseña: requerida, mínimo 8 caracteres, con confirmación obligatoria
- Mensajes de error personalizados y retención de valores previos en el formulario
- Envío de correo HTML de bienvenida al usuario registrado
- Procesamiento asíncrono del envío de correo mediante un Job dedicado (`SendWelcomeEmailJob`), evitando bloquear la respuesta al usuario
- Manejo de reintentos automáticos en caso de fallo del envío (hasta 3 intentos)

## Estructura relevante del proyecto

```
app/
  Http/Controllers/RegisterController.php
  Jobs/SendWelcomeEmailJob.php
  Mail/WelcomeUserMail.php
resources/views/
  auth/register.blade.php
  emails/welcome.blade.php
routes/web.php
```

## Instalación

1. Cloná el repositorio:
```bash
git clone https://github.com/AlexanderB97/laravel-brevo-registro.git
cd laravel-brevo-registro
```

2. Instalá las dependencias:
```bash
composer install
```

3. Copiá el archivo de entorno de ejemplo:
```bash
copy .env.example .env
```

4. Generá la clave de aplicación:
```bash
php artisan key:generate
```

5. Completá en tu `.env` las credenciales de tu cuenta de Brevo:
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp-relay.brevo.com
MAIL_PORT=587
MAIL_USERNAME=tu_login_smtp_de_brevo
MAIL_PASSWORD=tu_smtp_key_de_64_caracteres
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=tu_remitente_verificado@ejemplo.com
MAIL_FROM_NAME="${APP_NAME}"
```

6. Ejecutá las migraciones:
```bash
php artisan migrate
```

## Ejecución

Se necesitan dos terminales abiertas simultáneamente:

**Terminal 1 — Servidor de la aplicación:**
```bash
php artisan serve
```

**Terminal 2 — Procesador de colas:**
```bash
php artisan queue:work
```

Luego, accedé desde el navegador a:
```
http://127.0.0.1:8000/register
```

## Flujo de prueba

1. Enviar el formulario vacío para verificar que se muestren los errores de validación.
2. Completar con un nombre corto o una contraseña débil para verificar los mensajes específicos.
3. Completar con datos válidos y un correo real: el usuario se guarda en la base de datos y el Job de envío se encola.
4. En la terminal de `queue:work`, se debe ver el estado `DONE` una vez procesado el envío.
5. Verificar la recepción del correo de bienvenida en la bandeja de entrada (o spam) del correo registrado.

## Manejo de errores en las colas

```bash
php artisan queue:failed        # Lista los trabajos fallidos
php artisan queue:retry {id}    # Reintenta un trabajo puntual
php artisan queue:retry all     # Reintenta todos los trabajos fallidos
```

## Autor

Alexander Benítez — Tecnicatura Universitaria en Programación, UTN