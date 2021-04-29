<?php
include('../includes/db.php');
include('../includes/function.php');
require_once 'core/init.php';

if (isset($_POST["operation"])) {
	if ($_POST["operation"] == "Add") {
		$msg = '';
		$err = '';
		$validate = new Validate();
		$validate->check($_POST, array(
			'ett_name' => array(
				'ett_name' => 'Department Name',
				'required' => true,
				'min' => 3,				
				'em_name' => 'dept_name',
				'unique' => 'em_department'
			),
			'ett_sname' => array(
				'ett_name' => 'Department Short Name',
				'required' => true,
				'min' => 3,				
				'em_name' => 'dept_sname',
				'unique' => 'em_department'
			),
			'ett_phone' => array(
				'ett_name' => 'Phone No',
				'required' => true,
				'min' => 10,
				'max' => 10,
				'em_name' => 'dept_phone',
				'unique' => 'em_department'
			),
			'ett_username' => array(
				'ett_name' => 'Username',
				'required' => true,
				'min' => 6,
				'max' => 10,
				'em_name' => 'dept_username',
				'unique' => 'em_department'
			),
			'ett_email' => array(
				'ett_name' => 'Email',
				'required' => true,
				'min' => 2,
				'max' => 50,
				'em_name' => 'dept_email',
				'unique' => 'em_department'
			),
			'ett_password' => array(
				'ett_name' => 'Password',
				'required' => true,
				'min' => 6,
				'em_name' => 'dept_password',
				'unique' => 'em_department'
			),
			'ett_cpassword' => array(
				'ett_name' => 'Confirm Password',
				'required' => true,
				'em_name' => 'dept_password',
				'matches' => 'ett_password'
			),
			'ett_passkey' => array(
				'ett_name' => 'Passkey',
				'required' => true,
				'em_name' => 'dept_passkey',
				'unique' => 'em_department'
			),
			'ett_hash' => array(
				'ett_name' => 'Token',
				'required' => true,
				'em_name' => 'dept_hash',
				'unique' => 'em_department'
			),

		));

		if ($validate->passed()) {
			$user = new Department();
			$status = "Active";
			$ett_joined_by = "Admin";
			try {
				$user->create(array(
					'dept_name' => $_POST["ett_name"],
					'dept_sname' => $_POST["ett_sname"],
					'dept_username' => $_POST["ett_username"],
					'dept_email' => $_POST["ett_email"],
					'dept_phone' => $_POST["ett_phone"],
					'dept_password' => convert_string('encrypt', $_POST["ett_password"]),
					'dept_passkey' => convert_string('encrypt', $_POST["ett_passkey"]),
					'dept_hash' => convert_string('encrypt', $_POST["ett_hash"]),
					'dept_status' => $status,
					'dept_created_by' => $ett_joined_by,
				));

				$msg .= 'Department Added';
				
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
		$query = "SELECT * FROM `em_department` WHERE `dept_hash` = :ett_id";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':ett_id' => convert_string('encrypt',$_POST['ett_id'])
			)
		);
		$result = $statement->fetchAll();
		foreach ($result as $row) {
			$data["te_name"] = $row["dept_name"];
			$data["te_sname"] = $row["dept_sname"];
			$data["te_phone"] = $row["dept_phone"];
			$data["te_email"] = $row["dept_email"];
			$data["te_username"] = $row["dept_username"];
			$data["te_password"] = convert_string('decrypt', $row["dept_password"]);
			$data["te_passkey"] = convert_string('decrypt', $row["dept_passkey"]);
			$data["te_token"] = convert_string('decrypt', $row["dept_hash"]);
		}
		echo json_encode($data);
	}else {
		$ett_status = 'Active';
		if ($_POST['ett_status'] == 'Active') {
			$ett_status = 'Inactive';
		}
		$query = "
        UPDATE em_department 
        SET dept_status = :ett_status 
        WHERE dept_hash = :ett_hash
        ";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':ett_status'  =>  $ett_status,
				':ett_hash'      =>  convert_string('encrypt',$_POST['ett_id'])
			)
		);
		$result = $statement->fetchAll();
		if (isset($result)) {
			$data =  'Department Status change to ' . $ett_status;
		}
		echo json_encode($data);
	}
}
