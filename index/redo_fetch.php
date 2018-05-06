<?php
include "../../config/config.php";
$connect = mysqli_connect("$db_host", "$db_user", "$db_pw", "$db_name");
mysqli_query($connect, "set names utf8");

if(isset($_POST["company_id"]))
{
    $query = "SELECT * FROM COMPANY_TB WHERE id = '".$_POST["company_id"]."'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);
    echo json_encode($row);
}
?>
