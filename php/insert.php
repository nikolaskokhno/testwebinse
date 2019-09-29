<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{
 if($_POST["operation"] == "Add")
 {
  $statement = $connection->prepare("
   INSERT INTO tbl_webinse (first_name, second_name, email) 
   VALUES (:first_name, :second_name, :email)
  ");
  $result = $statement->execute(
   array(
    ':first_name' => $_POST["first_name"],
    ':second_name' => $_POST["second_name"],
    ':email' => $_POST["email"]
   )
  );
  if(!empty($result))
  {
   echo 'Data Inserted';
  }
 }
 
 if($_POST["operation"] == "Edit")
 {
     $statement = $connection -> prepare("
        UPDATE tbl_webinse SET first_name = :first_name,
        second_name = :second_name,
        email = :email WHERE id = :id;
     ");
     $result = $statement -> execute(
        array(
            ':first_name' => $_POST["first_name"],
            ':second_name' => $_POST["second_name"],
            ':email' => $_POST["email"],
            ':id'   => $_POST["user_id"]
        )
     );
     if(!empty($result))
  {
   echo 'Data Update';
  }
 }

}

?>
   