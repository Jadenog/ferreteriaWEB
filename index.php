<?php
include "conexion.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>el tornillo </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css"></link>
    </title>
</head>
    <body>
        <?php
            include "barra-navegacion.php"
        ?>
    <div id="margen">  
        <h1> Noticias</h1> 

                <div id="carouselExampleCaptions" class="carousel slide">
                    <div class="carousel-inner">
                <?php
                    // Consulta para contar los registros en la tabla "noticias"

                    $query="SELECT * FROM noticas";
                    $resultado=mysqli_query($conn,$query);

                    $cont = 0;
                    while ($noticias= mysqli_fetch_array($resultado)) { 

                        if($cont == 0){
                            $cont++;
                            ?>
                            <div class="carousel-item active">
                                <img src="<?php echo $noticias['imagen'];?>" height="300px" class="d-block w-100"  alt="imagen">
                                <div class="carousel-caption d-none d-md-block">
                                    <h2><?php echo $noticias['titular'];?></h2>
                                </div>
                             </div>
                        <?php
                        }else{
                            ?>
                            <div class="carousel-item">
                                <img src="<?php echo $noticias['imagen'];?>" height="300px" class="d-block w-100" alt="noticia">
                                <div class="carousel-caption d-none d-md-block">
                                    <h2><?php echo $noticias['titular'];?></h2>
                                </div>
                            </div>
                            <?php
                        }

                    }
                        ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            </div>
        </div>
    </body>
</html>