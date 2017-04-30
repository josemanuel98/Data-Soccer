<?php 
    if($_SERVER["REQUEST_METHOD"]=="POST"){

        /*$ciudad=trim($_POST["Ciudad"]);
        $peso=trim($_POST["Peso"]);
        $altura=trim($_POST["Altura"]);
        $estado=trim($_POST["Estado"]);
        $edad=trim($_POST["Edad"]);*/
    
    $server = "localhost";
    $user = "jmml98";
    $password = "Eco41910894";
    $db = "PlayerNetwork";
    
    $connect = mysql_connect($server, $user, $password) or die("error");
    
    mysql_select_db($db, $connect) or die("error");
    
    $sql = "SELECT * FROM Jugador;";
    mysql_query($sql);
        
        $nombre = 'Nombre';
        $apellidos = 'Apellidos'
        $ciudad = 'Ciudad';
        $peso = 'Peso';
        $altura = 'Altura';
        $email = 'Email';
        $estado = 'Estado';
        while($rows = mysql_fetch_assoc($sql)){
          echo "<br>";
          echo $rows[$nombre] . " " . $rows[$apellidos] . " " . $rows[$ciudad] . " " . $rows[$peso] . " " . $rows[$altura] . " " . $rows[$estado] . $rows[$edad];
      }
    }
?>