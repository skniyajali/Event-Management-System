<?php

require_once 'core/init.php';
require_once 'core/DB.php';
require_once 'includes/function.php';

if (Input::exists()) {
    $message = "";
    $error = "";
    $msg = "";
    if (Input::get('action') == 'login') {
        $valiate = new Validate();
        $valiate->check($_POST, array(
            'select' => array(
                'required' => true,
                'ett_name' => 'User Type',
            ),
            'email' => array(
                'required' => true,
                'ett_name' => 'Username/Email',
            ),
            'password' => array(
                'required' => true,
                'ett_name' => 'Password',
            )
        ));
        if ($valiate->passed()) {
            try {
                if (Input::get('select') == 'Department') {
                    $user = new Department();
                    $username = 'department/index.php';
                } elseif (Input::get('select') == 'HOD') {
                    $username = 'faculty/index.php';
                    $user = new Faculty();
                } elseif (Input::get('select') == 'Faculty') {
                    $username = 'faculty/index.php';
                    $user = new Faculty();
                } else {
                    $user = new Student();
                    $username = 'student/index.php';
                }

                $user_username =  Input::get('email');
                $user_password =  convert_string('encrypt', Input::get('password'));
                $remember = (Input::get('agree') === 'on') ? true : false;

                $login = $user->login($user_username, $user_password, $remember);
                if($login){
                    $message = "Login Sucessfull";
                    $msg = $username;
                }
            } catch (Exception $e) {
                $error .= $e->getMessage();
            }
        } else {
            foreach ($validate->errors() as $error) {
                $error .= $error . '<br>';
            }
        }
    }
    $data = array(
        'message' => $message,
        'error' => $error,
        'msg' => $msg
    );
    echo json_encode($data);
}
