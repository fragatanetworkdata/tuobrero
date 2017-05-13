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
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $result = $con->query("select username from users where username = '$username'");
    if(mysqli_num_rows($result)==1) echo "<div class='error'><h3>Error! Duplicate user</h3></div>";
    else {
        $password = $_POST['password1'];
        $email = $_POST['email'];
        $usertype = (int) $_POST['user_type'];
        $sql = "insert into users (username, password, email, role) values('$username','$password','$email','$usertype') ";
        $insert = $con->query($sql);
        if($insert) echo '<div align="center"><h3><span style="color: #26ae61;">Signup successfully!</span> Click here to <a href="?view=login">log in</a></h3></div>';
        else echo '<div class="error">Something wrong!</div>';
    }
}
?>
<!-- Container -->
<div class="container">

    <div class="my-account">

            <!-- Register -->
            <div class="tab-content" id="tab2" style="display: none;">

                <form method="post" class="register">

                    <p class="form-row form-row-wide">
                        <label for="username2">Username:
                            <i class="ln ln-icon-Male"></i>
                            <input type="text" class="input-text" name="username" id="username2" value="" autofocus required/>
                        </label>
                    </p>

                    <p class="form-row form-row-wide">
                        <label for="email2">Email Address:
                            <i class="ln ln-icon-Mail"></i>
                            <input type="text" class="input-text" name="email" id="email2" value="" />
                        </label>
                    </p>

                    <p class="form-row form-row-wide">
                        <label for="password1">Password:
                            <i class="ln ln-icon-Lock-2"></i>
                            <input class="input-text" type="password" name="password1" id="password1" required/>
                        </label>
                    </p>

                    <p class="form-row form-row-wide">
                        <label for="password2">Repeat Password:
                            <i class="ln ln-icon-Lock-2"></i>
                            <input class="input-text" type="password" name="password2" id="password2" required/>
                        </label>
                        <span id="checkPasswordMatch"></span>
                    </p>

                    <p class="form-row form-row-wide">
                        <h5>User Type</h5>
                        <select name="user_type" data-placeholder="Candidate" class="chosen-select-no-single">
                            <option value="0">Candidate</option>
                            <option value="1">Employer</option>
                        </select>
                    </p>

                    <p class="form-row">
                        <input type="submit" class="button border fw margin-top-10" name="register" value="Register" />
                    </p>

                </form>
        </div>
    </div>
</div>
<!-- Handle validate password -->
<script>
    function checkPasswordMatch() {
        var password = $("#password1").val();
        var confirmPassword = $("#password2").val();
        if (confirmPassword=='') {$("#checkPasswordMatch").html("");return;}
        if (password != confirmPassword)
            $("#checkPasswordMatch").html("<small>Passwords do not match!</small>");
        else
            $("#checkPasswordMatch").html("<small>Passwords match!</small>");
    }
    $(document).ready(function(){
        $("#password2").keyup(checkPasswordMatch);
    });
</script>