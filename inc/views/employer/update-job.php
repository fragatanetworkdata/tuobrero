<!-- Titlebar
================================================== -->
<div id="titlebar" class="single submit-page">
    <div class="container">

        <div class="sixteen columns">
            <h2><i class="fa fa-pencil"></i> Update Job</h2>
        </div>

    </div>
</div>


<script src="scripts/noty.min.js"></script>
<script>
    function showNoty(type,content){
        new Noty({
            text     : "<div align='center' style='padding:10px;font-size: 14px;'>"+content+"</div>",
            layout   : 'topCenter',
            theme    : 'mint',
            type     : type,
            timeout  : 2000,
            closeWith: ['click', 'button']
        }).show();
    }
</script>
<?php
    
    $job_id = $_GET['job_id'];


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

        $query = "UPDATE jobs set user_id = '$user_id', title = '$title', location = '$location', job_type = '$job_type', category = '$category', description = '$description', date_posted = '$date_posted', closing_date = '$closing_date', company = '$company', url = '$url', hours = '$hours', rate = '$rate', filled = '$filled' where job_id='$job_id' ";

        // echo $query;
        $con->query($query);
        if(($con->affected_rows)>0) echo "<script>showNoty('success', 'Update job successfully!');</script>";
        else echo "<script>showNoty('error', 'Error! Update job failed!');</script>";

    }
    $result = $con->query("SELECT * from jobs where job_id='$job_id'");
    $job = mysqli_fetch_array($result, MYSQLI_ASSOC);

    

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
                    <input name="title" class="search-field" type="text" placeholder="" value="<?php echo $job["title"] ?>"/>
                </div>

                <!-- Location -->
                <div class="form">
                    <h5>Location</h5>
                    <input name="location" class="search-field" type="text" placeholder="e.g. London" value="<?php echo $job["location"] ?>"/>
    <!--                 <p class="note">Leave this blank if the location is not important</p> -->
                </div>

                <!-- Job Type -->
                <div class="form">
                    <h5>Job Type</h5>
                    <select name="job_type" data-placeholder="Full-Time" class="chosen-select-no-single" >
                        <option <?php if($job["job_type"] == 'Full-Time'){ echo("selected"); }?> value="Full-Time">Full-Time</option>
                        <option <?php if($job["job_type"] == 'Part-Time'){ echo("selected"); }?> value="Part-Time">Part-Time</option>
                        <option <?php if($job["job_type"] == 'Internship'){ echo("selected"); }?> value="Internship">Internship</option>
                        <option <?php if($job["job_type"] == 'Freelance'){ echo("selected"); }?> value="Freelance">Freelance</option>
                    </select>
                </div>


                <!-- Choose Category -->
                <div class="form">
                    <div class="select">
                        <h5>Category</h5>
                        <select name="category" data-placeholder="Choose Categories" class="chosen-select">
                            <option <?php if($job["category"] == 'Developer'){ echo("selected"); }?> value="Developer">Developer</option>
                            <option <?php if($job["category"] == 'Designer'){ echo("selected"); }?> value="Designer">Designer</option>
                            <option <?php if($job["category"] == 'Product Manager'){ echo("selected"); }?> value="Product Manager">Product Manager</option>
                            <option <?php if($job["category"] == 'Marketing'){ echo("selected"); }?> value="Marketing">Marketing</option>
                            <option <?php if($job["category"] == 'Sales'){ echo("selected"); }?> value="Sales">Sales</option>
                        </select>
                    </div>
                </div>

                <!-- Description -->
                <div class="form">
                    <h5>Description</h5>
                    <textarea name="description" class="WYSIWYG" name="summary" cols="40" rows="3" id="summary" spellcheck="true">
                        <?php echo $job["description"] ?>
                    </textarea>
                </div>

                <!-- TClosing Date -->
                <div class="form">
                    <h5>Closing Date <span>(optional)</span></h5>
                    <input name="closing_date" value="<?php echo $job["closing_date"] ?>" data-role="date" type="text" placeholder="yyyy-mm-dd">
                    <p class="note">Deadline for new applicants.</p>
                </div>


                <!-- Company Details -->
                <div class="divider"><h3>Company Details</h3></div>

                <!-- Company Name -->
                <div class="form">
                    <h5>Company Name</h5>
                    <input name="company" value="<?php echo $job["company"] ?>" type="text" placeholder="Enter the name of the company">
                </div>

                <!-- Website -->
                <div class="form">
                    <h5>Website <span>(optional)</span></h5>
                    <input name="url" value="<?php echo $job["url"] ?>"  type="text" placeholder="http://">
                </div>
                

                <div class="form">
                    <h5>Hours</span></h5>
                    <input name="hours" value="<?php echo $job["hours"] ?>" type="text" placeholder="40h / week">
                </div>

                <div class="form">
                    <h5>Rate</span></h5>
                    <input name="rate" value="<?php echo $job["rate"] ?>" type="text" placeholder="$110K – $130K">
                </div>




                <div class="divider margin-top-0"></div>
                <input type="submit" class="button big" name="login" value="Update" />
                <!-- <a href="#" class="button big margin-top-5">Add <i class="fa fa-plus"></i></a> -->

            </form>
        </div>
    </div>

</div>

