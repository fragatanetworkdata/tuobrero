<!-- Barra de Título
================================================== -->
<div id="titlebar" class="single submit-page">
    <div class="container">

        <div class="sixteen columns">
            <h2><i class="fa fa-plus-circle"></i> Agregar Currículum</h2>
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

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $user_id = $_SESSION['user_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $title = $_POST['title'];
    $location = $_POST['location'];
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $url = $_POST['url'];
    $education = mysqli_real_escape_string($con, $_POST['education']);
    $experience = mysqli_real_escape_string($con, $_POST['experience']);
    $skills = $_POST['skills'];
    $date_posted = date_format(new DateTime(), 'Y-m-d H:i:s');

    $sql = "INSERT INTO resumes (user_id, name, email, professional_title, location, content, url, education, experience, skills, date_posted) VALUES ($user_id, '$name', '$email', '$title', '$location', '$description', '$url', '$education', '$experience', '$skills', '$date_posted')";

    if (!empty($_FILES["image"]['tmp_name'])){
        $image = $user_id.'_'.$_FILES["image"]['name'];
        $image_tmp = $_FILES["image"]['tmp_name'];
        move_uploaded_file($image_tmp, "images/candidate/" . $image);
        $link_img = "images/candidate/" . $image;
    }
    else {
        $link_img = "images/candidate/avatar-placeholder.png";
    }
    $sql = "INSERT INTO resumes (user_id, name, email, professional_title, location, content, url, education, experience, link_img, skills, date_posted) VALUES ($user_id, '$name', '$email', '$title', '$location', '$description', '$url', '$education', '$experience', '$link_img', '$skills', '$date_posted')";
    $con->query($sql);
    if(($con->affected_rows)>0) echo "<script>showNoty('success', 'Currículum agregado exitosamente');</script>";
    else echo "<script>showNoty('error', '¡Error! Fallo al agregar el currículum');</script>";
}

?>
<!-- Contenido
================================================== -->
<div class="container">

    <!-- Página de Envío -->
    <div class="sixteen columns">
        <div class="submit-page">

            <form method="post" enctype="multipart/form-data">
                <!-- Nombre -->
                <div class="form">
                    <h5>Tu Nombre</h5>
                    <input name="name" class="search-field" type="text" placeholder="Tu nombre completo" value=""/>
                </div>

                <!-- Correo Electrónico -->
                <div class="form">
                    <h5>Tu Correo Electrónico</h5>
                    <input name="email" class="search-field" type="text" placeholder="correo@example.com" value=""/>
                </div>

                <!-- Título Profesional -->
                <div class="form">
                    <h5>Título Profesional</h5>
                    <input name="title" class="search-field" type="text" placeholder="Ej. Desarrollador Web" value=""/>
                </div>

                <!-- Ubicación -->
                <div class="form">
                    <h5>Ubicación</h5>
                    <input name="location" class="search-field" type="text" placeholder="Ej. Londres, Reino Unido" value=""/>
                </div>

                <!-- Foto -->
                <div class="form">
                    <h5>Foto <span>(opcional)</span></h5>
                    <label class="upload-btn">
                        <input name="image" type="file" accept="image/*"/>
                        <i class="fa fa-upload"></i> Explorar
                    </label>
                    <span class="fake-input">Ningún archivo seleccionado</span>
                </div>

                <!-- Contenido del Currículum -->
                <div class="form">
                    <h5>Contenido del Currículum</h5>
                    <textarea name="description" class="WYSIWYG" cols="40" rows="3" id="summary" spellcheck="true"></textarea>
                </div>

                <!-- Agregar URL -->
                <div class="form with-line">
                    <h5>URL <span>(opcional)</span></h5>
                    <input name="url" class="search-field" type="text" placeholder="Ej. ejemplo.com" value=""/>
                </div>

                <!-- Educación -->
                <div class="form">
                    <h5>Educación <span>(opcional)</span></h5>
                    <textarea name="education" class="search-field" placeholder="Nombre de la Escuela" cols="30" rows="5"></textarea>
                </div>

                <!-- Experiencia -->
                <div class="form with-line">
                    <h5>Experiencia <span>(opcional)</span></h5>
                    <div class="form-inside">
                        <textarea name="experience" class="search-field" placeholder="Empleador" cols="30" rows="5"></textarea>
                    </div>
                </div>
                
                <!-- Habilidades -->
                <div class="form">
                    <h5>Habilidades </h5>
                    <input name="skills" class="search-field" type="text" placeholder="Ej. PHP, Redes Sociales, Gestión" value=""/>
                    <p class="note">Separa las etiquetas con comas, como habilidades o tecnologías requeridas para este trabajo.</p>
                </div>

                <div class="divider margin-top-0 padding-reset"></div>
                <input type="submit" class="button big" name="login" value="Agregar Currículum" />
            </form>
        </div>
    </div>

</div>
<script>
    $(document).ready(function(){
        $('input[type=file]').change(function(){
            var filename = $(this).val();
            var lastIndex = filename.lastIndexOf("\\");
            if (lastIndex >= 0) {
                filename = filename.substring(lastIndex + 1);
            }
            if (filename!="") $(".fake-input").html(filename);
            else $(".fake-input").html('Ningún archivo seleccionado');
        });
    });
</script>
