<!-- Banner
================================================== -->
<div id="banner" style="background-image: url(images/banner-home-01.jpg)" class="parallax background" data-img-width="2000" data-img-height="1330" data-diff="400">
    <div class="container">
        <div class="sixteen columns">
            
            <div class="search-container">

                <!-- Formulario -->
                <h2>Buscar empleo</h2>
                <form action="?view=earch-jobs" method="POST">
                    <input name="query" type="text" placeholder="puesto de trabajo, nombre de la empresa o ubicación" value=""/>
                    <button><i class="fa fa-search"></i></button>
                </form>
                


                
                <!-- Anuncio -->
                <div class="announce">
                   Tenemos Varias ofertas para ti
                </div>

            </div>

        </div>
    </div>
</div>

<!-- Contenido
================================================== -->

<!-- Iconos -->
<div class="section-background top-0">
    <div class="container">

        <div class="one-third column">
            <div class="icon-box rounded alt">
                <i class="ln ln-icon-Folder-Add"></i>
                <h4>Agregar Currículum</h4>
                <p>La búsqueda de trabajo es un proceso, no un evento. Tómate tu tiempo y no desesperes.</p>
            </div>
        </div>

        <div class="one-third column">
            <div a class="icon-box rounded alt">
                <i class="ln ln-icon-Search-onCloud"></i>
                <h4>Búsqueda de Trabajo</h4>
                <p>Practica tus habilidades de entrevista para que puedas impresionar a los empleadores.</p>
            </div>
        </div>

        <div class="one-third column">
            <div class="icon-box rounded alt">
                <i class="ln ln-icon-Business-ManWoman"></i>
                <h4>Buscar Grupo</h4>
                <p>No tengas miedo de pedir ayuda a tus contactos o a un profesional de la búsqueda de empleo.</p>
            </div>
        </div>

    </div>
</div>
<!-- Iconos / Fin -->


<div class="container">
    
    <!-- Trabajos Recientes -->
    <div class="eleven columns">
    <div class="padding-right">
        <h3 class="margin-bottom-25">Trabajos Recientes</h3>
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

        <a href="?view=browse-jobs" class="button centered"><i class="fa fa-plus-circle"></i> Más Trabajos</a>
        <div class="margin-bottom-55"></div>
    </div>
    </div>

    <!-- Trabajo Destacado -->
    <div class="five columns">
        <h3 class="margin-bottom-5">Trabajo Destacado</h3>

        <!-- Navegación -->
        <div class="showbiz-navigation">
            <div id="showbiz_left_1" class="sb-navigation-left"><i class="fa fa-angle-left"></i></div>
            <div id="showbiz_right_1" class="sb-navigation-right"><i class="fa fa-angle-right"></i></div>
        </div>
        <div class="clearfix"></div>
        
        <!-- Contenedor Showbiz -->
        <div id="job-spotlight" class="showbiz-container">
            <div class="showbiz" data-left="#showbiz_left_1" data-right="#showbiz_right_1" data-play="#showbiz_play_1" >
                <div class="overflowholder">

                    <ul>

                        <li>
                            <div class="job-spotlight">
                                <a href="#"><h4>Coordinador de Publicidad en Redes Sociales <span class="part-time">Medio Tiempo</span></h4></a>
                                <span><i class="fa fa-briefcase"></i> Mates</span>
                                <span><i class="fa fa-map-marker"></i> Nueva York</span>
                                <span><i class="fa fa-money"></i> $20 / hora</span>
                                <p>Como coordinador de publicidad y contenido, apoyarás a nuestro equipo de redes sociales en la creación de contenido de alta calidad para diversos canales de medios.</p>
                                <a href="job-page.html" class="button">Solicitar Este Trabajo</a>
                            </div>
                        </li>

                        <li>
                            <div class="job-spotlight">
                                <a href="#"><h4>Listado de Productos Prestashop / WooCommerce <span class="freelance">Trabajo Freelance</span></h4></a>
                                <span><i class="fa fa-briefcase"></i> King</span>
                                <span><i class="fa fa-map-marker"></i> Londres</span>
                                <span><i class="fa fa-money"></i> $25 / hora</span>
                                <p>Etiam suscipit tellus ante, sit amet hendrerit magna varius in. Pellentesque lorem quis enim venenatis pellentesque.</p>
                                <a href="job-page.html" class="button">Solicitar Este Trabajo</a>
                            </div>
                        </li>

                        <li>
                            <div class="job-spotlight">
                                <a href="#"><h4>Diseño de Logotipo <span class="freelance">Trabajo Freelance</span></h4></a>
                                <span><i class="fa fa-briefcase"></i> Hexagon</span>
                                <span><i class="fa fa-map-marker"></i> Sídney</span>
                                <span><i class="fa fa-money"></i> $10 / hora</span>
                                <p>Proin ligula neque, pretium et ipsum eget, mattis commodo dolor. Et
