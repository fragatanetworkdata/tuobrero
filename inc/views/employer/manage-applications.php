<!-- Titlebar -->
<div id="titlebar" class="single">
    <div class="container">
        <div class="sixteen columns">
            <h2>Gestionar Solicitudes</h2>
            <nav id="breadcrumbs">
                <ul>
                    <li>Estás aquí:</li>
                    <li><a href="#">Inicio</a></li>
                    <li>Tablero de Trabajo</li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<div class="container">
    <div class="eight columns">
        <!-- Select para filtrar por estado -->
        <select data-placeholder="Filtrar por estado" class="chosen-select-no-single">
            <option value="">Filtrar por estado</option>
            <option value="new">Nuevo</option>
            <option value="interviewed">Entrevistado</option>
            <option value="offer">Oferta extendida</option>
            <option value="hired">Contratado</option>
            <option value="archived">Archivado</option>
        </select>
        <div class="margin-bottom-15"></div>
    </div>

    <div class="eight columns">
        <!-- Select para ordenar -->
        <select data-placeholder="Más reciente primero" class="chosen-select-no-single">
            <option value="">Más reciente primero</option>
            <option value="name">Ordenar por nombre</option>
            <option value="rating">Ordenar por calificación</option>
        </select>
        <div class="margin-bottom-35"></div>
    </div>

    <!-- Solicitudes -->
    <div class="sixteen columns">
        <?php
            $job_id = $_GET['job_id'];
            $query = "SELECT * FROM applications WHERE job_id ='$job_id'";
            $result = $con->query($query);
            while($row = $result->fetch_assoc()) {
                $star_num = $row['rank'];
                if($star_num == 0) $star_alphabet = 'no';
                else if($star_num == 1) $star_alphabet = 'one';
                else if($star_num == 2) $star_alphabet = 'two';
                else if($star_num == 3) $star_alphabet = 'three';
                else if($star_num == 4) $star_alphabet = 'four';
                else $star_alphabet = 'five';

                echo '
                    <div class="application">
                        <div class="app-content">
                            <div class="info">
                                <img src="http://www.vasterad.com/themes/workscout/images/avatar-placeholder.png" alt="">
                                <span>'.$row['name'].'</span>
                                <ul>
                                    <li><a href="#"><i class="fa fa-file-text"></i> CV</a></li>
                                    <li><a href="mailto:'.$row['email'].'"><i class="fa fa-envelope"></i> Contactar</a></li>
                                </ul>
                            </div>

                            <!-- Botones -->
                            <div class="buttons">
                                <a href="#one-1" class="button gray app-link"><i class="fa fa-pencil"></i> Editar</a>
                                <a href="#three-1" class="button gray app-link"><i class="fa fa-plus-circle"></i> Mostrar Detalles</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <!-- Pestañas Ocultas -->
                        <div class="app-tabs">
                            <a href="#" class="close-tab button gray"><i class="fa fa-close"></i></a>

                            <!-- Primera Pestaña -->
                            <div class="app-tab-content" id="one-1" data-placeholder="'.$row['application_id'].'">
                                <div class="select-grid">
                                    <select data-placeholder="Estado de la Solicitud" class="chosen-select-no-single">
                                        <option value="">Estado de la Solicitud</option>
                                        <option value="new">Nuevo</option>
                                        <option value="interviewed">Entrevistado</option>
                                        <option value="offer">Oferta extendida</option>
                                        <option value="hired">Contratado</option>
                                        <option value="archived">Archivado</option>
                                    </select>
                                </div>

                                <div class="select-grid">
                                    <input type="number" min="1" max="5" placeholder="Calificación (de 1 a 5)">
                                </div>
                                <div class="clearfix"></div>
                                <a href="javascript:void(0)" class="button margin-top-15 update-application">Guardar</a>
                                <a href="javascript:void(0)" class="button gray margin-top-15 delete-application">Eliminar esta solicitud</a>
                            </div>

                            <!-- Segunda Pestaña -->
                            <div class="app-tab-content" id="two-1">
                                <textarea placeholder="Nota privada sobre esta solicitud"></textarea>
                                <a href="#" class="button margin-top-15">Agregar Nota</a>
                            </div>

                            <!-- Tercera Pestaña -->
                            <div class="app-tab-content" id="three-1">
                                <i>Nombre completo:</i>
                                <span>'.$row['name'].'</span>
                                <i>Email:</i>
                                <span><a href="mailto:'.$row['email'].'">'.$row['email'].'</a></span>
                                <i>Mensaje:</i>
                                <span>'.$row['note'].'</span>
                            </div>
                        </div>

                        <!-- Pie de Página -->
                        <div class="app-footer">
                            <div class="rating '.$star_alphabet.'-stars" data-placeholder="'.$star_alphabet.'">
                                <div class="star-rating"></div>
                                <div class="star-bg"></div>
                            </div>

                            <ul>
                                <li><i class="fa fa-file-text-o"></i> '.$row['application_status'].'</li>
                                <li><i class="fa fa-calendar"></i> '.date_format(date_create($row['date_posted']), "M d, Y").'</li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                    </div>';
            }
        ?>
    </div>
</div>

<!-- Incluye el archivo noty.min.js -->

<script src="scripts/noty.min.js"></script>
<script>
    $(document).ready(function(){
        arr=['no','one','two','three','four','five'];
        $('.update-application').click(function(){
            application_status = $(this).parent().find('select').val();
            star = $(this).parent().find('input[type=number]').val();
            application_id = $(this).parent().attr('data-placeholder');
            
            if((!star) && (!application_status)) return; // No hacer nada si ambos están vacíos
            
            star_show = $(this).parents('.application').find('.rating');
            application_status_show = $(this).parents('.application').find('.fa-file-text-o').parent();
            
            $.ajax({
                url: "inc/views/employer/manage-application-ajax.php",
                type: "post",
                dataType: "text",
                data: {update: application_id, application_status: application_status, rank: star},
                success: function(res){
                    if(res == 'success') {
                        if(star) {
                            star_show.removeClass(star_show.attr('data-placeholder')+'-stars').addClass(arr[star]+'-stars');
                            star_show.attr('data-placeholder', arr[star]);
                        }
                        if(application_status) application_status_show.html('<i class="fa fa-file-text-o"></i> ' + application_status);
                        showNoty('success', '¡Solicitud actualizada con éxito!');
                    } else {
                        showNoty('error', '¡Error! No se pudo actualizar la solicitud.');
                    }
                }
            });
        });

        $('.delete-application').click(function(){
            _this = $(this);
            var delete_actions = function() {
                application_id = _this.parent().attr('data-placeholder');
                application_ele = _this.parents('.application');
                $.ajax({
                    url: "inc/views/employer/manage-application-ajax.php",
                    type: "post",
                    dataType: "text",
                    data: {del: application_id},
                    success: function (res) {
                        if (res == 'success')  {
                            application_ele.remove();
                            showNoty('success', '¡Solicitud eliminada con éxito!');
                        } else {
                            showNoty('error', '¡Error! No se pudo eliminar la solicitud.');
                        }
                    }
                });
            };
            showNotyConfirm(delete_actions);
        });
    });

    function showNoty(type, content){
        new Noty({
            text: "<div align='center' style='padding:10px;font-size: 14px;'>" + content + "</div>",
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
