<?php
include "../../config/config.php";
$connect = mysqli_connect("$db_host", "$db_user", "$db_pw", "$db_name");
mysqli_query($connect, "set names utf8");

$get_company_query = "SELECT * FROM COMPANY_TB";
$get_company_result = mysqli_query($connect, $get_company_query);

$calls_per_gujwa = 3;
$d = date("Y-m-d");
$now = strtotime($d);

while($get_company_row = mysqli_fetch_assoc($get_company_result)){
    $companyID = $get_company_row['id'];
    $endGaipDate = strtotime($get_company_row['endGaipDate']);
    $Gujwa = $get_company_row['Gujwa'];
    $new_left_calls = $Gujwa*$calls_per_gujwa;

    if($endGaipDate>$now){
        $query = "UPDATE COMPANY_TB SET leftCalls = '$new_left_calls' WHERE id = ".$companyID."";
        $result = mysqli_query($connect,$query);
        echo "Gujwa: ".$Gujwa." New LeftCalls: ".$new_left_calls." <br />" ;
    }
    else{
        $query = "UPDATE COMPANY_TB SET leftCalls = 0 WHERE id = ".$companyID."";
        $result = mysqli_query($connect,$query);
        echo "Gaip ended Company"."<br />";
    };
}

echo "All leftCalls Count reset. It's Monday!";
?>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
</body>
</html>
