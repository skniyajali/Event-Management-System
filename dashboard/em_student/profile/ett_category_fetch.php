<?php 
require_once 'core/init.php';
require_once 'includes/function.php';
$user = new Teacher(Input::get('ett_user'));
$connect = new PDO("mysql:host=localhost;dbname=enhancedteaching", "root", "");

$output = array();

$query = "SELECT * FROM `et_categories` WHERE ett_hash = :user_hash ORDER BY cat_id DESC ";


$statement = $connect->prepare($query);

$statement->execute(
    array(
        ':user_hash' => $user->data()->ett_passkey
    )
);

$result = $statement->fetchAll();
$data = array();

$filtered_rows = $statement->rowCount();

foreach($result as $row)
{
	
	if($row["cat_icon"] != '')
	{       
		$cat_icon = '<div class="symbol symbol-50 flex-shrink-0"><i class="'.$row["cat_icon"].'"></i></div>';
	}
	else
	{
		$cat_icon = '<div class="symbol symbol-50 symbol-light-success" flex-shrink-0"=""><div class="symbol-label font-size-h5"></div></div>';
    }
    $status = '';
    if ($row["cat_status"] == 'Active') {
        $status = 'Active';
    } else {
        $status = 'Inactive';
    }
    if($row["ett_course_created"] * 10 >= 100){
        $class = 'progress-bar-striped progress-bar-animated bg-primary';
    }elseif($row["ett_course_created"] * 10 >= 80){
        $class = 'progress-bar-striped progress-bar-animated bg-warning';
    }elseif($row["ett_course_created"] * 10 >= 60){
        $class = 'bg-success';
    }elseif($row["ett_course_created"] * 10 >= 40){
        $class = 'bg-dark';
    }elseif($row["ett_course_created"] * 10 >= 20){
        $class = 'bg-danger';
    }else{
        $class = 'bg-danger';
    }
    $sub_array = array();
    $sub_array[] = $row["cat_id"];
	$sub_array[] = $cat_icon;
	$sub_array[] =  $row["cat_name"] ;
    $sub_array[] = $row["cat_slug"] ;
    $sub_array[] = '<div class="d-flex flex-column w-100 mr-2">
    <div class="d-flex align-items-center justify-content-between mb-2">
        <span class="text-muted mr-2 font-size-sm font-weight-bold">'.($row["ett_course_created"] * 10).'</span>
        <span class="text-muted font-size-sm font-weight-bold">Progress</span>
    </div>
    <div class="progress">
        <div class="progress-bar '.$class.'" role="progressbar" style="width:'.($row["ett_course_created"] * 10).'%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">('.$row["ett_course_created"].', 10)</div>
    </div>
</div>';
    $sub_array[] = '<span class="label label-warning label-pill label-inline mr-2" id="status">' . $status . '</span>';
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
    $user = new Teacher(Input::get('ett_user'));
    $connect = new PDO("mysql:host=localhost;dbname=enhancedteaching", "root", "");
    $statement = $connect->prepare("SELECT * FROM et_categories WHERE ett_hash = :user_hash");
    $statement->execute(
        array(
            ':user_hash' => $user->data()->ett_passkey
        )
    );
    $result = $statement->fetchAll();
    return $statement->rowCount();
}


?>