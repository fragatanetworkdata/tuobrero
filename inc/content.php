<?php
	$temp = isset($_GET['view']) ? $_GET['view'] : '';
	
	switch ($temp) {
		case 'agregar-empleo':
		case 'administrar-empleos':
		case 'actualizar-empleo':
		case 'explorar-curriculums':
		case 'buscar-curriculums':
		case 'administrar-solicitudes':
			include("vistas/empleador/$temp.php");
			break;
		case 'agregar-curriculum':
		case 'explorar-categorias':
		case 'explorar-empleos':
		case 'buscar-empleos':
		case 'administrar-curriculums':
		case 'actualizar-curriculum':
			include("vistas/candidato/$temp.php");
			break;
		case 'pagina-empleo':
		case 'pagina-curriculum':
		case 'tablas-de-precios':
		case 'acortadores':
		case 'contacto':
			include("vistas/pagina/$temp.php");
			break;
		case 'iniciar-sesion':
		case 'registro':
			include("vistas/cuenta/$temp.php");
			break;			
		default:
			include("vistas/principal.php");
			break;
	}
?>
