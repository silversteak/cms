<?php 

  if(isset($_GET['p_id'])){

    $p_id = $_GET['p_id'];
   
 
   
    $query = "SELECT * FROM posts where post_id = $p_id";
    $select_all_posts = mysqli_query($connect,$query);

    while($row = mysqli_fetch_assoc($select_all_posts)){
    $post_title =  $row['post_title'];
    $post_author = $row['post_author'];
    $post_date = $row['post_date']; 
    $post_img = $row['post_img'];
    $post_content = $row['post_content'];
    $post_status =  $row['post_status'];
    $post_category = $row['post_category_id'];
    $post_id = $row['post_id'];
    //$post_comments_count = $row['post_comments_count'];
    $post_tags = $row['post_tags'];



  }

}
?>

<?php

      if(isset($_POST['update'])){
    
      $post_title = $_POST['post_title'];
      $post_category_id = $_POST['post_category']; 
      $post_author = $_POST['post_author']; 
      $post_status = $_POST['post_status']; 
      $post_tags = $_POST['post_tags']; 
      $post_contents = $_POST['post_content']; 
      $post_date = date('d-m-y');
      $post_comments_count = 4;

      $post_img = $_FILES['post_img']['name'];
      $post_img_temp = $_FILES['post_img']['tmp_name']; 

       move_uploaded_file($post_img_temp, "../images/$post_img"); 

       if(empty($post_img)){
        $query = "SELECT *FROM posts WHERE post_id = $p_id";
        $select_image = mysqli_query($connect, $query);

        while ($row = mysqli_fetch_assoc($select_image)){
          $post_img = $row['post_img'];
        }
       }  

    
      $query = "UPDATE posts SET ";
      $query .="post_title = '$post_title', ";
      $query .="post_category_id = '$post_category_id', ";
      $query .="post_date = now(), ";
      $query .="post_author = '$post_author', ";
      $query .="post_status = '$post_status', ";
      $query .="post_tags = '$post_tags', ";
      $query .="post_content = '$post_contents', ";
      $query .="post_img = '$post_img' ";
      $query .="WHERE post_id = $p_id";  
      


      $edit_posts = mysqli_query($connect,$query);

      if(!$edit_posts){
        die ("query failed". mysqli_error($connect));
      }
      else
        header("Location: posts.php");
      
    }    

  ?>




<form action="" method="post" enctype="multipart/form-data">
  
  <div class="form-group">
    <label for="post_title">Post Title </label>
    <input value="<?php echo $post_title; ?>" type="text" required class="form-control" name="post_title">
  </div>
 
  <div class="form-group">
    <label for="post_category">Post Category</label><br>
      <select name='post_category' id=''>
        <?php 
             $query = "SELECT * FROM categories";
             $select_all_categories_admin = mysqli_query($connect,$query);

             while($row = mysqli_fetch_assoc($select_all_categories_admin)){
             $cat_id = $row['cat_id'];
             $cat_title =  $row['cat_title'];

             echo "<option value='$cat_id'>$cat_title</option>";
           }
         ?>
      </select>   
  </div>

  <div class="form-group">
    <label for="post_author">Post Author</label>
    <input value="<?php echo $post_author; ?>" type="text" required class="form-control" name="post_author">
  </div>
 
 <div class="form-group">
    <label for="post_status">Post Status</label>
    <input value="<?php echo $post_status; ?>" type="text" class="form-control" name="post_status"> 
  </div>

  <div class="form-group">
    <img width="100" src="../images/<?php echo $post_img; ?>">
    <input type="file" name="post_img">
  </div>
 
 <div class="form-group">
    <label for="post_tags">Post Tags</label> 
    <input value="<?php echo $post_tags; ?>" type="text" required class="form-control" name="post_tags">
  </div>

  <div class="form-group">
    <label for="post_content">Post Contents</label>
    <textarea cols="30" rows="10" required class="form-control" name="post_content"><?php echo $post_content; ?>
    </textarea> 
  </div>


  <button type="submit" name="update" class="btn btn-primary">Update POST</button>
</form>