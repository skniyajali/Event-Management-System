<?php
require_once 'core/init.php';
require_once 'core/DB.php';
require_once '../includes/function.php';
$user = new Faculty();
$dept_hash = $user->data()->fac_dept_hash;
$query = '';

$output = array();

$query .= "SELECT * FROM `fac_event` ";
if (isset($_POST["search"]["value"])) {
    $query .= 'WHERE fe_id LIKE "%' . $_POST["search"]["value"] . '%" ';
    $query .= 'OR fe_name LIKE "%' . $_POST["search"]["value"] . '%" ';
    $query .= 'OR fe_activity LIKE "%' . $_POST["search"]["value"] . '%" ';
    $query .= 'OR fe_venue LIKE "%' . $_POST["search"]["value"] . '%" ';
    $query .= 'OR fe_topic LIKE "%' . $_POST["search"]["value"] . '%" ';
    $query .= 'OR fe_s_date LIKE "%' . $_POST["search"]["value"] . '%" ';
    $query .= 'OR fe_e_date LIKE "%' . $_POST["search"]["value"] . '%" ';
    $query .= 'OR fe_year LIKE "%' . $_POST["search"]["value"] . '%" ';
    $query .= 'OR fe_desc LIKE "%' . $_POST["search"]["value"] . '%" ';
    $query .= 'AND fe_dept_hash = "'.$dept_hash.'" ';
}

if (isset($_POST["order"])) {
    $query .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
} else {
    $query .= 'ORDER BY fe_id DESC ';
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
    $fac = new Faculty($row["fe_fac_hash"]);
	$dept_image = '';
	if($fac->data()->fac_image != '')
	{
		$dept_image = '
                        <div class="media">
                            <img src="data:image/jpeg;base64,' . base64_encode($fac->data()->fac_image) . '" class="mr-3" width="64" alt="'.$fac->data()->fac_name.'">
                            <div class="media-body">
                                <h5 class="mb-1">'.$fac->data()->fac_name.'</h5>
                                <span class="font-size-sm">'.$fac->data()->fac_designation.'('.$fac->data()->fac_qualification.')</span>
                            </div>
                        </div>';                        
	}
	else
	{
		$dept_image = '<div class="media">
                            <img src="../img/blank.png" class="mr-3" width="64" alt="'.$fac->data()->fac_name.'">
                            <div class="media-body">
                                <h5 class="mb-1">'.$fac->data()->fac_name.'</h5>
                                <span class="font-size-sm">'.$fac->data()->fac_designation.'('.$fac->data()->fac_qualification.')</span>
                            </div>
                        </div>';
    }
    
    $sub_array = array();
    $sub_array[] = $i;
	$sub_array[] = $dept_image;
	$sub_array[] = $row["fe_name"] ;
    $sub_array[] = $row["fe_activity"];
    $sub_array[] = $row["fe_topic"];
    $sub_array[] = $row["fe_year"];
    $sub_array[] = $row["fe_s_date"];
	$sub_array[] = $row["fe_e_date"];
    $sub_array[] = $row["fe_venue"];
	$data[] = $sub_array;

}
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	$user->dept_event($user->data()->fac_dept_hash),
	"data"				=>	$data
);
echo json_encode($output);


?>
