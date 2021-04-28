<?php

require_once 'core/init.php';
require '../../includes/function.php';
include('../../includes/db.php');

if (Input::exists()) {

    $ett_teacher = new Department(convert_string('encrypt', Input::get('ett_token')));

    if (!$ett_teacher->exists()) {
        Redirect::to('../index.php');
    } else {
        $data = $ett_teacher->data();

        $message = '';
        $error = '';
        if (Input::get('action') == "Teacher_update") {
            $te_updated_at = date("Y-m-d H:i:s");

            if (Input::get('te_username') == $data->dept_username) {
            } else {
                $query = "SELECT dept_username FROM em_department WHERE ett_username = :et_username";
                $statement = $connect->prepare($query);
                $statement->execute(
                    array(
                        ':et_username' => Input::get('te_username'),
                    )
                );
                $row = $statement->rowCount();
                if ($row > 0) {
                    $error .= 'Sorry! Username no already registered<br>';
                    $error .= 'Still! you want to update this phone no, then Go to Advanced Setting and Update on Their<br>';
                } else {
                    $query = "UPDATE em_department SET dept_username = :et_username WHERE dept_passkey = :et_token";
                    $statement = $connect->prepare($query);
                    $statement->execute(
                        array(
                            ':et_username' => Input::get('te_username'),
                            ':et_token' => convert_string('encrypt', Input::get('ett_token'))
                        )
                    );
                    $result = $statement->fetchAll();
                    if (isset($result)) {
                        /*
                            $ett_number = '+91'. $_POST["te_username"];
                            $ett_name = $_POST["te_firstname"];
                            // Your Account SID and Auth Token from twilio.com/console
                            $account_sid = 'ACaa3b76c388e4ac6f3bdb1bf870369f5c';
                            $auth_token = 'f6d6a5f5e456053dbe2464b78cf1fe7a';
                            // In production, these should be environment variables. E.g.:
                            // $auth_token = $_ENV["TWILIO_AUTH_TOKEN"]

                            // A Twilio number you own with SMS capabilities
                            $twilio_number = "+12074219132";
                            $client = new Client($account_sid, $auth_token);
                            $client->messages->create(
                                // Where to send a text message (your cell phone?)
                                $ett_number,
                                array(
                                    'from' => $twilio_number,
                                    'body' => 'Hello,' .$ett_name.  ' Your New Phone Number has been updated!'
                                )
                            );
                            */
                        $message .= 'New Username Updated<br>';
                    } else {
                        $error .= 'Error! While Updating New Phone No<br>';
                    }
                }
            }

            if (Input::get('te_email') == $data->dept_email) {
            } else {
                $query = "SELECT dept_email FROM em_department WHERE dept_email = :et_email";
                $statement = $connect->prepare($query);
                $statement->execute(
                    array(
                        ':et_email' => Input::get('te_email'),
                    )
                );
                $row = $statement->rowCount();
                if ($row > 0) {
                    $message .= 'Sorry! Email already registered<br>';
                    $message .= 'Still! you want to update this phone no, then Go to Advanced Setting and Update on Their<br>';
                } else {
                    $query = "UPDATE em_department SET dept_email = :et_email WHERE dept_passkey = :et_token";
                    $statement = $connect->prepare($query);
                    $statement->execute(
                        array(
                            ':et_email' => Input::get('te_email'),
                            ':et_token' => convert_string('encrypt', Input::get('ett_token'))
                        )
                    );
                    $result = $statement->fetchAll();
                    if (isset($result)) {
                        $message = "Email Updated";
                    }
                }
            }

            if (Input::get('te_pass')) {
                if (convert_string('encrypt', Input::get('te_pass')) == $data->dept_password) {
                    $query = "UPDATE em_department SET dept_password = :et_password WHERE dept_passkey = :et_token";
                    $statement = $connect->prepare($query);
                    $statement->execute(
                        array(
                            ':et_password' => convert_string('encrypt', Input::get('te_pass')),
                            ':et_token' => convert_string('encrypt', Input::get('ett_token'))
                        )
                    );
                    $result = $statement->fetchAll();
                    if (isset($result)) {
                        $message = "password updated";
                    } else {
                        $error = "Error! While Updating password";
                    }
                } else {
                    $message = "Confirm Password does not match";
                }
            }

            $data = array(
                'message' => $message,
                'error' => $error
            );
            echo json_encode($data);
        }

        if (Input::get('action') == "status") {
            if (Input::get('ett_id') == "deactivate_account") {
                $query = "UPDATE em_department SET dept_status = :et_status WHERE dept_passkey = :et_value";
                $statement = $connect->prepare($query);
                $statement->execute(
                    array(
                        ':et_status' => "Inactive",
                        ':et_value' => convert_string('encrypt', Input::get('ett_token'))
                    )
                );
                $message = "Account Deactivated";
            } else {
                $query = "UPDATE em_department SET dept_status = :et_status WHERE dept_passkey = :et_value";
                $statement = $connect->prepare($query);
                $statement->execute(
                    array(
                        ':et_status' => "Active",
                        ':et_value' => convert_string('encrypt', Input::get('ett_token'))
                    )
                );
                $message = "Account Activated";
            }
            $data = array(
                'message' => $message
            );
            echo json_encode($data);
        }
    }
}
