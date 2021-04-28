<?php

require_once 'core/init.php';
require_once 'core/DB.php';
require_once '../includes/function.php';
$db = DB::getInstance();

if (Input::exists()) {
    $message = '';
    $error = '';
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
                'unique' => 'fac_event'
            ),
            'e_token' => array(
                'required' => true,
                'ett_name' => 'Event Hash',
                'em_name' => 'fe_hash',
                'unique' => 'fac_event'
            ),
        ));
        if ($validate->passed()) {
            try {

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
                $fe_event = $db->insert('fac_event', array(
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
                    'fe_fac_hash' => convert_string('encrypt', Input::get('fac_hash')),
                    'fe_dept_hash' => convert_string('encrypt', Input::get('dept_hash')),
                    'fe_file' => $filename,
                    'fe_certificate' => Input::get('e_cer'),
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
    }
    $data = array(
        'message' => $message,
        'error' => $error
    );
    echo json_encode($data);
}
