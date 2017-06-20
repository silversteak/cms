<?php include "includes/admin_header.php"; ?>
<?php include "includes/functions.php"; ?>

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
                        <small>Moderator</small>
                      </h1>
                    <div class="col-md-6">
 
                      <?php insertCategory(); ?>

                           
                      <form action="" method="post">
                          <div class="form-group">
                              <label for="cat_title">Add Category</label>
                              <input type="text" class="form-control" name="cat_title"><br>
                              <input class="btn btn-primary" type="submit" name="submit" value="Add Category"> 
                           </div>
                      </form>
                            
                              <!-- Editing the already Added -->
                              <?php 
                                  if(isset($_GET['edit'])){
                                    $edit_id = $_GET['edit'];

                                    include "edit_cat.php";
                                  }

                               ?>


                        </div>

                        <div class="col-md-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Categories</th>
                                        <th colspan="2">Modify</th>
                                    </tr>
                                </thead>
                                <tbody>
                      
                      <!-- Showing the Categories -->  
                      <?php  showCategory(); ?>           
                      
                              </tbody>  
                            </table>     

                        </div>

                       <!-- For Deleteing the Categories -->
                        <?php deleteCategory(); ?>


                        
                      

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

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


<?php include "includes/admin_footer.php"; ?>