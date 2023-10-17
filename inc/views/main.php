

<!-- Banner
================================================== -->
<div id="banner" style="background-image: url(images/banner-home-01.jpg)" class="parallax background" data-img-width="2000" data-img-height="1330" data-diff="400">
    <div class="container">
        <div class="sixteen columns">
            
            <div class="search-container">

                <!-- Form -->
                <h2>Buscar empleo</h2>
                <form action="?view=earch-jobs" method="POST">
                    <input name="query" type="text" placeholder="job title, company name or location" value=""/>
                    <button><i class="fa fa-search"></i></button>
                </form>
                


                
                <!-- Announce -->
                <div class="announce">
                   Tenemos Varias ofertas para tí
                </div>

            </div>

        </div>
    </div>
</div>



<!-- Content
================================================== -->

<!-- Icon Boxes -->
<div class="section-background top-0">
    <div class="container">

        <div class="one-third column">
            <div class="icon-box rounded alt">
                <i class="ln ln-icon-Folder-Add"></i>
                <h4>Add Resume</h4>
                <p>Pellentesque habitant morbi tristique senectus netus ante et malesuada fames ac turpis egestas maximus neque.</p>
            </div>
        </div>

        <div class="one-third column">
            <div class="icon-box rounded alt">
                <i class="ln ln-icon-Search-onCloud"></i>
                <h4>Busqueda de trabajo</h4>
                <p>Pellentesque habitant morbi tristique senectus netus ante et malesuada fames ac turpis egestas maximus neque.</p>
            </div>
        </div>

        <div class="one-third column">
            <div class="icon-box rounded alt">
                <i class="ln ln-icon-Business-ManWoman"></i>
                <h4>Buscar Grupo</h4>
                <p>Pellentesque habitant morbi tristique senectus netus ante et malesuada fames ac turpis egestas maximus neque.</p>
            </div>
        </div>

    </div>
</div>
<!-- Icon Boxes / End -->


<div class="container">
    
    <!-- Recent Jobs -->
    <div class="eleven columns">
    <div class="padding-right">
        <h3 class="margin-bottom-25">trabajos recientes</h3>
        <ul class="job-list">

            <?php
            $result = $con->query("SELECT * from jobs order by date_posted desc limit 5");

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

        <a href="?view=browse-jobs" class="button centered"><i class="fa fa-plus-circle"></i> Mas trabajos</a>
        <div class="margin-bottom-55"></div>
    </div>
    </div>

    <!-- Job Spotlight -->
    <div class="five columns">
        <h3 class="margin-bottom-5">Job Spotlight</h3>

        <!-- Navigation -->
        <div class="showbiz-navigation">
            <div id="showbiz_left_1" class="sb-navigation-left"><i class="fa fa-angle-left"></i></div>
            <div id="showbiz_right_1" class="sb-navigation-right"><i class="fa fa-angle-right"></i></div>
        </div>
        <div class="clearfix"></div>
        
        <!-- Showbiz Container -->
        <div id="job-spotlight" class="showbiz-container">
            <div class="showbiz" data-left="#showbiz_left_1" data-right="#showbiz_right_1" data-play="#showbiz_play_1" >
                <div class="overflowholder">

                    <ul>

                        <li>
                            <div class="job-spotlight">
                                <a href="#"><h4>Social Media: Advertising Coordinator <span class="part-time">Part-Time</span></h4></a>
                                <span><i class="fa fa-briefcase"></i> Mates</span>
                                <span><i class="fa fa-map-marker"></i> New York</span>
                                <span><i class="fa fa-money"></i> $20 / hour</span>
                                <p>As advertising & content coordinator, you will support our social media team in producing high quality social content for a range of media channels.</p>
                                <a href="job-page.html" class="button">Apply For This Job</a>
                            </div>
                        </li>

                        <li>
                            <div class="job-spotlight">
                                <a href="#"><h4>Prestashop / WooCommerce Product Listing <span class="freelance">Freelance</span></h4></a>
                                <span><i class="fa fa-briefcase"></i> King</span>
                                <span><i class="fa fa-map-marker"></i> London</span>
                                <span><i class="fa fa-money"></i> $25 / hour</span>
                                <p>Etiam suscipit tellus ante, sit amet hendrerit magna varius in. Pellentesque lorem quis enim venenatis pellentesque.</p>
                                <a href="job-page.html" class="button">Apply For This Job</a>
                            </div>
                        </li>

                        <li>
                            <div class="job-spotlight">
                                <a href="#"><h4>Logo Design <span class="freelance">Freelance</span></h4></a>
                                <span><i class="fa fa-briefcase"></i> Hexagon</span>
                                <span><i class="fa fa-map-marker"></i> Sydney</span>
                                <span><i class="fa fa-money"></i> $10 / hour</span>
                                <p>Proin ligula neque, pretium et ipsum eget, mattis commodo dolor. Etiam tincidunt libero quis commodo.</p>
                                <a href="job-page.html" class="button">Apply For This Job</a>
                            </div>
                        </li>


                    </ul>
                    <div class="clearfix"></div>

                </div>
                <div class="clearfix"></div>
            </div>
        </div>

    </div>
</div>
