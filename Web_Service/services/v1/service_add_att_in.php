<?php
// Nama : David Leonardo W
// NRP  : 1972017
include_once '../../model/Attendance.php';
include_once '../../dao/CatatDaoImpl.php';
include_once '../../util/PDOUtil.php';

header('content-type:application/json');
$name = filter_input(INPUT_POST, 'txtName');
$first_in_time = filter_input(INPUT_POST, 'txtFirstInTime');
$att_date = filter_input(INPUT_POST, 'txtType');
$participation = filter_input(INPUT_POST, 'txtParticipant');
$description = filter_input(INPUT_POST, 'txtDescription');
$certificate = filter_input(INPUT_POST, 'txtCertificate');
$jsonData=array();
if(isset($employee_id) && !empty($employee_id)&&isset($first_in_time) && !empty($first_in_time)&&isset($att_date) && !empty($att_date)) {
    $catatDao = new CatatDaoImpl();
    $catat = new Attendance();
    $catat->setEmployeeId($employee_id);
    $catat->setFirst_in_time($first_in_time);
    $catat->setAtt_date($att_date);
    $response = $catatDao->addAttendanceIn($catat);
    if ($response) {
        $jsonData['status'] = 1;
        $jsonData['message'] = "Add data Masuk success";
    } else {
        $jsonData['status'] = 2;
        $jsonData['message'] = "Error add data";
    }
}else{
    $jsonData['status'] = 0;
    $jsonData['message'] ="Missing Catat Masuk";
}
echo json_encode($jsonData);