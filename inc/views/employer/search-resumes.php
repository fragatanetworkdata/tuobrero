<style>
    .resumes-list li, .resumes-list li:last-child {
        border: none;
    }

</style>


<?php
    $query = $_POST['query'];

    $result = $con->query("SELECT * from resumes where professional_title like '%$query%' or skills like '%$query%' ");

    $row_cnt = $result->num_rows;
?>



<!-- Titlebar
================================================== -->
<div id="titlebar">
    <div class="container">
        <div class="ten columns">
            <span>We've found <?php echo $row_cnt ?> <?php echo ($row_cnt==1)?"resume":"resumes" ?>  matching</span>
        </div>


    </div>
</div>


<!-- Content
================================================== -->
<div class="container">
    <!-- Recent Jobs -->
    <div class="eleven columns">
        <div class="padding-right">

            <ul class="resumes-list">
                <?php

                while($row = $result->fetch_assoc()) {
                    $skills = explode(',', $row['skills']);
                    echo '<li><a href="?view=resume-page&resume_id='.$row['resume_id'].'">
                        <img src="'.$row['link_img'].'" alt="">
                        <div class="resumes-list-content">
                            <h4>'.$row['name'].' <span>'.$row['professional_title'].'</span></h4>
                            <span><i class="fa fa-map-marker"></i> '.$row['location'].'</span>
                            <span><i class="fa fa-envelope"></i> '.$row['email'].'</span>    

                            <div class="skills">';

                    foreach($skills as $skill){
                        echo '<span>'.$skill.'</span>';  
                    }        
                    echo '</div>
                            <div class="clearfix"></div>

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