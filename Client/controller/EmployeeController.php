<!-- Nama : David Leonardo W
NRP  : 1972017 -->
<?php

class EmployeeController
{
    public function index()
    {
        $signInPressed = filter_input(INPUT_POST, 'btnSignIn');
        if ($signInPressed) {
            $id = filter_input(INPUT_POST, 'txtId');
            $password = filter_input(INPUT_POST, 'txtPassword');
            $md5Password = md5($password);
            $sendData = array('id' => $id, 'password' => $md5Password);
            $wsResponse = Utility::curl_post(ApiService::AUNTENTICATE_URL, $sendData);
            $response = json_decode($wsResponse);
            $result = $response->user_data;
            if ($result != null && $result->id == $id) {
                $_SESSION['my_session'] = true;
                $_SESSION['session_id'] = $result->id;
                $_SESSION['session_user'] = $result->name;
                $_SESSION['session_role'] = $result->role;
                header("location:index.php");
            } else {
                echo '<div class="panel panel-danger">';
                echo '<div class="panel-danger">Invalid Id or password</div>';
                echo '</div>';
            }
        }
        include_once 'pages/login_page.php';
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        header("location:index.php");
    }
}