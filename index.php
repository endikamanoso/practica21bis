<?php
session_start();
$_SESSION["entrada"]=1;

?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/mio.css">
</head>
<body>
<header class="bg-dark">
    <h1 class="bg-dark text-center text-white">Listado de bicicletas</h1>
    <link rel="stylesheet" href="css/mio.css">
</header>
<div id="bicis">
    <div class="container-fluid">
        <div class="row justify-content-center">

            <?php

            $mysql=new mysqli("localhost",'bicis','bicis','bicis');
            $query="select b.id_bici,b.id_marca,b.modelo,b.imagen,b.precio,votos,b.precio,b.id_tipo,b.url,b.imagen,m.nombre,t.tipo
from bicis.bicis b
  JOIN bicis.marcas m USING (id_marca)
  JOIN bicis.tipos_bici t USING (id_tipo)";

            $resultado=$mysql->query($query);

            if ($resultado){
                while ($fila=$resultado->fetch_assoc()){
                    $id_bici=$fila["id_bici"];
                    $id_marca=$fila["id_marca"];
                    $modelo=$fila["modelo"];
                    $votos=$fila["votos"];
                    $imagen=$fila["imagen"];
                    $precio=$fila["precio"];
                    $precio=$fila["precio"];
                    $id_tipo=$fila["id_tipo"];
                    $url=$fila["url"];
                    $nombre=$fila["nombre"];
                    $tipo=$fila["tipo"];



                    echo '<div class="col-12 col-md-6 col-lg-4 ficha text-center" id="'.$nombre.'">
                <h2 class="text-center">'.$modelo.'</h2>
                <img src="img/'.$imagen.'" alt="'.$modelo.'" class="img-fluid rounded-circle">
                <p><a href="'.$url.'" target="_blank">Enlace del fabricante</a> </p>
                <div class="detalle bg-dark text-white">
                    <p><strong>Marca: </strong>'.$nombre.'</p>
                    <p><strong>Tipo: </strong>'.$tipo.'</p>
                    <p><strong>Precio</strong> '.
                    $precio.'&euro;</p>
                    <p><a href="#" data-id="'.$nombre.'" class="btn btn-primary">Votar</a></p>
                </div>
            </div>';

                }
            }


            ?>


            

        </div>
    </div>
</div>

<div id="contenedorFormulario" class="bg-info">
    <h2 class="text-warning text-center">Vota tu bici favorita</h2>
    <form id="formulario" action="votar.php">
        <div class="form-group">
            <label for="bici" class="text-white">Bicicleta elegida</label>
            <input type="text" id="bici" name="bici" readonly class="form-control">
            <p></p>
            <button type="submit" class="btn btn-block btn-warning">Enviar</button>
            <?php
                if (isset($_GET["error1"])){
                    echo "<p>Error en la consulta</p>";
                }
            if (isset($_GET["error2"])){
                echo "<p>Esa bici no existe</p>";
            }
            if (isset($_GET["error3"])){
                echo "<p>Ya has votado</p>";
            }
            if (isset($_GET["error4"])){
                echo "<p>No has entrado por aquí</p>";
            }

            ?>
        </div>

    </form>
</div>

<div id="imagenGrande">
    <div class="container-fluid">
        <div class="row text-center">
            <div class="col-12" id="fotoBiciGrande">

            </div>
        </div>
    </div>
</div>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/mio.js"></script>


</body>
</html>