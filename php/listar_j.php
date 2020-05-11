<!DOCTYPE HTML>

<html>
	<head>
		<title>Consultar Jornada</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="../assets/css/main.css" />
        
        <noscript><link rel="stylesheet" href="../assets/css/noscript.css" /></noscript>
        <style> table, th, td{
            padding:10px;
            border: 1px solid white;
            border-collapse: collapse;
        }  </style>
	</head>
	<body class="is-preload">

		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Header -->
					<header id="header">
						<h1><a href="javascript:history.back(-1);" class="special after">Regresar</a></h1>
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
									  <a href="">Consultar</a>
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
								<h2>Consultar Jornada</h2>
								<p>Vector s.a</p>
							</div>
						</header>

						<!-- Content -->
							<div class="wrapper">
								<div class="inner">

									<section id="footer">
										<div class="inner">
											
                                        <?php
					$connection = pg_connect("host=localhost dbname=ProyectoCCV user=postgres password=12345") or die("No fue posible conectarse a la base de datos");
					$result = pg_query("SELECT * FROM Jornada ORDER BY CodigoJ") or die("No fue posible realizar la consulta");
					if(pg_num_rows($result) != 0) {
					
						echo "<br><br><br>";
						echo "<center>";
						echo "<table class='table-bordered'>";
						echo "<th><h2>Codigo</h2></th>";
						echo "<th><h2>Nombre</h2></th>";
						echo "<th><h2>Hora de Entrada</h2></th>";
						echo "<th><h2>Hora de Salida</h2></th>";
						echo "<th></th>";
						echo "<th></th>";	
						while($fila = pg_fetch_array($result)) {
							echo "<tr>";
							echo "<td>$fila[0]</td>";
							echo "<td>$fila[1]</td>";
							echo "<td>$fila[2]</td>";
							echo "<td>$fila[3]</td>";
							$result2 = pg_query("SELECT * FROM Empleado WHERE CodigoJ=$fila[0]") or die("Ocurrio un error durante la consulta");
							if(pg_num_rows($result2) != 0) {
								echo "<td>No es posible eliminar la jornada</td>";
							} else {
								?>
								<td><a href="eliminar_j.php?CodigoJ=<?php echo "$fila[0]";?>&NombreJ=<?php echo "$fila[1]";?>"><center><img src="../images/trash.gif" style='width:3pc;height:3pc' onclick="return confirm('¿Esta seguro de eliminar la jornada?')"></center></a></td>
								<?php
							}
							echo "<td><a href=modificar_j.php?CodigoJ=$fila[0]&NombreJ=$fila[1]&HoraE=$fila[2]&HoraS=$fila[3]><center><img src='../images/mod.gif' style='width:3pc;height:3pc'></center></td>";
							echo "</tr>";
						}
						pg_free_result($result2);
						echo "</table>";
					} else {
						echo "<h1>No existen jornadas a mostrar</h1>";
					}
					pg_free_result($result);
					pg_close($connection);
					echo "<br><br>";
				?>



								</div>
							</div>

					</section>

				<!-- Footer -->
					
						

			</div>

		<!-- Scripts -->
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/jquery.scrollex.min.js"></script>
			<script src="../assets/js/browser.min.js"></script>
			<script src="../assets/js/breakpoints.min.js"></script>
			<script src="../assets/js/util.js"></script>
            <script src="../assets/js/main.js"></script>
            <script src="../js/script_j.js"></script>
            <script src="../bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script> 

	</body>
</html>