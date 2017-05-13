<?php
session_start();
include_once("../../includes/application_top.php");
$funObj->action = $_GET['action'];
$funObj->aid  =  $aid  =  $_GET['aid']; 
if( isset( $_POST['Save_x'] ) )
{
   $funObj->table=TABLE_REPLIESBOOK;
 foreach($_POST as $key=>$val){$$key=$funObj->check($val);}
   $pagedescription=mysqli_real_escape_string($funObj->conn_id,$_POST['bookingreplydescription']);  
		
					
	/* for emailing the online applies */
		$fromName  =  COMPANY_SITE_NAME;
		$senderEmail  =  COMPANY_EMAIL;
        $senderEmailArr  = explode(",",$senderEmail);
        $fromEmail =  $senderEmailArr[0];
	 
	
	if(!empty($aid))
	{
		$rowEdit   =  $funBookingObj -> bookingPageSel($aid);
		$receiverEmail[$aid]   =   $rowEdit->email;
		$receiverName[$aid]    =   $rowEdit->fullname;
	 $funObj->sendEmail($fromName, $fromEmail, $receiverEmail, $subject, $pagedescription);
			
	}
	else
	{ 
	$emailArrayId  = array();
    $emailArrayId =  explode(",",$collect_Id);

	
			foreach($emailArrayId as $val)
			{
			$rowEdit   =  $funBookingObj -> bookingPageSel($val);
			
			$receiverEmail[$val] = $rowEdit->email;
		    $receiverName[$val]  = $rowEdit->fullname;
			$funObj->sendEmail($fromName, $fromEmail, $receiverEmail[$val], $subject, $pagedescription);
			}
	   }						
	           
							
				
	
	
	/* for entering into the replies table */
    $funObj->data =array("date"=>date("Y-m-d"),
                        "replyname"=>implode(",",$receiverName),
						"replyemail"=> implode(",",$receiverEmail),
						"subject"=>$subject,
                        "description"=>htmlentities($pagedescription) 
					    ); 				
						
			 									
	$funObj->begin();		
	         $queryResult  =  $funObj->doAction(); 
             
                               if(!$queryResult) { $funObj->rollback(); $_SESSION['succesMesage'] = "Action cannot place Occur due to some internal errors!!.Please try again";
			                    } else { $funObj->commit(); 
								 $_SESSION['sendEmailMessage']="Message Successfully Send !!";	
								}

	
}
else
{
             $funObj->table=TABLE_BOOKING_ONLINE;
       		$funObj->begin();		
	         $queryResult  =  $funObj->doAction(); 
              
                               if(!$queryResult) { $funObj->rollback(); $_SESSION['succesMesage'] = "Action cannot place Occur due to some internal errors!!.Please try again";
			                    } else { $funObj->commit();  }
}
$funObj->url_back  = "../../index.php?_page=bookingpage&mod=booking"; 
$funObj->redirect($funObj->url_back);
?>