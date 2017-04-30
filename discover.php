<?php 
    $server = "localhost";
    $user = "jmml98";
    $password = "Eco41910894";
    $db = "PlayerNetwork";
    
    $connect = mysql_connect($server, $user, $password) or die("error");
    
    $result = mysql_select_db($db, $connect) or die("error");

    $sql = "SELECT * FROM Jugador;";
    $res = mysql_query($sql);

if (!$res) {
        die('Invalid query: ' . mysql_error());
    } else  {
        $nombre = 'Nombre';
        $apellidos = 'Apellidos';
        $ciudad = 'Ciudad';
        $peso = 'Peso';
        $altura = 'Altura';
        $email = 'Email';
        $estado = 'Estado';
        $fechaNac = 'FechaNacimiento';
        

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "Name: " . $row["$nombre"];
    }
} else {
    echo "0 results";
}
    }
    mysql_close();
	exit;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Raleway:300|Josefin+Sans" rel="stylesheet">
        <title>Home</title>
</head>
<body class="body">
    <nav class="nav1">
        <ul class="ult">
        <li class="list"><a href="index.php">Jugador</a></li>
        <li class="list"><a href="club_create.php">Club</a></li>
        <li class="list"><a href="discover.php">Descubrir</a></li>
        </ul>
    </nav>
    <div class="d3">
                <div class="mid1"></div>
            <h1 class="t1">DATA SOCCER</h1>
            <h1 class="info1">Descubre a las proximas estrellas del futbol</h1>
            <div class="flex-container">
                <div class="flex-item13"></div>
            <div class="formz flex-item1">
                <?php include('inc/catalogoEstado.php'); ?>
            <form action="discover.php" method="post">
        <legend class="fields">Criterios de busqueda</legend><br>
        <label for="Estado: " class="fields">Estado: </label>
        <select name="Estado" id="Estado" class="fields"><br>
            <?php 
                foreach($Estado as $i){ 
                echo "<option value=" . $i . ">" . $i . "</option>";
                }
            ?>
            </select>
        <br><label for="Ciudad" class="fields">Ciudad: </label><br>
        <input type="text" name="Ciudad" id="Ciudad" class="in"><br>
        <label for="Peso" class="fields">Peso: </label><br>
        <input type="number" name="Peso" id="Peso" class="in"><br>
        <label for="Altura" class="fields">Altura: </label><br>
        <input type="number" name="Altura" id="Altura" class="in"><br>
        <label for="Edad" class="fields ">Edad: </label><br>
        <input type="number" name="Edad" id="Edad" class="in"><br>
        <input type="submit" value="Enviar" class="fields1">
</form>
                </div>
        </div>
        <footer class="ft">
            <div class="flex-container">
                <div class="ftq">
                <h3 class="fotlet">2017</h3>
                </div>
                
                <div class="ftq2">
                <h3 class="fotlet">Leon, Guanajuato</h3>
                </div>    
            </div>
    </footer>
    </div>
    </body>
</html>