<!-- Titlebar
================================================== -->
<div id="titlebar" class="single submit-page">
    <div class="container">

        <div class="sixteen columns">
            <h2><i class="fa fa-plus-circle"></i> Add Job</h2>
        </div>

    </div>
</div>


<?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user_id = $_SESSION['user_id'];
        $title = $_POST['title'];
        $location = $_POST['location'];
        $job_type = $_POST['job_type'];
        $category = $_POST['category'];
        $description =  mysqli_real_escape_string($con, $_POST['description']);
        $date_posted = date_format(new DateTime(), 'Y-m-d H:i:s');;
        $closing_date = $_POST['closing_date'];
        $company = $_POST['company'];
        $url = $_POST['url'];
        $hours = $_POST['hours'];
        $rate = mysqli_real_escape_string($con, $_POST['rate']);
        $filled = 0;

        // $query = "INSERT INTO jobs (`user_id`, `title`, `location`, `job_type`, `category`, `description`, `date_posted`, `closing_date`, `company`, `url`, `hours`, `rate`, `filled`) VALUES ('$user_id', '$title', '$location', '$job_type', '$category', '$description', '$date_posted', '$closing_date', '$company', '$url', '$hours', '$rate', '$filled') ";

        // echo $query; 
        $con->query("INSERT INTO jobs (`user_id`, `title`, `location`, `job_type`, `category`, `description`, `date_posted`, `closing_date`, `company`, `url`, `hours`, `rate`, `filled`) VALUES ('$user_id', '$title', '$location', '$job_type', '$category', '$description', '$date_posted', '$closing_date', '$company', '$url', '$hours', '$rate', '$filled') ");
 
    }
    
    

?>

<!-- Content
================================================== -->
<div class="container">

    <!-- Submit Page -->
    <div class="sixteen columns">
        <div class="submit-page">
            <form method="post">
                <!-- Title -->
                <div class="form">
                    <h5>Job Title</h5>
                    <input name="title" class="search-field" type="text" placeholder="" value=""/>
                </div>

                <!-- Location -->
                <div class="form">
                    <h5>Location</h5>
                    <input name="location" class="search-field" type="text" placeholder="e.g. London" value=""/>
    <!--                 <p class="note">Leave this blank if the location is not important</p> -->
                </div>

                <!-- Job Type -->
                <div class="form">
                    <h5>Job Type</h5>
                    <select name="job_type" data-placeholder="Full-Time" class="chosen-select-no-single">
                        <option value="Full-Time">Full-Time</option>
                        <option value="Part-Time">Part-Time</option>
                        <option value="Internship">Internship</option>
                        <option value="Freelance">Freelance</option>
                    </select>
                </div>


                <!-- Choose Category -->
                <div class="form">
                    <div class="select">
                        <h5>Category</h5>
                        <select name="category" data-placeholder="Choose Categories" class="chosen-select">
                            <option value="Developer">Developer</option>
                            <option value="Designer">Designer</option>
                            <option value="Product Manager">Product Manager</option>
                            <option value="Marketing">Marketing</option>
                            <option value="Sales">Sales</option>
                        </select>
                    </div>
                </div>

                <!-- Description -->
                <div class="form">
                    <h5>Description</h5>
                    <textarea name="description" class="WYSIWYG" name="summary" cols="40" rows="3" id="summary" spellcheck="true"></textarea>
                </div>

                <!-- TClosing Date -->
                <div class="form">
                    <h5>Closing Date <span>(optional)</span></h5>
                    <input name="closing_date" data-role="date" type="text" placeholder="yyyy-mm-dd">
                    <p class="note">Deadline for new applicants.</p>
                </div>


                <!-- Company Details -->
                <div class="divider"><h3>Company Details</h3></div>

                <!-- Company Name -->
                <div class="form">
                    <h5>Company Name</h5>
                    <input name="company" type="text" placeholder="Enter the name of the company">
                </div>

                <!-- Website -->
                <div class="form">
                    <h5>Website <span>(optional)</span></h5>
                    <input name="url" type="text" placeholder="http://">
                </div>
                

                <div class="form">
                    <h5>Hours</span></h5>
                    <input name="hours" type="text" placeholder="40h / week">
                </div>

                <div class="form">
                    <h5>Rate</span></h5>
                    <input name="rate" type="text" placeholder="$110K – $130K">
                </div>




                <div class="divider margin-top-0"></div>
                <input type="submit" class="button big" name="login" value="Add" />
                <!-- <a href="#" class="button big margin-top-5">Add <i class="fa fa-plus"></i></a> -->

            </form>
        </div>
    </div>

</div>

