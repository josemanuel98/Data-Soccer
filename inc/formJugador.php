<?php include('inc/catalogoEstado.php');

$message = "LLene todos los campos";

if($_SERVER["REQUEST_METHOD"]=="POST"){

$nombre=trim($_POST["Nombre"]);
$paterno=trim($_POST["Paterno"]);
$materno=trim($_POST["Materno"]);
$diaNacimiento=trim($_POST["DiaNacimiento"]);
$mesNacimiento=trim($_POST["MesNacimiento"]);
$añoNacimiento=trim($_POST["AñoNacimiento"]);
$ciudad=trim($_POST["Ciudad"]);
$peso=trim($_POST["Peso"]);
$altura=trim($_POST["Altura"]);
$email=trim($_POST["Email"]);
$estado=trim($_POST["Estado"]);


	if(
        $nombre == "" OR $paterno == "" OR $materno == "" OR $diaNacimiento == "" OR $mesNacimiento == "" OR $añoNacimiento == ""
        OR $ciudad == "" OR $peso == "" OR $altura == "" OR $estado == ""
        ){
            header("Location: ../index.php");
		    exit;
	   }

	if ($_POST["ghost"] != "") {
			echo "Los robots no pueden jugar soccer. Sorry";
			exit;
	}

	$fechaNacimiento=$añoNacimiento . "-" . $mesNacimiento . "-" . $diaNacimiento;
    $apellidos = $paterno . " " . $materno;
    
    $server = "localhost";
    $user = "jmml98";
    $password = "Eco41910894";
    $db = "PlayerNetwork";
    
    $connect = mysql_connect($server, $user, $password) or die("error");
    
    mysql_select_db($db, $connect) or die("error.");
    
    $sql = "INSERT INTO Jugador(Nombre, Apellidos, FechaNacimiento, Ciudad, Peso, Altura, Estado, Email) VALUES('" . $nombre . "', '" . $apellidos . "', '" . $fechaNacimiento . "', '" . $ciudad . "', " . $peso . ", " . $altura . ", '" . $estado . "', '" . $email ."');";
    $res = mysql_query($sql);
    if (!$res) {
        die('Invalid query: ' . mysql_error());
    } else  {
        header("Location: ../index.php?status=gracias");
    }
    mysql_close();
	exit;
}
?>
    <div class="flex-container">
                <div class="flex-item13"></div>
            <div class="flex-container">
                <div class="flex-item13"></div>
            <div class="formz flex-item1">
                <form action="inc/formJugador.php" method="post">
                <legend><?php echo $message; ?></legend>
                <label for="Nombre" class="fields">Nombre: </label><br>
                <input type="text" name="Nombre" id="Nombre" class="in"><br>
                <label for="Paterno" class="fields">Apellido Paterno: </label><br>
                <input type="text" name="Paterno" id="Paterno" class="in"><br>
                <label for="Materno" class="fields">Apellido Materno: </label><br>
                <input type="text" name="Materno" id="Materno" class="in"><br>
                <label for="DiaNacimiento" class="fields">Dia de Nacimiento: </label><br>
                <input type="number" name="DiaNacimiento" id="DiaNacimiento" class="in"><br>
                <label for="MesNacimiento" class="fields">Mes de Nacimiento: </label><br>
                <input type="number" name="MesNacimiento" id="MesNacimiento" class="in"><br>
                <label for="AñoNacimiento" class="fields">Año de Nacimiento: </label><br>
                <input type="number" name="AñoNacimiento" id="AñoNacimiento" class="in"><br>
                <label for="Ciudad" class="fields">Ciudad: </label><br>
                <input type="text" name="Ciudad" id="Ciudad" class="in"><br>
                    <legend class="fields">Estado:</legend>
                    <select name="Estado" id="Estado">
                    <?php 
                        foreach($Estado as $i){ 
                        echo "<option value=" . $i . ">" . $i . "</option>";
                        }
                    ?>
                    </select>
                    <br>
        <label for="Email" class="fields">Email: </label><br>
        <input type="email" name="Email" id="Email" class="in"><br>
        <label for="Altura" class="fields">Altura: </label><br>
        <input type="number" name="Altura" id="Altura" class="in"><br>
        <label for="Peso" class="fields">Peso: </label><br>
            <input type="number" name="Peso" id="Peso" class="in"><br>
            <div class="ghost">
                <input type="text" name="ghost" id="ghost">            
            </div>
        
        <input type="submit" value="Enviar" class="fields1">
                </form>
            </div>
            <div class="flex-item13"></div>
            </div>