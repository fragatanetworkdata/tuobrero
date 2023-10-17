<!-- Encabezado
================================================== -->
<header class="encabezado-fijo">
<div class="contenedor">
	<div class="dieciséis columnas">
	
		<!-- Logo -->
		<div id="logo">
			<h1><a href="?"><img src="images/logo.png" alt="Trabajo Escudriñador" /></a></h1>
		</div>

		<!-- Menú -->
		<nav id="navegacion" class="menu">
			<ul id="responsivo">

				<li><a href="" id="actual">Inicio</a>
				</li>

				<li><a href="#">Páginas</a>
					<ul>
						<li><a href="?view=pagina-empleo">Página de Empleo</a></li>
						<li><a href="?view=pagina-curriculum">Página de Currículum</a></li>
	
					</ul>
				</li>

				<?php
					session_start();
					$role = isset($_SESSION['role']) ? $_SESSION['role'] : "visitante";

				?>

				<?php if($role === 0) : ?>

		
				<li><a href="#">Para Candidatos</a>
					<ul>
						<li><a href="?view=explorar-empleos">Explorar Empleos</a></li>	
						<li><a href="?view=agregar-curriculum">Agregar Currículum</a></li>
						<li><a href="?view=administrar-curriculums">Administrar Currículums</a></li>
					</ul>
				</li>
				<?php elseif($role === 1)  : ?>

				<li><a href="#">Para Empleadores</a>
					<ul>
						<li><a href="?view=agregar-empleo">Agregar Empleo</a></li>
						<li><a href="?view=administrar-empleos">Administrar Empleos</a></li>
						<li><a href="?view=explorar-curriculums">Explorar Currículums</a></li>
					</ul>
				</li>
				<?php endif; ?>

			</ul>
	
			
			<ul class="flotar-derecha">
				<?php if(!isset($_SESSION['username'])) : ?>
				<li><a href="?view=registro"><i class="fa fa-user"></i> Registrarse</a></li>
				<li><a href="?view=iniciar-sesion"><i class="fa fa-lock"></i> Iniciar Sesión</a></li>
				<?php else: ?>
				<li class="nombre-usuario"><a href=""><i class="fa fa-user"></i> Hola, <?php echo $_SESSION['username']; ?></a></li>
				<li><a href="func/cerrar-sesion.php"><i class="fa fa-lock"></i> Cerrar Sesión</a></li>
				<?php endif; ?>
			</ul>			

		</nav>

		<!-- Navegación móvil -->
		<div id="navegacion-movil">
			<a href="#menu" class="gatillo-menu"><i class="fa fa-reorder"></i> Menú</a>
		</div>

	</div>
</div>
</header>
<div class="limpiar"></div>
