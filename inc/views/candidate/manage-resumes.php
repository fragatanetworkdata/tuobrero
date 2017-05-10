<!-- Titlebar
================================================== -->
<div id="titlebar" class="single">
    <div class="container">

        <div class="sixteen columns">
            <h2>Manage Resumes</h2>
            <nav id="breadcrumbs">
                <ul>
                    <li>You are here:</li>
                    <li><a href="#">Home</a></li>
                    <li>Candidate Dashboard</li>
                </ul>
            </nav>
        </div>

    </div>
</div>


<!-- Content
================================================== -->
<div class="container">

    <!-- Table -->
    <div class="sixteen columns">

        <p class="margin-bottom-25">Your resume can be viewed, edited or removed below.</p>

        <table class="manage-table resumes responsive-table">

            <tr>
                <th><i class="fa fa-user"></i> Name</th>
                <th><i class="fa fa-file-text"></i> Title</th>
                <th><i class="fa fa-map-marker"></i> Location</th>
                <th><i class="fa fa-calendar"></i> Date Posted</th>
                <th></th>
            </tr>

            <?php
            $user_id = $_SESSION['user_id'];
            $sql = "select resume_id,name, professional_title, location, date_posted from resumes where user_id='$user_id'";
            $result =  $con->query($sql);
            while($row = $result->fetch_assoc()){

            echo '
                <tr>
                    <td class="title"><a href="#">'.$row['name'].'</a></td>
                    <td>'.$row['professional_title'].'</td>
                    <td>'.$row['location'].'</td>
                    <td>'.date_format(date_create($row['date_posted']), "M d, Y").'</td>
                    <td class="action">
                        <a href="?view=update-resume&resume_id='.$row['resume_id'].'"><i class="fa fa-pencil"></i> Edit</a>
                        <a href="javascript:void(0)" class="hide"><i class="fa  fa-eye-slash"></i> Hide</a>
                        <a href="javascript:void(0)" class="delete"><i class="fa fa-remove"></i> Delete</a>
                    </td>
                </tr>
                ';
            }
            ?>

        </table>

        <br>

        <a href="?view=add-resume" class="button">Add Resume</a>

    </div>

</div>
<script>
    $(document).ready(function(){
        $(".delete").click(function(){
            href_del = $(this).parent().children('a:first-child').attr('href');
            resume_id = href_del.substr(href_del.lastIndexOf('resume_id=')+10);
            resume_del_ele = $(this).parents('tr');
            $.ajax({
                url:"inc/views/candidate/del-resume.php",
                type:"post",
                dataType:"text",
                data:{del:resume_id},
                success:function(res){
                    console.log(res);
                    if(res=='success') resume_del_ele.remove();
                }
            });
        });
        $(".hide").click(function(){
            $(this).parents('tr').remove();
        });
    });
</script>