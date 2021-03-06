<?php
session_start();
include_once("../../includes/application_top.php");
$db = mysqli_connect(HOST,USER,PASS,DBNAME);
bookingList( TABLE_BOOKING_ONLINE );



function bookingList($tableName=null)
{	global $db;  
	$line1 = "Fullname".",";
	$line1 .= "Address".",";
	$line1 .= "Country".",";
	$line1 .= "Email".",";
	$line1 .= "Phone".",";
	$line1 .= "Mobile".",";
	$line1 .= "Comapany".",";
	$line1 .= "Description".",";
	$line1 .= "Airlines".",";
	$line1 .= "Flight Number".",";
	$line1 .= "Notification".",";
	$line1 .= "Hear From".",";
	$line1 .= "About Customer".",";
	$line1 .= "Other Activities".",";
	$line1 .= "Booked Date".",";
	$line1 .= "Status".",";
	$line1 .= "Checkin Date".",";
	$line1 .= "Checkout Date".",";
	
	$line1 .= "Rooms".",";
	
	$line1 .= "Adult".",";
	$line1 .= "Child".",";
	
		
	$line2 = trim($line1)."\n";
	$data = '';
	  $select = "SELECT  * FROM ".$tableName."  order by id desc"; 
      $recordStart       =     mysqli_query($db,$select);
	  $data ='';
	 while($row = mysqli_fetch_array($recordStart)) {

 		 $adult   =  ($row['adult']<=0)?"0":$row['adult'];
 		 $child   =  ($row['child']<=0)?"0":$row['child'];
		 
		  $sql = "SELECT * FROM `".TABLE_COUNTRY."` where `id`='".$row['country']."'"; 
			$rescountry  =  mysqli_query($db,$sql);
			$rowCountry  =  mysqli_fetch_array($rescountry);
			$country   =  $rowCountry['Country'];
										 
		
				
				
			$value = "\"".$row['fullname']."\",";
			$value .= "\"".$row['address']."\",";
			$value .= "\"".$country."\",";
			$value .= "\"".$row['email']."\",";
			$value .= "\"".$row['phone']."\",";
			$value .= "\"".$row['mobile']."\",";
			$value .= "\"".$row['company']."\",";
			$value .= "\"".$row['description']."\",";
			$value .= "\"".$row['airlines']."\",";
			$value .= "\"".$row['flightno']."\",";
			$value .= "\"".$row['notify']."\",";
			$value .= "\"".$row['hear_about']."\",";
			$value .= "\"".$row['i_am']."\",";
			$value .= "\"".ucfirst($row['trip_name'])."\",";
			$value .= "\"".$row['other_activities']."\",";
			$value .= "\"".$booked_date  = date( " F d, Y",strtotime( $row['booked_date'] ))."\",";
			$value .= "\"".$status  = ($row['status']==1)?"Reached":"Not Reached Yet"."\",";
			$value .= "\"". $checkindate  =  date( " F d, Y",strtotime( $row['checkindate'] ))."\",";
			$value .= "\"".$checkoutdate  = date( " F d, Y",strtotime( $row['checkoutdate'] ))."\",";
			$value .= "\"".$adult."\",";
			$value .= "\"".$child."\",";
			
			if(strlen(trim($value))>0)		
			$data .= trim($value)."\n";
	}
	
    $finalData = trim($line2.$data);
	
	header("Content-type: application/x-msdownload");
	header("Content-Disposition: attachment; filename=onlineBooking".date('Y-m-d').".csv");
	print $finalData; 
 }  