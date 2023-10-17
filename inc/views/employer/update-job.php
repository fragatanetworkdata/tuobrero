<!-- Titlebar -->
<div id="titlebar" class="single submit-page">
    <div class="container">
        <div class="sixteen columns">
            <h2><i class="fa fa-pencil"></i> Actualizar Trabajo</h2>
        </div>
    </div>
</div>

<script src="scripts/noty.min.js"></script>
<script>
    function showNoty(type, content){
        new Noty({
            text     : "<div align='center' style='padding:10px;font-size: 14px;'>"+content+"</div>",
            layout   : 'topCenter',
            theme    : 'mint',
            type     : type,
            timeout  : 2000,
            closeWith: ['click', 'button']
        }).show();
    }
</script>

<?php
    $job_id = $_GET['job_id'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user_id = $_SESSION['user_id'];
        $title = $_POST['title'];
        $location = $_POST['location'];
        $job_type = $_POST['job_type'];
        $category = $_POST['category'];
        $description =  mysqli_real_escape_string($con, $_POST['description']);
        $date_posted = date_format(new DateTime(), 'Y-m-d H:i:s');
        $closing_date = $_POST['closing_date'];
        $company = $_POST['company'];
        $url = $_POST['url'];
        $hours = $_POST['hours'];
        $rate = mysqli_real_escape_string($con, $_POST['rate']);
        $filled = 0;

        $query = "UPDATE jobs SET user_id = '$user_id', title = '$title', location = '$location', job_type = '$job_type', category = '$category', description = '$description', date_posted = '$date_posted', closing_date = '$closing_date', company = '$company', url = '$url', hours = '$hours', rate = '$rate', filled = '$filled' WHERE job_id = '$job_id'";

        $con->query($query);

        if ($con->affected_rows > 0) {
            echo "<script>showNoty('success', '¡Trabajo actualizado con éxito!');</script>";
        } else {
            echo "<script>showNoty('error', '¡Error! No se pudo actualizar el trabajo.');</script>";
        }
    }

    $result = $con->query("SELECT * FROM jobs WHERE job_id = '$job_id'");
    $job = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>

<!-- Contenido -->
<div class="container">
    <!-- Página de Envío -->
    <div class="sixteen columns">
        <div class="submit-page">
            <form method="post">
                <!-- Título del Trabajo -->
                <div class="form">
                    <h5>Título del Trabajo</h5>
                    <input name="title" class="search-field" type="text" placeholder="" value="<?php echo $job["title"] ?>"/>
                </div>

                <!-- Ubicación -->
                <div class="form">
                    <h5>Ubicación</h5>
                    <input name="location" class="search-field" type="text" placeholder="Ejemplo: Madrid" value="<?php echo $job["location"] ?>"/>
                </div>

                <!-- Tipo de Trabajo -->
                <div class="form">
                    <h5>Tipo de Trabajo</h5>
                    <select name="job_type" data-placeholder="Tiempo Completo" class="chosen-select-no-single">
                        <option <?php if($job["job_type"] == 'Tiempo Completo') { echo("selected"); }?> value="Tiempo Completo">Tiempo Completo</option>
                        <option <?php if($job["job_type"] == 'Medio Tiempo') { echo("selected"); }?> value="Medio Tiempo">Medio Tiempo</option>
                        <option <?php if($job["job_type"] == 'Prácticas') { echo("selected"); }?> value="Prácticas">Prácticas</option>
                        <option <?php if($job["job_type"] == 'Freelance') { echo("selected"); }?> value="Freelance">Freelance</option>
                    </select>
                </div>

                <!-- Elija la Categoría -->
                <div class="form">
                    <div class="select">
                        <h5>Categoría</h5>
                        <select name="category" data-placeholder="Elige una Categoría" class="chosen-select">
                            <option <?php if($job["category"] == 'Desarrollador') { echo("selected"); }?> value="Desarrollador">Desarrollador</option>
                            <option <?php if($job["category"] == 'Diseñador') { echo("selected"); }?> value="Diseñador">Diseñador</option>
                            <option <?php if($job["category"] == 'Gerente de Producto') { echo("selected"); }?> value="Gerente de Producto">Gerente de Producto</option>
                            <option <?php if($job["category"] == 'Marketing') { echo("selected"); }?> value="Marketing">Marketing</option>
                            <option <?php if($job["category"] == 'Ventas') { echo("selected"); }?> value="Ventas">Ventas</option>
                        </select>
                    </div>
                </div>

                <!-- Descripción -->
                <div class="form">
                    <h5>Descripción</h5>
                    <textarea name="description" class="WYSIWYG" name="summary" cols="40" rows="3" id="summary" spellcheck="true">
                        <?php echo $job["description"] ?>
                    </textarea>
                </div>

                <!-- Fecha de Cierre -->
                <div class="form">
                    <h5>Fecha de Cierre <span>(opcional)</span></h5>
                    <input name="closing_date" value="<?php echo $job["closing_date"] ?>" data-role="date" type="text" placeholder="aaaa-mm-dd">
                    <p class="note">Fecha límite para nuevos solicitantes.</p>
                </div>

                <!-- Detalles de la Compañía -->
                <div class="divider"><h3>Detalles de la Compañía</h3></div>

                <!-- Nombre de la Compañía -->
                <div class="form">
                    <h5>Nombre de la Compañía</h5>
                    <input name="company" value="<?php echo $job["company"] ?>" type="text" placeholder="Ingrese el nombre de la compañía">
                </div>

                <!-- Sitio Web -->
                <div class="form">
                    <h5>Sitio Web <span>(opcional)</span></h5>
                    <input name="url" value="<?php echo $job["url"] ?>" type="text" placeholder="http://">
                </div>

                <div class="form">
                    <h5>Horas</h5>
                    <input name="hours" value="<?php echo $job["hours"] ?>" type="text" placeholder="40h/semana">
                </div>

                <div class="form">
                    <h5>Tarifa</h5>
                    <input name="rate" value="<?php echo $job["rate"] ?>" type="text" placeholder="$110,000 - $130,000">
                </div>

                <div class="divider margin-top-0"></div>
                <input type="submit" class="button big" name="login" value="Actualizar" />
            </form>
        </div>
    </div>
</div>
