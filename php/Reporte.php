<!DOCTYPE HTML>

<html>
	<head>
		<title>Reporte</title>
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
								<h2>Reporte</h2>
								<p>Vector s.a</p>
							</div>
						</header>

						<!-- Content -->
							<div class="wrapper">
								<div class="inner">

									<section id="footer">
										<div class="inner">
											
											<?php
$CodigoE = $_GET["Empleado"];
$FechaInicial = $_GET["FechaInicial"];
$FechaFinal = $_GET["FechaFinal"];
$dbconn = pg_connect("host=localhost dbname=ProyectoCCV user=postgres password=12345")
	or die('No se ha podido conectar: ' . pg_last_error());
	
	

$query2 = "SELECT  E.NombreE , D.NombreD ,D.CodigoD, J.NombreJ,J.HoraEntrada, J.HoraSalida  FROM Empleado E , Departamento D , Jornada J   WHERE (E.CodigoD = D.CodigoD) and (E.CodigoE = $CodigoE) and (E.CodigoJ = J.CodigoJ)";
$result3 = pg_query($query2) or die('La consulta fallo: ' . pg_last_error());
$NombreE ="";
$NombreD ="";
$NombreJ="";
$CodigoD=0;
$HoraEntrada =0;
$HoraSalida = 0;




while ($line = pg_fetch_assoc($result3)) {
    $NombreE = $line['nombree'];
    $NombreD = $line['nombred'];
    $NombreJ = $line['nombrej'];
    $HoraEntrada = $line['horaentrada'];
    $HoraSalida = $line['horasalida'];
    $CodigoD = $line['codigod'];
	$fechainicialform = date("d/m/Y" , strtotime($FechaInicial));
	$fechafinalform = date("d/m/Y", strtotime($FechaFinal));
	
    echo"<center>";
   echo "<p>Reporte de Entradas y Salidas del $fechainicialform   al  $fechafinalform </p><br>\n";
   echo"</center>";
   echo"<br>";
   echo "<p>Empleado:  $CodigoE -  $NombreE </p><br>\n";
   echo "<p>Departamento: $CodigoD  - $NombreD </p><br>\n";
   echo "<p>Jornada: $NombreJ  de $HoraEntrada  a  $HoraSalida</p><br>\n";
   echo"<br>";

}

pg_free_result($result3);

//cursor 
$TipoMarcaS ='';
$TipoMarcaE='';
$HoraS=0;
$HoraE=0;
$Fechas=0;




echo "<table  border='1px' class=' table'>";
echo "<tr>";
echo "<thead class='thead-dark'>";                       
echo "<th><h2>&nbsp;&nbsp;&nbsp;Fecha&nbsp;&nbsp;&nbsp;</h2></th>";     
echo "<th><h2>Entrada</h2></th>";
echo "<th><h2>Salida</h2></th>";
echo "<th><h2>Entrada Tarde Minutos</h2></th>";
echo "<th><h2>Salida Temprano Minutos</h2></th>";
echo "<th><h2>Horas Trabajadas</h2></th>";
echo "<th><h2>Observaciones\Permisos</h2></th>";
echo "</thead>";
echo "<tbody>";   
echo "</tr>";

date_default_timezone_set("America/Guatemala");
//for

$fechai = strtotime($FechaInicial);
$fechaf = strtotime($FechaFinal);
$totaltarde = 0;
$totaltemprano = 0;
for($i = $fechai; $i <= $fechaf; $i+=86400){
	$Fecha = date("Y-m-d", $i); 
	$fefe = date("d/m/Y" , $i);
//por si olvido marcar la entrada
	$query3 = "SELECT * FROM Registro WHERE (CodigoE = $CodigoE) AND (Fecha = '$Fecha' )  and (TipoMarca = 'S')";
	$result4 = pg_query($query3) or die('La consulta fallo: ' . pg_last_error());
	$querye = "SELECT * FROM Registro WHERE(CodigoE = $CodigoE) AND (Fecha = '$Fecha' )	AND (TipoMarca = 'E')";
	$reslte = pg_query($querye) or die('La consulta fallo: ' . pg_last_error());
	if( !(pg_num_rows($result4) > 0 )  && (pg_num_rows($reslte) > 0)  ){
	
			if($Fecha != date("Y-m-d")){
			$query6 = "SELECT * FROM Registro WHERE (Fecha = '$Fecha') AND (CodigoE = $CodigoE) AND (TipoMarca = 'S')";
			$result6 =  pg_query($query6) or die('La consulta fallo: ' . pg_last_error());
			if(!(pg_num_rows($result6) > 0)){
				$query7 ="INSERT INTO Registro VALUES($CodigoE,'$Fecha','S',NULL)";
				$result7 =  pg_query($query7) or die('La consulta fallo: ' . pg_last_error());
			}
		}
		}

//por si olvido marcar la entrada y se realiza la insercion desde base de datos ya que esta validacion ya se hace desde entrada/salida
	if(  (pg_num_rows($result4) > 0)  && !(pg_num_rows($reslte) > 0) ){
			$queryy = "SELECT * FROM Registro WHERE (Fecha = '$Fecha') AND (CodigoE = $CodigoE) AND (TipoMarca = 'E')";
			$resultyy = pg_query($queryy) or die('La consulta fallo: ' . pg_last_error());

			if(!(pg_num_rows($resultyy) > 0)){
				$queue = "INSERT INTO Registro VALUES($CodigoE, '$Fecha','E',NULL)";
				$reueu =pg_query($queue) or die('La consulta fallo: ' . pg_last_error());
			}


	}
	


$query1 = "SELECT   R.TipoMarca as s, R.Hora as HoraS, W.TipoMarca as e, W.Hora as HoraE  , R.Fecha FROM (SELECT T.Fecha , T.Hora , T.TipoMarca FROM Registro T WHERE (T.CodigoE=$CodigoE) and (T.TipoMarca = 'E') and (T.Fecha = '$Fecha')) W ,    Empleado E , Departamento D , Jornada J , Registro R WHERE (E.CodigoD = D.CodigoD) and (E.CodigoE = $CodigoE) and (E.CodigoJ = J.CodigoJ) and (E.CodigoE = R.CodigoE) and (R.Fecha = '$Fecha' ) and (R.TipoMarca = 'S') AND (W.Fecha = R.Fecha) order by R.Fecha";
$result2 =  pg_query($query1) or die('La consulta fallo: ' . pg_last_error());
$queryp = "SELECT * FROM Permiso WHERE (CodigoE = $CodigoE) AND (Fecha = '$Fecha') AND (CodigoP = 1)";
	$resulp =  pg_query($queryp) or die('La consulta fallo: ' . pg_last_error());
if(!(pg_num_rows($result2) > 0) || (pg_num_rows($resulp) > 0 ) ){
	

	if(!(pg_num_rows($resulp) > 0)){
		if($Fecha == date("Y-m-d")){
	?> 
			<tr>
	<td><?php  echo $fefe?></td>
	<td>pendiente</td>
	<td>pendiente</td>
	<td>pendiente</td>
	<td>pendiente</td>
	<td>pendiente</td>
	<td>pendiente</td>
	</tr>
<?php
		}else{
	
		
		?>
	<tr>
	<td><?php  echo $fefe?></td>
	<td>*</td>
	<td>*</td>
	<td>*</td>
	<td>*</td>
	<td>*</td>
	<td>No llego</td>
	</tr>


<?php
		}
	}else{
		$Des ="";
	 while($line = pg_fetch_assoc($resulp)){
		$Des = $line["descripcion"];
?>
		<tr>
	<td><?php  echo $fefe?></td>
	<td>*</td>
	<td>*</td>
	<td>*</td>
	<td>*</td>
	<td>*</td>
	<td><?php echo $Des?></td>
	</tr>
<?php
	 }


	}

}else{
	 
while ($line = pg_fetch_assoc($result2)) { 
    $TipoMarcaS = $line['s'];
    $TipoMarcaE = $line['e'];
    $HoraS= $line['horas'];
    $HoraE = $line['horae'];
	$Fechas = $line['fecha'];
	$fechasform = date("d/m/Y" ,strtotime($Fechas));
   $lleva = false;
   $lleva2 = false;
   $clu = false;
   $kratos = false;
$difer = new Datetime($HoraS);
$segundo = new Datetime($HoraSalida);

$intervalo = $difer -> diff($segundo);

$HoraSform = new Datetime($HoraS);
$Horaeform = new Datetime($HoraE);
   
$sal = new Datetime($HoraEntrada);
$inter = $Horaeform ->diff($sal);
$horast = $HoraSform ->diff($Horaeform);

$ob = $inter->format('%H:%i');
$par = explode(":", $ob);
$mins = ($par[0] * 60) + $par[1];


$obten = $intervalo->format('%H:%i');
$partes = explode(":" ,$obten);
$minutos = ($partes[0] * 60) + $partes[1];
  //cursor

?>



<tr>
<td> <?php echo $fechasform ?> </td>
<?php if($HoraE == NULL){

?>
<td>*</td>
<td><?php  echo $HoraSform ->format('H:i')?></td>
<td>0</td>
<?php   
if($HoraS < $HoraSalida){ 
	$quee = "SELECT * FROM Permiso WHERE (CodigoE = $CodigoE) AND (Fecha = '$Fecha') AND (CodigoP = 3)";
	$resss =  pg_query($quee) or die('La consulta fallo: ' . pg_last_error());
if(pg_num_rows($resss)){
$clu = true;
?>
<td>0</td>
<?php	
}else{
	$totaltemprano = $totaltemprano + $minutos;
?>
<td><?php  echo $minutos?></td>
<?php } ?>
<?php }else { ?>
<td>0</td>
<?php } ?>
<td>*</td>
<?php if($clu){  
	$messa = ""; 
	while($tron = pg_fetch_assoc($resss)){
		$messa = $tron["descripcion"];
	?>

<td>Olvido Marcar y <?php echo $messa ?></td>
	<?php }  
}else{?>
<td>Olvido Marcar</td>
<?php }?>
</tr>

<?php  }else if($HoraS == NULL) { ?>
<td><?php echo $Horaeform->format('H:i')?></td>
<td> *</td>
<?php if($HoraE > $HoraEntrada){ 
	 $quertin = "SELECT * FROM Permiso WHERE (CodigoE = $CodigoE) AND (Fecha = '$Fecha') AND (CodigoP = 2)";
	 $resultin =  pg_query($quertin) or die('La consulta fallo: ' . pg_last_error());
	if(pg_num_rows($resultin) > 0){
		$kratos = true;
		?>
		
		<td>0</td>
	<?php
	}else{ 
	$totaltarde = $totaltarde + $mins;?>	
<td><?php echo $mins ?></td>
<?php } ?>
<?php  }else{ ?>
	<td>0</td>
<?php } ?>
<td>0</td>
<td>*</td>
<?php if($kratos){
	$aux = "";
	while($atreus = pg_fetch_assoc($resultin)){
		$aux = $atreus["descripcion"];
  ?>
<td>Olvido Marcar y <?php echo $aux?></td>
	<?php } 
	}else{?>
<td>Olvido Marcar</td>
	<?php } ?>	
</tr>
<?php }else { ?>
<td><?php echo $Horaeform->format('H:i')?></td>
<td><?php  echo $HoraSform ->format('H:i')?></td>
<?php if($HoraE > $HoraEntrada){  
	 $quert = "SELECT * FROM Permiso WHERE (CodigoE = $CodigoE) AND (Fecha = '$Fecha') AND (CodigoP = 2)";
	 $results =  pg_query($quert) or die('La consulta fallo: ' . pg_last_error());
	if(pg_num_rows($results) > 0){
		?>
		<td>0</td>
		
<?php
 $lleva = true;
	}else{
	
	$totaltarde = $totaltarde + $mins;?>
<td><?php echo $mins ?></td>
	<?php } ?>
<?php  }else{ ?>
	<td>0</td>
<?php } ?>
<?php if($HoraS < $HoraSalida) { 
	$que = "SELECT * FROM Permiso WHERE (CodigoE = $CodigoE) AND (Fecha = '$Fecha') AND (CodigoP = 3)";
	$ress =  pg_query($que) or die('La consulta fallo: ' . pg_last_error());
	if(pg_num_rows($ress) > 0){
		?>
		<td>0</td>
		<?php
		$lleva2 = true;
	}else{
	$totaltemprano = $totaltemprano + $minutos; ?>
<td><?php  echo $minutos?></td>
	<?php } ?>
<?php }else{ ?>
	<td>0</td>
<?php } ?>
<td><?php  echo $horast->format('%H:%i')?></td>
<?php if($lleva){  
	$coment ="";
	while ($li = pg_fetch_assoc($results)){
		$coment = $li["descripcion"];
		?>
		<td><?php echo $coment ?>  </td>
<?php
	}
	
	?>



<?php }else if($lleva2){ 
	$com ="";
	while($ll = pg_fetch_assoc($ress)){
		$com = $ll["descripcion"];
		?>
	<td><?php echo $com ?> </td>

<?php
	}
	
}else{?>
<td></td>
<?php } ?>
</tr>
<?php } ?>




<?php
}
}
}
pg_free_result($result2);

// Cerrando la conexión
pg_close($dbconn);

?>
<tr>
<td> </td>
<td> </td>
<td>Totales</td>
<td><?php echo $totaltarde ?></td>	
<td><?php echo $totaltemprano?></td>
<td></td>
<td></td>	
</tr>
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