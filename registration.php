<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>


    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
    <?php 

        if(isset($_POST['submit'])){
            //echo "its awesome";
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['password'];

            if(!empty($email) && !empty($username) && !empty($password)){

            $email = mysqli_real_escape_string($connect, $email);
            $username = mysqli_real_escape_string($connect, $username);
            $password = mysqli_real_escape_string($connect, $password);
            
            $query = "SELECT user_randSalt FROM users";
            $select_randsalt_query = mysqli_query($connect, $query);

             if(!$select_randsalt_query){
                die ('Query Failed' .mysqli_error($connect)); 
            }
                 
                $row = mysqli_fetch_assoc($select_randsalt_query);
                $salt = $row['user_randSalt'];
                $password = crypt($password, $salt);

                $query = "INSERT INTO users (username, user_email, user_password, user_role) ";
                $query .= "VALUES('$username', '$email' , '$password', 'Subscriber')";
                
                $register_user_query = mysqli_query($connect, $query);
                if(!$register_user_query){
                    die ('Query Failed' .mysqli_error($connect));
                }
                
                $message = "Your account has been created";

                }

                else {
                    $message = "Fields cannat be empty";
                }

            }

            else{
                $message = "";
            }
        
            
                                                
             //$hashFormat = "$2y$10$";
             //$salt = "thisissomethingcrazy22characters";
            // $hashSalt = $hashFormat.$salt;
             //$password = crypt($password, $);

        //} 
 
     ?>
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                        
                        <h3 class="text-center"><?php echo $message ?></h3>
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
