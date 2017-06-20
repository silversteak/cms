            <div class="col-md-4">

          <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action = "search.php" method = "post">
                    <div class="input-group">
                        <input name="search" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button name = "submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form> <!-- form for search bar -->
                    <!-- /.input-group -->
                </div>



          <!-- Login -->
                <div class="well">
                    <h4>Login</h4>
                    <form method="post" action="includes/login.php" class="form-horizontal">
                      <div class="form-group">
                        <label for="username" class="col-sm-3 control-label">Username</label>
                        <div class="col-sm-9">
                          <input type="text" name = "username" class="form-control" id="inputEmail3" placeholder="Username">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="password" class="col-sm-3 control-label">Password</label>
                        <div class="col-sm-9">
                          <input type="password" class="form-control" id="inputPassword3" name="password" placeholder="Password">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> Remember me
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" name="login" class="btn btn-default">Sign in</button>
                        </div>
                      </div>
                    </form>
                    <!-- /.input-group -->
                </div>




                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                               <?php 

                                $query = "SELECT * FROM categories";
                                $select_all_categories_query = mysqli_query($connect,$query);

                                while($row = mysqli_fetch_assoc($select_all_categories_query)){
                                     $cat_title =  $row['cat_title'];
                                    $cat_id =  $row['cat_id'];
                                    
                                     echo "<li><a href='category.php?category=$cat_id;'>{$cat_title}</a></li>";
                                }

                                ?>




                               <!--  <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li> -->
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                        

                        <!-- will be used later
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div> -->
                        

                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
               
               <?php include "widget.php" ?>

            </div>