<?php
 $connect = mysqli_connect("localhost", "root", "", "webinse");  
 $query = "SELECT * FROM tbl_webinse ORDER BY id DESC";  
 $result = mysqli_query($connect, $query);  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WEBINSE</title>
    <!-- default style -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- bootstrap cdn -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- font awesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css">
</head>
<body>
    
    <div class="container">
        <div class="table-responsive">

            <div class="btn-add text-right mt-3 mb-3">
                <span class="font-weight-bold">If you want to add data user click here ----></span>  
                <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning">Add</button>
            </div>

            <div id="employee_table">
                <table class="table table-bordered">
                    <tr>
                        <th width="28%">First Name</th>
                        <th width="28%">Second Name</th>
                        <th width="28%">Email</th>
                        <th width="8%">Edit</th>
                        <th width="8%">Delete</th>
                    </tr>
                    <?php while($row = mysqli_fetch_array($result)){ ?>

                    <tr>
                        <td> <?php echo $row["first_name"] ?> </td>
                        <td> <?php echo $row["second_name"] ?> </td>
                        <td> <?php echo $row["email"] ?> </td>
                        <td><input type="button" name="edit" value="Edit" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs edit_data"></td>
                        <td><input type="button" name="delete" value="Delete" id="<?php echo $row["id"]; ?>" class="btn btn-danger btn-xs delete_data"></td>
                    </tr>

                    <?php } ?>
                </table>
            </div>

        </div>
    </div>

    <!-- Modal add window -->

    <div id="add_data_Modal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content"> 
                <div class="modal-header">
                    <h4 class="modal-title">Create new data user</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="post" id="insert_form">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control first_name" id="first_name" name="first_name" placeholder="Enter first name">
                        </div>
                
                        <div class="form-group">
                            <label for="">Second Name</label>
                            <input type="text" class="form-control second_name" id="second_name" name="second_name" placeholder="Enter second name">
                        </div>
                
                        <div class="form-group">
                            <label for="">Email user</label>
                            <input type="email" class="form-control email" id="email" name="email" placeholder="Enter email">
                        </div>
                        <div class="form-group text-right">
                            <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>                                            
                    </form>
                </div>          
            </div>
        </div>
    </div>

    <!-- jquery cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- bootstrap js -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- main js -->
    <script src="./js/main.js"></script>
</body>
</html>