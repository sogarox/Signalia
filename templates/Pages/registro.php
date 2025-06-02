<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dona y Recibe</title>
  <link href="img/logo_donaciones.png" rel="icon">
  <link rel="stylesheet" href="./css/styles.css">
  <style>
     .registro {
  text-align: center;
  padding: 32px;
}

.registro h1 {
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
  padding: 24px;
  border-radius: 20px;
  width: 280px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
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
  background-color: #40baaa;
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
  border: 1px solid #ccc;
  font-size: 16px;
  width: 100%;
}

.card label {
  font-weight: bold;
  font-size: 15px;
  text-align: left;
  width: 100%;
  color: #333;
}

@media (max-width: 700px) {
  .cards-container {
    flex-direction: column;
    align-items: center;
  }
}

  </style>
</head>
<body>

  <!-- Barra de navegación -->
  <div class="navbar">
    <div>
    <img src="img/logo_signalia.png" alt="Logo Signalia" style="height: 40px;">
    </div>
    <div>
      <a href="/Signalia/pages/home">Inicio</a>
      <a href="/Signalia/pages/about">Sobre nosotros</a>
      <a href="/Signalia/pages/login">Iniciar sesión</a>
    </div>
  </div>

  <section class="registro">
  <h1>Registro de Usuario</h1>

  <div class="cards-container">
    <div class="card">
      <form action="tu_script_php.php" method="POST">
  <label for="nombres">Nombres:</label>
  <input type="text" id="nombres" name="nombres" required><br>

  <label for="apellidos">Apellidos:</label>
  <input type="text" id="apellidos" name="apellidos" required><br>

  <label for="correo">Correo:</label>
  <input type="email" id="correo" name="correo" required><br>

  <label for="telefono">Teléfono:</label>
  <input type="text" id="telefono" name="telefono"><br>

  <label for="usuario">Usuario:</label>
  <input type="text" id="usuario" name="usuario" required><br>

  <label for="contrasena">Contraseña:</label>
  <input type="password" id="contrasena" name="contrasena" required><br>

  <label for="rol">Rol:</label>
  <select id="rol" name="rol" required>
    <option value="Estudiante">Estudiante</option>
    <option value="Educador">Educador</option>
    <option value="Moderador">Moderador</option>
  </select><br>

  <button type="submit" class="info">Registrar Usuario</button>
</form>

      <!-- Aquí se mostrará el mensaje -->
      <div id="mensajeRegistro" style="margin-top: 16px; color: #9d5da3; font-weight: bold;"></div>
    </div>
  </div>
</section>

<script>
  const form = document.getElementById('formRegistroUsuario');
  const mensaje = document.getElementById('mensajeRegistro');

  form.addEventListener('submit', function(event) {
    event.preventDefault(); // evita recargar la página

    const formData = new FormData(form);

    fetch('registro.php', {
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


</body>
</html>