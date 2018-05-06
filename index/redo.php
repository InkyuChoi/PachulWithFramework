<?php
include "../../config/config.php";
$connect = mysqli_connect("$db_host", "$db_user", "$db_pw", "$db_name");
mysqli_query($connect, "set names utf8");

if(!empty($_POST))
{
    $company_id = mysqli_real_escape_string($connect, $_POST["company_redo_id"]);
    $currentGaipDate = mysqli_real_escape_string($connect, $_POST["re_currentGaipDate"]);
    $endGaipDate = mysqli_real_escape_string($connect, $_POST["re_endGaipDate"]);
    $gaipPrice = mysqli_real_escape_string($connect, $_POST["re_currentGaipPrice"]);
    $gaipDetail = mysqli_real_escape_string($connect, $_POST["re_gaipDetail"]);
    $gujwa = mysqli_real_escape_string($connect, $_POST["re_Gujwa"]);
    $leftCalls = mysqli_real_escape_string($connect, $_POST["re_leftCalls"]);

    $now = date("Y-m-d H:i:s");

    if($company_id != '')
    {
        $query = "
           UPDATE COMPANY_TB
           SET
           currentGaipDate='$currentGaipDate',
           endGaipDate='$endGaipDate',
           currentGaipPrice='$gaipPrice',
           Gujwa = '$gujwa',
           leftCalls = '$leftCalls'
           WHERE id='".$_POST["company_redo_id"]."'
           ";
        $result = mysqli_query($connect,$query) or die(mysqli_error($connect));
        $gaip_query = "
          INSERT INTO GAIP_TB
          (id, startDate, endDate, price, gaipDetail, addedDate)
          VALUES
          ('$company_id', '$currentGaipDate', '$endGaipDate', '$gaipPrice','$gaipDetail', '$now')
          ";
        $gaip_result = mysqli_query($connect,$gaip_query) or die(mysqli_error($connect));

        echo $company_id;
    }
    else
    {
        echo "재등록이 아니라 신규등록인데요?";
    }
}
?>