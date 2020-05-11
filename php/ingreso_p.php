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
						<h1><a href="./ingreso_usuario.php" class="special after">Regresar</a></h1>
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
								<h2>Ingreso Permiso</h2>
								<p>Vector s.a</p>
							</div>
						</header>

						<div class="wrapper">
							<div class="inner">
								<section id="footer">
									<div class="inner">
								<?php


$Username=$_POST["Username"]; // instruccion para obtener parametros que se llenaron desde el formulario
$ClaveU=$_POST["ClaveU"];
$Username = trim($Username);
$ClaveU = trim($ClaveU);

$dbconn = pg_connect("host=localhost dbname=ProyectoCCV user=postgres password=12345")
    or die('No se ha podido conectar: ' . pg_last_error());
    $query2 = "SELECT * FROM Usuario WHERE Username='$Username'";
    $reul = pg_query($query2);
   
    if (pg_num_rows($reul) == 0){
?>
        <h2>Aviso</h2>
        <p>El usuario con  username <?php echo $Username ?> no existe</p>
        <?php
        pg_free_result($reul);

    }else{
       	$clave = pg_fetch_array($reul)[1];
       	if($clave != $ClaveU) {  ?> 
       		<h2>Aviso</h2>
       		<p>La clave para este usuario es incorrecta </p> 
       	 	<?php
        
        }
       	else {
       		$res = pg_query("SELECT * FROM information_schema.role_table_grants WHERE grantee='$Username' AND privilege_type='INSERT' AND table_name='permiso'");
       		if(pg_num_rows($res) == 0) {
       			?> 
       			<h2>Aviso</h2>
       			<p>Este usuario no tiene privilegios para ingresar permisos</p> 
       	 		<?php
       	 		pg_free_result($res);
       	 		pg_close($dbconn);
       		} else {
       		$connection = pg_connect("host=localhost dbname=ProyectoCCV user=$Username password=$ClaveU") or die('No se ha podido conectar: ' . pg_last_error());
       		$resultado = pg_query("SELECT CodigoE,NombreE FROM Empleado ORDER BY CodigoE");
       		if(pg_num_rows($resultado) == 0) {
       			echo "<h1>Aviso</h1>";
       			echo "<b><Debe tener empleados ingresados para poder ingresar un permiso.</b>";
       			pg_free_result($resultado);
       			pg_close($connection);
       		} else {
       			?>
       			<form action="insertar_p.php" method="POST" onsubmit="return verificadorPermiso();" name="form">
       				<div class="fields">
       					<input type="hidden" name="user" value="<?php echo $Username?>"/>
       					<input type="hidden" name="key" value="<?php echo $ClaveU?>"/>
       					<label for="Empl">Empleado</label>
       					<select id="Empl" name="Empl">
       						<option value="r">-</option>
       						<?php
       						while ($fila=pg_fetch_array($resultado)) {
       							$codigoemp = $fila[0];
       							$nombreemp = $fila[1];
       							echo "<option value='$codigoemp'>$codigoemp - $nombreemp</option>";
       						}
       						pg_free_result($resultado);
       						pg_close($connection);
       						?>
       					</select>
       					<br><br><br>
       					<label for="CodigoP">Codigo de permiso</label>
       					<select id="CodigoP" name="CodigoP" onchange="return opcionPermiso();">
       						<option value="0">-</option>
       						<option value="1">1 - Falto al trabajo</option>
       						<option value="2">2 - Entrada tarde</option>
       						<option value="3">3 - Salida temprano</option>
       					</select>
       					<div class="field">
       						<label for="fechaPerm">Fecha del permiso</label>
       						<input type="date" name="fechaPerm" id="fechaPerm"/>
       					</div>
       					<div class="field">
       						<label for="descripcion">Descripcion</label>
       						<textarea id="descripcion" name="descripcion" rows="4" cols="50" maxlength="100"></textarea>
       					</div>
       				</div>
       				<br>
       				<ul class="actions">
						<li><input type="submit" value="Enviar" class="primary" /></li>
						<li><input type="reset" value="Borrar" /></li>
					</ul>
       			</form>
       			</div>
       			<?php
       		}
       	}
       	}
    }



?>
							
						</div>
						</section>
						<span class="image special"><img src="../images/formulario.jpg" alt="" /></span>
				
					</div>
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