<?php include "db.php"; ?>
<?php session_start(); ?>

<?php 

	if(isset($_POST['login'])){

	  $username = $_POST['username'];
	  $password = $_POST['password'];

	  $username = mysqli_real_escape_string($connect, $username);
        $password = mysqli_real_escape_string($connect, $password);

      $query = "SELECT *FROM users WHERE username = '$username' ";
      $select_user_query = mysqli_query($connect, $query);


	
      while($row = mysqli_fetch_assoc($select_user_query)){
      
      echo $user_id = $row['user_id'];
      echo $db_username= $row['username'];
      
      echo $user_password= $row['user_password'];

      echo $user_firstname = $row['user_firstname']; 
      echo $user_lastname = $row['user_lastname']; 
      echo $user_email = $row['user_email'];
      echo $user_role = $row['user_role']; 
      }

      $password = crypt($password, $user_password);
      if($username == $db_username && $password == $user_password){
      	
      	$_SESSION['username'] = $username;
            $_SESSION['user_id'] = $user_id;
      	$_SESSION['firstname'] = $user_firstname;
      	$_SESSION['lastname'] = $user_lastname;
      	$_SESSION['role'] = $user_role;


      	header("Location: ../admin");
      }

      else{
      	header("Location: ../index.php");
      }

      if(!$select_user_query){
      	die("Query FAiled". mysqli_error($connect)); 
      }
	
	}


 ?>
