<!-- Barra de Título
================================================== -->
<div id="titlebar" class="single submit-page">
    <div class="container">

        <div class="sixteen columns">
            <h2><i class="fa fa-plus-circle"></i> Editar Currículum</h2>
        </div>

    </div>
</div>


<script src="scripts/noty.min.js"></script>
<script>
    function showNoty(type, content) {
        new Noty({
            text: "<div align='center' style='padding:10px;font-size: 14px;'>" + content + "</div>",
            layout: 'topCenter',
            theme: 'mint',
            type: type,
            timeout: 2000,
            closeWith: ['click', 'button']
        }).show();
    }
</script>
<?php
    $resume_id = $_GET['resume_id'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

        if (!empty($_FILES["image"]['tmp_name'])) {
            $image = $user_id . '_' . $_FILES["image"]['name'];
            $image_tmp = $_FILES["image"]['tmp_name'];
            move_uploaded_file($image_tmp, "images/candidate/" . $image);
            $link_img = "images/candidate/" . $image;
            $sql = "UPDATE resumes SET name = '$name', email = '$email', professional_title = '$title', location = '$location', content = '$description', url = '$url', education = '$education', experience = '$experience', skills = '$skills', link_img = '$link_img', date_posted = '$date_posted' where resume_id = '$resume_id'";
        }
        else $sql = "UPDATE resumes SET name = '$name', email = '$email', professional_title = '$title', location = '$location', content = '$description', url = '$url', education = '$education', experience = '$experience', skills = '$skills', date_posted = '$date_posted' where resume_id = '$resume_id'";

//         echo $sql;
        $con->query($sql);
        if (($con->affected_rows) > 0) echo "<script>showNoty('success', 'Currículum actualizado exitosamente!');</script>";
        else echo "<script>showNoty('error', '¡Error! Fallo al actualizar el currículum!');</script>";
    }
    $result = $con->query("SELECT * from resumes where resume_id='$resume_id' and user_id = $_SESSION[user_id]");
    $resume = mysqli_fetch_array($result, MYSQLI_ASSOC);

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
                    <input name="name" class="search-field" type="text" placeholder="Tu nombre completo" value="<?php echo $resume['name'] ?>" />
                </div>

                <!-- Correo Electrónico -->
                <div class="form">
                    <h5>Tu Correo Electrónico</h5>
                    <input name="email" class="search-field" type="text" placeholder="correo@example.com" value="<?php echo $resume['email'] ?>" />
                </div>

                <!-- Título Profesional -->
                <div class="form">
                    <h5>Título Profesional</h5>
                    <input name="title" class="search-field" type="text" placeholder="p. ej. Desarrollador Web" value="<?php echo $resume['professional_title'] ?>" />
                </div>

                <!-- Ubicación -->
                <div class="form">
                    <h5>Ubicación</h5>
                    <input name="location" class="search-field" type="text" placeholder="p. ej. Londres, Reino Unido" value="<?php echo $resume['location'] ?>" />
                </div>

                <!-- Foto -->
                <div class="form">
                    <h5>Foto <span>(opcional)</span></h5>
                    <label class="upload-btn">
                        <input name="image" type="file" accept="image/*" />
                        <i class="fa fa-upload"></i> Examinar
                    </label>
                    <span class="fake-input">Ningún archivo seleccionado</span>
                    <span><img src="<?php echo $resume['link_img'] ?>" style="width: 100px; height: 100px;" alt=""></span>
                </div>

                <!-- Descripción -->
                <div class="form">
                    <h5>Contenido del Currículum</h5>
                    <textarea name="description" class="WYSIWYG" cols="40" rows="3" id="summary" spellcheck="true"><?php echo $resume['content'] ?></textarea>
                </div>

                <!-- Agregar URL -->
                <div class="form with-line">
                    <h5>URL <span>(opcional)</span></h5>
                    <input name="url" class="search-field" type="text" placeholder="p. ej. ejemplo.com" value="<?php echo $resume['url'] ?>" />
                </div>

                <!-- Educación -->
                <div class="form">
                    <h5>Educación <span>(opcional)</span></h5>
                    <!-- Agregar Educación -->
                    <textarea name="education" class="search-field" placeholder="Nombre de la Escuela" cols="30" rows="5"><?php echo $resume['education'] ?></textarea>
                </div>

                <!-- Experiencia -->
                <div class="form with-line">
                    <h5>Experiencia <span>(opcional)</span></h5>
                    <div class="form-inside">
                        <!-- Agregar Experiencia -->
                        <textarea name="experience" class="search-field" placeholder="Empleador" cols="30" rows="5"><?php echo $resume['experience'] ?></textarea>
                    </div>
                </div>

                <!-- Habilidades -->
                <div class="form">
                    <h5>Habilidades </span></h5>
                    <input name="skills" class="search-field" type="text" placeholder="p. ej. PHP, Redes Sociales, Gestión" value="<?php echo $resume['skills'] ?>" />
                    <p class="note">Separa las etiquetas con comas, como habilidades o tecnologías requeridas para este trabajo.</p>
                </div>

                <div class="divider margin-top-0 padding-reset"></div>
                <!-- <a href="#" class="button big margin-top-5">Vista Previa <i class="fa fa-arrow-circle-right"></i></a> -->
                <input type="submit" class="button big" name="login" value="Editar Currículum" />
            </form>
        </div>
    </div>

</div>

<script>
    $(document).ready(function(){
        $('input[type=file]').change(function(){
//            console.log($(this).val());//C:\fakepath\0013.jpg
            var filename = $(this).val();
            var lastIndex = filename.lastIndexOf("\\");
             if (lastIndex >= 0) {
                 filename = filename.substring(lastIndex + 1);
              }
            if (filename != "") $(".fake-input").html(filename);
            else $(".fake-input").html('Ningún archivo seleccionado');
        });
    });
</script>
