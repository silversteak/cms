<?php 

 function insertCategory(){
    if(isset($_POST['submit'])){
        global $connect;

        $category = $_POST['cat_title'];
        $category = mysqli_real_escape_string($connect, $category);

          if($category == "" || empty($category)){
                echo "<h2>The field is empty</h2>";
          }
                                
          else{
              $query = "INSERT INTO categories(cat_title) VALUES ('$category')";
              $result =  mysqli_query($connect, $query);

              if(!$result){
                  die ('Query Failed' .mysqli_error($connect));
              }
              else{
                  echo "Category Added !!!";
               }
          }   

                              
    } 

 } 
  
function showCategory(){
    global $connect;
   $query = "SELECT * FROM categories";
    $select_all_categories_admin = mysqli_query($connect,$query);

    while($row = mysqli_fetch_assoc($select_all_categories_admin)){
    $cat_id = $row['cat_id'];
    $cat_title =  $row['cat_title']; 
                    
    echo "<tr>";
    echo "<td> {$cat_id} </td>";
    echo "<td> {$cat_title} </td>";
    echo "<td><a href='admin_categories.php?delete={$cat_id}'>Delete</a></td>";
    echo "<td><a href='admin_categories.php?edit={$cat_id}'>Edit</a></td>";
    echo "</tr>"; 
                         } 

}


function deleteCategory(){
    global $connect;
    if(isset($_GET['delete'])){
    $del_id = $_GET['delete'];

      $query = "DELETE FROM categories WHERE cat_id = $del_id";
                                  $result = mysqli_query($connect, $query);
      
      if(!$result){
        die ('Query failed' .mysqli_error($connect));
                                  }
      else{
            echo "Record Deleted!!!";
            header("Location: admin_categories.php");
           }
                                
}

}

 ?>