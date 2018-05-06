<?php
$data = "만기된 회원 수: ".$_POST['red']." / 만기 임박 회원 수: ".$_POST['yellow']." / 나머지 회원 수: ".$_POST['white'];
echo json_encode($data);
?>