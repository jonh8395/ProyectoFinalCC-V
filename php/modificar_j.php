<!DOCTYPE HTML>

<html>
	<head>
		<title>Modificar Jornada</title>
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
						<h1><a href="./listar_j.php" class="special after">Regresar</a></h1>
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
								<li><a href="./ingreso.php">Entrada/Salida</a></li>
								<li><a href="./antereporte.php">Reporte</a></li>
								<li><a href="#">uno</a></li>
							</ul>
							<a href="#" class="close">Close</a>
						</div>
					</nav>


				<!-- Wrapper -->
					<section id="wrapper">
						<header>
							<div class="inner">
								<h2>Modificar Jornada</h2>
								<p>Vector s.a</p>
							</div>
						</header>

						<!-- Content -->
							<div class="wrapper">
								<div class="inner">

									<section id="footer">
										<div class="inner">
										
										
                                        <form action="Mod_j.php" method="POST"  onsubmit="return verificador()" name="form">

                                        <?php
       
       $CodigoJ=$_GET["CodigoJ"];
       $NombreJ=$_GET["NombreJ"];
       $HoraE=$_GET["HoraE"];
       $HoraS=$_GET["HoraS"];
                                     //mediante el medoto get obtengo los parametros
            ?>

            
											 <div class='fields'>
										         <div class='field'>
                                                    <label for="Codigo">Código</label>
                                                    <?php echo $CodigoJ?>
														<input type='hidden' min='1' name="codigo" id="codigo" value = '<?php echo $CodigoJ?>'/>
													</div>
													<div class="field">
														<label for="Nombre">Nombre</label>
														<input type="text" name="nombre" id="nombre" value='<?php echo $NombreJ ?>'/>
                                                    </div>
                                                    <div class="field">
														<label for="Hora de entrada">Hora de entrada</label>
														<input type="time" name="horain" id="horain"  value='<?php echo $HoraE ?>' />
                                                    </div>
                                                    <div class="field">
														<label for="Hora de salida">Hora de salida</label>
														<input type="time" name="horaout" id="horaout"  value='<?php echo $HoraS ?>'/>
                                                    </div>
               
                                                <br>
														
													
												</div>
												<ul class="actions">
												<li><input type="submit" value="Enviar" class="primary" /></li>
												
												</ul>
                                            </form>
											</div>

	
		

								</div>
							</div>

					
					
			</div>

		<!-- Scripts -->
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/jquery.scrollex.min.js"></script>
			<script src="../assets/js/browser.min.js"></script>
			<script src="../assets/js/breakpoints.min.js"></script>
			<script src="../assets/js/util.js"></script>
            <script src="../assets/js/main.js"></script>
            <script src="../js/script_j.js"></script>
            
	</body>
</html>