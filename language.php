<?php
session_start();
$language  = array('en'=>'english',
                   'np'=>'nepali',
				   'ch'=>'chinese',
				   'dk'=>'danish',
				   );
if(isset($_GET['lang'])){
	$lang  =  $_GET['lang'];
	if(array_key_exists($lang,$language)){
		$_SESSION['lang']  = $language[$lang];
	}else{
		$_SESSION['lang']  = 'english';
	}
}
header("Location:".$_SERVER['HTTP_REFERER']);
?>