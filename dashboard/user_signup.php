<?php

require('core/init.php');
require('includes/function.php');
require('includes/db.php');

$message = '';
$error = '';

if (isset($_POST["signup_action"])) {
    if ($_POST["signup_action"] == "signup_action") {
        $validate = new Validate();
        $validate->check($_POST, array(
            'fullname' => array(
                'ett_name' => 'Name',
                'ett_id' => 'name',
                'em_name' => 'name',
                'required' => true,
            ),
            'email' => array(
                'ett_name' => 'Email',
                'ett_id' => 'email',
                'em_name' => 'email',
                'required' => true,
                'unique' => 'admin'
            ),
            'password' => array(
                'ett_name' => 'Password',
                'ett_id' => 'password',
                'em_name' => 'password',
                'required' => true,
            ),
            'cpassword' => array(
                'ett_name' => 'Confirm Password',
                'ett_id' => 'password',
                'em_name' => 'password',
                'required' => true,
                'matches' => 'password'
            ),
            'token' => array(
                'ett_name' => 'Token',
                'ett_id' => 'hash',
                'em_name' => 'hash',
                'required' => true,
                'unique' => 'admin'
            ),
            'passkey' => array(
                'ett_name' => 'Pass Key',
                'ett_id' => 'passkey',
                'em_name' => 'passkey',
                'required' => true,
                'unique' => 'admin'
            ),
        ));
        if ($validate->passed()) {
            $user = new User();
            $status = "Active";

            try {
                $user->create(array(
                    'name' => convert_string('encrypt', Input::get("fullname")),
                    'email' => convert_string('encrypt', Input::get("email")),
                    'hash' => convert_string('encrypt', Input::get("token")),
                    'password' => convert_string('encrypt', Input::get("password")),
                    'passkey' => convert_string('encrypt', Input::get("passkey")),
                    'status' => $status,
                ));


                $message = "Account Created";
            } catch (Exception $e) {
                $error .=  $e->getMessage();
            }
        } else {
            foreach ($validate->errors() as $err) {
                $error .=  $err . '</>';
            }
        }
    }
    $data = array(
        'message' => $message,
        'error' => $error
    );
    echo json_encode($data);
}

if (isset($_POST["login_action"])) {
    if (Input::get("login_action") == "login_action") {
        $validate = new Validate();
        $validate->check($_POST, array(
            'user_username' => array('required' => true, 'ett_name' => 'Username/Email', 'em_name' => 'Username/Email', 'ett_id' => 'Username/Email'),
            'user_password' => array('required' => true, 'ett_name' => 'Password', 'em_name' => 'Password', 'ett_id' => 'Password')

        ));
        if ($validate->passed()) {
            try {
                $user = new User();
                $user_username =  convert_string('encrypt', Input::get('user_username'));
                $user_password =  convert_string('encrypt', Input::get('user_password'));
                $remember = (Input::get('agree') === 'on') ? true : false;

                $login = $user->login($user_username, $user_password, $remember);

                if ($login) {
                    $message = "Login Successfull";
                } else {
                    foreach ($user->errors() as $error) {
                        $error = $error . '<br>';
                    }
                }
            } catch (Exception $e) {
                $error =  $e->getMessage();
            }
        } else {
            foreach ($validate->errors() as $error) {
                $error = $error . '<br>';
            }
        }
    }
    $data = array(
        'message' => $message,
        'error' => $error
    );
    echo json_encode($data);
}
/*
if (isset($_POST["operation"])) {
    if ($_POST["operation"] == "mail") {

        $query = "SELECT * FROM pending_users WHERE user_passkey = :passkey";
        $statement = $connect->prepare($query);
        $statement->execute(array(':passkey' => Input::get('ett_id')));
        $result = $statement->fetchAll();
        $user_count = $result[0]["user_count"];
        $user_token = convert_string('decrypt', $result[0]["user_token"]);
        $user_time = $result[0]["user_timestamp"];
        if ($user_count < 3) {
            $user = new Teacher(Input::get('ett_id'));

            $TeacherName = convert_string('decrypt', $user->data()->ett_name);
            $TeacherMail =  convert_string('decrypt', $user->data()->ett_email);
            $TeacherPasskey =  convert_string('decrypt', $user->data()->ett_hash);
            $TeacherToken =  $user_token;
            $TeacherStatus = 'Inactive';
            $TeacherVerifyAddress = "http://localhost:90/teacher/ett_verify.php";

            //Sending an Email
            $mail = new PHPMailer(true);
            //Set PHPMailer to use SMTP.
            $mail->isSMTP();
            //Set SMTP host name                          
            $mail->Host = "smtp.gmail.com";
            //Set this to true if SMTP host requires authentication to send email
            $mail->SMTPAuth = true;
            //Provide username and password     
            $mail->Username = "skbabyali79@gmail.com";
            $mail->Password = "8170946250";
            //If SMTP requires TLS encryption then set it
            $mail->SMTPSecure = "tls";
            //Set TCP port to connect to
            $mail->Port = 587;

            $mail->From = "skbabyali79@gmail.com";
            $mail->FromName = "Enhanced Teaching";

            $mail->addAddress($TeacherMail, $TeacherName);

            $mail->isHTML(true);

            $mail->Subject = "Verify Your Account - $TeacherName | Enhanced Teachinng";
            $mail->Body = "<b>Hello, $TeacherName </b> - Your account has been created as a Teacher<br>
                <br> <a href='$TeacherVerifyAddress?TeacherPasskey=$TeacherPasskey&TeacherToken=$TeacherToken&TeacherActiveStatus=$TeacherStatus' class='btn btn-success btn-rounded'>Click Here to Verify</a>";
            $mail->AltBody = "Verify Your Account - $TeacherName";

            try {
                $mail->send();
                // update database
                $query = "UPDATE pending_users SET user_count = :user_count WHERE user_passkey = :passkey ";
                $statement = $connect->prepare($query);
                $statement->execute(
                    array(
                        ':user_count'  => $user_count + 1,
                        ':passkey' => Input::get('ett_id')
                    )
                );
                $message = "Message has been resend successfully";
            } catch (Exception $e) {
                $error .= "Mailer Error: " . $mail->ErrorInfo;
            }
        } else {
            $delta = 3600;
            if ($user_time + $delta <= $_SERVER["REQUEST_TIME"]) {
                $tokens = sha1(uniqid(Input::get('ett_id'), true));
                // update database
                $query = "UPDATE pending_users SET user_timestamp = :user_time, user_count = :user_count, user_token = :token WHERE user_passkey = :passkey ";
                $statement = $connect->prepare($query);
                $statement->execute(
                    array(
                        ':user_time'  => $_SERVER["REQUEST_TIME"],
                        ':user_count' => 0,
                        ':token' => convert_string('encrypt', $tokens),
                        ':passkey' => Input::get('ett_id')
                    )
                );
                $user = new Teacher(Input::get('ett_id'));

                $TeacherName = convert_string('decrypt', $user->data()->ett_name);
                $TeacherMail =  convert_string('decrypt', $user->data()->ett_email);
                $TeacherPasskey =  convert_string('decrypt', $user->data()->ett_hash);
                $TeacherToken =  $tokens;
                $TeacherStatus = 'Inactive';
                $TeacherVerifyAddress = "http://localhost:90/teacher/ett_verify.php";

                //Sending an Email
                $mail = new PHPMailer(true);
                //Set PHPMailer to use SMTP.
                $mail->isSMTP();
                //Set SMTP host name                          
                $mail->Host = "smtp.gmail.com";
                //Set this to true if SMTP host requires authentication to send email
                $mail->SMTPAuth = true;
                //Provide username and password     
                $mail->Username = "skbabyali79@gmail.com";
                $mail->Password = "8170946250";
                //If SMTP requires TLS encryption then set it
                $mail->SMTPSecure = "tls";
                //Set TCP port to connect to
                $mail->Port = 587;

                $mail->From = "skbabyali79@gmail.com";
                $mail->FromName = "Enhanced Teaching";

                $mail->addAddress($TeacherMail, $TeacherName);

                $mail->isHTML(true);

                $mail->Subject = "Verify Your Account - $TeacherName | Enhanced Teachinng";
                $mail->Body = "<b>Hello, $TeacherName </b> - Your account has been created as a Teacher<br>
                    <br> <a href='$TeacherVerifyAddress?TeacherPasskey=$TeacherPasskey&TeacherToken=$TeacherToken&TeacherActiveStatus=$TeacherStatus' class='btn btn-success btn-rounded'>Click Here to Verify</a>";
                $mail->AltBody = "Verify Your Account - $TeacherName";

                try {
                    $mail->send();
                    $message = "Message has been resend successfully";
                } catch (Exception $e) {
                    $error .= "Mailer Error: " . $mail->ErrorInfo;
                }
            } else {
                $error .= "Try Again after " . ($user_time + $delta - $_SERVER["REQUEST_TIME"]) . " Sec.";
            }
        }
    }
    $data = array(
        'message' => $message,
        'error' => $error
    );
    echo json_encode($data);
}

if (isset($_POST["forgot_action"])) {
    if ($_POST["forgot_action"] == "forgot_action" && Input::get('token') && Input::get('passkey')) {
        $user = new Forgot_Password(convert_string('encrypt', Input::get('email')));
        if ($user->exists()) {
            if ($user->data()->ett_verify === 'Verified') {
                try {
                    $TeacherName = convert_string('decrypt', $user->data()->ett_name);
                    $TeacherMail =  convert_string('decrypt', $user->data()->ett_email);
                    $TeacherHash = convert_string('decrypt', $user->data()->ett_hash);
                    $old_hash = $user->data()->ett_hash;
                    $TeacherVerifyAddress = "http://localhost:90/teacher/reset_password.php";
                    if ($user->ett_find($user->data()->ett_hash)) {
                        $count = $user->data()->user_count;
                        //update user_count and server time..
                        $query = "UPDATE reseting_password SET user_timestamp = :user_time, user_count = :user_count WHERE old_hash = :old_hash";
                        $statement = $connect->prepare($query);
                        $statement->execute(
                            array(
                                ':user_time' => $_SERVER["REQUEST_TIME"],
                                ':user_count' => $count + 1,
                                ':old_hash' => $old_hash
                            )
                        );
                        if ($count < 3) {
                            $TeacherPasskey =   convert_string('decrypt', $user->data()->user_passkey);
                            $TeacherToken =  convert_string('decrypt', $user->data()->user_hash);
                            //Sending an Email
                            $mail = new PHPMailer(true);
                            //Set PHPMailer to use SMTP.
                            $mail->isSMTP();
                            //Set SMTP host name                          
                            $mail->Host = "smtp.gmail.com";
                            //Set this to true if SMTP host requires authentication to send email
                            $mail->SMTPAuth = true;
                            //Provide username and password     
                            $mail->Username = "skbabyali79@gmail.com";
                            $mail->Password = "8170946250";
                            //If SMTP requires TLS encryption then set it
                            $mail->SMTPSecure = "tls";
                            //Set TCP port to connect to
                            $mail->Port = 587;

                            $mail->From = "skbabyali79@gmail.com";
                            $mail->FromName = "Enhanced Teaching";

                            $mail->addAddress($TeacherMail, $TeacherName);

                            $mail->isHTML(true);

                            $mail->Subject = "Reset Your Password - $TeacherName | Enhanced Teachinng";
                            $mail->Body = "<b>Hello, $TeacherName </b> - Click the link below to reset your account password<br><b>It only Valid for 15 min</b><br>
                            <br> <a href='$TeacherVerifyAddress?TeacherPasskey=$TeacherPasskey&TeacherToken=$TeacherToken&TeacherHash=$TeacherHash' class='btn btn-success btn-rounded'>Click Here to Verify</a>";
                            $mail->AltBody = "Verify Your Account - $TeacherName";

                            try {
                                $mail->send();
                                $message = "Reset Link has been resend successfully";
                            } catch (Exception $e) {
                                $error .= "Mailer Error: " . $mail->ErrorInfo;
                            }
                        } else {
                            $user_time = $user->data()->user_timestamp;
                            $delta = 3600;
                            if ($user_time + $delta <= $_SERVER["REQUEST_TIME"]) {
                                $user_passkey = Hash::unique();
                                $user_tokens = Token::generate();
                                // update database
                                $query = "UPDATE reseting_password SET user_passkey = :passkey, user_hash = :user_hash, user_timestamp = :user_time, user_count = :user_count WHERE old_hash = :old_hash";
                                $statement = $connect->prepare($query);
                                $statement->execute(
                                    array(
                                        ':passkey' => convert_string('encrypt', $user_passkey),
                                        ':user_hash' => convert_string('encrypt', $user_tokens),
                                        ':user_time' => $_SERVER["REQUEST_TIME"],
                                        ':user_count' => 0,
                                        ':old_hash' => $old_hash
                                    )
                                );

                                //Sending an Email
                                $mail = new PHPMailer(true);
                                //Set PHPMailer to use SMTP.
                                $mail->isSMTP();
                                //Set SMTP host name                          
                                $mail->Host = "smtp.gmail.com";
                                //Set this to true if SMTP host requires authentication to send email
                                $mail->SMTPAuth = true;
                                //Provide username and password     
                                $mail->Username = "skbabyali79@gmail.com";
                                $mail->Password = "8170946250";
                                //If SMTP requires TLS encryption then set it
                                $mail->SMTPSecure = "tls";
                                //Set TCP port to connect to
                                $mail->Port = 587;

                                $mail->From = "skbabyali79@gmail.com";
                                $mail->FromName = "Enhanced Teaching";

                                $mail->addAddress($TeacherMail, $TeacherName);

                                $mail->isHTML(true);

                                $mail->Subject = "Reset Your Password - $TeacherName | Enhanced Teachinng";
                                $mail->Body = "<b>Hello, $TeacherName </b> - Click the link below to reset your password<br><b>It only Valid for 15 min</b><br>
                                <br> <a href='$TeacherVerifyAddress?TeacherPasskey=$user_passkey&TeacherToken=$user_tokens&TeacherHash=$TeacherHash' class='btn btn-success btn-rounded'>Click Here to Verify</a>";
                                $mail->AltBody = "Verify Your Account - $TeacherName";

                                try {
                                    $mail->send();
                                    $message = "Reset Link has been resend successfully";
                                } catch (Exception $e) {
                                    $error .= "Mailer Error: " . $mail->ErrorInfo;
                                }
                            } else {
                                $error .= "Try Again after " . ($user_time + $delta - $_SERVER["REQUEST_TIME"]) . " Sec.";
                            }
                        }
                    } else {
                        $user->create('reseting_password', array(
                            'user_passkey' => convert_string('encrypt', Input::get('passkey')),
                            'user_hash' => convert_string('encrypt', Input::get('token')),
                            'old_hash' => $user->data()->ett_hash,
                            'user_timestamp' => $_SERVER["REQUEST_TIME"],
                            'user_count' => 0
                        ));
                        $TeacherPasskey = Input::get('passkey');
                        $TeacherToken = Input::get('token');
                        //Sending an Email
                        $mail = new PHPMailer(true);
                        //Set PHPMailer to use SMTP.
                        $mail->isSMTP();
                        //Set SMTP host name                          
                        $mail->Host = "smtp.gmail.com";
                        //Set this to true if SMTP host requires authentication to send email
                        $mail->SMTPAuth = true;
                        //Provide username and password     
                        $mail->Username = "skbabyali79@gmail.com";
                        $mail->Password = "8170946250";
                        //If SMTP requires TLS encryption then set it
                        $mail->SMTPSecure = "tls";
                        //Set TCP port to connect to
                        $mail->Port = 587;

                        $mail->From = "skbabyali79@gmail.com";
                        $mail->FromName = "Enhanced Teaching";

                        $mail->addAddress($TeacherMail, $TeacherName);

                        $mail->isHTML(true);

                        $mail->Subject = "Reset Your Password - $TeacherName | Enhanced Teachinng";
                        $mail->Body = "<b>Hello, $TeacherName </b> - Click the link below to reset your account password<br><b>It only Valid for 15 min</b><br>
                            <br> <a href='$TeacherVerifyAddress?TeacherPasskey=$TeacherPasskey&TeacherToken=$TeacherToken&TeacherHash=$TeacherHash' class='btn btn-success btn-rounded'>Click Here to Verify</a>";
                        $mail->AltBody = "Verify Your Account - $TeacherName";

                        try {
                            $mail->send();
                            $message = "Reset link has been resend successfully";
                        } catch (Exception $e) {
                            $error .= "Mailer Error: " . $mail->ErrorInfo;
                        }
                    }
                } catch (Exception $e) {
                    $error .= $e->getMessage();
                }
            } else {
                $error = "Verify Your Email First";
            }
        } else {
            $error = "Sorry! User not registered";
        }
    } else {
        $error = "Token Mismatch";
    }
    $data = array(
        'message' => $message,
        'error' => $error
    );
    echo json_encode($data);
}

if (isset($_POST["_reset"])) {
    if ($_POST["_reset"] == "_reset_user") {
        $validate = new Validate();
        $validate->check($_POST, array(
            'password' => array(
                'ett_name' => 'Password',
                'ett_id' => 'ett_password',
                'required' => true,
            ),
            'token' => array(
                'ett_name' => 'Token',
                'ett_id' => 'ett_hash',
                'required' => true,
                'unique' => 'et_teacher'
            ),
            'passkey' => array(
                'ett_name' => 'Pass Key',
                'ett_id' => 'ett_passkey',
                'required' => true,
                'unique' => 'et_teacher'
            ),
            'hash' => array(
                'ett_name' => 'Hash',
                'ett_id' => 'ett_hash',
                'required' => true,
            ),
        ));
        if ($validate->passed()) {
            try {
                //update query
                $query = "UPDATE et_teacher SET ett_hash = :user_hash, ett_password = :pass WHERE ett_hash = :old_hash";
                $statement = $connect->prepare($query);
                $statement->execute(
                    array(
                        ':user_hash' => convert_string('encrypt', Input::get('token')),
                        ':pass' => convert_string('encrypt', Input::get('password')),
                        ':old_hash' => convert_string('encrypt', Input::get('hash')),
                    )
                );
                //delete query
                $querys = "DELETE FROM reseting_password WHERE old_hash = :user_hash";
                $statements = $connect->prepare($querys);
                $statements->execute(
                    array(
                        ':user_hash' => convert_string('encrypt', Input::get('hash')),
                    )
                );
                //fetch user data..
                $user = new Teacher(convert_string('encrypt', Input::get('token')));
                $TeacherName = convert_string('decrypt', $user->data()->ett_name);
                $TeacherMail =  convert_string('decrypt', $user->data()->ett_email);
                $TeacherVerifyAddress = "http://localhost:90/teacher/";
                //Sending an Email
                $mail = new PHPMailer(true);
                //Set PHPMailer to use SMTP.
                $mail->isSMTP();
                //Set SMTP host name                          
                $mail->Host = "smtp.gmail.com";
                //Set this to true if SMTP host requires authentication to send email
                $mail->SMTPAuth = true;
                //Provide username and password     
                $mail->Username = "skbabyali79@gmail.com";
                $mail->Password = "8170946250";
                //If SMTP requires TLS encryption then set it
                $mail->SMTPSecure = "tls";
                //Set TCP port to connect to
                $mail->Port = 587;

                $mail->From = "skbabyali79@gmail.com";
                $mail->FromName = "Enhanced Teaching";

                $mail->addAddress($TeacherMail, $TeacherName);

                $mail->isHTML(true);

                $mail->Subject = "[Password Updated] - $TeacherName | Enhanced Teachinng";
                $mail->Body = "<b>Hello, $TeacherName </b> - Your Password Has Been Updated<br>
                        <br> <a href='$TeacherVerifyAddress' class='btn btn-success btn-rounded'>Login</a>";
                $mail->AltBody = "Login to your account - $TeacherName";

                try {
                    $mail->send();
                } catch (Exception $e) {
                    $error .= "Mailer Error: " . $mail->ErrorInfo;
                }
                $message .= "Password Has been Updated";
            } catch (Exception $e) {
                $error .= $e->getMessage();
            }
        } else {
            foreach ($validate->errors() as $err) {
                $error .=  $err . '</>';
            }
        }
    } else {
        Redirect::to(404);
    }
    $data = array(
        'message' => $message,
        'error' => $error
    );
    echo json_encode($data);
}
*/
