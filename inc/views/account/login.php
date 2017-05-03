<!-- Titlebar
================================================== -->
<div id="titlebar" class="single">
    <div class="container">

        <div class="sixteen columns">
            <h2>My Account</h2>
            <nav id="breadcrumbs">
                <ul>
                    <li>You are here:</li>
                    <li><a href="#">Home</a></li>
                    <li>My Account</li>
                </ul>
            </nav>
        </div>

    </div>
</div>


<!-- Content
================================================== -->

<?php
    // session_start();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username=$_POST['username'];
        $password=$_POST['password'];

        $result = $con->query("select * from users where password='$password' AND username='$username'");
        if ($result->num_rows == 1) {
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $_SESSION['username'] = $username; 
            $_SESSION['role'] = $row['role'];

            header("location: index.php"); 
        } else {
            echo "Username or Password is invalid";
        }
    }
    
    

?>

<!-- Container -->
<div class="container">

    <div class="my-account">


        <div class="tabs-container">
            <!-- Login -->
            <div class="tab-content">
                <form method="post" class="login">

                    <p class="form-row form-row-wide">
                        <label for="username">Username
                            <i class="ln ln-icon-Male"></i>
                            <input type="text" class="input-text" name="username" id="username" value="" />
                        </label>
                    </p>

                    <p class="form-row form-row-wide">
                        <label for="password">Password
                            <i class="ln ln-icon-Lock-2"></i>
                            <input class="input-text" type="password" name="password" id="password"/>
                        </label>
                    </p>

                    <p class="form-row">
                        <input type="submit" class="button border fw margin-top-10" name="login" value="Login" />

                        <label for="rememberme" class="rememberme">
                            <input name="rememberme" type="checkbox" id="rememberme" value="forever" /> Remember Me</label>
                    </p>

                    <p class="lost_password">
                        <a href="#" >Lost Your Password?</a>
                    </p>

                </form>
            </div>

        </div>
    </div>
</div>