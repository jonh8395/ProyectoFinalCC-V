<!DOCTYPE HTML>

<html>
	<head>
		<title>Ingresar Permiso</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="../assets/css/main.css" />
		<noscript><link rel="stylesheet" href="../assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Header -->
					<header id="header">
						<h1><a href="../index.html" class="special after">Regresar</a></h1>
						<nav>
							<a href="#menu">Menu</a>
						</nav>
					</header>

				<!-- Menu -->
				<nav id="menu">
						<div class="inner">
							<h2>Menu</h2>
							<ul class="links">
								<li><a href="../index.html">Inicio</a></li>
								<li>
									<div class="dropdown">
										<button class="dropbtn">Empleados
										  <i class="fa fa-caret-down"></i>
										</button>
										<div class="dropdown-content">
										  <a href="../informacion_e.html">Informacion</a>
										  <a href="./ingreso_e.php">Ingreso</a>
										  <a href="./listar_e.php">Consultar</a>
										</div>
									  </div>	
									
								
								
								</li>
								<br>
								<br>
								<br>
								<li><div class="dropdown">
									<button class="dropbtn">Jornadas
									  <i class="fa fa-caret-down"></i>
									</button>
									<div class="dropdown-content-dos">
									  <a href="../informacion_j.html">Informacion</a>
									  <a href="./ingreso_j.php">Ingreso</a>
									  <a href="./listar_j.php">Consultar</a>
									</div>
								  </div>
								  <br><br><br>	
								</li>	
								<li><div class="dropdown2">
									<button class="dropbtn2">Departamentos
									  <i class="fa fa-caret-down"></i>
									</button>
									<div class="dropdown2-content-tres">
									  <a href="../informacion_d.html">Informacion</a>
									  <a href="./ingreso_d.php">Ingreso</a>
									  <a href="./listar_d.php">Consultar</a>
									</div>
								  </div>
								  <br><br><br>	
								</li>
								<li>
									<div class="dropdown3">
										<button class="dropbtn3">
											Permisos
											<i class="fa fa-caret-down"></i>
										</button>
										<div class="dropdown3-content-cuatro">
											<a href="./ingreso_usuario.php">Ingreso</a>
											<a href="./ingreso_usuario2.php">Consultar</a>
										</div>
									</div>
								</li>
								<br><br><br>
								<li>
									<div class="dropdown4">
										<button class="dropbtn4">
											Usuarios
											<i class="fa fa-caret-down"></i>
										</button>
										<div class="dropdown4-content-cinco">
											<a href="./ingreso_root.php">Ingreso</a>
											<a href="./ingreso_root2.php">Consultar</a>
										</div>
									</div>
								</li>
								<br><br><br>
								<li><a href="./ingreso.php">Entrada/Salida</a></li>
								<li><a href="./antereporte.php">Reporte</a></li>
								<li><a href="./ingreso_manual.php">Entrada/Salida Manual</a></li>
							</ul>
							<a href="#" class="close">Close</a>
						</div>
					</nav>


				<!-- Wrapper -->
					<section id="wrapper">
						<header>
							<div class="inner">
								<h2>Aviso</h2>
								<?php

$CodigoP=$_POST["CodigoP"]; // instruccion para obtener parametros que se llenaron desde el formulario
$Empl=$_POST["Empl"]; //estas son variables locales.
$Fecha=$_POST["fechaPerm"];
$Descripcion = $_POST["descripcion"];
$Descripcion = trim($Descripcion);
$Username = $_POST["user"];
$ClaveU = $_POST["key"];
switch ($CodigoP) {
	case "1":
		$Descripcion = "Permiso para faltar: " . $Descripcion;
		break;
	case "2":
		$Descripcion = "Permiso para entrar tarde: " . $Descripcion;
		break;
	case "3":
		$Descripcion = "Permiso para salir temprano: " . $Descripcion;
		break;
}

$dbconn = pg_connect("host=localhost dbname=ProyectoCCV user=$Username password=$ClaveU")
    or die('No se ha podido conectar: ' . pg_last_error());
    $query2 = "SELECT * FROM Permiso WHERE CodigoE=$Empl AND Fecha='$Fecha'";
    $reul = pg_query($query2);
   
    if (pg_num_rows($reul) > 0){
?>
        <p>El empleado con codigo <?php echo $Empl ?> ya tiene un permiso asignado para la fecha <?php echo $Fecha?></p>
        <?php
        pg_free_result($reul);

    }else{

        $query = "INSERT INTO Permiso Values ($CodigoP,$Empl,'$Fecha','$Descripcion')";

        $result = pg_query($query);
        ?>
        <p>¡El permiso fue insertado exitosamente! </p>
        <?php
        pg_free_result($result);
       
    }

// Cerrando la conexión
pg_close($dbconn);

$connection = pg_connect("host=localhost dbname=ProyectoCCV user=postgres password=12345");

pg_query("CLUSTER Permiso USING indicePermisos");

?>
							</div>
						</header>

						
				
					</section>

			</div>

		<!-- Scripts -->
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/jquery.scrollex.min.js"></script>
			<script src="../assets/js/browser.min.js"></script>
			<script src="../assets/js/breakpoints.min.js"></script>
			<script src="../assets/js/util.js"></script>
            <script src="../assets/js/main.js"></script>
            <script src="../js/script_p.js"></script>

	</body>
</html>