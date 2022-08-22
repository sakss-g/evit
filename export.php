<?php
    require_once 'model/database.php';
    $db = new Database();
    $data = $db -> select( 'user', array( '*' ));

    if(isset($_POST[ 'export' ])){
        require_once('tcpdf/tcpdf.php');
    }

    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    $pdf->SetCreator(PDF_CREATOR);

    $pdf-> setTitle('Export to PDF');

    $pdf -> setHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);

    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

    $pdf->SetDefaultMonospacedFont('helvetica');

    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);

    $pdf->setPrintHeader(false);

    $pdf->setPrintFooter(false);

    $pdf->SetAutoPageBreak(TRUE, 10);

    $pdf->SetFont('helvetica', '', 12);

    $pdf->AddPage();

    $html =  '<h1 style="color:#289ae7;">Dashboard to PDF</h1>';
    $html .= '
    <table style="border: 1px solid #000; padding: 5px;">
        <thead>
            <tr style="background-color:#289ae7; color: white; font-weight: bold; font-size: 13px;">
                <th style="width: 30px">#</th>
                <th style="width: 130px">Name</th>
                <th style="width: 150px">Email</th>
                <th style="width: 100px">Date Created</th>
                <th style="width: 80px">Role</th>
            </tr>
        </thead>
    <tbody>';
    
    if( !empty( $data ) ):
        foreach( $data as $key => $s ):
            $html .= '<tr>
                        <td style="width: 30px"> ';
            $html .= $key+1; 
            $html .= '</td>
                        <td style="width: 130px">';
            $html .=  $s[ 'name' ];
            $html .= '</td>
                        <td style="width: 150px">'; 
            $html .= $s['email']; 
            $html .= '</td>
                        <td style="width: 100px">';
            $date = strtotime( $s['date'] );
            $html .= date( 'Y/m/d', $date );
            $html .= '</td>
                        <td style="width: 80px">'; 
            $html .= $s['role']; 
            $html .= '</td>
                        </tr>';
        endforeach;
    endif;           
    $html .= '</tbody>
            </table>';
    
    $pdf -> writeHTML($html);
    ob_end_clean();
    $pdf -> Output("table.pdf");
?>