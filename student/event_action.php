<?php

require_once 'core/init.php';
require_once 'core/DB.php';
require_once '../includes/function.php';
$db = DB::getInstance();
$message = '';
$error = '';
$user = new Student();
$data = $user->data();
if (Input::exists()) {

    if (Input::get('action') == 'add_event') {
        $validate = new Event_Validate();
        $validate->check($_POST, array(
            'e_name' => array(
                'required' => true,
                'ett_name' => 'Event Name',
                'em_name' => 'fe_name',
            ),
            'e_venue' => array(
                'required' => true,
                'ett_name' => 'Venue',
                'em_name' => 'Venue',
            ),
            'e_des' => array(
                'required' => true,
                'ett_name' => 'Description',
                'em_name' => 'Description',
            ),
            'e_activity' => array(
                'required' => true,
                'ett_name' => 'Activity',
                'em_name' => 'Activity',
            ),
            'e_topic' => array(
                'required' => true,
                'ett_name' => 'Topic',
                'em_name' => 'Topic',
            ),
            'e_sdate' => array(
                'required' => true,
                'ett_name' => 'Event Start Date',
                'em_name' => 'Event Start Date',
            ),
            'e_edate' => array(
                'required' => true,
                'ett_name' => 'Event End Date',
                'em_name' => 'Event End Date',
            ),
            'e_year' => array(
                'required' => true,
                'ett_name' => 'Event Year',
                'em_name' => 'Event Year',
            ),
            'e_passkey' => array(
                'required' => true,
                'ett_name' => 'Event Passkey',
                'em_name' => 'fe_passkey',
                'unique' => 'fas_event'
            ),
            'e_token' => array(
                'required' => true,
                'ett_name' => 'Event Hash',
                'em_name' => 'fe_hash',
                'unique' => 'fas_event'
            ),
        ));
        if ($validate->passed()) {
            try {
                /*
                if(!empty($_FILES['e_file']['tmp_name']) && file_exists($_FILES['e_file']['tmp_name'])){ 
                    $dir_name = 'upload/';
                    $filename = $_FILES["e_file"]["name"];
                    $file = $_FILES["e_file"]["tmp_name"];
                    $tmp = explode(".", $filename);
                    $extension = end($tmp);                                        
                    $newfilename =  Input::get('e_passkey') . "." . $extension;
                    move_uploaded_file($file, $dir_name . "/" . $newfilename);
                    $filename = $newfilename;
                }else{
                    $filename = '';
                }
                */
                $fe_event = $db->insert('fas_event', array(
                    'fe_name' => Input::get('e_name'),
                    'fe_desc' => Input::get('e_des'),
                    'fe_venue' => Input::get('e_venue'),
                    'fe_topic' => Input::get('e_topic'),
                    'fe_activity' => Input::get('e_activity'),
                    'fe_s_date' => Input::get('e_sdate'),
                    'fe_e_date' => Input::get('e_edate'),
                    'fe_year' => Input::get('e_year'),
                    'fe_hash' => convert_string('encrypt', Input::get('e_token')),
                    'fe_passkey' => convert_string('encrypt', Input::get('e_passkey')),
                    'fe_std_hash' => convert_string('encrypt', Input::get('fac_hash')),
                    'fe_mentor_hash' => convert_string('encrypt', Input::get('fac_men_hash')),
                    'fe_dept_hash' => convert_string('encrypt', Input::get('dept_hash')),
                    'fe_cer_link' => Input::get('e_cer_link'),
                    'fe_img_link' => Input::get('e_img_link'),
                    'fe_status' => 'Active',
                ));
                $message = "Event Created";
            } catch (Exception $e) {
                $error .=  $e->getMessage();
            }
        } else {
            foreach ($validate->errors() as $err) {
                $error .= $err;
            }
        }
        $data = array(
            'message' => $message,
            'error' => $error
        );
        echo json_encode($data);
    }

    if (Input::get('action') == 'profile_update') {
        $te_updated_at = date("h:i:sa");
        
        if (!empty($_FILES['ett_image']['tmp_name']) && file_exists($_FILES['ett_image']['tmp_name'])) {
            $ett_image = file_get_contents($_FILES['ett_image']['tmp_name']);
        }

        if ($_FILES['ett_image']['error'] == 0) {
            $query = "UPDATE em_students SET fac_image = :d_image WHERE fac_passkey = :dept_pass ";
            $statement = $connect->prepare($query);
            $statement->execute(array(
                ':d_image' => $ett_image,
                ':dept_pass' => convert_string('encrypt', Input::get('ett_passkey'))
            ));
            $message .= "Image Updated<br>";
        }

        if (Input::get('te_name') != '' && Input::get('te_name') != $data->fac_name) {
            $query = "SELECT fac_name FROM em_students WHERE fac_name = :_name";
            $statement = $connect->prepare($query);
            $statement->execute(array(
                ':_name' => Input::get('te_name'),
            ));
            if ($statement->rowCount() > 0) {
                $message .= "Student Name Exists<br>";
            } else {
                $query = "UPDATE em_students SET fac_name = :et_name, fac_updated_at = :ett_updated_at WHERE fac_passkey = :et_token";
                $statements = $connect->prepare($query);
                $statements->execute(
                    array(
                        ':et_name' => Input::get('te_name'),
                        ':et_token' => convert_string('encrypt', Input::get('ett_passkey')),
                        ':ett_updated_at' => $te_updated_at,
                    )
                );
                $message .= "Student Name Updated<br>";
            }
        }

        if (Input::get('te_username') != '' && Input::get('te_username') != $data->fac_username) {
            $query = "SELECT fac_username FROM em_students WHERE fac_username = :_name";
            $statement = $connect->prepare($query);
            $statement->execute(array(
                ':_name' => Input::get('te_username'),
            ));
            if ($statement->rowCount() > 0) {
                $message .= "Student Name Exists<br>";
            } else {
                $query = "UPDATE em_students SET fac_username = :et_name, fac_updated_at = :ett_updated_at WHERE fac_passkey = :et_token";
                $statements = $connect->prepare($query);
                $statements->execute(
                    array(
                        ':et_name' => Input::get('te_username'),
                        ':et_token' => convert_string('encrypt', Input::get('ett_passkey')),
                        ':ett_updated_at' => $te_updated_at,
                    )
                );
                $message .= "Student Username Updated<br>";
            }
        }

        if (Input::get('te_dob') != '' && Input::get('te_dob') != $data->fac_dob) {
            $query = "UPDATE em_students SET fac_dob = :et_name, fac_updated_at = :ett_updated_at WHERE fac_passkey = :et_token";
            $statements = $connect->prepare($query);
            $statements->execute(
                array(
                    ':et_name' => Input::get('te_dob'),
                    ':et_token' => convert_string('encrypt', Input::get('ett_passkey')),
                    ':ett_updated_at' => $te_updated_at,
                )
            );
            $message .= "Date of Birth Updated<br>";
        }

        if (Input::get('te_gen') != '' && Input::get('te_gen') != $data->fac_gender) {
            $query = "UPDATE em_students SET fac_gender = :et_name, fac_updated_at = :ett_updated_at WHERE fac_passkey = :et_token";
            $statements = $connect->prepare($query);
            $statements->execute(
                array(
                    ':et_name' => Input::get('te_gen'),
                    ':et_token' => convert_string('encrypt', Input::get('ett_passkey')),
                    ':ett_updated_at' => $te_updated_at,
                )
            );
            $message .= "Gender Updated<br>";
        }

        if (Input::get('te_year') != '' && Input::get('te_year') != $data->fac_year) {
            $query = "UPDATE em_students SET fac_year = :et_name, fac_updated_at = :ett_updated_at WHERE fac_passkey = :et_token";
            $statements = $connect->prepare($query);
            $statements->execute(
                array(
                    ':et_name' => Input::get('te_year'),
                    ':et_token' => convert_string('encrypt', Input::get('ett_passkey')),
                    ':ett_updated_at' => $te_updated_at,
                )
            );
            $message .= "Academic Year Updated<br>";
        }

        if (Input::get('te_address') != '' && Input::get('te_address') != $data->fac_address) {
            $query = "UPDATE em_students SET fac_address = :et_name, fac_updated_at = :ett_updated_at WHERE fac_passkey = :et_token";
            $statements = $connect->prepare($query);
            $statements->execute(
                array(
                    ':et_name' => Input::get('te_address'),
                    ':et_token' => convert_string('encrypt', Input::get('ett_passkey')),
                    ':ett_updated_at' => $te_updated_at,
                )
            );
            $message .= "Address Updated<br>";
        }

        if (Input::get('te_phone') != '' && Input::get('te_phone') == $data->fac_phone) {
        } else {
            $query = "SELECT fac_phone FROM em_students WHERE fac_phone = :ett_phone";
            $statement = $connect->prepare($query);
            $statement->execute(
                array(
                    ':ett_phone' => Input::get('te_phone'),
                )
            );
            $row = $statement->rowCount();
            if ($row > 0) {
                $error .= 'Sorry! Phone no already registered<br>';
            } else {
                $query = "UPDATE em_students SET fac_phone = :ett_phone WHERE fac_passkey = :ett_token";
                $statement = $connect->prepare($query);
                $statement->execute(
                    array(
                        ':ett_phone' => Input::get('te_phone'),
                        ':ett_token' => convert_string('encrypt', Input::get('ett_passkey'))
                    )
                );
                $result = $statement->fetchAll();
                if (isset($result)) {
                    /*
                    $ett_number = '+91'. $_POST["te_phone"];
                    $ett_name = $_POST["te_name"];
                    // Your Account SID and Auth Token from twilio.com/console
                    $account_sid = '';
                    $auth_token = '';
                    // In production, these should be environment variables. E.g.:
                    // $auth_token = $_ENV["TWILIO_AUTH_TOKEN"]

                    // A Twilio number you own with SMS capabilities
                    $twilio_number = "";
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
                    $message .= 'New Phone No Updated<br>';
                } else {
                    $error .= 'Error! While Updating New Phone No<br>';
                }
            }
        }

        if (Input::get('te_email') != '' && Input::get('te_email') == $data->fac_email) {
        } else {
            $query = "SELECT fac_email FROM em_students WHERE fac_email = :ett_email";
            $statement = $connect->prepare($query);
            $statement->execute(
                array(
                    ':ett_email' => Input::get('te_email'),
                )
            );
            $row = $statement->rowCount();
            if ($row > 0) {
                $message .= 'Sorry! Email already registered<br>';
            } else {
                $query = "UPDATE em_students SET fac_email = :ett_email WHERE fac_passkey = :ett_token";
                $statement = $connect->prepare($query);
                $statement->execute(
                    array(
                        ':ett_email' => Input::get('te_email'),
                        ':ett_token' => convert_string('encrypt', Input::get('ett_passkey'))
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
                    $mail->Username = "skbabyali79@gmail.com";
                    $mail->Password = "8170946250";
                    //If SMTP requires TLS encryption then set it
                    $mail->SMTPSecure = "tls";
                    //Set TCP port to connect to
                    $mail->Port = 587;

                    $mail->From = "skbabyali79@gmail.com";
                    $mail->FromName = "SK Niyaj Ali";

                    $mail->addAddress($_POST["te_email"], $_POST["te_name"]);

                    $mail->isHTML(true);

                    $mail->Subject = "Verify Your Email - " . $_POST["te_name"] . " ";
                    $mail->Body = "<b>Hello, " . $_POST["te_name"] . " " . $_POST["te_lastname"] . " </b><br> - Click the link below to Verify Your Email Address<br><br><a href='http://localhost/enhancedteaching/et/'>Verify</a>";
                    $mail->AltBody = "Use this credentials to login in our website,And Do not forget change our default password.Thank You";

                    try {
                        $mail->send();
                        $message .=  "Message has been sent successfully";
                    } catch (Exception $e) {
                        $message .= "Mailer Error: " . $mail->ErrorInfo;
                    }
                    */
                    $message .=  "Student Email Updated";
                } else {
                    $error .= 'Error! While Updating Email<br>';
                }
            }
        }


        $data = array(
            'message' => $message,
            'error' => $error
        );
        echo json_encode($data);
    }

    if (Input::get('action') == 'password_update') {
        if (Input::get('old_password')) {
            if (convert_string('encrypt', Input::get('old_password')) == $data->fac_password) {
                if (convert_string('encrypt', Input::get('new_password')) == convert_string('encrypt', Input::get('con_password'))) {
                    if (convert_string('encrypt', Input::get('new_password')) != $data->fac_password) {
                        $query = "UPDATE em_students SET fac_password = :_pass WHERE fac_passkey = :_passkey";
                        $statement = $connect->prepare($query);
                        if ($statement->execute(array(
                            ':_pass' => convert_string('encrypt', Input::get('new_password')),
                            ':_passkey' => convert_string('encrypt', Input::get('ett_passkey'))
                        ))) {
                            $message = "Password Updated";
                            $user->logout();
                        }else{
                            $error = "Somthing Went Wrong!";
                        }
                        
                    }else {
                        $error .= "New Password is same as old!";
                    }
                } else {
                    $error = "New Password and Confirm Password not match";
                }
            } else {
                $error = "Old Password not match";
            }
        }

        $data = array(
            'message' => $message,
            'error' => $error
        );
        echo json_encode($data);
    }
}
