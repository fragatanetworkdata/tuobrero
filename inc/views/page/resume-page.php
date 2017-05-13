<?php

    $resume_id = @$_GET['resume_id'];
    $result = $con->query("SELECT * from resumes where resume_id='$resume_id'");
    $resume = mysqli_fetch_array($result, MYSQLI_ASSOC);



?>


<!-- Titlebar
================================================== -->
<div id="titlebar" class="resume">
    <div class="container">
        <div class="ten columns">
            <div class="resume-titlebar">
                <img src="<?php echo $resume['link_img'] ?>" alt="">
                <div class="resumes-list-content">
                    <h4><?php echo $resume['name'] ?> <span><?php echo $resume['professional_title'] ?></span></h4>
                    <span class="icons"><i class="fa fa-map-marker"></i> <?php echo $resume['location'] ?></span>
                    <span class="icons"><a href="#"><i class="fa fa-link"></i> Website</a></span>
                    <span class="icons"><a href=""><i class="fa fa-envelope"></i> <?php echo $resume['email'] ?></a></span>
                    <div class="skills">
                        <?php
                        $skills = explode(',', $resume['skills']);
                        foreach($skills as $skill){
                            echo '<span>'.$skill.'</span>';  
                        }  
                        ?>
                    </div>
                    <div class="clearfix"></div>

                </div>
            </div>
        </div>


    </div>
</div>


<!-- Content
================================================== -->
<div class="container">
    <!-- Recent Jobs -->
    <div class="eight columns">
        <div class="padding-right">

            <?php echo nl2br($resume['content']); ?>

        </div>
    </div>


    <!-- Widgets -->
    <div class="eight columns">

        <h3 class="margin-bottom-10">Education</h3>

        <div><?php echo $resume['education']; ?></div>
        
        <div class="margin-top-30"></div>

        <h3 class="margin-bottom-10">Experience</h3>

        <div><?php echo $resume['experience']; ?></div>
    </div>

</div>
