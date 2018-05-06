<?php
include "../../config/config.php";
$connect = mysqli_connect("$db_host", "$db_user", "$db_pw", "$db_name");
mysqli_query($connect, "set names utf8");

if(isset($_POST["company_id"]))
{
    $query = "
    SELECT * FROM COMPANY_TB 
    WHERE id = '".$_POST["company_id"]."'
    ";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);

    $gaip_query = "SELECT * FROM GAIP_TB WHERE id = '".$_POST["company_id"]."' ORDER BY addedDate DESC limit 1";
    $gaip_result = mysqli_query($connect,$gaip_query);
    $gaip_row = mysqli_fetch_assoc($gaip_result);

    $gaip_detail = $gaip_row['gaipDetail'];
    $row['gaipDetail'] = $gaip_detail;

    echo json_encode($row);
}
?>
