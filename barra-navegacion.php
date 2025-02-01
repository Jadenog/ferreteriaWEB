<?php
  $current_page = basename($_SERVER['PHP_SELF']);//pagina en la que estoy
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
      <img src="png-tornillo.png" width="75px" height="75px">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link <?= ($current_page == 'index.php') ? 'active' : '' ?>" href="index.php">Inicio</a>
        <a class="nav-link <?= ($current_page == 'nosotros.php') ? 'active' : '' ?>" href="nosotros.php">Sobre nosotros</a>
        <a class="nav-link <?= ($current_page == 'login.php') ? 'active' : '' ?>" href="login.php">Iniciar sesión</a>
      </div>
    </div>
  </div>
</nav>
