
<!-- Titlebar
================================================== -->
<div id="titlebar">
    <div class="container">
        <div class="ten columns">
            <h2>All jobs</h2>
        </div>

        <div class="six columns">
            <a href="?view=add-job" class="button">Post a Job, It’s Free!</a>
        </div>

    </div>
</div>

<?php
    $result = $con->query("SELECT * from jobs");

?>



<!-- Content
================================================== -->
<div class="container">
    <!-- Recent Jobs -->
    <div class="eleven columns">
    <div class="padding-right">
        
        <form action="?view=search-jobs" method="POST" class="list-search">
            <button><i class="fa fa-search"></i></button>
            <input name="query" type="text" placeholder="job title, company name or location" value=""/>
            <div class="clearfix"></div>
        </form>

        <ul class="job-list full">
            
            <?php

            while($row = $result->fetch_assoc()) {
                echo '<li><a href="?view=job-page&job_id='.$row['job_id'].'">
                    <img src="http://www.vasterad.com/themes/workscout/images/job-list-logo-05.png" alt="">
                    <div class="job-list-content">
                        <h4>'.$row['title'].' <span class="'.$row['job_type'].'">'.$row['job_type'].'</span></h4>
                        <div class="job-icons">
                            <span><i class="fa fa-briefcase"></i> '.$row['company'].'</span>
                            <span><i class="fa fa-map-marker"></i> '.$row['location'].'</span>
                            <span><i class="fa fa-money"></i> '.$row['rate'].'</span>
                        </div>
                        
                    </div>
                    </a>
                    <div class="clearfix"></div>
                </li>';
            }

            ?>    
            
        </ul>

        
        <div class="clearfix"></div>


    </div>
    </div>




</div>