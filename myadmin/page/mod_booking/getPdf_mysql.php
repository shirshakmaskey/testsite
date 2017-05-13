<?php
session_start();
include_once($_SESSION['siteDocAdminUrl']."includes/config.php"); 
require("../../../applications/fpdf/fpdf.php");
$aid  = $_GET['aid'];
class PDF extends FPDF
{
	 function connect_db()
		{
		mysql_connect(HOST,USER,PASS);
		mysql_select_db(DBNAME);
		}
//Simple table
function BasicTable($header,$data)
{
	$this->Cell(80);
    //Title
	$this->SetFont('Arial','B',12);
    $this->Cell(30,10,'Hotel Norling Nepal (P). Ltd',0,0,'C');
	 $this->Ln(5);
	 $this->Cell(80);
	$this->SetFont('Arial','',10);
    $this->Cell(30,10,'Thamel, Kathmandu',0,0,'C');
    //Line break
    $this->Ln(20);

	
	
    $this->Cell(15);
	//Header
	$this->SetFont('Arial','BU',10);
    foreach($header as $col)
        $this->Cell(120,7,$col,0,1,"I");
    
    //Data
   $this->SetFont('Arial','',10);
       foreach($data as $row)
	    {
			$this->Cell(15); 	 	 	 	 	 	 	 	 	
		    $this->Cell(40,6,"Fullname",1);
            $this->Cell(80,6,$row['fullname'],1);
            $this->Ln();
			 
			$this->Cell(15);
			$this->Cell(40,6,"Address",1);
            $this->Cell(80,6,$row['address'],1);
            $this->Ln();
		    
			$this->connect_db();
		    $sql = "SELECT * FROM `".TABLE_COUNTRY."` where `id`='".$row['country']."'"; 
			$rescountry  =  mysql_query($sql);
			$rowCountry  =  mysql_fetch_array($rescountry);
			
			$this->Cell(15);
			$this->Cell(40,6,"Country",1);
            $this->Cell(80,6,$rowCountry['Country'],1);
            $this->Ln();
			 
			$this->Cell(15);
			$this->Cell(40,6,"Phone",1);
            $this->Cell(80,6,$row['phone'],1);
            $this->Ln();
			
			$this->Cell(15);
			$this->Cell(40,6,"Mobile",1);
            $this->Cell(80,6,$row['mobile'],1);
            $this->Ln();
			
 		    $this->Cell(15);
			$this->Cell(40,6,"Email",1);
            $this->Cell(80,6,$row['email'],1);
            $this->Ln();
			
			$this->Cell(15);
			$this->Cell(40,6,"Company",1);
            $this->Cell(80,6,$row['company'],1);
            $this->Ln();
			
			$this->Cell(15);
			$this->Cell(40,6,"Description",1);
            $this->Cell(80,6,substr($row['description'],0,40),1);
            $this->Ln();
			
			$this->Cell(15);
			$this->Cell(40,6,"Airlines",1);
            $this->Cell(80,6,$row['airlines'],1);
            $this->Ln();
			
			$this->Cell(15);
			$this->Cell(40,6,"Flight Number",1);
            $this->Cell(80,6,$row['flightno'],1);
            $this->Ln();
			
			$notify = ($row['notify']==1) ? "Yes" : "No";
			$this->Cell(15);
			$this->Cell(40,6,"Notification",1);
            $this->Cell(80,6,$notify,1);
            $this->Ln();
			
			$this->Cell(15);
			$this->Cell(40,6,"Hear From",1);
            $this->Cell(80,6,$row['hear_about'],1);
            $this->Ln();
			
			$this->Cell(15);
			$this->Cell(40,6,"Faculty",1);
            $this->Cell(80,6,$row['i_am'],1);
            $this->Ln();
			
			$this->Cell(15);
			$this->Cell(40,6,"Other Activities",1);
			$this->MultiCell(80,6,$row['other_activities'],1);
          
			
			$status = ($row['status']==1) ? "Active" : "Not Reached";
			$this->Cell(15);
			$this->Cell(40,6,"Status",1);
            $this->Cell(80,6,$status,1);
            $this->Ln();
			$this->Ln();
			
			
			$this->Cell(15);
			$this->Cell(40,6,"Booked Date",1);
            $this->Cell(80,6,date("F d,Y", strtotime($row['booked_date'])),1);
            $this->Ln();
			$this->Cell(15);
			$this->Cell(40,6,"CheckIn Date",1);
            $this->Cell(80,6,date("F d,Y", strtotime($row['checkindate'])),1);
            $this->Ln();
			
			$this->Cell(15);
			$this->Cell(40,6,"CheckOut Date",1);
            $this->Cell(80,6,date("F d,Y", strtotime($row['checkoutdate'])),1);
            $this->Ln();
			
			$this->Cell(15);
			$this->Cell(40,6,"Single Bed",1);
            $this->Cell(80,6, $singlebed   =  ($row['singlebed']<=0)?"0":$row['singlebed'],1);
            $this->Ln();
			
			$this->Cell(15);
			$this->Cell(40,6,"Twin Bed",1);
            $this->Cell(80,6,$twinbed   =  ($row['twinbed']<=0)?"0":$row['twinbed'],1);
            $this->Ln();
			
			$this->Cell(15);
			$this->Cell(40,6,"Double Bed",1);
            $this->Cell(80,6,$triplebed   =  ($row['triplebed']<=0)?"0":$row['triplebed'],1);
            $this->Ln();
			
			
			
			$this->Cell(15);

			$this->Cell(40,6,"Triple Bed",1);
            $this->Cell(80,6,$triplebed   =  ($row['triplebed']<=0)?"0":$row['triplebed'],1);
            $this->Ln();
			
			$this->Cell(15);
			$this->Cell(40,6,"Adult",1);
            $this->Cell(80,6,$adult   =  ($row['adult']<=0)?"0":$row['adult'],1);
            $this->Ln();
			
			$this->Cell(15);
			$this->Cell(40,6,"Child",1);
            $this->Cell(80,6,$child   =  ($row['child']<=0)?"0":$row['child'],1);
            $this->Ln();
			
			
			 
		}
    
  }
}
 
$pdf=new PDF();
$pdf->connect_db();
$result  =  mysql_query("select * from ".TABLE_BOOKING_ONLINE." where id='$aid'");
$rows  =  array();
$i=0;
$row  =  mysql_fetch_array($result);
foreach($row as $key=>$val)
   {
	   if($key!="id")
	   {       $rows[$i][$key]  =  $val; }
   }
 

//Column titles
$header=array('Booking Details');
//Data loading
$data  = $rows;
$pdf->SetFont('Arial','',10);
$pdf->AddPage(); 
$pdf->BasicTable($header,$data);
$pdf->Output();

?>