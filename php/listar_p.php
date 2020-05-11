<!DOCTYPE HTML>

<html>
	<head>
		<title>Consultar Permiso</title>
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
								<h2>Consultar Permiso</h2>
								<p>Vector s.a</p>
							</div>
						</header>

						<!-- Content -->
							<div class="wrapper">
								<div class="inner">

									<section id="footer">
										<div class="inner">
											
											<?php

$Userna = $_POST["Username"];
$ClaveU = $_POST["ClaveU"];
$Userna = trim($Userna);
$ClaveU = trim($ClaveU);
$dbconn = pg_connect("host=localhost dbname=ProyectoCCV user=postgres password=12345")
    or die('No se ha podido conectar: ' . pg_last_error());

$res = pg_query("SELECT * FROM information_schema.role_table_grants WHERE grantee='$Userna' AND privilege_type='SELECT' AND table_name='permiso'");
if(pg_num_rows($res) == 0) {
	?> 
    <h2>Aviso</h2>
    <p>Este usuario no tiene privilegios para ver los permisos</p> 
    <?php
    pg_free_result($res);
    pg_close($dbconn);
} else {

$res1 = pg_query("SELECT * FROM information_schema.role_table_grants WHERE grantee='$Userna' AND privilege_type='DELETE' AND table_name='permiso'");
$res2 = pg_query("SELECT * FROM information_schema.role_table_grants WHERE grantee='$Userna' AND privilege_type='UPDATE' AND table_name='permiso'");
$boo1 = (pg_num_rows($res1) == 0);
$boo2 = (pg_num_rows($res2) == 0);
pg_free_result($res1);
pg_free_result($res2);
pg_close($dbconn);

$connection = pg_connect("host=localhost dbname=ProyectoCCV user=postgres password=12345");

$query1 = "SELECT * FROM Permiso";
$result2 =  pg_query($query1) or die('La consulta fallo: ' . pg_last_error());

if(!(pg_num_rows($result2)>0)){
  echo "<h1> Aviso: </h1>";
  echo "<b> No existen datos que mostrar debido a que no hay permisos.</b><br><br><br>";
  pg_free_result($result2);
  pg_close($connection);
}else {
$query = "SELECT p.CodigoE, p.Fecha, p.Descripcion, e.NombreE, p.CodigoP FROM Permiso p,Empleado e WHERE e.CodigoE=p.CodigoE";
$result = pg_query($query);





echo "<table  border='1px' class=' table'>";
echo "<tr>";
echo "<thead class='thead-dark'>";                       
echo "<th><h2>Codigo</h2></th>";     
echo "<th><h2>Nombre</h2></th>";
echo "<th><h2>Fecha</h2></th>";
echo "<th><h2>Descripción</h2></th>";
echo "<th></th>";
echo "<th></th>";
echo "</thead>";
echo "<tbody>";   
echo "</tr>";


$CodigoE=0;
$NombreE="";
$Fecha="";
$Descripcion="";
while ($line = pg_fetch_array($result)) {  //cursor

   $CodigoE=$line[0];  //accesar los campos linea y nombre del atributo
   $Fecha=$line[1];
   $Descripcion=$line[2];
   $NombreE=$line[3];
   $CodigoP=$line[4];
   
   $un = strtotime($Fecha);
   $fefe = date("d/m/Y" , $un);
?>



<tr>
<td> <?php echo $CodigoE ?> </td>
<td><?php echo $NombreE ?></td>
<td><?php  echo $fefe ?></td>
<td><?php echo $Descripcion ?></td>
<td>
	<?php
	if($boo1) {
		echo "No tiene privilegios para eliminar";
	} else {
	?>	
	<a href='eliminar_p.php?CodigoE=<?php echo $CodigoE ?>&Fecha=<?php echo $Fecha?>&Userna=<?php echo $Userna?>&ClaveU=<?php echo $ClaveU?>'><center><IMG SRC='../images/trash.gif' style='width:3pc; height:3pc' onclick="return confirm('¿Esta seguro de eliminar el permiso?')"></center></a>
	<?php } ?>
</td>
<td>	
	<?php
	if($boo2) {
		echo "No tiene privilegios para modificar";
	} else {
	?>
	<a href='modificar_p.php?CodigoE=<?php echo $CodigoE ?>&Fecha=<?php echo $Fecha?>&Descripcion=<?php echo $Descripcion?>&CodigoP=<?php echo $CodigoP?>&Userna=<?php echo $Userna?>&ClaveU=<?php echo $ClaveU?>&NombreE=<?php echo $NombreE?>'><center><IMG SRC='../images/mod.gif' style='width:3pc; height:3pc' ></center></a>
	<?php } ?>
</td>
</tr>


<?php
}
?>

<?php
pg_free_result($result);
//
// Cerrando la conexión
pg_close($connection);
}
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
            <script src="../js/script_p.js"></script>
            <script src="../bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script> 

	</body>
</html>