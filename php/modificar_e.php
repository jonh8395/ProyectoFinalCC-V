<!DOCTYPE HTML>

<html>
	<head>
		<title>Modificar Empleado</title>
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
						<h1><a href="./listar_e.php" class="special after">Regresar</a></h1>
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
								<h2>Modificar Empleado</h2>
								<p>Vector s.a</p>
							</div>
						</header>

						<!-- Content -->
							<div class="wrapper">
								<div class="inner">

									<section id="footer">
										<div class="inner">
										
										
                                        <form action="Mod_e.php" method="POST"  onsubmit="return verificador()" name="form">

                                        <?php
       
       $CodigoE=$_GET["CodigoE"];  //accesar los campos linea y nombre del atributo
       $NombreE=$_GET["NombreE"];
       $NombreD=$_GET["NombreD"];
       $NombreJ=$_GET["NombreJ"];
       $CodigoJ=$_GET["CodigoJ"];
       $CodigoD=$_GET["CodigoD"];
                                     //mediante el medoto get obtengo los parametros
            ?>

            
											 <div class='fields'>
										         <div class='field'>
                                                    <label for="Codigo">Código</label>
                                                    <?php echo $CodigoE?>
														<input type='hidden' min='1' name="Codigo" id="Codigo" value = '<?php echo $CodigoE?>'/>
													</div>
													<div class="field">
														<label for="Nombre">Nombre</label>
														<input type="text" name="Nombre" id="Nombre" value='<?php echo $NombreE ?>'/>
                                                    </div>
                                                    
                <?php

												echo	"<div class='field'>";
                                                echo	"<label for='Jornada'>Jornada</label>";
                                                $dbconn = pg_connect("host=localhost dbname=ProyectoCCV user=postgres password=12345")
       or die('No se ha podido conectar: ' . pg_last_error());
       $query = 'SELECT CodigoJ,NombreJ FROM Jornada Order by CodigoJ';
       $result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
   
       $CodigoJ2 = 0;
       $NombreJ2 = "";
   
       echo "<select name='Jornada' id='Jornada' class='btn btn-secondary dropdown-toggle'>\n";
           //cursor
           while($line = pg_fetch_assoc($result)){

               $CodigoJ2 = $line['codigoj'];
               $NombreJ2 = $line['nombrej'];

               if($CodigoJ == $CodigoJ2){
                echo"<option value=$CodigoJ2 selected='selected'>$CodigoJ2=$NombreJ2</option>"; 
               }else{
               
               echo "<option value=$CodigoJ2>$CodigoJ2=$NombreJ2</option>";
               }
           }
   
           echo "</select>\n";


           pg_free_result($result);

           // Cerrando la conexión
           pg_close($dbconn);
           ?>

<?php
echo"<br>";
                                                echo	"<div class='field'>";
                                                echo	"<label for='Departamento'>Departamento</label>";
                                                $dbconn = pg_connect("host=localhost dbname=ProyectoCCV user=postgres password=12345")
                                                or die('No se ha podido conectar: ' . pg_last_error());
                                                $query = 'SELECT CodigoD,NombreD FROM Departamento Order by CodigoD';
                                                $result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
                                               
                                                $CodigoD2 = 0;
                                                $NombreD2 = "";
                                               
                                               
                                                echo "<select name='Departamento' id='Departamento' class='btn btn-primary dropdown-toggle'>\n";
                                                    //cursor
                                                    while($line = pg_fetch_assoc($result)){
                                               
                                                        $CodigoD2 = $line['codigod'];
                                                        $NombreD2 = $line['nombred'];
                                               
                                                        if($CodigoD == $CodigoD2){
                                                         echo"<option value=$CodigoD2 selected='selected'>$CodigoD2=$NombreD2</option>"; 
                                                        }else{
                                                        
                                                        echo "<option value=$CodigoD2>$CodigoD2=$NombreD2</option>";
                                                        }
                                                    }
                                               
                                                    echo "</select>\n";
                                                    echo"<br><br>";  
                                               
                                                    pg_free_result($result);
                                               
                                                    // Cerrando la conexión
                                                    pg_close($dbconn);                          



?>


                                                <br>
														
													
												</div>
												<ul class="actions">
												<li><input type="submit" value="Enviar" class="primary" /></li>
												
												</ul>
                                            </form>
											</div>

	
		

								</div>
							</div>

					
					<span class="image special"><img src="../images/formulario.jpg" alt="" /></span>
			</div>

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