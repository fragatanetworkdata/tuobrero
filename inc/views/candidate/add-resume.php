<!-- Titlebar
================================================== -->
<div id="titlebar" class="single submit-page">
    <div class="container">

        <div class="sixteen columns">
            <h2><i class="fa fa-plus-circle"></i> Add Resume</h2>
        </div>

    </div>
</div>



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

//            for($j=0; $j < count($_FILES["image"]['name']); $j++){
//                echo $_FILES["image"]['tmp_name'][$j] . "\n";
//                move_uploaded_file($_FILES["upload"]["tmp_name"][$j],"upload/" . $_FILES["upload"]["name"][$j]);
//            }


            $sql = "INSERT INTO resumes (user_id, name, email, professional_title, location, content, url, education, experience, skills, date_posted) VALUES ($user_id, '$name', '$email', '$title', '$location', '$description', '$url', '$education', '$experience', '$skills', '$date_posted')";
            echo $sql;
            $con->query($sql);
        }

?>

<!-- Content
================================================== -->
<div class="container">

    <!-- Submit Page -->
    <div class="sixteen columns">
        <div class="submit-page">

            <form method="post" enctype="multipart/form-data">
                <!-- Name -->
                <div class="form">
                    <h5>Your Name</h5>
                    <input name="name" class="search-field" type="text" placeholder="Your full name" value=""/>
                </div>

                <!-- Email -->
                <div class="form">
                    <h5>Your Email</h5>
                    <input name="email" class="search-field" type="text" placeholder="mail@example.com" value=""/>
                </div>

                <!-- Title -->
                <div class="form">
                    <h5>Professional Title</h5>
                    <input name="title" class="search-field" type="text" placeholder="e.g. Web Developer" value=""/>
                </div>

                <!-- Location -->
                <div class="form">
                    <h5>Location</h5>
                    <input name="location" class="search-field" type="text" placeholder="e.g. London, UK" value=""/>
                </div>

                <!-- Logo -->
                <div class="form">
                    <h5>Photo <span>(optional)</span></h5>
                    <label class="upload-btn">
                        <input name="image[]" type="file" multiple />
                        <i class="fa fa-upload"></i> Browse
                    </label>
                    <span class="fake-input">No file selected</span>
                </div>

                <!-- Description -->
                <div class="form">
                    <h5>Resume Content</h5>
                    <textarea name="description" class="WYSIWYG" cols="40" rows="3" id="summary" spellcheck="true"></textarea>
                </div>


                <!-- Add URL -->
                <div class="form with-line">
                    <h5>URL <span>(optional)</span></h5>
                    <input name="url" class="search-field" type="text" placeholder="e.g. example.com" value=""/>
                </div>


                <!-- Education -->
                <div class="form">
                    <h5>Education <span>(optional)</span></h5>

                        <!-- Add Education -->
                            <textarea name="education" class="search-field" placeholder="School Name" cols="30" rows="5"></textarea>

                </div>


                <!-- Experience  -->
                <div class="form with-line">
                    <h5>Experience <span>(optional)</span></h5>
                    <div class="form-inside">

                        <!-- Add Experience -->
                            <textarea name="experience" class="search-field" placeholder="Employer" cols="30" rows="5"></textarea>

                    </div>
                </div>
                
                    <!-- Skills -->
                <div class="form">
                    <h5>Skills </span></h5>
                    <input name="skills" class="search-field" type="text" placeholder="e.g. PHP, Social Media, Management" value=""/>
                    <p class="note">Comma separate tags, such as required skills or technologies, for this job.</p>
                </div>

                <div class="divider margin-top-0 padding-reset"></div>
<!--                <a href="#" class="button big margin-top-5">Preview <i class="fa fa-arrow-circle-right"></i></a>-->
                <input type="submit" class="button big" name="login" value="Add Resume" />
            </form>
        </div>
    </div>

</div>