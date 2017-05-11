<!-- Titlebar
================================================== -->
<div id="titlebar">
    <div class="container">
        <div class="ten columns">
            <h2>All resumes </h2>
        </div>

        <div class="six columns">
            <a href="?view=add-resume" class="button">Post a Resume, It’s Free!</a>
        </div>

    </div>
</div>

<?php
    $result = $con->query("SELECT * from resumes");
?>


<!-- Content
================================================== -->
<div class="container">
    <!-- Recent Jobs -->
    <div class="eleven columns">
        <div class="padding-right">

            <form action="?view=search-resumes" method="post" class="list-search">
                <button><i class="fa fa-search"></i></button>
                <input name="query" type="text" placeholder="Search resumes . . ." value=""/>
                <div class="clearfix"></div>
            </form>

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

            <div class="pagination-container">
                <nav class="pagination">
                    <ul>
                        <li><a href="#" class="current-page">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li class="blank">...</li>
                        <li><a href="#">8</a></li>
                    </ul>
                </nav>

                <nav class="pagination-next-prev">
                    <ul>
                        <li><a href="#" class="prev">Previous</a></li>
                        <li><a href="#" class="next">Next</a></li>
                    </ul>
                </nav>
            </div>

        </div>
    </div>


</div>