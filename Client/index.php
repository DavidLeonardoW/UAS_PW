<?php
session_start();
include_once 'controller/EmployeeController.php';
include_once 'util/ApiServices.php';
include_once 'util/Utility.php';
include_once 'controller/AttendanceController.php';

if (!isset($_SESSION['my_session'])) {
    $_SESSION['my_session'] = false;
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="David Leonardo W-1972017">
    <title></title>
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.21/datatables.min.css"/>

    <script src="scripts/command_script.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.21/datatables.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
          integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css"
          integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"
            integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd"
            crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <?php
    if ($_SESSION['my_session']) {
        ?>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">
                        PW2 FINAL EXAM
                    </a>
                </div>
                <ul class="nav navbar-nav">
                    <?php
                    if ($_SESSION['session_role'] == 'pegawai') {
                        ?>
                        <li><a href="?menu=ss">Employee Attendance</a></li>
                        <?php
                    }else{
                       
                    }
                    ?>
                    <li><a href="?menu=logout">Logout</a></li>
                </ul>
            </div>
        </nav>
        <div>
            <?php
            $menu = filter_input(INPUT_GET, 'menu');
            switch ($menu) {
                case 'in':
                    $attendanceInController = new AttendanceController();
                    $attendanceInController->attendanceIn();
                    break;
                case 'out':
                    $attendanceInController = new AttendanceController();
                    $attendanceInController->attendanceOut();
                    break;
                case 'logout';
                    $employeController = new EmployeeController();
                    $employeController->logout();
                    break;
                default;
                    include_once 'pages/home.php';
            }
            ?>
        </div>
        <?php
    } else {
        $employeController = new EmployeeController();
        $employeController->index();
    }
    ?>
</div>
</body>
<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script>
</html>

