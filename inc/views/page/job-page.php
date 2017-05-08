<?php

    $job_id = $_GET['job_id'];
    $result = $con->query("SELECT * from jobs where job_id='$job_id'");
    $job = mysqli_fetch_array($result, MYSQLI_ASSOC);

?>


<!-- Titlebar
================================================== -->
<div id="titlebar">
    <div class="container">
        <div class="ten columns">
            <span><a href="browse-jobs.html"><?php echo $job['category'] ?></a></span>
            <h2><?php echo $job['title'] ?><span class="<?php echo $job['job_type'] ?>"><?php echo $job['job_type'] ?> </span></h2>
        </div>



    </div>
</div>



<!-- Content
================================================== -->
<div class="container">

    <!-- Recent Jobs -->
    <div class="eleven columns">
        <div class="padding-right">

            <!-- Company Info -->
            <div class="company-info">
                <img src="https://d30y9cdsu7xlg0.cloudfront.net/png/1017936-200.png" alt="">
                <div class="content">
                    <h4><?php echo $job['company'] ?></h4>
                    <span><a href="<?php echo $job['url'] ?>"><i class="fa fa-link"></i> Website</a></span>

                </div>
                <div class="clearfix"></div>
            </div>

            <p>
                <?php echo nl2br($job['description']) ?>
            </p>

        </div>
    </div>


    <!-- Widgets -->
    <div class="five columns">

        <!-- Sort by -->
        <div class="widget">
            <h4>Overview</h4>

            <div class="job-overview">

                <ul>
                    <li>
                        <i class="fa fa-map-marker"></i>
                        <div>
                            <strong>Location:</strong>
                            <span><?php echo $job['location'] ?></span>
                        </div>
                    </li>
                    <li>
                        <i class="fa fa-user"></i>
                        <div>
                            <strong>Job Title:</strong>
                            <span><?php echo $job['title'] ?></span>
                        </div>
                    </li>
                    <li>
                        <i class="fa fa-clock-o"></i>
                        <div>
                            <strong>Hours:</strong>
                            <span><?php echo $job['hours'] ?></span>
                        </div>
                    </li>
                    <li>
                        <i class="fa fa-money"></i>
                        <div>
                            <strong>Rate:</strong>
                            <span><?php echo $job['rate'] ?></span>
                        </div>
                    </li>
                </ul>


                <a href="#small-dialog" class="popup-with-zoom-anim button">Apply For This Job</a>

                <div id="small-dialog" class="zoom-anim-dialog mfp-hide apply-popup">
                    <div class="small-dialog-headline">
                        <h2>Apply For This Job</h2>
                    </div>

                    <div class="small-dialog-content">
                        <form action="#" method="get" >
                            <input type="text" placeholder="Full Name" value=""/>
                            <input type="text" placeholder="Email Address" value=""/>
                            <textarea placeholder="Your message / cover letter sent to the employer"></textarea>

                            <!-- Upload CV -->
                            <div class="upload-info"><strong>Upload your CV (optional)</strong> <span>Max. file size: 5MB</span></div>
                            <div class="clearfix"></div>

                            <label class="upload-btn">
                                <input type="file" multiple />
                                <i class="fa fa-upload"></i> Browse
                            </label>
                            <span class="fake-input">No file selected</span>

                            <div class="divider"></div>

                            <button class="send">Send Application</button>
                        </form>
                    </div>

                </div>

            </div>

        </div>

    </div>
    <!-- Widgets / End -->


</div>

