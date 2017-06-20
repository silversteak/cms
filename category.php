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

                    if(isset($_GET['category'])){
                        $disp_cat_id = $_GET['category'];
                    }

                    $query = "SELECT * FROM posts WHERE post_category_id = $disp_cat_id";
                    $select_all_posts_query = mysqli_query($connect,$query);

                    while($row = mysqli_fetch_assoc($select_all_posts_query)){
                      $post_id =  $row['post_id'];
                      $post_title =  $row['post_title'];
                      $post_author = $row['post_author'];
                      $post_date = $row['post_date'];
                      $post_img = $row['post_img'];
                      $post_content = substr($row['post_content'], 0,100);

                      //echo "<h2><a href='#'>{$post_title}</a></h2>";
                    ?>

                        <h2>
                            <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title ?></a>
                        </h2>   
                        <p class="lead">
                            by <a href="index.php"><?php echo $post_author ?></a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span>&nbsp&nbsp<?php echo $post_date ?></p>
                        <hr>
                        <a href="post.php?p_id=<?php echo $post_id; ?>"><img class="img-responsive" width="900" height="300"  src="images/<?php echo $post_img ?>" alt=""></a>
                        <hr>
                        <p><?php echo $post_content ?></p>
                        <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                        <hr>
                       

                    <?php }  ?>

                  

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>

<?php include "includes/footer.php" ?>
