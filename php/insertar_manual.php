<!DOCTYPE HTML>

<html>
	<head>
		<title>Entrada Empleado</title>
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
						<h1><a href="./ingreso_manual.php" class="special after">Regresar</a></h1>
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
								<li>
                                    <a href="./ingreso.php"> Entrada/Salida </a>
                            </li>
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

$CodigoE=$_POST["CodigoE"]; // instruccion para obtener parametros que se llenaron desde el formulario
$tipo = $_POST["demo-priority"];
$fecha = $_POST["Fecha"];
$hora = $_POST["Hora"];


$dbconn = pg_connect("host=localhost dbname=ProyectoCCV user=postgres password=12345")
	or die('No se ha podido conectar: ' . pg_last_error());


  $queryy = "SELECT * FROM Empleado WHERE (CodigoE = $CodigoE)";
  $resultin = pg_query($queryy);

  if(!(pg_num_rows($resultin) > 0)){
?>   <p> El empleado con código <?php echo $CodigoE ?> No existe</p>
<?php 
  }else {


	if($tipo == "1"){
		$query5 = "SELECT * FROM Registro WHERE (Fecha = '$fecha') AND (TipoMarca = 'E') AND (CodigoE = $CodigoE) AND (Hora is not null)";
		$r5 = pg_query($query5);

		$query7 = "SELECT * FROM Registro WHERE (Fecha = '$fecha') AND (TipoMarca = 'S') AND (CodigoE = $CodigoE) ";
		$r7 = pg_query($query7);
          
		
		  if(pg_num_rows($r5) > 0){
			  echo "<p>Ya marcó entrada el dia de hoy</p>";

		  } else if(pg_num_rows($r7)>0 ){
			echo "<p>Marcó salida el dia de hoy no puede marcar entrada</p>";
		  
		  }else {	


    $query2 = "INSERT INTO Registro VALUES($CodigoE,'$fecha','E','$hora')";
    $reul = pg_query($query2);
   
    $query3 = "SELECT NombreE FROM Empleado WHERE CodigoE = $CodigoE";
    $r = pg_query($query3);
   
    $line = pg_fetch_assoc($r);
                                                    
    $NombreE = $line['nombree'];
   
        ?>
        <p>¡Bienvenido/a <?php echo $NombreE ?>  tenga un buen dia! </p>
        <?php
        pg_free_result($r);
        pg_free_result($reul);
       
// Cerrando la conexión
pg_close($dbconn);
		  }
		}else if($tipo == "2"){
			$query6 = "SELECT * FROM Registro WHERE (Fecha = '$fecha') AND (TipoMarca = 'S') AND (CodigoE = $CodigoE)";
			$r6 = pg_query($query6);
			$queryn = "SELECT * FROM Registro WHERE (Fecha = '$fecha') AND (TipoMarca = 'E') AND (CodigoE = $CodigoE)";
			$rr7 = pg_query($queryn);
			  if(pg_num_rows($r6) > 0){
				  echo "<p>Ya marcó salida el dia de hoy</p>";
			  }else if(!(pg_num_rows($rr7) > 0) ){
				$quer = "INSERT INTO Registro VALUES($CodigoE,'$fecha','E',NULL)";
				$rrw = pg_query($quer);
				$query2 = "INSERT INTO Registro VALUES($CodigoE,'$fecha','S','$hora')";
		$reul = pg_query($query2);
	   
		$query3 = "SELECT NombreE FROM Empleado WHERE CodigoE = $CodigoE";
		$r = pg_query($query3);
		$line = pg_fetch_assoc($r);
														
		$NombreE = $line['nombree'];
	   
			?>
			<p>Vuelva pronto <?php echo $NombreE ?>  que tenga un buen día</p>
<?php	


			  }else {	
	
		$query2 = "INSERT INTO Registro VALUES($CodigoE,'$fecha','S','$hora')";
		$reul = pg_query($query2);
	   
		$query3 = "SELECT NombreE FROM Empleado WHERE CodigoE = $CodigoE";
		$r = pg_query($query3);
		$line = pg_fetch_assoc($r);
														
		$NombreE = $line['nombree'];
	   
			?>
			<p>Vuelva pronto <?php echo $NombreE ?>  que tenga un buen día</p>
			<?php
			pg_free_result($r);
			pg_free_result($reul);
		   
	pg_query("CLUSTER Registro USING indiceRegistros");

	// Cerrando la conexión
	pg_close($dbconn);





		}
	}
}
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
            <script src="../js/script_in.js"></script>

	</body>
</html>