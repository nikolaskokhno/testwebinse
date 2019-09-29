<html>
 <head>
  <title>WEBINSE</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 </head>
 <body>

    <div class="container">
        <div class="table-responsive">
            <h3 align="center">Table User Data Webinse</h3>
            <div align="right">
                <span class="font-weight-bold">If you can add data from table "WEBINSE" click here >>></span>
                <button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info btn-lg">Add</button>
            </div>
            <br /><br />
            <table id="user_data" class="table table-bordered table-striped">
                <thead>
                    <tr>
                    <th width="28%">First Name</th>
                    <th width="28%">Second Name</th>
                    <th width="28%">Email</th>
                    <th width="8%">Edit</th>
                    <th width="8%">Delete</th>
                    </tr>
                </thead>
            </table>   
        </div>
    </div>
   
    <!-- main js -->
   <script src="./js/main.js"></script>
 </body>
</html>

<div id="userModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" id="user_form" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add User</h4>
                </div>
                <div class="modal-body">
                    <label>Enter First Name</label>
                    <input type="text" pattern="[A-Za-zА-Яа-яЁё/0-9!@#$%^*_|]{0,100}" name="first_name" id="first_name" class="form-control" />
                    <br />
                    <label>Enter Second Name</label>
                    <input type="text" pattern="[A-Za-zА-Яа-яЁё/0-9!@#$%^*_|]{0,100}" name="second_name" id="second_name" class="form-control" />
                    <br />
                    <label>Enter Email</label>
                    <input type="email" name="email" id="email" class="form-control" />
                    </div>
                    <div class="modal-footer">
                    <input type="hidden" name="user_id" id="user_id" />
                    <input type="hidden" name="operation" id="operation" />
                    <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>
    