<?php 
  
  if(isset($_GET['user_id'])){

    $user_id = $_GET['user_id'];

    $query = "SELECT * FROM users where user_id = $user_id";
    $select_particular_user = mysqli_query($connect,$query);

    while($row = mysqli_fetch_assoc($select_particular_user)){
      $username= $row['username'];
      $user_password= $row['user_password'];

      $user_firstName = $row['user_firstname']; 
      $user_lastName = $row['user_lastname']; 
      $user_email = $row['user_email']; 
      $user_role = $row['user_role'];
      $user_image = $row['user_image'];

  }


  }

 ?>


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

    
        if(empty($user_image)){
        $query = "SELECT *FROM users WHERE user_id = $user_id";
        $select_image = mysqli_query($connect, $query);

        while ($row = mysqli_fetch_assoc($select_image)){
          $user_image = $row['user_image'];
        }
       }  

    
      $query = "UPDATE users SET ";
      $query .="user_firstname = '$user_firstName', ";
      $query .="user_lastname = '$user_lastName', ";
      $query .="user_email = '$user_email', ";
      $query .="user_role = '$user_role', ";
      $query .="user_password = '$user_password', ";
      $query .="user_image = '$user_image' ";
      $query .="WHERE user_id = $user_id";  
      


      $edit_users = mysqli_query($connect,$query);

      if(!$edit_users){
        die ("query failed". mysqli_error($connect));
      }
      else
        header("Location: users.php");
    }

 ?>


<form action="" method="post" enctype="multipart/form-data">
  
  <!-- <div class="form-group">
    <label for="post_title">Username</label>
    <input type="text" required class="form-control" name="username">
  </div> -->
   

  <div class="form-group">
    <label for="user_firstName">First Name</label>
    <input type="text" required class="form-control" value="<?php echo $user_firstName ?>" name="user_firstName">
  </div>

  <div class="form-group">
    <label for="user_lastName">Last Name</label>
    <input type="text" required class="form-control" value="<?php echo $user_lastName ?>" name="user_lastName">
  </div>
 
 <div class="form-group">
    <label for="user_password">Password</label>
    <input type="password" required class="form-control" value="<?php echo $user_password ?>" name="user_password">
  </div>
 
 <div class="form-group">
    <label for="user_email">Email</label>
    <input type="email" class="form-control" value="<?php echo $user_email ?>" name="user_email"> 
  </div>

  <div class="form-group">
    <label for="user_image">Image input</label>
    <input type="file" name="user_image" src="../images/<?php echo $user_image; ?>">
    <p class="help-block">Example block-level help text here.</p>
  </div>
 
 <div class="form-group">
    <label for="user_role">User role</label> 
    <select required class="form-control" value="<?php echo $user_role ?>" name="user_role">
        <option value='admin'>Admin</option>
        <option value="subscribe">Subscribe</option>
    </select> 
  </div>


  <button type="submit" name="submit" class="btn btn-primary">Update User </button>
</form>