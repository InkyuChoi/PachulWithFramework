<?php
include "../../config/config.php";
$connect = mysqli_connect("$db_host", "$db_user", "$db_pw", "$db_name");
$query = "SELECT * FROM COMPANY_TB ORDER BY id DESC";
mysqli_query($connect, "set names utf8");
$result = mysqli_query($connect, $query);
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>으뜸 파출 - 업체 관리 페이지</title>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../../css/admin.css">
</head>
<body>
<div class="container">
    <?php include '../nav_bar.html'; ?>
    <h3 align="center">으뜸 파출 - 업체 관리 페이지</h3>
    <h3 id="showCount" style="text-align: right"></h3>
    <div class="table-responsive">
        <div align="right">
            <input type="button" name="add" value="추가" id="add" class="btn btn-warning add_data"/>
        </div>
        <div id="company_table">
            <table class="table table-bordered">
                <!--table head-->
                <?php include 'index_table_head.html'; ?>
                <!--table body-->
                <?php
                while ($company_row = mysqli_fetch_array($result)) {
                    if ($company_row["activated"] == 1) {
                        include 'index_table_content.php';
                    }
                }
                ?>
            </table>
        </div>
    </div>
</div>
</body>
</html>
<?php include "index_modal.html" ?>

<script src="../../js/sort.js"></script>
<script src="../../js/company_change_color.js"></script>

<script>
    $(document).ready(function () {
//        modal onclick function
        <?php include "index_onclick.js"?>
//        modal onsubmit function
        <?php include "index_onsubmit.js"?>
    });
</script>