<?php
session_start();
include_once("../../includes/application_top.php");

$funUserObj->action = $_GET['action'];
$funUserObj->aid  = $_GET['aid'];
$funUserObj->table  =   TABLE_USER_HISTORY;
$funUserObj->begin();
$queryResult  =  $funUserObj->doAction();
		  
		   if(!$queryResult) { $funUserObj->rollback(); $_SESSION['successMsg'] = "Transaction can place Occur due to some internal errors!!";
			                    } else { $funUserObj->commit();  }

$funUserObj->url_back  =  $_SERVER['HTTP_REFERER'];
$funUserObj->redirect($funUserObj->url_back);
?>
