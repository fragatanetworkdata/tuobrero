<!-- Barra de Título
================================================== -->
<div id="titlebar" class="single">
    <div class="container">

        <div class="sixteen columns">
            <h2>Mi Cuenta</h2>
            <nav id="breadcrumbs">
                <ul>
                    <li>Estás aquí:</li>
                    <li><a href="#">Inicio</a></li>
                    <li>Mi Cuenta</li>
                </ul>
            </nav>
        </div>

    </div>
</div>

<!-- Contenido
================================================== -->

<?php
    // session_start();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        $username = $_POST['username'];
        $password = $_POST['password'];

        $result = $con->query("select * from users where password='$password' AND username='$username'");
        if ($result->num_rows == 1) {
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $_SESSION['username'] = $username; 
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['role'] = (int) $row['role'];

            header("location: index.php"); 
        } else {
            echo "<div class='error'><h3>El nombre de usuario o la contraseña son inválidos</h3></div>";

        }
    }
?>

<!-- Contenedor -->
<div class="container">

    <div class="my-account">

        <div class="tabs-container">
            <!-- Inicio de Sesión -->
            <div class="tab-content">
                <form method="post" class="login">

                    <p class="form-row form-row-wide">
                        <label for="username">Nombre de Usuario
                            <i class="ln ln-icon-Male"></i>
                            <input type="text" class="input-text" name="username" id="username" value="" autofocus required/>
                        </label>
                    </p>

                    <p class="form-row form-row-wide">
                        <label for="password">Contraseña
                            <i class="ln ln-icon-Lock-2"></i>
                            <input class="input-text" type="password" name="password" id="password" required/>
                        </label>
                    </p>

                    <p class="form-row">
                        <input type="submit" class="button border fw margin-top-10" name="login" value="Iniciar Sesión" />

                        <label for="rememberme" class="rememberme">
                            <input name="rememberme" type="checkbox" id="rememberme" value="forever" /> Recordarme</label>
                    </p>

                    <p class="lost_password">
                        <a href="#" >¿Olvidaste Tu Contraseña?</a>
                    </p>

                </form>
            </div>

        </div>
    </div>
</div>
