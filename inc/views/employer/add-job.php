<!-- Barra de Título
================================================== -->
<div id="titlebar" class="single submit-page">
    <div class="container">

        <div class="sixteen columns">
            <h2><i class="fa fa-plus-circle"></i> Agregar Empleo</h2>
        </div>

    </div>
</div>


<script src="scripts/noty.min.js"></script>
<script>
    function showNoty(type,content){
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

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user_id = $_SESSION['user_id'];
        $title = $_POST['title'];
        $location = $_POST['location'];
        $job_type = $_POST['job_type'];
        $category = $_POST['category'];
        $description =  mysqli_real_escape_string($con, $_POST['description']);
        $date_posted = date_format(new DateTime(), 'Y-m-d H:i:s');;
        $closing_date = $_POST['closing_date'];
        $company = $_POST['company'];
        $url = $_POST['url'];
        $hours = $_POST['hours'];
        $rate = mysqli_real_escape_string($con, $_POST['rate']);
        $filled = 0;

        // $query = "INSERT INTO jobs (`user_id`, `title`, `location`, `job_type`, `category`, `description`, `date_posted`, `closing_date`, `company`, `url`, `hours`, `rate`, `filled`) VALUES ('$user_id', '$title', '$location', '$job_type', '$category', '$description', '$date_posted', '$closing_date', '$company', '$url', '$hours', '$rate', '$filled') ";

        // echo $query; 
        $con->query("INSERT INTO jobs (`user_id`, `title`, `location`, `job_type`, `category`, `description`, `date_posted`, `closing_date`, `company`, `url`, `hours`, `rate`, `filled`) VALUES ('$user_id', '$title', '$location', '$job_type', '$category', '$description', '$date_posted', '$closing_date', '$company', '$url', '$hours', '$rate', '$filled') ");
        if(($con->affected_rows)>0) echo "<script>showNoty('success', '¡Empleo agregado exitosamente!');</script>";
        else echo "<script>showNoty('error', '¡Error! ¡Fallo al agregar el empleo!');</script>";
    }
    
    

?>

<!-- Contenido
================================================== -->
<div class="container">

    <!-- Página de Envío -->
    <div class="sixteen columns">
        <div class="submit-page">
            <form method="post">
                <!-- Título -->
                <div class="form">
                    <h5>Título del Empleo</h5>
                    <input name="title" class="search-field" type="text" placeholder="" value=""/>
                </div>

                <!-- Ubicación -->
                <div class "form">
                    <h5>Ubicación</h5>
                    <input name="location" class="search-field" type="text" placeholder="p. ej. Londres" value=""/>
                    <!-- <p class="note">Deja esto en blanco si la ubicación no es importante</p> -->
                </div>

                <!-- Tipo de Empleo -->
                <div class="form">
                    <h5>Tipo de Empleo</h5>
                    <select name="job_type" data-placeholder="Tiempo Completo" class="chosen-select-no-single">
                        <option value="Tiempo Completo">Tiempo Completo</option>
                        <option value="Medio Tiempo">Medio Tiempo</option>
                        <option value="Pasantía">Pasantía</option>
                        <option value="Freelance">Freelance</option>
                    </select>
                </div>


                <!-- Elegir Categoría -->
                <div class="form">
                    <div class="select">
                        <h5>Categoría</h5>
                        <select name="category" data-placeholder="Elegir Categorías" class="chosen-select">
                            <option value="Desarrollador">Desarrollador</option>
                            <option value="Diseñador">Diseñador</option>
                            <option value="Gerente de Producto">Gerente de Producto</option>
                            <option value="Marketing">Marketing</option>
                            <option value="Ventas">Ventas</option>
                        </select>
                    </div>
                </div>

                <!-- Descripción -->
                <div class="form">
                    <h5>Descripción</h5>
                    <textarea name="description" class="WYSIWYG" name="summary" cols="40" rows="3" id="summary" spellcheck="true"></textarea>
                </div>

                <!-- Fecha de Cierre -->
                <div class="form">
                    <h5>Fecha de Cierre <span>(opcional)</span></h5>
                    <input name="closing_date" data-role="date" type="text" placeholder="aaaa-mm-dd">
                    <p class="note">Fecha límite para nuevos solicitantes.</p>
                </div>


                <!-- Detalles de la Compañía -->
                <div class="divider"><h3>Detalles de la Compañía</h3></div>

                <!-- Nombre de la Compañía -->
                <div class="form">
                    <h5>Nombre de la Compañía</h5>
                    <input name="company" type="text" placeholder="Ingresa el nombre de la compañía">
                </div>

                <!-- Sitio Web -->
                <div class="form">
                    <h5>Sitio Web <span>(opcional)</span></h5>
                    <input name="url" type="text" placeholder="http://">
                </div>
                

                <div class="form">
                    <h5>Horas <span>(opcional)</span></h5>
                    <input name="hours" type="text" placeholder="40h / semana">
                </div>

                <div class="form">
                    <h5>Tarifa <span>(opcional)</span></h5>
                    <input name="rate" type="text" placeholder="$110,000 – $130,000">
                </div>

                <div class="divider margin-top-0"></div>
                <input type="submit" class="button big" name="login" value="Agregar" />
                <!-- <a href="#" class="button big margin-top-5">Agregar <i class="fa fa-plus"></i></a> -->

            </form>
        </div>
    </div>

</div>
