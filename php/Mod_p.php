<!DOCTYPE HTML>

<html>
	<head>
		<title>Modificar Permiso</title>
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
									  <a href="../infromacion_j.html">Informacion</a>
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

            
           $Userna = $_POST["user"];
           $ClaveU = $_POST["key"];
           $CodigoE = $_POST["Empl"];
           $CodigoP = $_POST["CodigoP"];
           $Fecha = $_POST["fechaPerm"];
           $Descripcion = $_POST["descripcion"];
           $Descripcion = trim($Descripcion);
           $codigoAntiguo = $_POST["codigoEantiguo"];
           $fechaAntigua = $_POST["fechaantigua"];

$dbconn = pg_connect("host=localhost dbname=ProyectoCCV user=$Userna password=$ClaveU")
    or die('No se ha podido conectar: ' . pg_last_error());

    $permisos = pg_query("SELECT * FROM Permiso WHERE CodigoE=$CodigoE AND Fecha='$Fecha'");

	if(pg_num_rows($permisos) == 0) {    
    $query = "UPDATE Permiso SET CodigoE=$CodigoE, CodigoP=$CodigoP, Fecha='$Fecha', Descripcion='$Descripcion' WHERE CodigoE=$codigoAntiguo AND Fecha='$fechaAntigua'";

    $result = pg_query($query);
	?>
	<p> ¡El permiso fue modificado exitosamente! </p>
	<?php
	pg_free_result($result);
	} else {
		echo "<b>No es posible modificar el permiso ya que el empleado ya tiene un permiso para la fecha especificada</b>";
	}
	pg_free_result($permisos);

	// Cerrando la conexión
	pg_close($dbconn);

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