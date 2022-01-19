<?php
// Nama : David Leonardo W
// NRP  : 1972017
include_once '../../model/Employee.php';
include_once '../../dao/EmployeeDaoImpl.php';
include_once '../../util/PDOUtil.php';

$id= filter_input(INPUT_POST, 'id');
$password = filter_input(INPUT_POST, 'password');
header('content-type:application/json');
$jsonData = array();

if (isset($id) && isset($password) && !empty($id) && !empty($password)) {
    $userDao = new EmployeeDaoImpl();
    $employees = new Employee();
    $employees->setId($id);
    $employees->setPassword($password);
    $employee = $userDao->login($employees);

    if (isset($employee) && $employee != null && $employee->getId() == $id) {
        $jsonData['status'] = 1;
        $jsonData['message'] = "Login success";
        $jsonData['user_data'] = (Array)$employee;

    } else {
        $jsonData['status'] = 2;
        $jsonData['message'] = "Invalid Id or password";
    }
} else {
    $jsonData['status'] = 0;
    $jsonData['message'] = "Missing Id or password";
}
echo json_encode($jsonData);
