<?php
include('../includes/db.php');
include('../includes/function.php');
require_once 'core/init.php';
$db = DB::getInstance();
$users = new User();

if (isset($_POST["operation"])) {
	if ($_POST["operation"] == "Add") {
		$msg = '';
		$err = '';
		$validate = new Validate();
		$validate->check($_POST, array(
			'ett_name' => array(
				'ett_name' => 'Student Name',
				'required' => true,
				'min' => 3,				
				'em_name' => 'fac_name',
			),
			'ett_year' => array(
				'ett_name' => 'Student Year',
				'required' => true,
				'min' => 3,				
				'em_name' => 'fac_year',
			),
			'ett_location' => array(
				'ett_name' => 'Student Address',
				'required' => true,
				'min' => 3,				
				'em_name' => 'fac_address',
			),
			'ett_gen' => array(
				'ett_name' => 'Student Gender',
				'required' => true,
				'min' => 3,				
				'em_name' => 'fac_gender',
			),
			'ett_dept' => array(
				'ett_name' => 'Student Department',
				'required' => true,
				'min' => 3,				
				'em_name' => 'fac_department',
			),
			'ett_mentor' => array(
				'ett_name' => 'Student Mentor',
				'required' => true,
				'min' => 3,				
				'em_name' => 'fac_mentor',
			),
			'ett_roll' => array(
				'ett_name' => 'Student Roll/Reg No',
				'required' => true,
				'min' => 3,				
				'em_name' => 'fac_rollno',
			),
			'ett_phone' => array(
				'ett_name' => 'Phone No',
				'required' => true,
				'min' => 10,
				'max' => 10,
				'em_name' => 'fac_phone',
				'unique' => 'em_students'
			),
			'ett_username' => array(
				'ett_name' => 'Username',
				'required' => true,
				'min' => 6,
				'max' => 10,
				'em_name' => 'fac_username',
				'unique' => 'em_students'
			),
			'ett_email' => array(
				'ett_name' => 'Email',
				'required' => true,
				'min' => 2,
				'max' => 50,
				'em_name' => 'fac_email',
				'unique' => 'em_students'
			),
			'ett_password' => array(
				'ett_name' => 'Password',
				'required' => true,
				'min' => 6,
				'em_name' => 'fac_password',
				'unique' => 'em_students'
			),
			'ett_cpassword' => array(
				'ett_name' => 'Confirm Password',
				'required' => true,
				'em_name' => 'fac_password',
				'matches' => 'ett_password'
			),
			'ett_passkey' => array(
				'ett_name' => 'Passkey',
				'required' => true,
				'em_name' => 'fac_passkey',
				'unique' => 'em_students'
			),
			'ett_hash' => array(
				'ett_name' => 'Token',
				'required' => true,
				'em_name' => 'fac_hash',
				'unique' => 'em_students'
			),

		));

		if ($validate->passed()) {
			$user = new Student();
			$status = "Active";			
			try {
				$dept = $db->get('em_department',array('dept_passkey','=',convert_string('encrypt',Input::get('ett_dept'))));
				if($dept->count()){
					$deptname = $dept->first()->dept_name;
				}
				$depts = $db->get('em_faculty',array('fac_passkey','=',convert_string('encrypt',Input::get('ett_mentor'))));
				if($depts->count()){
					$mentname = $depts->first()->fac_name;
				}
				
				$user->create(array(
					'fac_name' => $_POST["ett_name"],
					'fac_rollno' => $_POST["ett_roll"],
					'fac_username' => $_POST["ett_username"],
					'fac_email' => $_POST["ett_email"],
					'fac_phone' => $_POST["ett_phone"],
					'fac_address' => $_POST["ett_location"],
					'fac_dob' => $_POST["ett_dob"],
					'fac_year' => $_POST["ett_year"],
					'fac_gender' => $_POST["ett_gen"],
					'fac_mentor' => $mentname,
					'fac_department' => $deptname,
					'fac_mentor_hash' => convert_string('encrypt',Input::get('ett_mentor')),
					'fac_dept_hash' => convert_string('encrypt',Input::get('ett_dept')),
					'fac_phone' => $_POST["ett_phone"],
					'fac_password' => convert_string('encrypt', $_POST["ett_password"]),
					'fac_passkey' => convert_string('encrypt', $_POST["ett_passkey"]),
					'fac_hash' => convert_string('encrypt', $_POST["ett_hash"]),
					'fac_status' => $status,
					'fac_created_by' => $users->data()->passkey,
				));
				
				$msg .= 'Student Added';
				
			} catch (Exception $e) {
				$err .=  $e->getMessage();
			}
		} else {
			foreach ($validate->errors() as $error) {
				$err .= $error  . '</br>';
			}
		}

		$data = array(
			'err' => $err,
			'msg' => $msg
		);
		echo json_encode($data);
	} elseif ($_POST["operation"] == "fetch_single") {
		$query = "SELECT * FROM `em_students` WHERE `fac_hash` = :ett_id";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':ett_id' => convert_string('encrypt',Input::get('ett_id'))
			)
		);
		$result = $statement->fetchAll();
		foreach ($result as $row) {
			$data["te_name"] = $row["fac_name"];
			$data["te_phone"] = $row["fac_phone"];
			$data["te_email"] = $row["fac_email"];
			$data["te_username"] = $row["fac_username"];
			$data["te_roll"] = $row["fac_rollno"];
			$data["te_dept"] = convert_string('decrypt',$row["fac_dept_hash"]);
			$data["te_mentor"] = convert_string('decrypt',$row["fac_mentor_hash"]);
			$data["te_year"] = $row["fac_year"];
			$data["te_gen"] = $row["fac_gender"];
			$data["te_dob"] = $row["fac_dob"];
			$data["te_location"] = $row["fac_address"];
			$data["te_password"] = convert_string('decrypt', $row["fac_password"]);
			$data["te_passkey"] = convert_string('decrypt', $row["fac_passkey"]);
			$data["te_token"] = convert_string('decrypt', $row["fac_hash"]);
		}
		echo json_encode($data);
	}else {
		$ett_status = 'Active';
		if ($_POST['ett_status'] == 'Active') {
			$ett_status = 'Inactive';
		}
		$query = "
        UPDATE em_students 
        SET fac_status = :ett_status 
        WHERE fac_hash = :ett_hash
        ";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':ett_status'  =>  $ett_status,
				':ett_hash'      =>  convert_string('encrypt',Input::get('ett_id'))
			)
		);
		$result = $statement->fetchAll();
		if (isset($result)) {
			$data =  'Department Status change to ' . $ett_status;
		}
		echo json_encode($data);
	}
}
