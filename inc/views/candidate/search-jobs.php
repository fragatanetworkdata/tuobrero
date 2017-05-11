<style>
    .job-list li, .job-list li:last-child {
        border: none;
    }

</style>


<?php
    $query = $_POST['query'];

    $result = $con->query("SELECT * from jobs where title like '%$query%' or location like '%$query%' or company like '%$query%' ");

    $row_cnt = $result->num_rows;
?>


<!-- Titlebar
================================================== -->
<div id="titlebar">
    <div class="container">
        <div class="ten columns">
            <h2>We found <?php echo $row_cnt ?> <?php echo ($row_cnt==1)?"job":"jobs" ?> matching</h2>

        </div>


    </div>
</div>



<!-- Content
================================================== -->
<div class="container">
    <!-- Recent Jobs -->
    <div class="eleven columns">
    <div class="padding-right">

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

        


    </div>
    </div>




</div>