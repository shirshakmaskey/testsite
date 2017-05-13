<?php

if ($_SERVER['HTTP_HOST'] == "localhost:8080" || $_SERVER['HTTP_HOST'] == "localhost" ||  $_SERVER['HTTP_HOST']=="127.0.0.1")

{

/************************* offline database constant setting *************************/	

	define("HOST","127.0.0.1");

	define("USER","root");

	define("PASS","");

	define("DBNAME","db_lyrics");

/************************* offline database constant setting end *************************/		

/************************* offline path setting *************************/	

$document_root =  $_SERVER['DOCUMENT_ROOT'].PROJECT_FOLDER;

$sitePathF     =  $_SESSION['sitePathF'] = "http://".$_SERVER['HTTP_HOST'].DS.PROJECT_FOLDER;

$sitePathB     =  $_SESSION['sitePathB'] = "http://".$_SERVER['HTTP_HOST'].DS.PROJECT_FOLDER.ADMINISTRATOR;	

/************************* offline path setting end *************************/

}

else

{

/************************* online database constant setting *************************/

	/*define("HOST","localhost");
	define("USER","lyricsne_dbnepal");
	define("PASS","90s-~S=fID3_");
	define("DBNAME","lyricsne_dbnepal");*/
	define("HOST","localhost");
	define("USER","lyricsne_lyrics");
	define("PASS","^-o%%aBZ5fVE");
	define("DBNAME","lyricsne_lyrics");

/************************ *online database constant setting end *************************/	

/************************* online database constant setting *************************/

$document_root =  $_SERVER['DOCUMENT_ROOT'].DS.PROJECT_FOLDER;

$host  =  $_SERVER['HTTP_HOST'];

$host  =  preg_match("/www/i",$_SERVER['HTTP_HOST'])?$_SERVER['HTTP_HOST']:"www.".$_SERVER['HTTP_HOST'];

$sitePathF     =  $_SESSION['sitePathF'] = "http://".$host.DS.PROJECT_FOLDER;

$sitePathB     =  $_SESSION['sitePathB'] = "http://".$host.PROJECT_FOLDER.ADMINISTRATOR;

/************************* online database constant setting end *************************/	

}

$document_root = preg_replace('/([^:])(\/{2,})/', '$1/', $document_root);

if(!isset($_SESSION[ENCR_KEY.'siteDocUrl']))

$_SESSION[ENCR_KEY.'siteDocUrl']      = $document_root;

if(!isset($_SESSION[ENCR_KEY.'siteDocAdminUrl']))

$_SESSION[ENCR_KEY.'siteDocAdminUrl'] = $document_root.ADMINISTRATOR;

$siteDocAdminUrl             = $_SESSION[ENCR_KEY.'siteDocAdminUrl'];

if(!isset($_SESSION[PROJECT_KEY])){$_SESSION[PROJECT_KEY]=ENCR_KEY;}

?>