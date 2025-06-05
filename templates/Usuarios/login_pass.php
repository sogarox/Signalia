<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Signalia</title>
    <link href="img/logo_signalia.png" rel="icon">
    <link rel="stylesheet" href="./css/styles.css">
    <style>
        .login-container {
            text-align: center;
            padding: 32px;
        }

        .login-container h2 {
            font-size: 40px;
            color: white;
            margin-bottom: 32px;
        }

        .cards-container {
            display: flex;
            justify-content: center;
            gap: 32px;
            flex-wrap: wrap;
        }

        .card {
            background-color: white;
            padding: 42px;
            padding-top: 42px;
            padding-right: 60px;
            padding-bottom: 42px;
            padding-left: 42px;
            border-radius: 20px;
            width: 280px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .card img {
            width: 150px;
            margin-bottom: 16px;
        }

        .card .tipo {
            background-color: #40baaa;
            color: white;
            border: none;
            padding: 11px 19px;
            font-size: 16px;
            border-radius: 999px;
            margin: 8px 0;
            cursor: pointer;
        }

        .card .info {
            background-color: #63115c;
            color: white;
            border: none;
            padding: 6px 16px;
            font-size: 14px;
            border-radius: 999px;
            cursor: pointer;
        }

        .card form {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .card input,
        .card select {
            padding: 8px;
            border-radius: 10px;
            border: 1px solid #d1d1d1;
            font-size: 16px;
            width: 100%;
        }

        .card button{

        }

        @media (max-width: 700px) {
            .cards-container {
                flex-direction: column;
                align-items: center;
            }
    </style>
</head>

<body>

    <!-- Barra de navegación -->
    <div class="navbar">
        <div>
            <img src="/Signalia/img/logo_signalia.png" alt="Logo Signalia" style="height: 40px;">
        </div>
        <div>
            <a href="/Signalia/pages/home">Inicio</a>
            <a href="/Signalia/pages/about">Sobre nosotros</a>
            <a href="/Signalia/usuarios/loginPass">Iniciar sesión</a>
            <a href="/Signalia/usuarios/add">Registro</a>
        </div>
    </div>

    <div class="login-container">
        <h2>Iniciar sesión</h2>
        <div class="cards-container">
            <div class="card">
                <!-- Formulario de inicio de sesión con CakePHP -->
                <?= $this->Form->create(null,) ?>

                <?= $this->Form->control('usuario', [
                    'label' => false,
                    'placeholder' => 'Nombre de usuario',
                    'required' => true,
                ]) ?>

                <?= $this->Form->control('contrasena', [
                    'label' => false,
                    'type' => 'password',
                    'placeholder' => 'Contraseña',
                    'required' => true,
                ]) ?>

                <?= $this->Form->button(__('Registrar'), ['class' => 'tipo']) ?>

                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>

    <div><?= $this->Flash->render() ?></div>


</body>

</html>