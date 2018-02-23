<?php
session_start();


if (isset($_SESSION["entrada"])) {

    if (!isset($_SESSION["votado"])) {
        $_SESSION["votado"] = 1;
        $bici = $_GET["bici"];
        $mysqli = new mysqli("localhost", 'bicis', 'bicis', 'bicis');
        $query = "update bicis.bicis set votos=votos+1
            WHERE modelo='$bici'";
        $res=$mysqli->query($query);
        if ($mysqli->error){
            header("location:index.php?error1");/*error de consulta*/
        }
        elseif ($mysqli->affected_rows==1){
            header("location:index.php?correcto");/*votacion correcta*/
        }
        else header("location:index.php?error2");/*esa bici no existe*/
    }
    else header("location:index.php?error3");/*ya has votado*/
} else header("location:index.php?error4");/*no has entrado por el index.php*/

?>