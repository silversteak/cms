<?php include "includes/admin_header.php"; ?>

    <div id="wrapper">

       

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php"; ?>

       


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to the admin Section

                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1>
                      
                        
                       

                       <!--  <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol> -->
                   


                    </div>
                </div>
                <!-- /.row -->


                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-text fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                    <?php 
                                        
                                        $query = "SELECT *FROM posts";
                                        $select_all_posts = mysqli_query($connect, $query);

                                        $count_posts = mysqli_num_rows($select_all_posts);

                                        echo "<div class='huge'>$count_posts</div>";
                                        echo "<div>Posts</div>";

                                     ?>
                                    </div>
                                </div>
                            </div>
                            <a href="posts.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                     
                                     <?php 
                                        
                                        $query = "SELECT *FROM comments";
                                        $select_all_comments = mysqli_query($connect, $query);

                                        $count_comments = mysqli_num_rows($select_all_comments);

                                        echo "<div class='huge'>$count_comments</div>";
                                        echo "<div>Comments</div>";

                                     ?>
                                    
                                    </div>
                                </div>
                            </div>
                            <a href="comments.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                      
                                      <?php 
                                        
                                        $query = "SELECT *FROM users";
                                        $select_all_users = mysqli_query($connect, $query);

                                        $count_users = mysqli_num_rows($select_all_users);

                                        echo "<div class='huge'>$count_users</div>";
                                        echo "<div>Users</div>";

                                     ?>

                                    </div>
                                </div>
                            </div>
                            <a href="users.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        
                                    <?php 
                                        
                                        $query = "SELECT *FROM categories";
                                        $select_all_categories = mysqli_query($connect, $query);

                                        $count_category = mysqli_num_rows($select_all_categories);

                                        echo "<div class='huge'>$count_category</div>";
                                        echo "<div>Categories</div>";

                                     ?>

                                    </div>
                                </div>
                            </div>
                            <a href="admin_categories.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
    </div>
</div>
                <!-- /.row -->


                <?php 
                
                     $query = "SELECT *FROM posts WHERE post_status = 'published'";
                     $select_all_published_posts = mysqli_query($connect, $query);
                     $count_published_posts = mysqli_num_rows($select_all_published_posts);

                     $query = "SELECT *FROM posts WHERE post_status = 'draft'";
                     $select_all_draft_posts = mysqli_query($connect, $query);
                     $count_draft_posts = mysqli_num_rows($select_all_draft_posts);

                     $query = "SELECT *FROM comments WHERE comment_status = 'unapproved'";
                     $select_all_unapproved_comments = mysqli_query($connect, $query);
                     $unapproved_comments = mysqli_num_rows($select_all_unapproved_comments);

                     $query = "SELECT *FROM users WHERE user_role = 'subcriber'";
                     $select_all_subscribers = mysqli_query($connect, $query);
                     $subscribers_count = mysqli_num_rows($select_all_subscribers);


                 ?>

                <div class="row">
                     <script type="text/javascript">
                          google.charts.load('current', {'packages':['bar']});
                          google.charts.setOnLoadCallback(drawChart);

                          function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                              ['Data', 'Count'],

                              <?php 

                                    $element_text = ['All Posts', 'Active Posts', 'Draft Posts', 'Comments' , 'Unapproved Comments' ,'Users', 'User Subs', 'Categories' ];
                                    $element_count = [$count_posts, $count_published_posts, $count_draft_posts, $count_comments, $unapproved_comments , $count_users, $subscribers_count, $count_category];

                                    for($i= 0; $i< 8; $i++){

                                        echo "['{$element_text[$i]}'". "," . "{$element_count[$i]}],";
                                    }

                               ?>


                              //['Posts', 1000],
                              
                            ]);

                            var options = {
                              chart: {
                                title: 'Blog Performance',
                                subtitle: 'Posts, Comments, Categories: 2017-2018',
                              }
                            };

                            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                            chart.draw(data, google.charts.Bar.convertOptions(options));
                          }
                        </script>


                </div>
                    <div id="columnchart_material" style="width: auto; height: 500px;"></div>




            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


<?php include "includes/admin_footer.php"; ?>