<?php 
// Nama : David Leonardo W
// NRP  : 1972017
include_once '../../model/Attendance.php';
include_once '../../model/Matakuliah.php';
include_once '../../dao/CatatDaoImpl.php';
include_once '../../util/PDOUtil.php';

header('content-type:application/json');

$DAO=new CatatDaoImpl();
$list=$DAO->fetch();

echo json_encode($list);