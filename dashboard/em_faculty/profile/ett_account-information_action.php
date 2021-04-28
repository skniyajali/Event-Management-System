<?php

require_once 'core/init.php';
require '../../includes/function.php';
include('../../includes/db.php');

if (Input::exists()) {

    $ett_teacher = new Faculty(convert_string('encrypt', Input::get('ett_token')));

    if (!$ett_teacher->exists()) {
        Redirect::to('../index.php');
    } else {
        $data = $ett_teacher->data();
        $message = '';
        $error = '';
        if (Input::get('action') == "Teacher_update") {
            $te_updated_at = date('Y-m-d H:i:s');

            if (Input::get('te_username') == $data->fac_username) {
            } else {
                $query = "SELECT fac_username FROM em_faculty WHERE fac_username = :et_username";
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
                    $query = "UPDATE em_faculty SET fac_username = :et_username, fac_updated_at = :ats WHERE fac_passkey = :et_token";
                    $statement = $connect->prepare($query);
                    $statement->execute(
                        array(
                            ':et_username' => Input::get('te_username'),
                            ':ats' => $te_updated_at,
                            ':et_token' => convert_string('encrypt', Input::get('ett_token'))
                        )
                    );
                    $result = $statement->fetchAll();
                    if (isset($result)) {

                        $message .= 'New Username Updated<br>';
                    } else {
                        $error .= 'Error! While Updating New Username<br>';
                    }
                }
            }

            if (Input::get('te_email') == $data->fac_email) {
            } else {
                $query = "SELECT fac_email FROM em_faculty WHERE fac_email = :et_email";
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
                    $query = "UPDATE em_faculty SET fac_email = :et_email WHERE fac_passkey = :et_token";
                    $statement = $connect->prepare($query);
                    $statement->execute(
                        array(
                            ':et_email' => Input::get('te_email'),
                            ':et_token' => convert_string('encrypt', Input::get('ett_token'))
                        )
                    );
                    $result = $statement->fetchAll();
                    if (isset($result)) {
                        /*
                            //Resending an Email
                            $mail = new PHPMailer(true);
                            //Set PHPMailer to use SMTP.
                            $mail->isSMTP();
                            //Set SMTP host name                          
                            $mail->Host = "smtp.gmail.com";
                            //Set this to true if SMTP host requires authentication to send email
                            $mail->SMTPAuth = true;
                            //Provide username and password     
                            $mail->Username = "";
                            $mail->Password = "";
                            //If SMTP requires TLS encryption then set it
                            $mail->SMTPSecure = "tls";
                            //Set TCP port to connect to
                            $mail->Port = 587;

                            $mail->From = "";
                            $mail->FromName = "";

                            $mail->addAddress($_POST["te_email"], convert_string('decrypt', $ett_teacher->data()->ett_firstname));

                            $mail->isHTML(true);

                            $mail->Subject = "Verify Your Email - convert_string('decrypt',$ett_teacher->data()->ett_firstname)) ";
                            $mail->Body = "<b>Hello, convert_string('decrypt',$ett_teacher->data()->ett_firstname))  convert_string('decrypt',$ett_teacher->data()->ett_lastname)) </b><br> - Click the link below to Verify Your Email Address<br><br><a href='http://localhost/enhancedteaching/et/'>Verify</a>";
                            $mail->AltBody = "Use this credentials to login in our website,And Do not forget change our default password.Thank You";

                            try {
                                $mail->send();
                                $message .=  "Message has been sent successfully";
                            } catch (Exception $e) {
                                $message .= "Mailer Error: " . $mail->ErrorInfo;
                            }

                            $message = "Email Updated";
                        } else {
                            $error .= 'Error! While Updating Email<br>';
                        }
                        */
                        $message = "Email Updated";
                    }
                }                
            }
            if (Input::get('te_pass')) {
                if (convert_string('encrypt', Input::get('te_pass')) != $data->fac_password) {
                    $query = "UPDATE em_faculty SET fac_password = :et_password WHERE fac_passkey = :et_token";
                    $statement = $connect->prepare($query);
                    $statement->execute(
                        array(
                            ':et_password' => convert_string('encrypt', Input::get('te_pass')),
                            ':et_token' => convert_string('encrypt', Input::get('ett_token'))
                        )
                    );
                    $result = $statement->fetchAll();
                    if (isset($result)) {
                        $message .= "password updated";
                    } else {
                        $error .= "Error! While Updating password";
                    }
                } else {
                    $message .= "Confirm Password does not match";
                }
            }
            
            if(Input::get('ett_role') != $data->fac_role){
                
                $query = "UPDATE em_faculty SET fac_role = :roles, fac_updated_at = :ett_updated_at WHERE fac_passkey = :ett_token";
                $statement = $connect->prepare($query);
                if($statement->execute(array(
                    ':roles' => Input::get('ett_role'),
                    ':ett_updated_at' => $te_updated_at,
                    ':ett_token' => convert_string('encrypt',Input::get('ett_token'))
                ))){
                    $message .= "Faculty Role Updated";
                }
                
            }

            if(Input::get('te_dept') != convert_string('decrypt',$data->fac_dept_hash)){
                $da = new Department(convert_string('encrypt',Input::get('te_dept')));
                if($da->exists()){
                    $das = $da->data();

                    $query = "UPDATE em_faculty SET fac_department = :dept, fac_dept_hash = :dept_hash, fac_updated_at = :ett_updated_at WHERE fac_passkey = :ett_token";
                    $statement = $connect->prepare($query);
                    if($statement->execute(array(
                        ':dept' => $das->dept_name,
                        ':dept_hash' => $das->dept_passkey,
                        ':ett_updated_at' => $te_updated_at,
                        ':ett_token' => convert_string('encrypt',Input::get('ett_token'))
                    ))){
                        $message .= "Faculty Department Updated";
                    }
                    
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
                $query = "UPDATE em_faculty SET fac_status = :et_status WHERE fac_passkey = :et_value";
                $statement = $connect->prepare($query);
                $statement->execute(
                    array(
                        ':et_status' => "Inactive",
                        ':et_value' => convert_string('encrypt', Input::get('ett_token'))
                    )
                );
                $message = "Account Deactivated";
            } else {
                $query = "UPDATE em_faculty SET fac_status = :et_status WHERE fac_passkey = :et_value";
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
