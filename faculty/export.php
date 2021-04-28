
<?php

require_once 'core/init.php';
require_once 'core/DB.php';
require_once '../includes/function.php';

if (Input::exists('get')) {
        
    if (input::get('f')) {
        $data = '';
        $query = convert_string('decrypt',input::get('f'));
        $statement = $connect->prepare($query);
        $statement->execute();
        $data .= '<table class="table table-responsive table-bordered" bordered="1" style="width:100%;text-align:center;">';
        //$data .= '<thead>';
        $data .= '<tr>
                    <th style="min-width:60px">#</th>
                    <th style="min-width:40px">Faculty Name</th>
                    <th style="min-width:60px">Event Name</th>
                    <th style="min-width:80px">Activity</th>
                    <th style="min-width:40px">Topic</th>
                    <th style="min-width:40px">Academic Year</th>
                    <th style="min-width:40px">Start Date</th>
                    <th style="min-width:40px">End Date</th>
                    <th style="min-width:40px">Venue</th>
                    <th style="max-width:40px">Image</th>
                    <th style="max-width:40px">Certificate</th>                      
                </tr>';
        //$data .= '</thead>';
        if($statement->rowCount()){
            
            $result = $statement->fetchAll();
            
            header('Content-type: application/xls');
            $filename="faculty_data.xls";
            header("Content-Disposition:attachment;filename=\"$filename\"");
            
            $i = 0;
            //$data .= '<tbody>';
            foreach($result as $row){
                $fac = new Faculty($row["fe_fac_hash"]);

                if($row["fe_certificate"]){
                    $cer_link = '<a href="'.$row["fe_certificate"].'" class="btn btn-sm btn-primary">View</a>';
                }else{
                    $cer_link = '';
                }
                if($row["fe_file"]){
                    $img_link = '<a href="http://localhost:8080/em/faculty/upload/'.$row["fe_file"].'" class="btn btn-sm btn-danger">View</a>';
                }else{
                    $img_link = '';
                }
                $i++;
                $data .= '<tr>';
                $data .= '<td>'.$i.'</td>';
                $data .= '<td><h5 class="mb-1">' . $fac->data()->fac_name . '</h5></td>';
                $data .= '<td>'.$row["fe_name"].'</td>';
                $data .= '<td>'.$row["fe_activity"].'</td>';
                $data .= '<td>'.$row["fe_topic"].'</td>';
                $data .= '<td>'.$row["fe_year"].'</td>';
                $data .= '<td>'.$row["fe_s_date"].'</td>';
                $data .= '<td>'.$row["fe_e_date"].'</td>';
                $data .= '<td>'.$row["fe_venue"].'</td>';
                $data .= '<td>'.$img_link.'</td>';
                $data .= '<td>'.$cer_link.'</td>';                   
                $data .= '</tr>';
                
            }
        }
        //$data .= '</tbody>';
        $data .= '</table>';
        echo $data;
    }

    if (input::get('s')) {
        $data = '';
        $query = convert_string('decrypt',input::get('s'));
        $statement = $connect->prepare($query);
        $statement->execute();
        $data .= '<table class="table table-responsive table-bordered" bordered="1" style="width:100%;text-align:center;">';
        $data .= '<thead>';
        $data .= '<tr>
                    <th style="min-width:60px">#</th>
                    <th style="min-width:140px">Students Name</th>
                    <th style="min-width:160px">Event Name</th>
                    <th style="min-width:180px">Activity</th>
                    <th style="min-width:140px">Topic</th>
                    <th style="min-width:140px">Academic Year</th>
                    <th style="min-width:140px">Start Date</th>
                    <th style="min-width:140px">End Date</th>
                    <th style="min-width:100px">Venue</th>
                    <th>Image</th>
                    <th>Ceritificate</th>
                </tr>';
        $data .= '</thead>';
        if($statement->rowCount()){
            
            $result = $statement->fetchAll();
            
            header('Content-type: application/xls');
            $filename="student_data.xls";
            header("Content-Disposition:attachment;filename=\"$filename\"");
            
            $i = 0;
            $data .= '<tbody>';
            foreach($result as $row){
                $fac = new Student($row["fe_std_hash"]);
                
                if($row["fe_cer_link"]){
                    $cer_link = '<a href="'.$row["fe_cer_link"].'" class="btn btn-sm btn-primary">View</a>';
                }else{
                    $cer_link = '';
                }
                if($row["fe_img_link"]){
                    $img_link = '<a href="'.$row["fe_img_link"].'" class="btn btn-sm btn-danger">View</a>';
                }else{
                    $img_link = '';
                }
                $i++;
                $data .= '<tr>';
                $data .= '<td>'.$i.'</td>';
                $data .= '<td><h5 class="mb-1">' . $fac->data()->fac_name . '</h5></td>';
                $data .= '<td>'.$row["fe_name"].'</td>';
                $data .= '<td>'.$row["fe_activity"].'</td>';
                $data .= '<td>'.$row["fe_topic"].'</td>';
                $data .= '<td>'.$row["fe_year"].'</td>';
                $data .= '<td>'.$row["fe_s_date"].'</td>';
                $data .= '<td>'.$row["fe_e_date"].'</td>';
                $data .= '<td>'.$row["fe_venue"].'</td>';
                $data .= '<td>'.$img_link.'</td>';
                $data .= '<td>'.$cer_link.'</td>';
                $data .= '</tr>';
                
            }
        }
        $data .= '</tbody>';
        $data .= '</table>';
        echo $data;
    }

    if (input::get('p')) {
        require '../includes/fpdf.php';

        $pdf = new FPDF('P','mm','A4');
        $pdf->AddPage();

        /*set font to arial, bold, 14pt*/
        $pdf->SetFont('Arial','B',20);
        $pdf->Cell(71 ,10,'',0,0);
        $pdf->Cell(59 ,5,'Faculty Event Report',0,0);
        $pdf->Cell(59 ,10,'',0,1);
        $pdf->Cell(50 ,10,'',0,1);

        $pdf->SetFont('Arial','B',5);        
        /*Heading Of the table*/
        $pdf->Cell(6 ,6,'#',1,0,'C');
        $pdf->Cell(20 ,6,'Faculty Name',1,0,'C');
        $pdf->Cell(20 ,6,'Event Name',1,0,'C');
        $pdf->Cell(30 ,6,'Activity',1,0,'C');
        $pdf->Cell(30 ,6,'Topic',1,0,'C');
        $pdf->Cell(17 ,6,'Start Date',1,0,'C');
        $pdf->Cell(17 ,6,'End Date',1,0,'C');
        $pdf->Cell(17 ,6,'Year',1,0,'C');
        $pdf->Cell(17 ,6,'Venue',1,0,'C');        
        $pdf->Cell(10 ,6,'Image',1,0,'C');
        $pdf->Cell(15 ,6,'Certificate',1,1,'C');
        /*Heading Of the table end*/

        

        $query = convert_string('decrypt',input::get('p'));
        $statement = $connect->prepare($query);
        $statement->execute();
        
        if($statement->rowCount()){
            $pdf->SetFont('Arial','',5);
            $pdf->SetTextColor(0,0,255);
            $result = $statement->fetchAll();
            
            $i = 0;
            foreach($result as $row){
                $fac = new Faculty($row["fe_fac_hash"]);

                if($row["fe_certificate"] != ''){
                    $cer_link = $row["fe_certificate"];
                    $cc_name = "View";
                }else{                    
                    $cer_link = '';
                    $cc_name = "";
                }

                if($row["fe_file"]){
                    $img_link = 'http://localhost:8080/em/department/upload/'.$row["fe_file"];
                    $c_name = "View";
                }else{
                    $img_link = '#';
                    $c_name = "";
                }
                $i++;
                $pdf->Cell(6 ,6,$i,1,0,'C');
                $pdf->Cell(20 ,6,$fac->data()->fac_name,1,0,'C');
                $pdf->Cell(20 ,6,$row["fe_name"],1,0,'C');
                $pdf->Cell(30 ,6,$row["fe_activity"],1,0,'C');
                $pdf->Cell(30 ,6,$row["fe_topic"],1,0,'C');                              
                $pdf->Cell(17 ,6,$row["fe_s_date"],1,0,'C');
                $pdf->Cell(17 ,6,$row["fe_e_date"],1,0,'C');
                $pdf->Cell(17 ,6,$row["fe_year"],1,0,'C');
                $pdf->Cell(17 ,6,$row["fe_venue"],1,0,'C');
                $pdf->Cell(10 ,6,$c_name,1,0,'C',false,$img_link);                
                $pdf->Cell(15 ,6,$cc_name,1,1,'C',false,$cer_link);
                
            }
        
            $pdf->Output();
        }

        
    }

    if (input::get('t')) {
        require '../includes/fpdf.php';

        $pdf = new FPDF('P','mm','A4');
        $pdf->AddPage();

        /*set font to arial, bold, 14pt*/
        $pdf->SetFont('Arial','B',20);
        $pdf->Cell(71 ,10,'',0,0);
        $pdf->Cell(59 ,5,'Student Event Report',0,0);
        $pdf->Cell(59 ,10,'',0,1);
        $pdf->Cell(50 ,10,'',0,1);

        $pdf->SetFont('Arial','B',5);        
        /*Heading Of the table*/
        $pdf->Cell(6 ,6,'#',1,0,'C');
        $pdf->Cell(20 ,6,'Student Name',1,0,'C');
        $pdf->Cell(20 ,6,'Event Name',1,0,'C');
        $pdf->Cell(30 ,6,'Activity',1,0,'C');
        $pdf->Cell(30 ,6,'Topic',1,0,'C');
        $pdf->Cell(17 ,6,'Start Date',1,0,'C');
        $pdf->Cell(17 ,6,'End Date',1,0,'C');
        $pdf->Cell(17 ,6,'Year',1,0,'C');
        $pdf->Cell(17 ,6,'Venue',1,0,'C');        
        $pdf->Cell(10 ,6,'Image',1,0,'C');
        $pdf->Cell(15 ,6,'Certificate',1,1,'C');
        /*Heading Of the table end*/

        

        $query = convert_string('decrypt',input::get('t'));
        $statement = $connect->prepare($query);
        $statement->execute();
        
        if($statement->rowCount()){
            $pdf->SetFont('Arial','',5);
            $pdf->SetTextColor(0,0,255);
            $result = $statement->fetchAll();
            
            $i = 0;
            foreach($result as $row){
                $fac = new Student($row["fe_std_hash"]);                

                if($row["fe_cer_link"]){
                    $cer_link = $row["fe_cer_link"];
                    $cc_name = "View";
                }else{
                    $cer_link = '';
                    $cc_name = "";
                }
                if($row["fe_img_link"]){
                    $img_link = $row["fe_img_link"];
                    $c_name = "View";
                }else{
                    $img_link = '';
                    $c_name = "";
                }

                $i++;
                $pdf->Cell(6 ,6,$i,1,0,'C');
                $pdf->Cell(20 ,6,$fac->data()->fac_name,1,0,'C');
                $pdf->Cell(20 ,6,$row["fe_name"],1,0,'C');
                $pdf->Cell(30 ,6,$row["fe_activity"],1,0,'C');
                $pdf->Cell(30 ,6,$row["fe_topic"],1,0,'C');                              
                $pdf->Cell(17 ,6,$row["fe_s_date"],1,0,'C');
                $pdf->Cell(17 ,6,$row["fe_e_date"],1,0,'C');
                $pdf->Cell(17 ,6,$row["fe_year"],1,0,'C');
                $pdf->Cell(17 ,6,$row["fe_venue"],1,0,'C');
                $pdf->Cell(10 ,6,$c_name,1,0,'C',false,$img_link);                
                $pdf->Cell(15 ,6,$cc_name,1,1,'C',false,$cer_link);
                
            }
        
            $pdf->Output();
        }

        
    }
    
}

?>
