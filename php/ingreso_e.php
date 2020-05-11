<!DOCTYPE HTML>

<html>
	<head>
		<title>Ingreso Empleado</title>
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
										  <a href="">Ingreso</a>
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
								<h2>Ingreso Empleado</h2>
								<p>Vector s.a</p>
							</div>
						</header>

						<!-- Content -->
						
							<div class="wrapper">
								<div class="inner">
									
									<section id="footer">
									
										<div class="inner">
											
										
										
											<form action="insertar_e.php" method="POST"  onsubmit="return verificador()" name="form">
											
      <?php
        $dbconn = pg_connect("host=localhost dbname=ProyectoCCV user=postgres password=12345")
        or die('No se ha podido conectar: ' . pg_last_error());
        $query1 = 'SELECT * FROM Jornada';
        $result1 = pg_query($query1) or die('La consulta fallo: ' . pg_last_error());

        $query8 = 'SELECT * FROM Departamento';
        $result8 = pg_query($query8) or die('La consulta fallo: ' . pg_last_error());

        if(!(pg_num_rows($result1)>0) ||  !(pg_num_rows($result8)>0)  ){
          echo "<h1> Aviso </h1>";
          echo "<b> Debe Tener Jornadas y/o Departamentos creados para poder ingresar un empleado.</b>";

          pg_free_result($result1);
          pg_free_result($result8);

          // Cerrando la conexión
          pg_close($dbconn);
        }else{

            ?>
											 <div class='fields'>
										         <div class='field'>
													<label for="Codigo">Código</label>
														<input type="number" name="Codigo" id="Codigo" min="1"/>
													</div>
													<div class="field">
														<label for="Nombre">Nombre</label>
														<input type="text" name="Nombre" id="Nombre" />
                                                    </div>
                                                    
                <?php

												echo	"<div class='field'>";
                                                echo	"<label for='Jornada'>Jornada</label>";
                                                $dbconn = pg_connect("host=localhost dbname=ProyectoCCV user=postgres password=12345")
                                                or die('No se ha podido conectar: ' . pg_last_error());
                                                $query = 'SELECT CodigoJ,NombreJ FROM Jornada Order by CodigoJ';
                                                $result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
                                            
                                                $CodigoJ = 0;
                                                $NombreJ = "";
                                            ?>
                                                <select name='Jornada' id='Jornada' >
												<option value="r">-</option>
												<?php
                                                    //cursor
                                                    while($line = pg_fetch_assoc($result)){
                                                    
                                                        $CodigoJ = $line['codigoj'];
                                                        $NombreJ = $line['nombrej'];
														
														?>
                                                        <option value='<?php echo $CodigoJ?>'><?php echo $CodigoJ ?> = <?php echo $NombreJ; ?></option>
                                                       <?php
													}
													?>
                                            
													</select>
													<?php
                                                    pg_free_result($result);
                                            
                                            // Cerrando la conexión
                                            pg_close($dbconn);                                    



?>


<?php

												echo	"<div class='field'>";
                                                echo	"<label for='Departamento'>Departamento</label>";
                                                $dbconn = pg_connect("host=localhost dbname=ProyectoCCV user=postgres password=12345")
                                                or die('No se ha podido conectar: ' . pg_last_error());
                                                $query = 'SELECT CodigoD,NombreD FROM Departamento Order by CodigoD';
                                                $result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
                                        
                                                $CodigoD = 0;
                                                $NombreD = "";
                                        
                                        ?>
                                                <select name='Departamento' id='Departamento'>
												<option value="r">-</option>
												<?php
                                                //cursor
                                                while($line = pg_fetch_assoc($result)){
                                                
                                                    $CodigoD = $line['codigod'];
                                                    $NombreD = $line['nombred'];
                                                    ?>
                                                    <option value='<?php  echo $CodigoD?>'><?php echo $CodigoD ?> = <?php echo $NombreD?></option>
                                                   <?php
												}
												?>
                                        
                                               
												</select>
												<?php                          

												pg_free_result($result);
                                            
												// Cerrando la conexión
												pg_close($dbconn);

?>


                                                <br>
													
													
												</div>
												<ul class="actions">
													<li><input type="submit" value="Enviar" class="primary" /></li>
													<li><input type="reset" value="Borrar" /></li>
												</ul>
											</form>
											</div>
											
											
                                            <?php

		}?>
		

								</div>
								
							
							

							</section>
							<span class="image special"><img src="../images/formulario.jpg" alt="" /></span>

							
			</div>
			
	</section>
	
			
		<!-- Scripts -->
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/jquery.scrollex.min.js"></script>
			<script src="../assets/js/browser.min.js"></script>
			<script src="../assets/js/breakpoints.min.js"></script>
			<script src="../assets/js/util.js"></script>
            <script src="../assets/js/main.js"></script>
            <script src="../js/script_e.js"></script>

	</body>
</html>