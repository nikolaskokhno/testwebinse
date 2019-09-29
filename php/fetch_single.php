<?php
include('db.php');
include('function.php');
if(isset($_POST["user_id"]))
{
    $output = array();
    $statement = $connection->prepare(
        "SELECT * FROM tbl_webinse
        WHERE id = '".$_POST["user_id"]."' 
        LIMIT 1"
    );
    $statement->execute();
    $result = $statement->fetchAll();
    foreach($result as $row)
    {
        $output["first_name"] = $row["first_name"];
        $output["second_name"] = $row["second_name"];
        $output["email"] = $row["email"];
    }
    echo json_encode($output);
}
?>
   