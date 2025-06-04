<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Signalia</title>
  <link href="/Signalia/img/logo_signalia.png" rel="icon">
  <link rel="stylesheet" href="./css/styles.css">
  <?= $this->Html->css('about') ?>
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
      <a href="/Signalia/pages/login">Iniciar sesión</a>
      <a href="/Signalia/usuarios/add">Registro</a>
    </div>
  </div>


<!-- Sección Principal: Inclusión -->
<section class="section inclusion-section">
  <div class="divider"></div>
  <h1>Construyendo un mundo más inclusivo</h1>
  <p>
    En Signalia creemos que la inclusión no es un extra, es una necesidad. Nuestra plataforma gratuita abre las puertas a la lengua de señas, el Braille y estrategias para una comunicación respetuosa con personas con discapacidad cognitiva. Aprender aquí no solo te forma, te transforma. Cada curso es un paso hacia una sociedad más empática, justa y consciente.
  </p>
</section>

<!-- Sección: ¿Quiénes somos? -->
<section class="quienes-somos">
  <div class="qs-container">
    <img src="/SIgnalia/img/logo_signalia.png" alt="Logo Signalia" class="qs-img">
    <div class="qs-texto">
      <div class="divider"></div>
      <h2>¿Quiénes somos?</h2>
      <p>
        En Signalia trabajamos por una sociedad donde la comunicación no tenga barreras. Somos una plataforma educativa gratuita que te invita a aprender lengua de señas, Braille y estrategias inclusivas para convivir con respeto y empatía. Nos mueve la convicción de que todos y todas podemos ser agentes de cambio hacia un mundo más accesible y humano.
      </p>
    </div>
  </div>
</section>

<!-- Sección Misión y Visión -->
<section class="mision-vision-section">
  <div class="mv-container">
    <div class="mv-img">
      <img src="/Signalia/img/inclusion.jpg" alt="Lenguaje de señas" />
    </div>
    <div class="mv-text">
      <div class="mv-block">
        <h3>Misión</h3>
        <p>
          Promover la inclusión y el respeto a través de una plataforma accesible y gratuita que
          ofrece formación en lengua de señas, Braille y estrategias de comunicación con personas con discapacidad cognitiva.
          Nuestro objetivo es empoderar a la sociedad para construir entornos más empáticos y equitativos.
        </p>
      </div>
      <div class="mv-block">
        <h3>Visión</h3>
        <p>
          Ser un referente nacional en educación inclusiva, creando espacios donde todas las personas
          puedan aprender, enseñar y comunicarse sin barreras. Aspiramos a transformar la manera en que
          interactuamos con la diversidad, promoviendo una cultura de respeto, accesibilidad y empatía.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- Sección Conoce Nuestro Equipo -->
<section class="equipo-section">
  <h2>Conoce nuestro equipo</h2>
  <div class="team-container">
    <div class="team-member">
      <img src="img/equipo1.jpg" alt="Samuel Barrios">
      <div class="name">Samuel Barrios</div>
      <div class="role">Coordinadora General</div>
    </div>
    <div class="team-member">
      <img src="img/equipo2.jpg" alt="Geraldine Tafur">
      <div class="name">Geraldine Tafur</div>
      <div class="role">Diseño Inclusivo</div>
    </div>
    <div class="team-member">
      <img src="img/equipo3.jpg" alt="Carlos Urueña">
      <div class="name">Carlos Urueña</div>
      <div class="role">Formadora en LSC</div>
    </div>
    <div class="team-member">
      <img src="img/equipo4.jpg" alt="Johana Ariza">
      <div class="name">Johana Ariza</div>
      <div class="role">Pedagoga Especial</div>
    </div>
    <div class="team-member">
      <img src="img/equipo5.jpg" alt="Ricardo Gutiérrez">
      <div class="name">Ricardo Gutiérrez</div>
      <div class="role">Desarrollador Web</div>
    </div>
  </div>
</section>

<section class="cursos">
  <h1>¿Qué ofrecemos?</h1>
  <div class="cursos-container">
    <div class="curso-card">
      <h2>Lengua de Señas Colombiana</h2>
      <p>Curso básico y avanzado para comunicarte efectivamente con la comunidad sorda.</p>
    </div>
    <div class="curso-card">
      <h2>Introducción al Braille</h2>
      <p>Aprende los fundamentos del sistema Braille para fomentar la inclusión visual.</p>
    </div>
    <div class="curso-card">
      <h2>Estrategias Inclusivas</h2>
      <p>Herramientas prácticas para educadores que promueven entornos accesibles.</p>
    </div>
    <div class="curso-card">
      <h2>Interacción Inclusiva</h2>
      <p>Buenas prácticas para relacionarte con personas con diversas discapacidades.</p>
    </div>
    <div class="curso-card">
      <h2>Entornos Accesibles</h2>
      <p>Formación especializada para mejorar la accesibilidad en instituciones.</p>
    </div>
  </div>
</section>




  <!-- Call to Action -->
<section class="cta-signalia">
  <div class="cta-content">
    <h2>¿Listo para unirte?</h2>
    <p>Conéctate con nosotros y forma parte de una comunidad que trabaja por una sociedad más accesible, inclusiva y consciente.</p>
    <a href="/Signalia/usuarios/add" class="cta-button">¡Registrate!</a>
  </div>
</section>


</body>

<footer class="footer">
  <div class="footer-content">
    <nav class="footer-nav">
      <a href="index.html">Inicio</a>
      <a href="about.html">Sobre nosotros</a>
      <a href="#">Iniciar sesión</a>
      <a href="/Signalia/usuarios/add">Registro</a>
    </nav>
    <p class="copyright">Copyright © 2025</p>
  </div>
</footer>

</html>
