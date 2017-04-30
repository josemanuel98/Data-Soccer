<?php include('inc/connection.php'); ?>
<?php include('inc/header.php'); ?>

<?php include('inc/nav.php'); ?>

<div class="d1">
                <div class="mid1"></div>
            <h1 class="t1">DATA SOCCER</h1>
            <h1 class="info1">Apoyando el talento del futbol amateur<br><br>Registrate hoy!</h1>
                <?php 
                    if(isset($_GET["status"]) && $_GET["status"] == "gracias"){
			             echo '<h1 class="t1">Todo listo Campeon</h1>';
		              }
                else{
                        echo '<h1 class="t1">Crea hoy tu perfil de jugador</h1>';
                        include('inc/formJugador.php');
                    }
                ?>
            </div>
            <div class="flex-item13"></div>
<?php include('inc/formBusqueda.php'); ?>
<?php include('inc/footer.php'); ?>