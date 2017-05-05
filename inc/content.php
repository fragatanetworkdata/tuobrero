<?php
	$temp = isset($_GET['view']) ? $_GET['view'] : '';
	
	if($temp == 'add-job') 				include("views/employer/add-job.php");
	else if($temp == 'manage-jobs')  		include("views/employer/manage-jobs.php");
	else if($temp == 'update-job')  		include("views/employer/update-job.php");
	else if($temp == 'browse-resumes') 		include("views/employer/browse-resumes.php");
	else if($temp == 'manage-applications')  include("views/employer/manage-applications.php");


	else if($temp == 'add-resume') 			include("views/candidate/add-resume.php");
	else if($temp == 'browse-categories') 	include("views/candidate/browse-categories.php");
	else if($temp == 'browse-jobs') 		include("views/candidate/browse-jobs.php");
	else if($temp == 'manage-resumes') 		include("views/candidate/manage-resumes.php");

	else if($temp == 'job-page') 			include("views/page/job-page.php");
	else if($temp == 'resume-page') 			include("views/page/resume-page.php");
	else if($temp == 'pricing-tables') 		include("views/page/pricing-tables.php");
	else if($temp == 'shortcodes') 			include("views/page/shortcodes.php");
	else if($temp == 'contact') 				include("views/page/contact.php");

	else if($temp == 'login') 				include("views/account/login.php");
	else if($temp == 'signup') 				include("views/account/signup.php");

	else if($temp == '') include("views/main.php");


?>