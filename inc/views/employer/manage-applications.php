<!-- Titlebar
================================================== -->
<div id="titlebar" class="single">
    <div class="container">

        <div class="sixteen columns">
            <h2>Manage Applications</h2>
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



    <div class="eight columns">
        <!-- Select -->
        <select data-placeholder="Filter by status" class="chosen-select-no-single">
            <option value="">Filter by status</option>
            <option value="new">New</option>
            <option value="interviewed">Interviewed</option>
            <option value="offer">Offer extended</option>
            <option value="hired">Hired</option>
            <option value="archived">Archived</option>
        </select>
        <div class="margin-bottom-15"></div>
    </div>

    <div class="eight columns">
        <!-- Select -->
        <select data-placeholder="Newest first" class="chosen-select-no-single">
            <option value="">Newest first</option>
            <option value="name">Sort by name</option>
            <option value="rating">Sort by rating</option>
        </select>
        <div class="margin-bottom-35"></div>
    </div>


    <!-- Applications -->
    <div class="sixteen columns">
        <?php
                $job_id = $_GET['job_id'];
                $query = "Select * from applications where job_id ='$job_id'";
                // echo $query;
                $result = $con->query($query);
                while($row = $result->fetch_assoc()) {
                    $star_num = $row['rank'];
                    if($star_num==0) $star_alphabet='no';
                    else if($star_num==1) $star_alphabet='one';
                    else if($star_num==2) $star_alphabet='two';
                    else if($star_num==3) $star_alphabet='three';
                    else if($star_num==4) $star_alphabet='four';
                    else $star_alphabet='five';

                    echo '
                            <div class="application">
                                <div class="app-content">
                                    <div class="info">
                                        <img src="http://www.vasterad.com/themes/workscout/images/avatar-placeholder.png" alt="">
                                        <span>'.$row['name'].'</span>
                                        <ul>
                                            <li><a href="#"><i class="fa fa-file-text"></i> CV</a></li>
                                            <li><a href="mailto'.$row['email'].'"><i class="fa fa-envelope"></i> Contact</a></li>
                                        </ul>
                                    </div>

                                    <!-- Buttons -->
                                    <div class="buttons">
                                        <a href="#one-1" class="button gray app-link"><i class="fa fa-pencil"></i> Edit</a>
                                        <a href="#three-1" class="button gray app-link"><i class="fa fa-plus-circle"></i> Show Details</a>
                                    </div>
                                    <div class="clearfix"></div>

                                </div>

                                <!--  Hidden Tabs -->
                                <div class="app-tabs">

                                    <a href="#" class="close-tab button gray"><i class="fa fa-close"></i></a>

                                    <!-- First Tab -->
                                    <div class="app-tab-content" id="one-1" data-placeholder="'.$row['application_id'].'">

                                        <div class="select-grid">
                                            <select data-placeholder="Application Status" class="chosen-select-no-single">
                                                <option value="">Application Status</option>
                                                <option value="new">New</option>
                                                <option value="interviewed">Interviewed</option>
                                                <option value="offer">Offer extended</option>
                                                <option value="hired">Hired</option>
                                                <option value="archived">Archived</option>
                                            </select>
                                        </div>

                                        <div class="select-grid">
                                            <input type="number" min="1" max="5" placeholder="Rating (out of 5)">
                                        </div>

                                        <div class="clearfix"></div>
                                        <a href="javascript:void(0)" class="button margin-top-15 update-application">Save</a>
                                        <a href="javascript:void(0)" class="button gray margin-top-15 delete-application">Delete this application</a>

                                    </div>

                                     <!-- Second Tab -->
                                    <div class="app-tab-content"  id="two-1">
                                        <textarea placeholder="Private note regarding this application"></textarea>
                                        <a href="#" class="button margin-top-15">Add Note</a>
                                    </div>   

                                    <!-- third Tab -->
                                    <div class="app-tab-content"  id="three-1">
                                        <i>Full Name:</i>
                                        <span>'.$row['name'].'</span>

                                        <i>Email:</i>
                                        <span><a href="">'.$row['email'].'</a></a></span>

                                        <i>Message:</i>
                                        <span>'.$row['note'].' </span>
                                    </div>

                                </div>
                                
                                <!-- Footer -->
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
<script src="scripts/noty.min.js"></script>
<script>
    $(document).ready(function(){
        arr=['no','one','two','three','four','five'];
        $('.update-application').click(function(){
            application_status=$(this).parent().find('select').val();//get val app_sts
            star = $(this).parent().find('input[type=number]').val();//get val app_star
            application_id = $(this).parent().attr('data-placeholder');//get app_id
//            console.log(application_status,'  ',star,'  ',id);
            if((!star)&&(!application_status)) return;//empty
            star_show=$(this).parents('.application').find('.rating');//ele show star
            application_status_show=$(this).parents('.application').find('.fa-file-text-o').parent();//text show app_sts
//            console.log(application_status_show);
            $.ajax({
                url:"inc/views/employer/manage-application-ajax.php",
                type:"post",
                dataType:"text",
                data:{update:application_id,application_status:application_status,rank:star},
                success:function(res){
//                    console.log(res);
                    if(res=='success') {
                        if(star){
                            star_show.removeClass(star_show.attr('data-placeholder')+'-stars').addClass(arr[star]+'-stars');//rename class
                            star_show.attr('data-placeholder',arr[star]);
                        }
                        if(application_status)  application_status_show.html('<i class="fa fa-file-text-o"></i> '+application_status);//change text app_sts
                        showNoty('success', 'Update application successfully!');
                    }
                    else showNoty('error', 'Error! Update application failed!');

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
                        if (res == 'success')  {application_ele.remove();showNoty('success', 'Delete application successfully!');}
                        else showNoty('error', 'Error! Delete application failed!');


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