<!-- Titlebar
================================================== -->
<div id="titlebar" class="single">
    <div class="container">
        <div class="sixteen columns">
            <h2>Gestionar Currículums</h2>
            <nav id="breadcrumbs">
                <ul>
                    <li>Estás aquí:</li>
                    <li><a href="#">Inicio</a></li>
                    <li>Panel de Candidato</li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<!-- Contenido
================================================== -->
<div class="container">
    <!-- Tabla -->
    <div class="sixteen columns">
        <p class="margin-bottom-25">Tu currículum se puede ver, editar o eliminar a continuación.</p>
        <table class="manage-table resumes responsive-table">
            <tr>
                <th><i class="fa fa-user"></i> Nombre</th>
                <th><i class="fa fa-file-text"></i> Título</th>
                <th><i class="fa fa-map-marker"></i> Ubicación</th>
                <th><i class="fa fa-calendar"></i> Fecha de Publicación</th>
                <th></th>
            </tr>
            <?php
            $user_id = $_SESSION['user_id'];
            $sql = "select resume_id, name, professional_title, location, date_posted from resumes where user_id='$user_id'";
            $result =  $con->query($sql);
            while($row = $result->fetch_assoc()) {
                echo '
                <tr>
                    <td class="title"><a href="#">'.$row['name'].'</a></td>
                    <td>'.$row['professional_title'].'</td>
                    <td>'.$row['location'].'</td>
                    <td>'.date_format(date_create($row['date_posted']), "M d, Y").'</td>
                    <td class="action">
                        <a href="?view=update-resume&resume_id='.$row['resume_id'].'"><i class="fa fa-pencil"></i> Editar</a>
                        <a href="javascript:void(0)" class="hide"><i class="fa  fa-eye-slash"></i> Ocultar</a>
                        <a href="javascript:void(0)" class="delete"><i class="fa fa-remove"></i> Eliminar</a>
                    </td>
                </tr>';
            }
            ?>
        </table>
        <br>
        <a href="?view=add-resume" class="button">Agregar Currículum</a>
    </div>
</div>
<script src="scripts/noty.min.js"></script>
<script>
    $(document).ready(function(){
        $(".delete").click(function(){
            _this=$(this);
            var delete_actions = function() {
                href_del = _this.parent().children('a:first-child').attr('href');
                resume_id = href_del.substr(href_del.lastIndexOf('resume_id=') + 10);
                resume_del_ele = _this.parents('tr');
                $.ajax({
                    url: "inc/views/candidate/del-resume.php",
                    type: "post",
                    dataType: "text",
                    data: {del: resume_id},
                    success: function (res) {
                        console.log(res);
                        if (res == 'success') {
                            resume_del_ele.remove();
                            showNoty('success', 'Currículum eliminado con éxito.');
                        } else {
                            showNoty('error', 'Error al eliminar el currículum.');
                        }
                    }
                });
            };
            showNotyConfirm(delete_actions);
        });
        $(".hide").click(function(){
            $(this).parents('tr').remove();
        });
    });
    function showNoty(type,content){
        new Noty({
            text: "<div align='center' style='padding:10px;font-size: 14px;'>"+content+"</div>",
            layout: 'topCenter',
            theme: 'mint',
            type: type,
            timeout: 2000,
            closeWith: ['click', 'button']
        }).show();
    }
    function showNotyConfirm(delete_actions){
        var n = new Noty({
            text: '<div align="center" style="padding:5px;font-size: 14px;">¿Deseas continuar?</div>',
            theme: 'relax',
            layout: 'topCenter',
            type: 'alert',
            buttons: [
                Noty.button('SÍ', 'button', function () {
                    n.close();
                    delete_actions();
                }),
                Noty.button('NO', 'button', function () {
                    n.close();
                })
            ],
            closeWith: ['click', 'button']
        }).show();
    }
</script>
