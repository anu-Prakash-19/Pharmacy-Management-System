<?php
require_once('tcpdf_6_3_2/tcpdf/tcpdf.php');




// Extend TCPDF to create custom header and footer
class MYPDF extends TCPDF {
    // Page header
    public function Header() {
        // Set font
        $this->SetFont('helvetica', 'B', 12);
        // Title
        $this->Cell(0, 10, 'Invoice', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        // Line break
        $this->Ln(10);
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

// Create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('PharYOU');
$pdf->SetTitle('Invoice');
$pdf->SetSubject('Invoice');
$pdf->SetKeywords('Invoice, PDF, TCPDF, PHP');

// Set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// Set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// Set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// Set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// Set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// Set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// Set font
$pdf->SetFont('helvetica', '', 10);

// Add a page
$pdf->AddPage();

// Include database connection
include 'config.php';
include 'Logger.php'; 

// Retrieve patient ID from URL parameter
// $patient_id = $_COOKIE['patient_id'];
// $patient_id = $_COOKIE['patient_id'];
// $patient_id = $patient_id_global;

// Prepare SQL query to retrieve payment details
// $query = "SELECT * FROM payment WHERE patient_id = ?";
// $select_query = $conn->query("SELECT * FROM payment WHERE patient_id = '$patient_id'");
// $select_query_patient = $conn->query("SELECT * FROM patient WHERE patient_id = '$patient_id'");


$select_query_payment = $conn->query("SELECT max(payment_id) as max_payment_id FROM payment");
        $result = $select_query_payment->fetch_assoc();

        $max_payment_id1 = $result['max_payment_id'];

        // prescription id
// $select_query_prescription = $conn->query("SELECT max(prescription_id) FROM payment");
//         $result = $select_query_prescription->fetch_assoc();

//         $max_prescription_id= $result['max_prescription_id'];


$select_query_payment_patient = $conn->query("SELECT patient_id FROM payment where payment_id='$max_payment_id1'");
        $result = $select_query_payment_patient->fetch_assoc();

        $max_payment_patient_id= $result['patient_id'];


$select_query_payment_name = $conn->query("SELECT payment_name FROM payment where payment_id='$max_payment_id1'");
        $result = $select_query_payment_name->fetch_assoc();

        $max_payment_name= $result['payment_name'];


$select_query_patient_name = $conn->query("SELECT patient_name FROM patient where patient_id='$max_payment_patient_id'");
        $result = $select_query_patient_name->fetch_assoc();

        $max_patient_name= $result['patient_name'];


$select_query_presc_id = $conn->query("SELECT max(prescription_id) as max_prescription_id FROM prescription");
        $result = $select_query_presc_id->fetch_assoc();

        $max_presc_id= $result['max_prescription_id'];


$select_query_doc_id = $conn->query("SELECT doc_id FROM prescription where prescription_id='$max_presc_id'");
        $result = $select_query_doc_id->fetch_assoc();

        $max_doc_id= $result['doc_id'];

$select_query_doc_name = $conn->query("SELECT doc_name FROM doctor where doc_id='$max_doc_id'");
        $result = $select_query_doc_name->fetch_assoc();

        $doc_name_doctor= $result['doc_name'];



// $select_query_patient_name = $conn->query("SELECT patient_name FROM patient where patient_id='$max_payment_patient_id'");
//         $result = $select_query_patient_name->fetch_assoc();

//         $max_patient_name= $result['patient_name'];

$select_med = $conn->query("SELECT medication_name FROM prescription where prescription_id='$max_presc_id'");
        $result = $select_med->fetch_assoc();

        $med_name= $result['medication_name'];

$select_quantity = $conn->query("SELECT quantity FROM prescription where prescription_id='$max_presc_id'");
        $result = $select_quantity->fetch_assoc();

        $quantity= $result['quantity'];

$select_medication_cost = $conn->query("SELECT medication_cost FROM medication where medication_name='$med_name'");
        $result = $select_medication_cost->fetch_assoc();

        $medication_cost= $result['medication_cost'];

        $total_bill=$medication_cost* $quantity;




$pdf->writeHTML(


    "
    <h1>Patient ID :{$max_payment_patient_id}</h1>
    <h1>Patient Name :{$max_patient_name}</h1>
    

    <table style='border:2px solid red'>
    <tr>
    <th><h2>Payment ID</h2></th>
    <th><h2>Payment Remarks</h2></th>
    </tr>
    <hr>
    <tr>
    <td><h3></h3></td>
    
    <td><h3></h3></td>
    </tr>
    <tr>
    <td><h3>{$max_payment_id1}</h3></td>
    
    <td><h3>{$max_payment_name}</h3></td>
    
    </tr>

    </table>
   



    
    <br/>
    <h1> Prescription Details</h1>
    <hr>
    
    <h2 >Prescribed by :{$doc_name_doctor}</h2>
    

    <table style='border:2px solid red'>
    <tr>
    <th><h2>Medication details</h2></th>
    <th><h2>Dosage</h2></th>
    <th><h2>Price</h2></th>
    </tr>
    <hr>
    <tr>
    <td><h3></h3></td>
    <td><h3></h3></td>
    
    <td><h3></h3></td>
    </tr>
    <tr>
    <td><h3>{$med_name}</h3></td>
    <td><h3>{$quantity}</h3></td>
    
    <td><h3>{$medication_cost}</h3></td>
    
    </tr>

    </table>
    <br>
    <br>
    
    <br>
    <br>
    <h2 ><u>Total bill : {$total_bill}/-</u></h2>
    "
);

// Close statement
// $stmt->close();



// Output the PDF
$pdf->Output('invoice.pdf', 'I');
?>
