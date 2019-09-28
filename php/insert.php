<?php  
 $connect = mysqli_connect("localhost", "root", "", "webinse");  
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
      $first_name = mysqli_real_escape_string($connect, $_POST["first_name"]);  
      $second_name = mysqli_real_escape_string($connect, $_POST["second_name"]);
      $email = mysqli_real_escape_string($connect, $_POST["email"]);
      if($_POST["user_id"] != '')  
      {  
           $query = "  
           UPDATE tbl_webinse  
           SET first_name='$first_name',   
           second_name='$second_name',
           email ='$email'
           WHERE id='".$_POST["user_id"]."'";  
           $message = 'Data Updated';  
      }  
      else  
      {  
           $query = "  
           INSERT INTO tbl_webinse(first_name, second_name, email)  
           VALUES('$first_name', '$second_name', '$email');  
           ";  
           $message = 'Data Inserted';  
      }  
      if(mysqli_query($connect, $query))  
      {  
           $output .= '<label class="text-success">' . $message . '</label>';  
           $select_query = "SELECT * FROM tbl_webinse ORDER BY id DESC";  
           $result = mysqli_query($connect, $select_query);  
           $output .= '  
                <table class="table table-bordered">  
                     <tr>  
                        <th width="28%">First Name</th>
                        <th width="28%">Second Name</th>
                        <th width="28%">Email</th>
                        <th width="8%">Edit</th>
                        <th width="8%">Delete</th>  
                     </tr>  
           ';  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                          <td>' . $row["first_name"] . '</td>  
                          <td>' . $row["second_name"] . '</td>  
                          <td>' . $row["email"] . '</td>  
                          <td><input type="button" name="edit" value="Edit" id="' .$row["id"]. '" class="btn btn-info btn-xs edit_data"></td>
                        <td><input type="button" name="delete" value="Delete" id="' .$row["id"]. '" class="btn btn-danger btn-xs delete_data"></td>
                     </tr>  
                ';  
           }  
           $output .= '</table>';  
      }  
      echo $output;  
 }  
 ?>
 