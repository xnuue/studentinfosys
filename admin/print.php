<?php
include 'includes/session.php';

function generateRow($conn){
    $contents = '';

    $sql = "SELECT * FROM vts";
    $query = $conn->query($sql);

    while($row = $query->fetch_assoc()){
        $contents .= '
            <tr>
                <td>'.$row['studnum'].'</td>
                <td>'.$row['name'].'</td>
                <td>'.$row['address'].'</td>
                <td>'.$row['contact_number'].'</td>
                <td>'.$row['age'].'</td>
                <td>'.$row['course'].'</td>
            </tr>
        ';
    }

    return $contents;
}
    
$parse = parse_ini_file('config.ini', FALSE, INI_SCANNER_RAW);
$title = $parse['election_title'];

require_once('../tcpdf/tcpdf.php');  
$pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
$pdf->SetCreator(PDF_CREATOR);  
$pdf->SetTitle('Student Information');  
$pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
$pdf->SetDefaultMonospacedFont('helvetica');  
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
$pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
$pdf->setPrintHeader(false);  
$pdf->setPrintFooter(false);  
$pdf->SetAutoPageBreak(TRUE, 10);  
$pdf->SetFont('helvetica', '', 11);  
$pdf->AddPage();  
$content = '';  
$content .= '<h2 align="center">TCU Student Report For Academic Year '.$title.'</h2>
             <h4 align="center">Student Information</h4>
             <table border="1" cellspacing="0" cellpadding="3">';  
$content .= '<tr>
				<th><b>Student Number</b></th>
                <th><b>Name</b></th>
                <th><b>Address</b></th>
                <th><b>Contact Number</b></th>
                <th><b>Age</b></th>
                <th><b>Course</b></th>
            </tr>';  
$content .= generateRow($conn);  
$content .= '</table>';  
$pdf->writeHTML($content);  
$pdf->Output('student_information.pdf', 'I');
