<?php
include "../../config/config.php";
$connect = mysqli_connect("$db_host", "$db_user", "$db_pw", "$db_name");
mysqli_query($connect, "set names utf8");

if (isset($_POST["company_id"])) {
    $output = '';

    $query = "SELECT * FROM CALL_TB  
WHERE companyID = '" . $_POST["company_id"] . "' 
    AND assignConfirmed = 1 ORDER BY addedDate DESC";
    $result = mysqli_query($connect, $query);

    $get_companyName_query = "SELECT * FROM COMPANY_TB WHERE id ='" . $_POST["company_id"] . "'";
    $get_companyName_result = mysqli_query($connect, $get_companyName_query);
    $get_companyName_row = mysqli_fetch_assoc($get_companyName_result);

    $output .= '
      <div class="table-responsive">
      <div id="gaip_table">
           <table class="table table-bordered">
               <tr>
                    <th onclick="sortIntTable(0,\'assign_table\')" scope="col">콜 ID</th>
                    <th onclick="sortTable(1,\'assign_table\')" scope="col">업체명</th>                    
                    <th onclick="sortTable(2,\'assign_table\')" scope="col">배정된 회원</th>
                    <th onclick="sortTable(3,\'assign_table\')" scope="col">근무 날짜</th>
                    <th onclick="sortIntTable(4,\'assign_table\')" scope="col">근무 시작시간</th>
                    <th onclick="sortIntTable(5,\'assign_table\')" scope="col">근무 종료시간</th>
                    <th onclick="sortIntTable(6,\'assign_table\')" scope="col">카테고리</th>
                    <th onclick="sortIntTable(7,\'assign_table\')" scope="col">비고</th>
                    <th onclick="sortIntTable(8,\'assign_table\')" scope="col">콜 한 시간</th>
               </tr>
';
    while ($row = mysqli_fetch_assoc($result)) {

        $get_employeeName_query = "SELECT * FROM EMPLOYEE_TB WHERE id ='" . $row["assignedEmployee"]. "'";
        $get_employeeName_result = mysqli_query($connect, $get_employeeName_query);
        $get_employeeName_row = mysqli_fetch_assoc($get_employeeName_result);

        $output .= '
                <tr>
                     <td>' . $row["callID"] . '</td>
                     <td>' . $get_companyName_row["companyName"] . '</td>
                     <td>' . $get_employeeName_row["employeeName"] . '</td>
                     <td>' . $row["callDate"] . '</td>
                     <td>' . $row["callStartTime"] . '</td>
                     <td>' . $row["callEndTime"] . '</td>
                     <td>' . $row["category"] . '</td>
                     <td>' . $row["detail"] . '</td>
                     <td>' . $row["addedDate"] . '</td>  
                </tr>
                ';
    }
    $output .= '
           </table>
           </div>
      </div>
      ';
    echo $output;
}
?>