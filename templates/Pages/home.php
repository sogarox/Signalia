<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

$this->disableAutoLayout();

$checkConnection = function (string $name) {
    $error = null;
    $connected = false;
    try {
        $connection = ConnectionManager::get($name);
        $connected = $connection->connect();
    } catch (Exception $connectionError) {
        $error = $connectionError->getMessage();
        if (method_exists($connectionError, 'getAttributes')) {
            $attributes = $connectionError->getAttributes();
            if (isset($attributes['message'])) {
                $error .= '<br />' . $attributes['message'];
            }
        }
        if ($name === 'debug_kit') {
            $error = 'Try adding your current <b>top level domain</b> to the
                <a href="https://book.cakephp.org/debugkit/4/en/index.html#configuration" target="_blank">DebugKit.safeTld</a>
            config and reload.';
            if (!in_array('sqlite', \PDO::getAvailableDrivers())) {
                $error .= '<br />You need to install the PHP extension <code>pdo_sqlite</code> so DebugKit can work properly.';
            }
        }
    }

    return compact('connected', 'error');
};

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace templates/Pages/home.php with your own version or re-enable debug mode.'
    );
endif;
$usuario = $this->getRequest()->getSession()->read('Auth.Usuario');
            $dashboardUrl = ['controller' => 'Pages', 'action' => 'home']; // Valor por defecto

            if ($usuario) {
                switch (strtolower($usuario->rol)) {
                    case 'moderador':
                        $dashboardUrl = ['controller' => 'Moderador', 'action' => 'dashboard'];
                        break;
                    case 'estudiante':
                        $dashboardUrl = ['controller' => 'Estudiante', 'action' => 'dashboard'];
                        break;
                    case 'educador':
                        $dashboardUrl = ['controller' => 'Educador', 'action' => 'dashboard'];
                        break;
                }
            }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        Signalia
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake', 'home']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
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

  <!-- Sección principal -->
  <div class="container">
    <div class="text-content">
      <h1><strong>Signalia</strong></h1>
      <p>Plataforma interactiva que ofrece cursos gratuitos en lengua de señas, Braille y estrategias
         para una interacción respetuosa con personas con discapacidad cognitiva.</p>
      <button onclick="location.href = '/Signalia/usuarios/add';">Unete Ahora</button>
    </div>
    <div class="circle-image">
      <img src="/Signalia/img/foto_signalia.jpg" alt="comunicacion">
    </div>
  </div>

</body>
</html>