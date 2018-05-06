<?php
include "../../config/config.php";
$connect = mysqli_connect("$db_host", "$db_user", "$db_pw", "$db_name");
mysqli_query($connect, "set names utf8");

if(!empty($_POST))
{
    $company_id = mysqli_real_escape_string($connect, $_POST["company_delete_id"]);
    $deleteDetail = mysqli_real_escape_string($connect, $_POST["deleteDetail"]);
    $now = date("Y-m-d H:i:s");

    #기존 내용 수정 시 Update
    if($_POST["company_delete_id"] != '')
    {
        $query = "
           UPDATE COMPANY_TB
           SET
           deleteDetail='$deleteDetail',
           activated='0',
           deleted = '1',
           deletedDate= '$now'
           WHERE id='$company_id'
           ";
        $result = mysqli_query($connect,$query) or die(mysqli_error($connect));
        $data['message']="삭제되었습니다.";
    }
    else $data['message'] = "id not available";
}
else{
    $data['message'] = "post is empty";
}
echo json_encode($data);
?>