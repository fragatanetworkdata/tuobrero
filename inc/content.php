<?php
	$temp = isset($_GET['view']) ? $_GET['view'] : '';
	
	switch ($temp) {
		case 'add-job':
		case 'manage-jobs':
		case 'update-job':
		case 'browse-resumes':
		case 'search-resumes':
		case 'manage-applications':
			include("views/employer/$temp.php");
			break;
		case 'add-resume':
		case 'browse-categories':
		case 'browse-jobs':
		case 'search-jobs':
		case 'manage-resumes':
		case 'update-resume':
			include("views/candidate/$temp.php");
			break;
		case 'job-page':
		case 'resume-page':
		case 'pricing-tables':
		case 'shortcodes':
		case 'contact':
			include("views/page/$temp.php");
			break;
		case 'login':
		case 'signup':
			include("views/account/$temp.php");
			break;			
		default:
			include("views/main.php");
			break;
	}


?>