<?php
  $pagina_actual = basename($_SERVER['PHP_SELF']);
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="../index.php"><img src="../png-tornillo.png" width="75px" height="75px"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link <?=($pagina_actual =='../index.php') ? 'active' : '' ?>"  href="../index.php">Inicio</a>
        <a class="nav-link <?=($pagina_actual =='inventario.php' || $pagina_actual == 'editar_producto.php') ? 'active' : '' ?>" href="inventario.php">productos</a>
        <a class="nav-link <?=($pagina_actual =='gestion-inventario.php') ? 'active' : '' ?>" href="gestion-inventario.php">añadir producto</a>
        <a class="nav-link <?=($pagina_actual =='noticias.php' || $pagina_actual == 'editar.php' || $pagina_actual == 'gestionar-noticias.php') ? 'active' : '' ?>" href="noticias.php">Noticias</a>
        <!-- <a class="nav-link disabled" aria-disabled="true">Disabled</a> -->
      </div>
    </div>
  </div>
</nav>