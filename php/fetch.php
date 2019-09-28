<?php  
 //fetch.php  
 $connect = mysqli_connect("localhost", "root", "", "webinse");  
 if(isset($_POST["user_id"]))  
 {  
      $query = "SELECT * FROM tbl_webinse WHERE id = '".$_POST["user_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>
 