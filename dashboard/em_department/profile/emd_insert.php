<?php
include('../../includes/db.php');
include('../../includes/function.php');
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
				'ett_name' => 'Faculty Name',
				'required' => true,
				'min' => 3,				
				'em_name' => 'fac_name',
			),
			'ett_qua' => array(
				'ett_name' => 'Faculty Qualification',
				'required' => true,
				'min' => 3,				
				'em_name' => 'fac_qualification',
			),
			'ett_location' => array(
				'ett_name' => 'Faculty Address',
				'required' => true,
				'min' => 3,				
				'em_name' => 'fac_address',
			),
			'ett_des' => array(
				'ett_name' => 'Faculty Designation',
				'required' => true,
				'min' => 3,				
				'em_name' => 'fac_designation',
			),
			'ett_dept' => array(
				'ett_name' => 'Faculty Department',
				'required' => true,
				'min' => 3,				
				'em_name' => 'fac_department',
			),
			'ett_role' => array(
				'ett_name' => 'Faculty Role',
				'required' => true,
				'min' => 3,				
				'em_name' => 'fac_role',
			),
			'ett_phone' => array(
				'ett_name' => 'Phone No',
				'required' => true,
				'min' => 10,
				'max' => 10,
				'em_name' => 'fac_phone',
				'unique' => 'em_faculty'
			),
			'ett_username' => array(
				'ett_name' => 'Username',
				'required' => true,
				'min' => 6,
				'max' => 10,
				'em_name' => 'fac_username',
				'unique' => 'em_faculty'
			),
			'ett_email' => array(
				'ett_name' => 'Email',
				'required' => true,
				'min' => 2,
				'max' => 50,
				'em_name' => 'fac_email',
				'unique' => 'em_faculty'
			),
			'ett_password' => array(
				'ett_name' => 'Password',
				'required' => true,
				'min' => 6,
				'em_name' => 'fac_password',
				'unique' => 'em_faculty'
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
				'unique' => 'em_faculty'
			),
			'ett_hash' => array(
				'ett_name' => 'Token',
				'required' => true,
				'em_name' => 'fac_hash',
				'unique' => 'em_faculty'
			),

		));

		if ($validate->passed()) {
			$user = new Faculty();
			$status = "Active";			
			try {
				$dept = $db->get('em_department',array('dept_passkey','=',convert_string('encrypt',Input::get('ett_dept'))));
				if($dept->count()){
					$deptname = $dept->first()->dept_name;
				}
				$user->create(array(
					'fac_name' => $_POST["ett_name"],
					'fac_role' => $_POST["ett_role"],
					'fac_username' => $_POST["ett_username"],
					'fac_email' => $_POST["ett_email"],
					'fac_phone' => $_POST["ett_phone"],
					'fac_address' => $_POST["ett_location"],
					'fac_designation' => $_POST["ett_des"],
					'fac_qualification' => $_POST["ett_qua"],
					'fac_department' => $deptname,
					'fac_dept_hash' => convert_string('encrypt',Input::get('ett_dept')),
					'fac_phone' => $_POST["ett_phone"],
					'fac_password' => convert_string('encrypt', $_POST["ett_password"]),
					'fac_passkey' => convert_string('encrypt', $_POST["ett_passkey"]),
					'fac_hash' => convert_string('encrypt', $_POST["ett_hash"]),
					'fac_status' => $status,
					'fac_created_by' => $users->data()->passkey,
				));

				$msg .= 'Faculty Added';
				
			} catch (Exception $e) {
				$msg .=  $e->getMessage();
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
		$query = "SELECT * FROM `em_faculty` WHERE `fac_hash` = :ett_id";
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
			$data["te_role"] = $row["fac_role"];
			$data["te_dept"] = convert_string('decrypt',$row["fac_dept_hash"]);
			$data["te_qua"] = $row["fac_qualification"];
			$data["te_des"] = $row["fac_designation"];
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
        UPDATE em_faculty 
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
