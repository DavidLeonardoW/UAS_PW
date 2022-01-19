<!-- Nama : David Leonardo W
NRP  : 1972017 -->
<?php


class AttendanceController
{
    public function attendanceIn()
    {
        $employee_id = $_SESSION['session_id'];
        $command = filter_input(INPUT_GET, 'cmd');
        if (isset($command)) {
            $cid = filter_input(INPUT_GET, 'cid');
            if (isset($cid)) {
                $wsResponse = Utility::curl_get(ApiService::ALL_ATTENDANCE_URL, array());
                $result = json_decode($wsResponse);
                $sendData = array('id' => $cid);
            }
        }

        $submitPressed = filter_input(INPUT_POST, 'btnSubmit');
        if (isset($submitPressed)) {
            $date = filter_input(INPUT_POST, 'txtDate');
            $fi = filter_input(INPUT_POST, 'txtFI');
            $employee = filter_input(INPUT_POST, 'txtEmployee');

            $sendData = array('date' =>$date,'fi' => $fi, 'employee' => $employee);
            $wsResponse = Utility::curl_post(ApiService::ADD_ATT_IN_URL, $sendData);
            $inputStatus = json_decode($wsResponse);

            if ($inputStatus->status) {
                echo '<div class="panel panel-success">';
                echo '<div class="bg-success">Add In successfully added</div>';
                echo '</div>';
            } else {
                echo '<div class="panel panel-danger">';
                echo '<div class="bg-danger">Error Add Activity</div>';
                echo '</div>';
            }
        }

        $wsResponse = Utility::curl_get(ApiService::ALL_ATTENDANCE_URL, array('fe_employee_id' => $employee_id));
        
        $result = json_decode($wsResponse);
        include_once 'pages/att_in.php';
    }

    public function attendanceOut()
    {
        $employee_id = $_SESSION['session_id'];
        $command = filter_input(INPUT_GET, 'cmd');
        if (isset($command)) {
            $cid = filter_input(INPUT_GET, 'cid');
            if (isset($cid)) {
                $wsResponse = Utility::curl_get(ApiService::ALL_ATTENDANCE_URL, array());
                $result = json_decode($wsResponse);
                $sendData = array('id' => $cid);
            }
        }

        $submitPressed = filter_input(INPUT_POST, 'btnSubmit');
        if (isset($submitPressed)) {
            $date = filter_input(INPUT_POST, 'txtDate');
            $fo = filter_input(INPUT_POST, 'txtFO');
            $employee = filter_input(INPUT_POST, 'txtEmployee');

            $sendData = array('date' =>$date,'fo' => $fo, 'employee' => $employee);
            $wsResponse = Utility::curl_post(ApiService::ADD_ATT_OUT_URL, $sendData);
            $inputStatus = json_decode($wsResponse);

            if ($inputStatus->status) {
                echo '<div class="panel panel-success">';
                echo '<div class="bg-success">Add In successfully added</div>';
                echo '</div>';
            } else {
                echo '<div class="panel panel-danger">';
                echo '<div class="bg-danger">Error Add Activity</div>';
                echo '</div>';
            }
        }

        $wsResponse = Utility::curl_get(ApiService::ALL_ATTENDANCE_URL, array('fe_employee_id' => $employee_id));
        
        $result = json_decode($wsResponse);
        include_once 'pages/att_out.php';
    }
}