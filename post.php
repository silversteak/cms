<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
    <!-- Navigation -->
<?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                    <?php 

                    if(isset($_GET['p_id'])){

                        $disp_post_id=$_GET['p_id'];

                    

                    $query = "SELECT * FROM posts WHERE post_id = $disp_post_id";
                    $select_all_posts_query = mysqli_query($connect,$query);

                    while($row = mysqli_fetch_assoc($select_all_posts_query)){
                      $post_title =  $row['post_title'];
                      $post_author = $row['post_author'];
                      $post_date = $row['post_date'];
                      $post_img = $row['post_img'];
                      $post_content = substr($row['post_content'], 0,100);

                      //echo "<h2><a href='#'>{$post_title}</a></h2>";
                    ?>

                        <h2>
                            <a href="#"><?php echo $post_title ?></a>
                        </h2>   
                        <p class="lead">
                            by <a href="index.php"><?php echo $post_author ?></a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span>&nbsp&nbsp<?php echo $post_date ?></p>
                        <hr>
                        <img class="img-responsive" width="900" height="300"  src="images/<?php echo $post_img ?>" alt="">
                        <hr>
                        <p><?php echo $post_content ?></p>
                        <!-- <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a> -->

                        <hr>
                       

                    <?php } 

                    } ?>

                    <!-- Blog Comments -->

                    <?php 

                        if(isset($_POST['create_comment'])){
                            
                            $disp_post_id=$_GET['p_id'];
                            $comment_author = $_POST['comment_author'];
                            $comment_email = $_POST['comment_email'];
                            $comment_content = $_POST['comment_content'];

                        $query = "INSERT INTO comments(comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date )";
                        $query .= "VALUES ($disp_post_id, '$comment_author', '$comment_email', '$comment_content', 'Unapproved', now() )";

                        $add_comment = mysqli_query($connect,$query);

                        if(!$add_comment){
                        die ("query failed". mysqli_error($connect));
                         }

                          $query = "UPDATE posts SET post_comments_count = post_comments_count + 1 ";
                          $query .= "WHERE post_id = $disp_post_id"; 
                          $update_comment = mysqli_query($connect,$query);
                          if(!$update_comment){
                            die ("query failed". mysqli_error($connect));
                         } 

                        }
                     ?>

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action="" method="post" role="form">
                        
                        <div class="form-group">
                            <input type="text" name="comment_author" required placeholder="Author" class="form-control" >
                        </div>

                        <div class="form-group">
                            <input type="Email" name="comment_email" required placeholder="Email" class="form-control" >
                        </div>

                        <div class="form-group">
                            <textarea required class="form-control" rows="3" name="comment_content"></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary" name="create_comment">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <?php 

                    $query = "SELECT *FROM comments WHERE comment_post_id = $disp_post_id ";
                    $query .= "AND comment_status = 'approved' ";
                    $query .= "ORDER BY comment_id DESC ";

                    $disp_comments = mysqli_query($connect, $query);

                    if(!$disp_comments){
                        die ("Query Failed". mysqli_error($connect));
                    }


                    while($row = mysqli_fetch_assoc($disp_comments)){
                        //$comment_id = $row['comment_id'];
                        //$comment_post_id = $row['comment_post_id'];
                        //$comment_title =  $row['comment_title'];
                        $comment_author = $row['comment_author'];
                        $comment_date = $row['comment_date'];
                        $comment_email = $row['comment_email'];
                        $comment_content = $row['comment_content'];
                        //$comment_status =  $row['comment_status'];



                 ?>

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author; ?>
                            <small><?php echo $comment_date ?></small>
                        </h4>
                        <?php echo $comment_content;  ?>                    

                    </div>
                </div>

            <?php } ?>
                              

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>

<?php include "includes/footer.php" ?>
