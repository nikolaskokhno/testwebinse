<?php  
 $connect = mysqli_connect("localhost", "root", "", "webinse");  
 $output = '';  
 $message = '';
 
 $query = "DELETE FROM tbl_webinse WHERE id = '".$_POST["user_id"]."'";

    if(mysqli_query($connect, $query)){
        $message = 'Data deleted';
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
        echo $output;
    }
 ?>
 