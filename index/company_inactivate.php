<?php
include $_SERVER['DOCUMENT_ROOT']."/config/config.php";
$connect = mysqli_connect("$db_host", "$db_user", "$db_pw", "$db_name");

$day = date('Y-m-d');
$today = strtotime($day);

$select_query = "SELECT * FROM COMPANY_TB";
$select_result = mysqli_query($connect,$select_query);

while($select_row = mysqli_fetch_assoc($select_result)){

    $endGaipDate = strtotime($select_row['endGaipDate']);

    if($endGaipDate <= $today){
        $inactivate_query = "UPDATE COMPANY_TB SET activated = '0'";
        echo "".$select_row['companyName']."inactivated. <br>" ;
    }
}
?>