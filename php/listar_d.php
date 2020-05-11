<!DOCTYPE HTML>

<html>
	<head>
		<title>Consultar Departamento</title>
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
									  <a href="">Consultar</a>
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
								<h2>Consultar Departamento</h2>
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

$query1 = "SELECT * FROM Departamento";
$result2 =  pg_query($query1) or die('La consulta fallo: ' . pg_last_error());

if(!(pg_num_rows($result2)>0)){
  echo "<h1> Aviso: </h1>";
  echo "<b> No existen datos que mostrar debido a que no hay departamentos.</b><br><br><br>";
  pg_free_result($result2);
  pg_close($dbconn);
}else {
  $dbconn = pg_connect("host=localhost dbname=ProyectoCCV user=postgres password=12345")
  or die('No se ha podido conectar: ' . pg_last_error());
$query = "SELECT * FROM Departamento  order by CodigoD";
$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error()); // el punto es para concatenar





echo "<table  border='1px' class=' table'>";
echo "<tr>";
echo "<thead class='thead-dark'>";                       
echo "<th><h2>Codigo</h2></th>";     
echo "<th><h2>Nombre</h2></th>";
echo "<th></th>";
echo "<th></th>";
echo "</thead>";
echo "<tbody>";   
echo "</tr>";


$CodigoD=0;
$NombreD="";
while ($line = pg_fetch_assoc($result)) {  //cursor

   $NombreD=$line["nombred"];
   $CodigoD=$line["codigod"];
   


?>
<?php
$query20 = "select * from Empleado WHERE codigod=$CodigoD";
$result20= pg_query($query20) or die('La consulta fallo: ' . pg_last_error());
?>
<tr>
<td> <?php echo $CodigoD ?> </td>
<td><?php echo $NombreD ?></td>
<?php 
if(pg_num_rows($result20)>0){
    echo "\t\t<td><center>El departamento no puede ser eliminado</center></td>\n";
  pg_free_result($result20);
  
}else {
    ?>
<td><a href='eliminar_d.php?CodigoD=<?php echo $CodigoD?>&NombreD=<?php echo $NombreD?>'><center><IMG SRC='../images/trash.gif' style='width:3pc; height:3pc' onclick="return confirm('¿Esta seguro de eliminar al departamento?')"></center></a></td>
<?php 
}
?>
<td><a href='modificar_d.php?CodigoD=<?php echo $CodigoD?>&NombreD=<?php echo $NombreD?>'><center><IMG SRC='../images/mod.gif' style='width:3pc; height:3pc' ></center></a></td>
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
            <script src="../js/script_d.js"></script>
            <script src="../bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script> 

	</body>
</html>