<?php 

  if(isset($_POST['submit'])){
    global $connect;
    
      //$user_id = $_POST['user_id'];
      $username= $_POST['username'];
      $user_password= $_POST['user_password'];

      $user_firstName = $_POST['user_firstName']; 
      $user_lastName = $_POST['user_lastName']; 
      $user_email = $_POST['user_email']; 
      $user_role = $_POST['user_role'];
      $user_dob = date('d-m-y');
      
      $user_image = $_FILES['user_image']['name'];
      $user_image_temp = $_FILES['user_image']['tmp_name']; 

            move_uploaded_file($user_image_temp, "../images/$user_image");   


            $username = mysqli_real_escape_string($connect, $username);
            $user_password = mysqli_real_escape_string($connect, $user_password);

             /*$hashFormat = "$2y$10$";
             $salt = "thisissomethingcrazy22characters";
             $hashSalt = $hashFormat.$salt;
             $user_password = crypt($user_password, $hashSalt);*/

    
      $query = "INSERT INTO users(username, user_password, user_firstName, user_lastName, user_dob, user_email, user_image, user_role) ";
      $query .= "VALUES ('$username', '$user_password', '$user_firstName' , '$user_lastName', now() , '$user_email', '$user_image', '$user_role')";

      $add_user = mysqli_query($connect,$query);

      if(!$add_user){
        die ("query failed". mysqli_error($connect));
      }
      else 
        header("Location: users.php");
      
    }    

 ?>


<form action="" method="post" enctype="multipart/form-data">
  
  <div class="form-group">
    <label for="post_title">Username</label>
    <input type="text" required class="form-control" name="username">
  </div>
   <div class="form-group">
    <label for="user_password">Password</label>
    <input type="password" required class="form-control" name="user_password">
  </div>

  <div class="form-group">
    <label for="user_firstName">First Name</label>
    <input type="text" required class="form-control" name="user_firstName">
  </div>

  <div class="form-group">
    <label for="user_lastName">Last Name</label>
    <input type="text" required class="form-control" name="user_lastName">
  </div>
 
 
 <div class="form-group">
    <label for="user_email">Email</label>
    <input type="email" class="form-control" name="user_email"> 
  </div>

  <div class="form-group">
    <label for="user_image">Image input</label>
    <input type="file" name="user_image">
    <p class="help-block">Example block-level help text here.</p>
  </div>
 
 <div class="form-group">
    <label for="user_role">User role</label> 
    <select required class="form-control" name="user_role">
        <option value='admin'>Admin</option>
        <option value="subscribe">Subscribe</option>
    </select> 
  </div>


  <button type="submit" name="submit" class="btn btn-primary">Create User </button>
</form>