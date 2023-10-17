<!-- Encabezado
================================================== -->
<header class="sticky-header">
<div class="container">
	<div class="sixteen columns">
	
		<!-- Logo -->
		<div id="logo">
			<h1><a href="?"><img src="images/logo.png" alt="TuObreo" /></a></h1>
		</div>

		<!-- Menú -->
		<nav id="navigation" class="menu">
			<ul id="responsive">

				<li><a href="" id="current">Inicio</a>
				</li>

				<li><a href="#">Páginas</a>
					<ul>
						<li><a href="?view=pagina-trabajo">Página de Trabajo</a></li>
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
						<li><a href="?view=navegar-trabajos">Navegar Trabajos</a></li>	
						<li><a href="?view=agregar-curriculum">Agregar Currículum</a></li>
						<li><a href="?view=gestionar-curriculums">Gestionar Currículums</a></li>
					</ul>
				</li>
				<?php elseif($role === 1)  : ?>

				<li><a href="#">Para Empleadores</a>
					<ul>
						<li><a href="?view=agregar-trabajo">Agregar Trabajo</a></li>
						<li><a href="?view=gestionar-trabajos">Gestionar Trabajos</a></li>
						<li><a href="?view=navegar-curriculums">Navegar Currículums</a></li>
					</ul>
				</li>
				<?php endif; ?>

			</ul>
	
			
			<ul class="float-right">
				<?php if(!isset($_SESSION['username'])) : ?>
				<li><a href="?view=registro"><i class="fa fa-user"></i> Registrarse</a></li>
				<li><a href="?view=inicio-sesion"><i class="fa fa-lock"></i> Iniciar Sesión</a></li>
				<?php else: ?>
				<li class="username"><a href=""><i class="fa fa-user"></i> Hola, <?php echo $_SESSION['username']; ?></a></li>
				<li><a href="func/logout.php"><i class="fa fa-lock"></i> Cerrar Sesión</a></li>
				<?php endif; ?>
			</ul>			

		</nav>

		<!-- Navegación Móvil -->
		<div id="mobile-navigation">
			<a href="#menu" class="menu-trigger"><i class="fa fa-reorder"></i> Menú</a>
		</div>

	</div>
</div>
</header>
<div class="clearfix"></div>
