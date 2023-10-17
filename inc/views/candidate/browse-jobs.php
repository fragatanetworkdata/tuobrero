<!-- Barra de Título
================================================== -->
<div id="titlebar">
    <div class="container">
        <div class="diez columnas">
            <h2>Todos los trabajos</h2>
        </div>

        <div class="seis columnas">
            <a href="?view=add-job" class="botón">Publicar un Trabajo, ¡Es Gratis!</a>
        </div>

    </div>
</div>

<?php
    $result = $con->query("SELECT * from jobs");
?>

<!-- Contenido
================================================== -->
<div class="container">
    <!-- Trabajos Recientes -->
    <div class="once columnas">
    <div class="padding-right">
        
        <form action="?view=search-jobs" method="POST" class="list-search">
            <button><i class="fa fa-search"></i></button>
            <input name="query" type="text" placeholder="título del trabajo, nombre de la empresa o ubicación" value=""/>
            <div class="clearfix"></div>
        </form>

        <ul class="lista-de-trabajo completa">
            
            <?php

            while($row = $result->fetch_assoc()) {
                echo '<li><a href="?view=job-page&job_id='.$row['job_id'].'">
                    <img src="http://www.vasterad.com/themes/workscout/images/job-list-logo-05.png" alt="">
                    <div contenido-de-lista-de-trabajo>
                        <h4>'.$row['title'].' <span class="'.$row['job_type'].'">'.$row['job_type'].'</span></h4>
                        <iconos-de-trabajo>
                            <span><i class="fa fa-briefcase"></i> '.$row['company'].'</span>
                            <span><i class="fa fa-map-marker"></i> '.$row['location'].'</span>
                            <span><i class="fa fa-money"></i> '.$row['rate'].'</span>
                        </iconos-de-trabajo>
                        
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
