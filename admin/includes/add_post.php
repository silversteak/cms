<?php 

  if(isset($_POST['submit'])){
    
      $post_title = $_POST['post_title'];
      $post_category_id = $_POST['post_category']; 
      $post_author = $_POST['post_author']; 
      $post_status = $_POST['post_status']; 
      $post_tags = $_POST['post_tags']; 
      $post_contents = $_POST['post_content']; 
      $post_date = date('d-m-y');
      
      $post_img = $_FILES['post_img']['name'];
      $post_img_temp = $_FILES['post_img']['tmp_name']; 

            move_uploaded_file($post_img_temp, "../images/$post_img");   

    
      $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_img, post_content, post_tags, post_status) ";
      $query .= "VALUES ($post_category_id, '{$post_title}', '$post_author', now() , '$post_img', '$post_contents', '$post_tags', '$post_status')";

      $add_posts = mysqli_query($connect,$query);

      if(!$add_posts){
        die ("query failed". mysqli_error($connect));
      }
      else 
        header("Location: posts.php");
      
    }    

 ?>


<form action="" method="post" enctype="multipart/form-data">
  
  <div class="form-group">
    <label for="post_title">Post Title </label>
    <input type="text" required class="form-control" name="post_title">
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
    <input type="text" required class="form-control" name="post_author">
  </div>
 
 <div class="form-group">
    <label for="post_status">Post Status</label>
    <input type="text" class="form-control" name="post_status"> 
  </div>

  <div class="form-group">
    <label for="post_img">Image input</label>
    <input type="file" name="post_img">
    <p class="help-block">Example block-level help text here.</p>
  </div>
 
 <div class="form-group">
    <label for="post_tags">Post Tags</label> 
    <input type="text" required class="form-control" name="post_tags">
  </div>

  <div class="form-group">
    <label for="post_content">Post Contents</label>
    <textarea cols="30" rows="10" required class="form-control" name="post_content">
    </textarea> 
  </div>


  <button type="submit" name="submit" class="btn btn-primary">Publish POST</button>
</form>