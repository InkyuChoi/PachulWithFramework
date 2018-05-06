<?php
if (isset($_POST["company_id"])) {
    $output = '';
    $connect = mysqli_connect("localhost", "pachul", "ingee440", "pachul");
    mysqli_query($connect, "set names utf8");

    $query = "SELECT * FROM GAIP_TB  WHERE id = '" . $_POST["company_id"] . "' ORDER BY addedDate DESC";

    $result = mysqli_query($connect, $query);
    $output .= '
      <div class="table-responsive">
      <div id="gaip_table">
           <table class="table table-bordered">
               <tr>
                    <th onclick="sortIntTable(0,\'gaip_table\')" scope="col">가입번호</th>
                    <th onclick="sortTable(1,\'gaip_table\')" scope="col">시작</th>
                    <th onclick="sortTable(2,\'gaip_table\')" scope="col">끝</th>
                    <th onclick="sortIntTable(3,\'gaip_table\')" scope="col">구좌</th>
                    <th onclick="sortIntTable(4,\'gaip_table\')" scope="col">금액</th>
                    <th onclick="sortTable(5,\'gaip_table\')" scope="col">가입 비고</th>
                    <th onclick="sortTable(6,\'gaip_table\')" scope="col">등록 날짜</th>
               </tr>
';
    while ($row = mysqli_fetch_array($result)) {
        $output .= '
                <tr>
                     <td>' . $row["gaipID"] . '</td>
                     <td>' . $row["startDate"] . '</td>
                     <td>' . $row["endDate"] . '</td>
                     <td>' . $row["Gujwa"] . '</td>
                     <td>' . $row["price"] . '</td>
                     <td>' . $row["gaipDetail"] . '</td>
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
<script src="../../js/sort.js"></script>