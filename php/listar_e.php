<!DOCTYPE HTML>

<html>
	<head>
		<title>Consultar Empleado</title>
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
										  <a href="">Consultar</a>
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
								<h2>Consultar Empleado</h2>
								<p>Vector s.a</p>
							</div>
						</header>

						<!-- Content -->
							<div class="wrapper">
								<div class="inner">

									<section id="footer">
										<div class="inner">
											
											<?php


$dbconn = pg_connect("host=localhost dbname=ProyectoCCV user=postgres password=12345")
    or die('No se ha podido conectar: ' . pg_last_error());

$query1 = "SELECT * FROM Empleado";
$result2 =  pg_query($query1) or die('La consulta fallo: ' . pg_last_error());

if(!(pg_num_rows($result2)>0)){
  echo "<h1> Aviso: </h1>";
  echo "<b> No existen datos que mostrar debido a que no hay empleados.</b><br><br><br>";
  pg_free_result($result2);
  pg_close($dbconn);
}else {
  $dbconn = pg_connect("host=localhost dbname=ProyectoCCV user=postgres password=12345")
  or die('No se ha podido conectar: ' . pg_last_error());
$query = "SELECT e.CodigoE , e.NombreE , d.NombreD , j.NombreJ, j.CodigoJ, d.CodigoD FROM Empleado e , Departamento d , Jornada j  WHERE (e.CodigoD=d.CodigoD) AND (e.CodigoJ = j.CodigoJ) order by e.CodigoE";
$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error()); // el punto es para concatenar





echo "<table  border='1px' class=' table'>";
echo "<tr>";
echo "<thead class='thead-dark'>";                       
echo "<th><h2>Codigo</h2></th>";     
echo "<th><h2>Nombre</h2></th>";
echo "<th><h2>Jornada</h2></th>";
echo "<th><h2>Departamento</h2></th>";
echo "<th></th>";
echo "<th></th>";
echo "</thead>";
echo "<tbody>";   
echo "</tr>";


$CodigoE=0;
$NombreE="";
$NombreD="";
$NombreJ="";
$CodigoJ=0;
$CodigoD=0;
while ($line = pg_fetch_assoc($result)) {  //cursor

   $CodigoE=$line["codigoe"];  //accesar los campos linea y nombre del atributo
   $NombreE=$line["nombree"];
   $NombreD=$line["nombred"];
   $NombreJ=$line["nombrej"];
   $CodigoJ=$line["codigoj"];
   $CodigoD=$line["codigod"];
   


?>



<tr>
<td> <?php echo $CodigoE ?> </td>
<td><?php echo $NombreE ?></td>
<td><?php  echo $NombreJ ?></td>
<td><?php echo $NombreD ?></td>
<td><a href='eliminar_e.php?CodigoE=<?php echo $CodigoE ?>&NombreE=<?php echo $NombreE?>'><center><IMG SRC='../images/trash.gif' style='width:3pc; height:3pc' onclick="return confirm('¿Esta seguro de eliminar al empleado?')"></center></a></td>
<td><a href='modificar_e.php?CodigoE=<?php echo $CodigoE ?>&NombreE=<?php echo $NombreE?>&NombreD=<?php echo $NombreD?>&NombreJ=<?php echo $NombreJ?>&CodigoJ=<?php echo $CodigoJ?>&CodigoD=<?php echo $CodigoD?>'><center><IMG SRC='../images/mod.gif' style='width:3pc; height:3pc' ></center></a></td>
</tr>

<?php
}
?>

<?php
pg_free_result($result);

// Cerrando la conexión
pg_close($dbconn);
}
?>

</tbody>
</table>

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
            <script src="../js/script_e.js"></script>
            <script src="../bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script> 

	</body>
</html>