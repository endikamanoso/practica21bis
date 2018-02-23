<?php

/*session_start();
if (isset($_SESSION["entrada"])){*/
    $mysqli=new mysqli('localhost','bicis','bicis','bicis');
    $query="select modelo,votos
                  from bicis.bicis
                  ORDER BY votos DESC";
    $res=$mysqli->query($query);
    if ($mysqli->error){
        echo "\"bicis\":[";
    }
    else{


        while ($fila=$res->fetch_assoc()){
            $modelo=$fila["modelo"];
            $votos=$fila["votos"];
            echo "{";
            echo "\"modelo\":$modelo,";
            echo "\"votos\":\"$votos\"";
            echo "}";
            if ($fila) echo ",";
            else echo "";
        }
        echo "],";
        $res->close();//cierro la conexión -.--


    /*}


*/}/*
else header("location:index.php?pasa_por_index")
*/
?>

