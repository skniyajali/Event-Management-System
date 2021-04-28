<?php
require('core/init.php');
include('../../includes/db.php');
include('../../includes/function.php');
$user = new User();
function description($string) {	
    $expr = '/(?<=\s|^)[A-Z]/';
    preg_match_all($expr, $string, $matches);    
    $result = implode('', $matches[0]);
    return $result;
 }
$query = '';

$output = array();

$query .= "SELECT * FROM `em_students` ";
if (isset($_POST["search"]["value"])) {
    $query .= 'WHERE fac_id LIKE "%' . $_POST["search"]["value"] . '%" ';
    $query .= 'OR fac_name LIKE "%' . $_POST["search"]["value"] . '%" ';
    $query .= 'OR fac_email LIKE "%' . $_POST["search"]["value"] . '%" ';
    $query .= 'OR fac_phone LIKE "%' . $_POST["search"]["value"] . '%" ';
    $query .= 'OR fac_username LIKE "%' . $_POST["search"]["value"] . '%" ';
    $query .= 'OR fac_mentor LIKE "%' . $_POST["search"]["value"] . '%" ';
    $query .= 'OR fac_year LIKE "%' . $_POST["search"]["value"] . '%" ';
    $query .= 'OR fac_rollno LIKE "%' . $_POST["search"]["value"] . '%" ';
    $query .= 'OR fac_address LIKE "%' . $_POST["search"]["value"] . '%" ';
    $query .= 'OR fac_department LIKE "%' . $_POST["search"]["value"] . '%" ';
    $query .= 'OR fac_username LIKE "%' . $_POST["search"]["value"] . '%" ';
    $query .= 'OR fac_status LIKE "%' . $_POST["search"]["value"] . '%" ';
    $query .= 'OR fac_dob LIKE "%' . $_POST["search"]["value"] . '%" ';
}

if (isset($_POST["order"])) {
    $query .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
} else {
    $query .= 'ORDER BY fac_id DESC ';
}

if ($_POST["length"] != -1) {
    $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();
$data = array();

$filtered_rows = $statement->rowCount();
$i = 0;
foreach($result as $row)
{
    $i++;
	$fac_image = '';
	if($row["fac_image"] != '')
	{
		$fac_image = '<div class="symbol symbol-50 flex-shrink-0"><img src="data:image/jpeg;base64,' . base64_encode($row['fac_image']) . '" alt="photo"></div>';
	}
	else
	{
		$fac_image = '<div class="symbol symbol-50 symbol-light-success" flex-shrink-0"=""><div class="symbol-label font-size-h5">'.description($row["fac_name"]).'</div></div>';
    }
    $status = '';
    if ($row["fac_status"] == 'Active') {
        $status = 'Active';
    } else {
        $status = 'Inactive';
    }
    
    $sub_array = array();
    $sub_array[] = $i;
	$sub_array[] = $fac_image;
	$sub_array[] = $row["fac_name"] ;
    $sub_array[] = $row["fac_email"];
    $sub_array[] = $row["fac_phone"];
    $sub_array[] = $row["fac_username"];
    $sub_array[] = $row["fac_mentor"];
	$sub_array[] = '<span class="label label-primary label-pill label-inline mr-2" id="status">' . $row["fac_department"] . '</span>';    
    $sub_array[] = '<span class="label label-danger label-pill label-inline mr-2" id="status">' . $row["fac_year"] . '</span>';;    
    $sub_array[] = '<span class="label label-warning label-pill label-inline mr-2" id="status">' . $status . '</span>';
    $sub_array[] = $row["fac_address"];
	$sub_array[] = $row["fac_created_at"];
    $sub_array[] = '<a href="profile/index.php?emd_department_hash=' . convert_string('decrypt',$row["fac_hash"]) . '&&em_admin='.convert_string('decrypt',$user->data()->passkey).'" id="' . convert_string('decrypt',$row["fac_hash"]) . '" class="ett_profile btn btn-sm btn-clean btn-icon" title="View Profile"> <i class="la la-cog"></i> </a> <button id="' . convert_string('decrypt',$row["fac_hash"]) . '" name="ett_edit" class="ett_edit btn btn-sm btn-clean btn-icon" title="Teacher Details"> <i class="la la-eye"></i> </button> <a id="' . convert_string('decrypt',$row["fac_hash"]) . '" name="ett_delete" class="ett_delete btn btn-sm btn-clean btn-icon" title="Update Status" data-status="' . $row["fac_status"] . '"> <i class="la la-trash"></i> </a>';
	$data[] = $sub_array;

}
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records(),
	"data"				=>	$data
);
echo json_encode($output);
function get_total_all_records()
{
    include '../../includes/db.php';
    $statement = $connect->prepare("SELECT * FROM em_students");
    $statement->execute();
    $result = $statement->fetchAll();
    return $statement->rowCount();
}

?>
