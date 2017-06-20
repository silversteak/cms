 <table class="table table-bordered table-hover">
                          <thead>
                            <tr>
                               <th>ID</th>
                               <th>Username</th>
                               <th>Password</th>
                               <th>First Name</th>
                               <th>Last Name</th>
                               <th>Email</th>
                               <th>Date of Birth</th>
                               <th>Image</th>
                               <th>Role</th>
                            </tr>
                          </thead>
                          <tbody>


<?php 
    $query = "SELECT * FROM users";
    $select_all_users = mysqli_query($connect,$query);

    while($row = mysqli_fetch_assoc($select_all_users)){
    $user_id = $row['user_id'];
    $username = $row['username'];
    //$user_title =  $row['user_title'];
    $user_password = $row['user_password'];
    $user_firstname = $row['user_firstname'];
    $user_email = $row['user_email'];
    $user_lastname = $row['user_lastname'];
    $user_role =  $row['user_role'];
    $user_image = $row['user_image'];
    $user_dob = $row['user_dob'];
    //$user_users_count = $row['user_users_count'];
    //$user_tags = $row['user_tags'];

    echo "<tr>";
    echo "<td>$user_id</td>";
    echo "<td>$username</td>";
    echo "<td>$user_password</td>";
    echo "<td>$user_firstname</td>";
    echo "<td>$user_lastname</td>";
    echo "<td>$user_email</td>";
    echo "<td>$user_dob</td>";
    
    echo "<td><img src='../images/$user_image' class = 'img-thumbnail' height= '50' width='150'</td>";
    echo "<td>$user_role</td>";
   


    
    

    
    echo "<td><a href='users.php?change_to_admin={$user_id}'>Admin</a></td>";
    echo "<td><a href='users.php?change_to_subscriber={$user_id}'>sSubscriber</a></td>";
    echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>";
    echo "<td><a href='users.php?source=edit_user&user_id={$user_id}'>Edit</a></td>";
    echo "</tr>";


    }
?>


                           <!--  <tr>
                              <td>10</td>
                              <td>Saksham</td>
                              <td>Learn Bootstrap</td>
                              <td>Bootstrap</td>
                              <td>On</td>
                              <td>Link</td>
                              <td>html,css</td>
                              <td>blah b;ah blah</td>
                              <td>11/12/17</td>
                            </tr>  -->

                          </tbody>
                        </table>


<?php 
    
   if(isset($_GET['change_to_admin'])){
    $approve_id = $_GET['change_to_admin'];

      $query = "UPDATE users SET user_role = 'Admin' WHERE user_id=$approve_id";
      $result = mysqli_query($connect, $query);
      
      if(!$result){
        die ('Query failed' .mysqli_error($connect));
                                  }
      else{
            echo "approved";
            header("Location: users.php");
           }
                                
}








    if(isset($_GET['change_to_subscriber'])){
    $unapprove_id = $_GET['change_to_subscriber'];

      $query = "UPDATE users SET user_role= 'Subcriber' WHERE user_id=$unapprove_id";
      $result = mysqli_query($connect, $query);
      
      if(!$result){
        die ('Query failed' .mysqli_error($connect));
                                  }
      else{
            echo "Unapproved";
            header("Location: users.php");
           }
                                
}










    if(isset($_GET['delete'])){
    $del_id = $_GET['delete'];

      $query = "DELETE FROM users WHERE user_id = $del_id";
      $result = mysqli_query($connect, $query);
      
      if(!$result){
        die ('Query failed' .mysqli_error($connect));
                                  }
      else{
            echo "Record Deleted!!!";
            header("Location: users.php");
           }
                                
}


 ?>