 <table class="table table-bordered table-hover">
                          <thead>
                            <tr>
                               <th>ID</th>
                               <th>Author</th>
                               <th>Comments</th>
                               <th>Email</th>
                               <th>Status</th>
                               <th>In Response to</th>
                               <th>Date</th>
                               <th colspan="4">Modify</th>
                            </tr>
                          </thead>
                          <tbody>


<?php 
    $query = "SELECT * FROM comments";
    $select_all_comments = mysqli_query($connect,$query);

    while($row = mysqli_fetch_assoc($select_all_comments)){
    $comment_id = $row['comment_id'];
    $comment_post_id = $row['comment_post_id'];
    //$comment_title =  $row['comment_title'];
    $comment_author = $row['comment_author'];
    $comment_date = $row['comment_date'];
    $comment_email = $row['comment_email'];
    $comment_content = $row['comment_content'];
    $comment_status =  $row['comment_status'];
    //$comment_comments_count = $row['comment_comments_count'];
    //$comment_tags = $row['comment_tags'];

    echo "<tr>";
    echo "<td>$comment_id</td>";
    echo "<td>$comment_author</td>";
    echo "<td>$comment_content</td>";
    
       /* $query = "SELECT * FROM categories WHERE cat_id=$comment_category_id";
          $select_categories_id = mysqli_query($connect,$query);

          while($row = mysqli_fetch_assoc($select_categories_id)){
          $cat_id = $row['cat_id'];
          $cat_title =  $row['cat_title']; 


    echo "<td>$cat_title</td>";
          } */

    echo "<td>$comment_email</td>";
    echo "<td>$comment_status</td>";
   
    $query = "SELECT *FROM posts WHERE post_id = $comment_post_id";
    $select_post_id_query = mysqli_query($connect,$query);
      while($row = mysqli_fetch_assoc($select_post_id_query)){
        $post_id = $row['post_id'];
        $post_title = $row['post_title'];
        echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
      }
    

    
    

    echo "<td>$comment_date</td>";
    echo "<td><a href='comments.php?approve={$comment_id}'>Approve</a></td>";
    echo "<td><a href='comments.php?unapprove={$comment_id}'>Unapprove</a></td>";
    echo "<td><a href='comments.php?delete={$comment_id}'>Delete</a></td>";
    //echo "<td><a href='comments.php?source=edit_comment&p_id={$comment_id}'>Edit</a></td>";
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
    
   if(isset($_GET['approve'])){
    $approve_id = $_GET['approve'];

      $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id=$approve_id";
      $result = mysqli_query($connect, $query);
      
      if(!$result){
        die ('Query failed' .mysqli_error($connect));
                                  }
      else{
            echo "approved";
            header("Location: comments.php");
           }
                                
}








    if(isset($_GET['unapprove'])){
    $unapprove_id = $_GET['unapprove'];

      $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id=$unapprove_id";
      $result = mysqli_query($connect, $query);
      
      if(!$result){
        die ('Query failed' .mysqli_error($connect));
                                  }
      else{
            echo "Unapproved";
            header("Location: comments.php");
           }
                                
}










    if(isset($_GET['delete'])){
    $del_id = $_GET['delete'];

      $query = "DELETE FROM comments WHERE comment_id = $del_id";
      $result = mysqli_query($connect, $query);
      
      if(!$result){
        die ('Query failed' .mysqli_error($connect));
                                  }
      else{
            echo "Record Deleted!!!";
            header("Location: comments.php");
           }
                                
}


 ?>