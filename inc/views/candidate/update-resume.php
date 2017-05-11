<!-- Titlebar
================================================== -->
<div id="titlebar" class="single submit-page">
    <div class="container">

        <div class="sixteen columns">
            <h2><i class="fa fa-plus-circle"></i> Edit Resume</h2>
        </div>

    </div>
</div>



<?php
    $resume_id = $_GET['resume_id'];
    $result = $con->query("SELECT * from resumes where resume_id='$resume_id' and user_id = $_SESSION[user_id]");
    $resume = mysqli_fetch_array($result, MYSQLI_ASSOC);

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

        if (!empty($_FILES["image"]['tmp_name'])) {
            $image = $user_id.'_'.$_FILES["image"]['name'];
            $image_tmp = $_FILES["image"]['tmp_name'];
            move_uploaded_file($image_tmp, "images/candidate/" . $image);
            $link_img = "images/candidate/" . $image;
        }
        else {
            $link_img = "images/candidate/avatar-placeholder.png";
        }    


        $sql = "UPDATE resumes SET name = '$name', email = '$email', professional_title = '$title', location = '$location', content = '$description', url = '$url', education = '$education', experience = '$experience', skills = '$skills', link_img = '$link_img', date_posted = '$date_posted' where resume_id = '$resume_id'";
        // echo $sql;
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
                    <input name="name" class="search-field" type="text" placeholder="Your full name" value="<?php echo $resume['name'] ?>"/>
                </div>

                <!-- Email -->
                <div class="form">
                    <h5>Your Email</h5>
                    <input name="email" class="search-field" type="text" placeholder="mail@example.com" value="<?php echo $resume['email'] ?>"/>
                </div>

                <!-- Title -->
                <div class="form">
                    <h5>Professional Title</h5>
                    <input name="title" class="search-field" type="text" placeholder="e.g. Web Developer" value="<?php echo $resume['professional_title'] ?>"/>
                </div>

                <!-- Location -->
                <div class="form">
                    <h5>Location</h5>
                    <input name="location" class="search-field" type="text" placeholder="e.g. London, UK" value="<?php echo $resume['location'] ?>"/>
                </div>

                <!-- Logo -->
                <div class="form">
                    <h5>Photo <span>(optional)</span></h5>
                    <label class="upload-btn">
                        <input name="image" type="file" />
                        <i class="fa fa-upload"></i> Browse
                    </label>
                    <span class="fake-input">No file selected</span>
                </div>

                <!-- Description -->
                <div class="form">
                    <h5>Resume Content</h5>
                    <textarea name="description" class="WYSIWYG" cols="40" rows="3" id="summary" spellcheck="true"><?php echo $resume['content'] ?></textarea>
                </div>


                <!-- Add URL -->
                <div class="form with-line">
                    <h5>URL <span>(optional)</span></h5>
                    <input name="url" class="search-field" type="text" placeholder="e.g. example.com" value="<?php echo $resume['url'] ?>"/>
                </div>


                <!-- Education -->
                <div class="form">
                    <h5>Education <span>(optional)</span></h5>

                        <!-- Add Education -->
                            <textarea name="education" class="search-field" placeholder="School Name" cols="30" rows="5"><?php echo $resume['education'] ?></textarea>

                </div>


                <!-- Experience  -->
                <div class="form with-line">
                    <h5>Experience <span>(optional)</span></h5>
                    <div class="form-inside">

                        <!-- Add Experience -->
                            <textarea name="experience" class="search-field" placeholder="Employer" cols="30" rows="5"><?php echo $resume['experience'] ?></textarea>

                    </div>
                </div>
                
                    <!-- Skills -->
                <div class="form">
                    <h5>Skills </span></h5>
                    <input name="skills" class="search-field" type="text" placeholder="e.g. PHP, Social Media, Management" value="<?php echo $resume['skills'] ?>"/>
                    <p class="note">Comma separate tags, such as required skills or technologies, for this job.</p>
                </div>

                <div class="divider margin-top-0 padding-reset"></div>
<!--                <a href="#" class="button big margin-top-5">Preview <i class="fa fa-arrow-circle-right"></i></a>-->
                <input type="submit" class="button big" name="login" value="Edit Resume" />
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
            if (filename!="") $(".fake-input").html(filename);
            else $(".fake-input").html('No file selected');
        });
    });
</script>