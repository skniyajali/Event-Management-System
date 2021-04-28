<?php


require_once 'core/init.php';
require_once 'core/DB.php';
require_once '../includes/function.php';

$user = new Department();
$datas = $user->data();

$message = '';
$error = '';
$query = '';

$output = array();
$dept_hash = $user->data()->dept_passkey;

$query = 'SELECT * FROM `dept_event` WHERE fe_dept_hash = "' . $dept_hash . '" ';

if (Input::get('e_activity')) {
    $query .= 'AND fe_activity LIKE "%' . $_POST["e_activity"] . '%" ';
}

if (Input::get('e_year')) {
    $query .= 'AND fe_year LIKE "%' . $_POST["e_year"] . '%" ';
}

if (Input::get('e_sdate') && Input::get('e_edate')) {
    $query .= 'AND fe_s_date BETWEEN "' . $_POST["e_sdate"] . '" AND "' . $_POST["e_edate"] . '" ';
}


if (Input::get('e_mentor')) {
    $query .= 'AND fe_fac_hash =  "' . convert_string('encrypt', Input::get('e_mentor')) . '" ';
}

if (Input::get('e_venue')) {
    $query .= 'AND fe_venue =  "' . $_POST["e_venue"] . '" ';
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
foreach ($result as $row) {
    $i++;
    $fac = new Faculty($row["fe_fac_hash"]);
    $dept_image = '';
    if ($fac->data()->fac_image != '') {
        $dept_image = '
                        <div class="media">
                            <img src="data:image/jpeg;base64,' . base64_encode($fac->data()->fac_image) . '" class="mr-3" width="74" alt="' . $fac->data()->fac_name . '">
                            <div class="media-body">
                                <h5 class="mb-1">' . $fac->data()->fac_name . '</h5>
                                <span class="font-size-sm">' . $fac->data()->fac_designation . '</span></br>
                                <span class="font-size-sm">' . $fac->data()->fac_qualification . '</span>
                            </div>
                        </div>';
    } else {
        $dept_image = '<div class="media">
                            <img src="../img/blank.png" class="mr-3" width="64" alt="' . $fac->data()->fac_name . '">
                            <div class="media-body">
                                <h5 class="mb-1">' . $fac->data()->fac_name . '</h5>
                                <span class="font-size-sm">' . $fac->data()->fac_designation . '(' . $fac->data()->fac_qualification . ')</span>
                            </div>
                        </div>';
    }
    if ($row["fe_file"]) {
        $cer_link = '<a href="' . $row["fe_file"] . '" class="">View</a>';
    } else {
        $cer_link = 'NULL';
    }
    if ($row["fe_image"]) {
        $img_link = '<a href="upload/' . $row["fe_image"] . '" class="">View</a>';
    } else {
        $img_link = 'NULL';
    }

    $sub_array = array();
    $sub_array[] = $i;
    $sub_array[] = $dept_image;
    $sub_array[] = $row["fe_name"];
    $sub_array[] = $row["fe_activity"];
    $sub_array[] = $row["fe_topic"];
    $sub_array[] = $row["fe_year"];
    $sub_array[] = $row["fe_s_date"];
    $sub_array[] = $row["fe_e_date"];
    $sub_array[] = $row["fe_venue"];
    $sub_array[] = $img_link;
    $sub_array[] = $cer_link;
    $data[] = $sub_array;
}
$output = array(
    "draw"                =>    intval($_POST["draw"]),
    "recordsTotal"        =>     $filtered_rows,
    "recordsFiltered"    =>    get_total_all_records($dept_hash),
    "data"                =>    $data
);
echo json_encode($output);
function get_total_all_records($dept_hash = '')
{
    include('core/DB.php');
    $statement = $connect->prepare('SELECT * FROM `dept_event` WHERE fe_dept_hash = "' . $dept_hash . '" ');
    $statement->execute();
    $result = $statement->fetchAll();
    return $statement->rowCount();
}
