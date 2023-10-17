<!-- Titlebar -->
<div id="titlebar" class="single">
    <div class="container">
        <div class="sixteen columns">
            <h2>Gestionar Empleos</h2>
            <nav id="breadcrumbs">
                <ul>
                    <li>Estás aquí:</li>
                    <li><a href="#">Inicio</a></li>
                    <li>Tablero de Empleos</li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<div class="container">
    <!-- Tabla de Empleos -->
    <div class="sixteen columns">
        <table class="manage-table responsive-table">
            <tr>
                <th><i class="fa fa-file-text"></i> Título</th>
                <th><i class="fa fa-calendar"></i> Fecha de Publicación</th>
                <th><i class="fa fa-calendar"></i> Fecha de Vencimiento</th>
                <th><i class="fa fa-user"></i> Solicitudes</th>
                <th></th>
            </tr>
            <?php
                $user_id = $_SESSION['user_id'];
                $query = "SELECT jobs.job_id, title, jobs.date_posted, closing_date, count(application_id) as cnt from jobs left join applications on jobs.job_id = applications.job_id where jobs.user_id = '$user_id'  group by title ";
                $result = $con->query($query);
                while($row = $result->fetch_assoc()) {
                    echo "
                        <tr>
                            <td class='title'><a href='#'>".$row['title']."</a></td>
                            <td>".date_format(date_create($row['date_posted']), "M d, Y")."</td>
                            <td>".date_format(date_create($row['closing_date']), "M d, Y")."</td>
                            <td class='centered'><a href='?view=manage-applications&job_id=".$row['job_id']."' class='button'>Mostrar (".$row['cnt'].")</a></td>
                            <td class='action'>
                                <a href='?view=update-job&job_id=".$row['job_id']."'><i class='fa fa-pencil'></i> Editar</a>
                                <a href='javascript:void(0);' class='delete'><i class='fa fa-remove'></i> Eliminar</a>
                            </td>
                        </tr>
                    ";
                }
            ?>
        </table>
    </div>
</div>

<!-- Eliminar empleo -->
<script src="scripts/noty.min.js"></script>
<script>
    $(document).ready(function(){
        $(".delete").click(function(){
            _this = $(this);
            var delete_actions = function() {
                href_del = _this.parent().children('a:first-child').attr('href');
                job_id = href_del.substr(href_del.lastIndexOf('job_id=') + 7);
                job_del_ele = _this.parents('tr');
                $.ajax({
                    url: "inc/views/employer/del-job.php",
                    type: "post",
                    dataType: "text",
                    data: {del: job_id},
                    success: function (res) {
                        if (res == 'success') {
                            job_del_ele.remove();
                            showNoty('success', '¡Empleo eliminado con éxito!');
                        } else {
                            showNoty('error', '¡Error al eliminar el empleo!');
                        }
                    }
                });
            };

            showNotyConfirm(delete_actions);
        });
    });

    function showNoty(type, content){
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
