<?php include_once 'includes/templates/header.php'; ?>
		
		<!-- Contenido principal -->
		<div class="clearfix">
			<div class="main">
				<section class="contenedor">
					<h2>Spin-offs del ITZ</h2>
					<?php 
					try {
						require_once('includes/funciones/bd_conexion.php');
						$sql = "SELECT idSpinoff, nombreSpinoff, giroSpinoff, descripcionSpinoff, serviciosSpinoff, proyectosSpinoff, integrantesSpinoff, emailSpinoff, telefonoSpinoff, imagenSpinoff, videoSpinoff "; 
						$sql .= "FROM spinoff ";
						if (!$resultado = $conn->query($sql)) {
							echo "Lo sentimos, este sitio web está experimentando problemas.";
							 // De nuevo, no hacer esto en un sitio público
							echo "Error: La ejecución de la consulta falló debido a: \n";
							echo "Query: " . $sql . "\n";
							echo "Errno: " . $mysqli->errno . "\n";
							echo "Error: " . $mysqli->error . "\n";
							exit;
						}
						$resultado = $conn->query($sql);
					} catch(Exception $e) {
						$error = $e->getMessaege();
					}
					?>

					
					<section class="spinoffs_contenedor">
						<?php while($spinoffs = $resultado->fetch_assoc()) { ?>
							<a class="spinoff-info" href="#spinoff<?php echo $spinoffs['idSpinoff']; ?>">
								<div class="tarjeta">
									<div class="tarjeta-info">
											<!-- Nombre -->
											<p class="nombre">
												<?php echo $spinoffs['nombreSpinoff']; ?>	
											</p>
									</div>
								</div>
							</a>
							<div style="display: none;">
								<div class="spinoff-info" id="spinoff<?php echo $spinoffs['idSpinoff']; ?>">
									<div class="tarjeta-info">
										<!-- Logo -->
										<div style="text-align: center;">
											<img style="max-width: 250px; max-height: 250px;" src="img/spinoffs/<?php echo $spinoffs['imagenSpinoff']; ?>" alt="">
										</div>
										<!-- Nombre -->
										<p class="nombre">
											<?php echo $spinoffs['nombreSpinoff']; ?>	
										</p>
										<!-- Giro -->
										<p class="giro">
											<?php echo $spinoffs['giroSpinoff']; ?>
										</p>
										<hr>
										<!-- Descripcion -->
										<h1>Descripción</h1>
										<p class="descripcion">
											<?php echo $spinoffs['descripcionSpinoff']; ?>
										</p>
										<!-- Servicios -->
										<h1>Servicios</h1>
										<p class="servicios">
											<?php echo str_replace("\n", "<br>", $spinoffs['serviciosSpinoff']); ?>
										</p>
										<!-- Proyectos -->
										<h1>Proyectos</h1>
										<p class="proyectos">
											<?php echo str_replace("\n", "<br>", $spinoffs['proyectosSpinoff']); ?>
										</p>
										<!-- Integrantes -->
										<h1>Integrantes</h1>
										<p class="integrantes">
											<?php echo str_replace("\n", "<br>", $spinoffs['integrantesSpinoff']); ?>
										</p>
										<!-- Video -->
										<?php if ($spinoffs['videoSpinoff']==null) { ?>
										<?php } else { ?>	
											<h1>Video</h1>
											<iframe class="video" src="<?php echo $spinoffs['videoSpinoff'] ?>" frameborder="0" allowfullscreen></iframe>
										<?php } ?>
										<hr>
										<!-- Email -->
										<p class="email"><span>Email: </span><?php echo $spinoffs['emailSpinoff']; ?>
										</p>
										<!-- Telefono -->
										<p class="telefono"><span>Teléfono: </span><?php echo $spinoffs['telefonoSpinoff']; ?>
										</p>
									</div>
								</div>
							</div>
						<?php } ?>
					</section>

						<?php  
						// El script automáticamente liberará el resultado y cerrará la conexión a MySQL
						$resultado->free();
						$conn->close();
						?>
				
				</section>
			</div>
			<div class="derecho">
			</div>
		</div>

 		<!-- Footer -->
		<footer class="site-footer">
			<div class="contenedor clearfix">
				<div class="footer-info">
					<img class="spo" src="img/logo_azul_chico.png" class="logo" alt="Logo de Spin-Off ITZ">
				</div>
				<div class="footer-logo">
					<a href="http://mapaches3.itz.edu.mx/itz_rg/" target="_blank">
						<img src="img/itz.png" class="itz" alt="Logo del ITZ">
					</a>
				</div>
			</div>
			<div class="copyright">
				<div class="contenedor">
					<p>
						<!-- <a href="https://icons8.com">Iconos por <span>Icons8</span></a><br> -->
						Todos los derechos reservados ~ Worktecs 2018
					</p>
				</div>
			</div>
			
		</footer>


        <!-- Archivos JavaScript -->
        <script src="js/vendor/modernizr-3.5.0.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.2.1.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
        <script src="js/jquery.colorbox-min.js"></script>

        <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
        <script>
            window.ga=function(){ga.q.push(arguments)};ga.q=[];ga.l=+new Date;
            ga('create','UA-XXXXX-Y','auto');ga('send','pageview')
        </script>
        <script src="https://www.google-analytics.com/analytics.js" async defer></script>
    </body>
</html>