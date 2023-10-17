<?php
	$temp = isset($_GET['view']) ? $_GET['view'] : '';
	
	switch ($temp) {
		case 'agregar-empleo':
		case 'gestionar-empleos':
		case 'actualizar-empleo':
		case 'ver-curriculums':
		case 'buscar-curriculums':
		case 'gestionar-solicitudes':
			include("views/empleador/$temp.php");
			break;
		case 'agregar-curriculum':
		case 'ver-categorias':
		case 'ver-empleos':
		case 'buscar-empleos':
		case 'gestionar-curriculums':
		case 'actualizar-curriculum':
			include("views/candidato/$temp.php");
			break;
		case 'pagina-de-empleo':
		case 'pagina-de-curriculum':
		case 'tablas-de-precios':
		case 'shortcodes':
		case 'contacto':
			include("views/pagina/$temp.php");
			break;
		case 'iniciar-sesion':
		case 'registrarse':
			include("views/cuenta/$temp.php");
			break;			
		default:
			include("views/principal.php");
			break;
	}
?>
