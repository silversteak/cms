<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
    <!-- Navigation -->
<?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
<!-- 
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1> -->

                    <?php 


                        if(isset($_POST['submit'])){
                        
                            $search = $_POST['search'];

                            $query = "SELECT *FROM posts WHERE post_tags LIKE '%$search%' ";    
                            $search_query = mysqli_query($connect, $query);
                            
                                if(!$search_query){
                                    die ("query failed". mysqli_error($connect));
                                }

                            $count = mysqli_num_rows($search_query);

                                if($count == 0){

                                    echo "<h1> No Results</h1>";

                                }

                                    else{
                                        //echo "yippe";
                                    
                                       //$query = "SELECT * FROM posts";
                                        //$select_all_posts_query = mysqli_query($connect,$query);

                                        while($row = mysqli_fetch_assoc($search_query)){
                                          $post_title =  $row['post_title'];
                                          $post_author = $row['post_author'];
                                          $post_date = $row['post_date'];
                                          $post_img = $row['post_img'];
                                          $post_content = $row['post_content'];

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
                                            <img class="img-responsive" src="images/<?php echo $post_img ?>" alt="">
                                            <hr>
                                            <p><?php echo $post_content ?></p>
                                            <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                                            <hr>
                       

                 <?php 
                            }
                  
                        } 
                 }

                  ?>              
                    



                <!-- First Blog Post -->
                <!-- <<h2>
                    <a href="#">Blog Post Title</a>
                </h2>   
                <p class="lead">
                    by <a href="index.php">Start Bootstrap</a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on August 28, 2013 at 10:00 PM</p>
                <hr>
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, veritatis, tempora, necessitatibus inventore nisi quam quia repellat ut tempore laborum possimus eum dicta id animi corrupti debitis ipsum officiis rerum.</p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr> -->

                <!-- Second Blog Post 
                <h2>
                    <a href="#">Blog Post Title</a>
                </h2>
                <p class="lead">
                    by <a href="index.php">Start Bootstrap</a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on August 28, 2013 at 10:45 PM</p>
                <hr>
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, quasi, fugiat, asperiores harum voluptatum tenetur a possimus nesciunt quod accusamus saepe tempora ipsam distinctio minima dolorum perferendis labore impedit voluptates!</p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

                 Third Blog Post 
                <h2>
                    <a href="#">Blog Post Title</a>
                </h2>
                <p class="lead">
                    by <a href="index.php">Start Bootstrap</a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on August 28, 2013 at 10:45 PM</p>
                <hr>
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate, voluptates, voluptas dolore ipsam cumque quam veniam accusantium laudantium adipisci architecto itaque dicta aperiam maiores provident id incidunt autem. Magni, ratione.</p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

                   Pager 
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>
                  -->
            

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>

<?php include "includes/footer.php" ?>
