<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usuario $usuario
 */
?>
<div class="navbar">
    <div>
    <img src="/Signalia/img/logo_signalia.png" alt="Logo Signalia" style="height: 40px;">
    </div>
    <div>
      <a href="/Signalia/pages/home">Inicio</a>
      <a href="/Signalia/pages/about">Sobre nosotros</a>
      <a href="/Signalia/usuarios/index">Iniciar sesión</a>
      <a href="/Signalia/usuarios/add">Registro</a>
    </div>
  </div>
<div class="registro">
    <h1>Registro de usuario</h1>
    <div class="cards-container">
        <div class="card">
            <?= $this->Form->create($usuario) ?>
            <fieldset>
                <?php
                    echo $this->Form->control('nombres', ['label' => 'Nombres', 'class' => 'input']);
                    echo $this->Form->control('apellidos', ['label' => 'Apellidos', 'class' => 'input']);
                    echo $this->Form->control('correo', ['label' => 'Correo', 'class' => 'input']);
                    echo $this->Form->control('telefono', ['label' => 'Teléfono', 'class' => 'input']);
                    echo $this->Form->control('usuario', ['label' => 'Usuario', 'class' => 'input']);
                    echo $this->Form->control('contrasena', ['label' => 'Contraseña', 'type' => 'password', 'class' => 'input']);
                    echo $this->Form->control('rol', [
                        'label' => 'Rol',
                        'class' => 'input',
                        'style' => 'width: 270px;', // Cambia el valor según el ancho deseado
                        'options' => ['moderador' => 'Moderador', 'estudiante' => 'Estudiante', 'educador' => 'Educador'],
                        'empty' => 'Seleccione un rol'
                    ]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Registrar'), ['class' => 'tipo']) ?>
            <?= $this->Html->link('Volver', ['controller' => 'Pages', 'action' => 'home'], ['class' => 'tipo', 'style' => 'margin-left:10px;']) ?>
            <?= $this->Form->end() ?>
        </div>
        <script>
  const form = document.getElementById('formRegistroUsuario');
  const mensaje = document.getElementById('mensajeRegistro');

  form.addEventListener('submit', function(event) {
    event.preventDefault(); // evita recargar la página

    const formData = new FormData(form);

    fetch('add.php', {
      method: 'POST',
      body: formData
    })
    .then(response => response.text())
    .then(data => {
      // Limpia el formulario
      form.reset();

      // Muestra el mensaje con opción para iniciar sesión
      mensaje.innerHTML = `
        ¡Usuario registrado correctamente!<br>
        <a href="login.html">¿Quieres iniciar sesión?</a>
      `;
    })
    .catch(error => {
      mensaje.style.color = 'red';
      mensaje.textContent = 'Error al registrar usuario. Intenta de nuevo.';
    });
  });
</script>
    </div>
</div>