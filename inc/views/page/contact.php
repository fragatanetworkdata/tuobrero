<!-- Titlebar -->
<div id="titlebar" class="single">
    <div class="container">
        <div class="sixteen columns">
            <h2>Contacto</h2>
            <nav id="breadcrumbs">
                <ul>
                    <li>Estás aquí:</li>
                    <li><a href="#">Inicio</a></li>
                    <li>Contacto</li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<!-- Contenido -->
<!-- Contenedor -->
<div class="container">
    <div class="sixteen columns">
        <h3 class="margin-bottom-20">Nuestra Oficina</h3>
        <!-- Google Maps -->
        <section class="google-map-container">
            <div id="googlemaps" class="google-map google-map-full"></div>
        </section>
        <!-- Google Maps / End -->
    </div>
</div>
<!-- Contenedor / End -->

<!-- Contenedor -->
<div class="container">
    <div class="eleven columns">
        <h3 class="margin-bottom-15">Formulario de Contacto</h3>
        <!-- Formulario de Contacto -->
        <section id="contact" class="padding-right">
            <!-- Mensaje de Éxito -->
            <mark id="message"></mark>
            <!-- Formulario -->
            <form method="post" name="contactform" id="contactform">
                <fieldset>
                    <div>
                        <label>Nombre:</label>
                        <input name="name" type="text" id="name" />
                    </div>
                    <div>
                        <label>Email: <span>*</span></label>
                        <input name="email" type="email" id="email" pattern="^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$" />
                    </div>
                    <div>
                        <label>Mensaje: <span>*</span></label>
                        <textarea name="comment" cols="40" rows="3" id="comment" spellcheck="true"></textarea>
                    </div>
                </fieldset>
                <div id="result"></div>
                <input type="submit" class="submit" id="submit" value="Enviar Mensaje" />
                <div class="clearfix"></div>
                <div class="margin-bottom-40"></div>
            </form>
        </section>
        <!-- Formulario de Contacto / End -->
    </div>
    <!-- Contenedor / End -->
    <!-- Barra lateral -->
    <div class="five columns">
        <!-- Información -->
        <h3 class="margin-bottom-10">Información</h3>
        <div class="widget-box">
            <p>Somos TuObrero, la mejor plataforma para encontrar trabajadores de construcción calificados.</p>
            <ul class="contact-informations">
                <li>Carrera 3 # 12-42</li>
                <li>Guateque, Boyacá, Colombia</li>
            </ul>
            <ul class="contact-informations second">
                <li><i class="fa fa-phone"></i> <p>+57 321 225 5277</p></li>
                <li><i class="fa fa-envelope"></i> <p><a class="__cf_email__" href="/cdn-cgi/l/email-protection" data-cfemail="bcd1ddd5d0fcd9c4ddd1ccd0d9a2dfd3d5">[email&#160;protected]</a></p></li>
                <li><i class="fa fa-globe"></i> <p><a href="http://www.tuobrero.com">www.tuobrero.com</a></p></li>
            </ul>
        </div>
        <!-- Redes Sociales -->
        <div class="widget margin-top-30">
            <h3 class="margin-bottom-5">Redes Sociales</h3>
            <ul class="social-icons">
                <li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
                <li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
                <li><a class="gplus" href="#"><i class="icon-gplus"></i></a></li>
                <li><a class="linkedin" href="#"><i class="icon-linkedin"></i></a></li>
            </ul>
            <div class="clearfix"></div>
            <div class="margin-bottom-50"></div>
        </div>
    </div>
</div>
<!-- Contenedor / End -->

<!-- Google Maps -->
<script src="scripts/jquery.gmaps.min.js"></script>
<script type="text/javascript">
    (function($){
        $(document).ready(function(){
            $('#googlemaps').gMap({
                maptype: 'ROADMAP',
                scrollwheel: false,
                zoom: 13,
                markers: [
                    {
                        address: 'Carrera 3 # 12-42, Guateque, Boyacá, Colombia', // Tu dirección aquí
                        html: '<strong>Nuestra Oficina</strong><br>Carrera 3 # 12-42, Guateque, Boyacá, Colombia',
                        popup: true,
                    }
                ],
            });
        });
    })(this.jQuery);
</script>
