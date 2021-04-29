<?php
include('../includes/db.php');
include('../includes/function.php');
$query = '';

$output = array();

$query .= "SELECT * FROM `em_department` ";
if (isset($_POST["search"]["value"])) {
    $query .= 'WHERE dept_id LIKE "%' . $_POST["search"]["value"] . '%" ';
    $query .= 'OR dept_name LIKE "%' . $_POST["search"]["value"] . '%" ';
    $query .= 'OR dept_email LIKE "%' . $_POST["search"]["value"] . '%" ';
    $query .= 'OR dept_phone LIKE "%' . $_POST["search"]["value"] . '%" ';
    $query .= 'OR dept_username LIKE "%' . $_POST["search"]["value"] . '%" ';
}

if (isset($_POST["order"])) {
    $query .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
} else {
    $query .= 'ORDER BY dept_id DESC ';
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
	$dept_image = '';
	if($row["dept_image"] != '')
	{
		$dept_image = '<div class="symbol symbol-50 flex-shrink-0"><img src="data:image/jpeg;base64,' . base64_encode($row['dept_image']) . '" alt="photo"></div>';
	}
	else
	{
		$dept_image = '<div class="symbol symbol-50 symbol-light-success" flex-shrink-0"=""><div class="symbol-label font-size-h5">'.$row["dept_sname"].'</div></div>';
    }
    $status = '';
    if ($row["dept_status"] == 'Active') {
        $status = 'Active';
    } else {
        $status = 'Inactive';
    }
    
    $sub_array = array();
    $sub_array[] = $i;
	$sub_array[] = $dept_image;
	$sub_array[] = $row["dept_name"] ;
    $sub_array[] = $row["dept_email"];
    $sub_array[] = $row["dept_phone"];
    $sub_array[] = $row["dept_username"];
    $sub_array[] = '<span class="label label-warning label-pill label-inline mr-2" id="status">' . $status . '</span>';
	$sub_array[] = $row["dept_created_at"];
    $sub_array[] = '<a href="profile/index.php?emd_department_hash=' . convert_string('decrypt',$row["dept_hash"]) . '&em_admin=admin" id="' . convert_string('decrypt',$row["dept_hash"]) . '" class="ett_profile btn btn-sm btn-clean btn-icon" title="View Profile"> <i class="la la-cog"></i> </a> <button id="' . convert_string('decrypt',$row["dept_hash"]) . '" name="ett_edit" class="ett_edit btn btn-sm btn-clean btn-icon" title="Teacher Details"> <i class="la la-eye"></i> </button> <a id="' . convert_string('decrypt',$row["dept_hash"]) . '" name="ett_delete" class="ett_delete btn btn-sm btn-clean btn-icon" title="Update Status" data-status="' . $row["dept_status"] . '"> <i class="la la-trash"></i> </a>';
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
    include '../includes/db.php';
    $statement = $connect->prepare("SELECT * FROM em_department");
    $statement->execute();
    $result = $statement->fetchAll();
    return $statement->rowCount();
}

?>
