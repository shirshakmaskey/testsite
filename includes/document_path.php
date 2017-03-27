<?php
$document_root =  $_SERVER['DOCUMENT_ROOT'].DS.PROJECT_FOLDER;
$sitePathF     =  $_SESSION['sitePathF'] = "http://".$_SERVER['HTTP_HOST'].DS.PROJECT_FOLDER;
$sitePathB     =  $_SESSION['sitePathB'] = "http://".$_SERVER['HTTP_HOST'].DS.PROJECT_FOLDER.ADMINISTRATOR;	
$sitePathF     = preg_replace('/([^:])(\/{2,})/', '$1/', $sitePathF);
$sitePathB     = preg_replace('/([^:])(\/{2,})/', '$1/', $sitePathB);
$document_root = preg_replace('/([^:])(\/{2,})/', '$1/', $document_root);
$_SESSION[ENCR_KEY.'siteDocUrl']      = $document_root;
$_SESSION[ENCR_KEY.'siteDocAdminUrl'] = $document_root.ADMINISTRATOR;
$siteDocAdminUrl                      = $_SESSION[ENCR_KEY.'siteDocAdminUrl'];

define("DR_ADMIN",$_SESSION[ENCR_KEY.'siteDocAdminUrl']);
define('FCPATH', $document_root);
define('FCPATH_ADMIN', FCPATH.ADMINISTRATOR);