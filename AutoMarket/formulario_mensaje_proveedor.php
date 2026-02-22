<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensaje al Proveedor</title>
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .section-title h2 {
            font-size: 24px;
            font-weight: 700;
            text-transform: uppercase;
            margin-bottom: 20px;
            color: #ff4500;
            position: relative;
        }

        .section-title p {
            font-size: 16px;
            color: #777;
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: 600;
            color: #333;
        }

        .btn-custom {
            background-color: #28a745;
            color: #fff;
            font-weight: 600;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s, box-shadow 0.3s;
        }

        .btn-custom:hover {
            background-color: #218838;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
            font-weight: 600;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s, box-shadow 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="section-title">
            <h2>Enviar Mensaje al Proveedor</h2>
        </div>

        <form id="contactForm" method="post">
            <div class="mb-3">
                <label for="nombre_cliente" class="form-label">Nombre Completo</label>
                <input type="text" class="form-control" id="nombre_cliente" name="nombre_cliente" required>
            </div>
            <div class="mb-3">
                <label for="correo_cliente" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="correo_cliente" name="correo_cliente" required>
            </div>
            <div class="mb-3">
                <label for="telefono_cliente" class="form-label">Teléfono</label>
                <input type="text" class="form-control" id="telefono_cliente" name="telefono_cliente" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" maxlength="12" placeholder="- - -" required>
                <div class="invalid-feedback">
                    Por favor, ingresa un número de teléfono válido en el formato xxx-xxx-xxxx.
                </div>
            </div>
            <div class="mb-3">
                <label for="mensaje" class="form-label">Mensaje</label>
                <textarea class="form-control" id="mensaje" name="mensaje" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-custom">Enviar Mensaje</button>
            <button type="button" class="btn btn-primary" onclick="window.history.back();">Volver</button> <!-- Botón para volver atrás -->
        </form>
    </div>

    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);

            fetch('enviar_mensaje_proveedor.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Éxito',
                        text: data.message,
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: data.message,
                    });
                }
            })
            .catch(error => {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Ocurrió un error al enviar el mensaje. Por favor, inténtalo de nuevo.',
                });
            });
        });

        // Script para formatear el campo de teléfono
        const telefonoInput = document.getElementById('telefono_cliente');
        telefonoInput.addEventListener('input', function(e) {
            let formattedPhoneNumber = this.value.replace(/\D/g, '').slice(0, 10).replace(/(\d{3})(\d{3})(\d{4})/, '$1-$2-$3');
            this.value = formattedPhoneNumber;
        });
    </script>
</body>

</html>
