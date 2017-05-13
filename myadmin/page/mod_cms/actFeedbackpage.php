<?php
session_start();
include_once("../../includes/application_top.php");
$funCmsObj->action = $_GET['action'];
$funCmsObj->aid  =  $aid  =  $_GET['aid']; 
if( isset( $_POST['Save'] ) )
{
   include("../mod_setAndCheckAll/checkToken.php");
   $funCmsObj->table=TABLE_REPLIESFEED;
   foreach($_POST as $key=>$val)
   {  $$key=$funCmsObj->check($val);   }
   $pagedescription = mysql_real_escape_string( stripslashes($_POST['feedbackreplydescription'])); 
   
		
					
	/* for emailing the online applies */
		$fromName  =  $funObj->ConfigValue('COMPANY_SITE_NAME');
		$senderEmail  =  $funObj->ConfigValue('COMPANY_EMAIL');
        $senderEmailArr  = explode(",",$senderEmail);
        $fromEmail =  $senderEmailArr[0];

	
	
	if(!empty($aid))
	{
		
		$rowEdit   =  $funCmsObj -> feedPageSel($aid);
		 $receiverEmail[$aid]   =   $rowEdit->email;
		 $receiverName[$aid]    =   $rowEdit->name;
		
		
		
	 $funCmsObj->sendEmail($fromName, $fromEmail, $receiverEmail, $subject, $pagedescription, $replyTo="", $debug=false);
			
	}
	else
	{ 
	$emailArrayId  = array();
    $emailArrayId =  explode(",",$collect_Id);

	
			foreach($emailArrayId as $val)
			{
			$rowEdit   =  $funCmsObj -> feedPageSel($val);
			
			$receiverEmail[$val] = $rowEdit->email;
		    $receiverName[$val]  = $rowEdit->name;
			$funCmsObj->sendEmail($fromName, $fromEmail, $receiverEmail[$val], $subject, $pagedescription, $replyTo="", $debug=false);
			}
	       
		 
	
    }						
	
	
	
	/* for entering into the replies table */
    $funCmsObj->data =array("date"=>date("Y-m-d"),
                        "replyname"=>implode(",",$receiverName),
						"replyemail"=> implode(",",$receiverEmail),
						"subject"=>$subject,
                        "description"=>htmlentities($pagedescription) 
					    ); 				
						$_SESSION['sendEmailMessage']="Message Successfully Send !!";	
			 									
	$funCmsObj->begin();		
	         $queryResult  =  $funCmsObj->doAction(); 
              
                               if(!$queryResult) { $funCmsObj->rollback(); $_SESSION['succesMesage'] = "Action cannot place Occur due to some internal errors!!.Please try again";
			                    } else { $funCmsObj->commit();  }

	
}
else
{
             $funCmsObj->table=TABLE_FEEDBACK;
       		$funCmsObj->begin();		
	         $queryResult  =  $funCmsObj->doAction(); 
              
                               if(!$queryResult) { $funCmsObj->rollback(); $_SESSION['succesMesage'] = "Action cannot place Occur due to some internal errors!!.Please try again";
			                    } else { $funCmsObj->commit();  }
}
$funCmsObj->url_back  = isset($_POST['url_back'])?preg_replace("/viewCoursepage/","coursepage",$_POST['url_back']):$_SERVER['HTTP_REFERER']; 
$funCmsObj->redirect($funCmsObj->url_back);
?>