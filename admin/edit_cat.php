 <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat_title">Edit Category</label>

                                        <?php //Edit categories
                                            if(isset($_GET['edit'])){
                                                $edit_id = $_GET['edit'];
                                                $query = "SELECT * FROM categories WHERE cat_id='$edit_id'";
                                                $select_categories_edit = mysqli_query($connect,$query);

                                                while($row = mysqli_fetch_assoc($select_categories_edit)){
                                                    $cat_id = $row['cat_id'];
                                                    $cat_title =  $row['cat_title']; 

                                         ?>

                                            <input type="text" class="form-control" name="cat_title" value= "<?php if(isset($cat_title)) echo $cat_title;?>">


                                         <?php } 
                                            }
                                         ?>


                                          <?php //Update Fields
                                            if(isset($_POST['update'])){
                                                //$update_id = $_POST['update'];
                                                $update_title = $_POST['cat_title'];

                                                  $query = "UPDATE categories SET cat_title ='$update_title' WHERE cat_id = $edit_id";
                                                  $result = mysqli_query($connect, $query);
                                                  
                                                  if(!$result){
                                                       die ('Query Failed' .mysqli_error($connect));
                                                    }
                                                     else{
                                                       echo "Updated!!!";
                                                       header("Location: admin_categories.php");
                                                    }
                                                  
                                                
                                            }


                                         ?>






                                    <!-- <input type="text" class="form-control" name="cat_title"><br> -->
                                    <br><input class="btn btn-primary" type="submit" name="update" value="Edit Category"> 
                                </div>
                            </form> 