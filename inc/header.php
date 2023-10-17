<!-- Header
================================================== -->


<header class="sticky-header">
<div class="container">
	<div class="sixteen columns">
	
		<!-- Logo -->
		<div id="logo">
			<h1><a href="?"><img src="images/logo.png" alt="Work Scout" /></a></h1>
		</div>

		<!-- Menu -->
		<nav id="navigation" class="menu">
			<ul id="responsive">

				<li><a href="" id="current">Home</a>
				</li>

				<li><a href="#">Pages</a>
					<ul>
						<li><a href="?view=job-page">Job Page</a></li>
						<li><a href="?view=resume-page">Resume Page</a></li>
	
					</ul>
				</li>

				<?php
					session_start();
					$role = isset($_SESSION['role']) ? $_SESSION['role'] : "visitor";

				?>

				<?php if($role === 0) : ?>

		
				<li><a href="#">For Candidates</a>
					<ul>
						<li><a href="?view=browse-jobs">Browse Jobs</a></li>	
						<li><a href="?view=add-resume">Add Resume</a></li>
						<li><a href="?view=manage-resumes">Manage Resumes</a></li>
					</ul>
				</li>
				<?php elseif($role === 1)  : ?>

				<li><a href="#">For Employers</a>
					<ul>
						<li><a href="?view=add-job">Add Job</a></li>
						<li><a href="?view=manage-jobs">Manage Jobs</a></li>
						<li><a href="?view=browse-resumes">Browse Resumes</a></li>
					</ul>
				</li>
				<?php endif; ?>

			</ul>
	
			
			<ul class="float-right">
				<?php if(!isset($_SESSION['username'])) : ?>
				<li><a href="?view=signup"><i class="fa fa-user"></i> Sign Up</a></li>
				<li><a href="?view=login"><i class="fa fa-lock"></i> Log In</a></li>
				<?php else: ?>
				<li class="username"><a href=""><i class="fa fa-user"></i> Hi, <?php echo $_SESSION['username']; ?></a></li>
				<li><a href="func/logout.php"><i class="fa fa-lock"></i> Log Out</a></li>
				<?php endif; ?>
			</ul>			

		</nav>

		<!-- Navigation -->
		<div id="mobile-navigation">
			<a href="#menu" class="menu-trigger"><i class="fa fa-reorder"></i> Menu</a>
		</div>

	</div>
</div>
</header>
<div class="clearfix"></div>
