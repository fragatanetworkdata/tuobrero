<!-- Titlebar
================================================== -->
<div id="titlebar" class="single">
    <div class="container">

        <div class="sixteen columns">
            <h2>Manage Jobs</h2>
            <nav id="breadcrumbs">
                <ul>
                    <li>You are here:</li>
                    <li><a href="#">Home</a></li>
                    <li>Job Dashboard</li>
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


        <table class="manage-table responsive-table">

            <tr>
                <th><i class="fa fa-file-text"></i> Title</th>
                <th><i class="fa fa-calendar"></i> Date Posted</th>
                <th><i class="fa fa-calendar"></i> Date Expires</th>
                <th><i class="fa fa-user"></i> Applications</th>
                <th></th>
            </tr>
            
            <?php
                $user_id = $_SESSION['user_id'];
                $query = "Select jobs.job_id, title, jobs.date_posted, closing_date, count(application_id) as cnt from jobs left join applications on jobs.job_id = applications.job_id where jobs.user_id='$user_id'  group by title ";
                // echo $query;
                $result = $con->query($query);
                while($row = $result->fetch_assoc()) {

                    echo "
                        <tr>
                            <td class='title'><a href='#'>".$row['title']."</a></td>
                            <td>".date_format(date_create($row['date_posted']), "M d, Y")."</td>
                            <td>".date_format(date_create($row['closing_date']), "M d, Y")."</td>
                            <td class='centered'><a href='?view=manage-applications&job_id=".$row['job_id']."' class='button'>Show (".$row['cnt'].")</a></td>
                            <td class='action'>
                                <a href='?view=update-job&job_id=".$row['job_id']."'><i class='fa fa-pencil'></i> Edit</a>
                                <a href='javascript:void(0);' class='delete'><i class='fa fa-remove'></i> Delete</a>
                            </td>
                        </tr>
                    ";
                }
            ?>
        

        </table>



    </div>

</div>
<!-- delete job-->
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
//                        console.log(res);
                        if (res == 'success') {job_del_ele.remove();showNoty('success', 'Delete job successfully!');}
                        else showNoty('error', 'Delete job failed!');
                    }
                });
            };

            showNotyConfirm(delete_actions);
        });
    });
    function showNoty(type,content){
        new Noty({
            text     : "<div align='center' style='padding:10px;font-size: 14px;'>"+content+"</div>",
            layout   : 'topCenter',
            theme    : 'mint',
            type     : type,
            timeout  : 2000,
            closeWith: ['click', 'button']
        }).show();
    }
    function showNotyConfirm(delete_actions){
        var n = new Noty({
            text: '<div align="center" style="padding:5px;font-size: 14px;">Do you want to continue?</div>',
            theme    : 'relax',
            layout  :'topCenter',
            type:   'alert',
            buttons: [
                Noty.button('YES', 'button', function () {
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