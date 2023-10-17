<?php
    $job_id = @$_GET['job_id'];
    $result = $con->query("SELECT * from jobs where job_id='$job_id'");
    $job = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user_id = $_SESSION['user_id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $note = mysqli_real_escape_string($con, $_POST['note']);
        $date_posted = date_format(new DateTime(), 'Y-m-d H:i:s');

        $query = "INSERT INTO applications (`user_id`, `job_id`, `name`, `email`, `note`, `date_posted`) VALUES ('$user_id', '$job_id', '$name', '$email', '$note', '$date_posted')";
        $con->query($query);
    }
?>

<!-- Titlebar -->
<div id="titlebar">
    <div class="container">
        <div class="ten columns">
            <span><a href="browse-jobs.html"><?php echo $job['category'] ?></a></span>
            <h2><?php echo $job['title'] ?><span class="<?php echo $job['job_type'] ?>"><?php echo $job['job_type'] ?> </span></h2>
        </div>
    </div>
</div>

<!-- Contenido -->
<div class="container">
    <div class="eleven columns">
        <div class="padding-right">
            <!-- Información de la Empresa -->
            <div class="company-info">
                <img src="https://d30y9cdsu7xlg0.cloudfront.net/png/1017936-200.png" alt="">
                <div class="content">
                    <h4><?php echo $job['company'] ?></h4>
                    <span><a href="<?php echo $job['url'] ?>"><i class="fa fa-link"></i> Sitio web</a></span>
                </div>
                <div class="clearfix"></div>
            </div>
            <p>
                <?php echo nl2br($job['description']) ?>
            </p>
        </div>
    </div>

    <div class="five columns">
        <!-- Resumen -->
        <div class="widget">
            <h4>Resumen</h4>
            <div class="job-overview">
                <ul>
                    <li>
                        <i class="fa fa-map-marker"></i>
                        <div>
                            <strong>Ubicación:</strong>
                            <span><?php echo $job['location'] ?></span>
                        </div>
                    </li>
                    <li>
                        <i class="fa fa-user"></i>
                        <div>
                            <strong>Título del Trabajo:</strong>
                            <span><?php echo $job['title'] ?></span>
                        </div>
                    </li>
                    <li>
                        <i class="fa fa-clock-o"></i>
                        <div>
                            <strong>Horas:</strong>
                            <span><?php echo $job['hours'] ?></span>
                        </div>
                    </li>
                    <li>
                        <i class="fa fa-money"></i>
                        <div>
                            <strong>Tarifa:</strong>
                            <span><?php echo $job['rate'] ?></span>
                        </div>
                    </li>
                </ul>
                <a href="#small-dialog" class="popup-with-zoom-anim button">Solicitar Este Trabajo</a>
                <div id="small-dialog" class="zoom-anim-dialog mfp-hide apply-popup">
                    <div class="small-dialog-headline">
                        <h2>Solicitar Este Trabajo</h2>
                    </div>
                    <div class="small-dialog-content">
                        <form method="POST">
                            <input name="name" type="text" placeholder="Nombre Completo" value=""/>
                            <input name="email" type="text" placeholder="Correo Electrónico" value=""/>
                            <textarea name="note" placeholder="Tu mensaje / carta de presentación enviada al empleador"></textarea>
                            <div class="upload-info"><strong>Sube tu CV (opcional)</strong> <span>Tamaño máximo del archivo: 5MB</span></div>
                            <div class="clearfix"></div>
                            <label class="upload-btn">
                                <input type="file" multiple />
                                <i class="fa fa-upload"></i> Examinar
                            </label>
                            <span class="fake-input">Ningún archivo seleccionado</span>
                            <div class="divider"></div>
                            <button class="send">Enviar Solicitud</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
