<?php
	$temp = isset($_GET['view']) ? $_GET['view'] : '';

	if($temp == 'add-job') 				include("main-content/employer/add-job.php");
	else if($temp == 'manage-jobs')  		include("main-content/employer/manage-jobs.php");
	else if($temp == 'browse-resumes') 		include("main-content/employer/browse-resumes.php");
	else if($temp == 'manage-applications')  include("main-content/employer/manage-applications.php");


	else if($temp == 'add-resume') 			include("main-content/candidate/add-resume.php");
	else if($temp == 'browse-categories') 	include("main-content/candidate/browse-categories.php");
	else if($temp == 'browse-jobs') 		include("main-content/candidate/browse-jobs.php");
	else if($temp == 'manage-resumes') 		include("main-content/candidate/manage-resumes.php");

	else if($temp == 'job-page') 			include("main-content/page/job-page.php");
	else if($temp == 'resume-page') 			include("main-content/page/resume-page.php");
	else if($temp == 'pricing-tables') 		include("main-content/page/pricing-tables.php");
	else if($temp == 'shortcodes') 			include("main-content/page/shortcodes.php");
	else if($temp == 'contact') 				include("main-content/page/contact.php");

	else if($temp == 'login') 				include("main-content/account/login.php");
	else if($temp == 'signup') 				include("main-content/account/signup.php");

	else if($temp == '') include("main-content/main.php");


?>