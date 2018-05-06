<?php
include "../../config/config.php";
$connect = mysqli_connect("$db_host", "$db_user", "$db_pw", "$db_name");
mysqli_query($connect, "set names utf8");

if(!empty($_POST))
 {
      $output = '';
      $message = '';
      $company_id = mysqli_real_escape_string($connect, $_POST["company_id"]);
      $companyName = mysqli_real_escape_string($connect, $_POST["companyName"]);
      $ceoName = mysqli_real_escape_string($connect, $_POST["ceoName"]);
      $phoneNumber = mysqli_real_escape_string($connect, $_POST["phoneNumber"]);
      $ceoPhoneNumber = mysqli_real_escape_string($connect, $_POST["ceoPhoneNumber"]);
      $address1 = mysqli_real_escape_string($connect, $_POST["address1"]);
      $address2 = mysqli_real_escape_string($connect, $_POST["address2"]);
      $firstGaipDate = mysqli_real_escape_string($connect, $_POST["firstGaipDate"]);
      $currentGaipDate = mysqli_real_escape_string($connect, $_POST["currentGaipDate"]);
      $endGaipDate = mysqli_real_escape_string($connect, $_POST["endGaipDate"]);
      $currentGaipPrice = mysqli_real_escape_string($connect, $_POST["currentGaipPrice"]);
      $Gujwa = mysqli_real_escape_string($connect, $_POST["Gujwa"]);
      $leftCalls = mysqli_real_escape_string($connect, $_POST["leftCalls"]);
      $detail = mysqli_real_escape_string($connect, $_POST["detail"]);
      $gaipDetail = mysqli_real_escape_string($connect, $_POST["gaipDetail"]);
      $now = date("Y-m-d H:i:s");

      $select_query = "SELECT * FROM COMPANY_TB WHERE companyName = '$companyName' OR ceoPhoneNumber ='$ceoPhoneNumber'";
      $select_result = mysqli_query($connect, $select_query) or die(mysqli_error($connect));
      $select_row = mysqli_fetch_assoc($select_result);

      if($select_row){
          $data['duplicate'] = true;
          $data['message'] = "중복";
      }
      else{
          $data['duplicate'] = false;
          #기존 내용 수정 시 Update
          if($_POST["company_id"] != '')
          {
              $query = "
               UPDATE COMPANY_TB
               SET
               companyName='$companyName',
               ceoName='$ceoName',
               address1='$address1',
               address2='$address2',
               phoneNumber='$phoneNumber',
               ceoPhoneNumber='$ceoPhoneNumber',
               currentGaipDate='$currentGaipDate',
               endGaipDate='$endGaipDate',
               currentGaipPrice='$currentGaipPrice',
               Gujwa='$Gujwa',
               leftCalls='$leftCalls',
               detail='$detail'
               WHERE id='".$_POST["company_id"]."'
               ";
              $result = mysqli_query($connect,$query) or die(mysqli_error($connect));
              $data['message'] = "수정되었습니다";
          }
          #신규등록 시 Insert
          else
          {
              //업체 테이블에 데이터 삽입
              $query = "
          INSERT INTO COMPANY_TB
          (companyName, ceoName, address1, address2, phoneNumber, ceoPhoneNumber, firstGaipDate, currentGaipDate, endGaipDate, currentGaipPrice, Gujwa, leftCalls, detail )
          VALUES
          ('$companyName', '$ceoName', '$address1', '$address2', '$phoneNumber', '$ceoPhoneNumber', '$firstGaipDate', '$firstGaipDate', '$endGaipDate', '$currentGaipPrice', '$Gujwa', '$leftCalls', '$detail')
          ";
              $result = mysqli_query($connect,$query) or die(mysqli_error($connect));
              $insert_id = mysqli_insert_id($connect);

              //Insert Into Gaip Table
              $gaip_query = "
              INSERT INTO GAIP_TB
              (id, startDate, endDate, Gujwa, price, gaipDetail, addedDate)
              VALUES
              ('$insert_id', '$firstGaipDate','$endGaipDate', '$Gujwa', '$currentGaipPrice', '$gaipDetail', '$now')
              ";
              $gaip_result = mysqli_query($connect, $gaip_query) or die(mysqli_error($connect));

              //Insert Into User Table
              $gaip_query = "
              INSERT INTO USER_TB
              (companyID, userID, userPW, userCategory)
              VALUES
              ('$insert_id', '$ceoPhoneNumber', '$ceoPhoneNumber', 1)
              ";
              $gaip_result = mysqli_query($connect, $gaip_query) or die(mysqli_error($connect));


              $data['message'] = "추가되었습니다";
          }
      }
      echo json_encode($data);
 }
 ?>
