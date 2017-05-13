<?php
/*$cms['defaultSources'] = ""; 
$initialFiles     = array(APPLICATIONS."jquery-ui-1.11.2/jquery-ui.min.css",
						  APPLICATIONS."bootstrap/css/bootstrap.min.css",
						  "css/style.css",
						  "css/overlay.css",
						  "js/jquery.js",
						  APPLICATIONS."jquery-ui-1.11.2/jquery-ui.min.js",
						  APPLICATIONS."bootstrap/js/bootstrap.min.js",
						  APPLICATIONS."jquery.validate.js",
						  APPLICATIONS."datatable/jquery.tablesorter.js",
						  APPLICATIONS."datatable/datatable_front.css",					  
						  APPLICATIONS."datatable/jquery.dataTables.js"
						  );
for($i = 0; $i < count($initialFiles); $i++)
{ $cms['defaultSources'] .= inc($initialFiles[$i]); }
$initialTemplates = array();
$cms['site:copyright']	= "&copy; ".date("Y")." Wise Exist ";*/
$cms['defaultSourcesCSS'] = ""; 
$initialFiles     = array(ASSETS."bootstrap/css/bootstrap.min.css",
	                      ASSETS."ui/jquery-ui.min.css",
	                      ASSETS."animate.css",
	                      ASSETS."line-icons/line-icons.css",
	                      ASSETS."font-awesome/css/font-awesome.min.css",
						  "css/style.css",
						  "css/overlay.css",
						  ASSETS."datatable/jquery.dataTables.min.css",	
						  ASSETS."jquery/jquery.js",
						  ASSETS."jquery/jquery-migrate.min.js",
						  ASSETS."bootstrap/js/bootstrap.min.js",						  
						  ASSETS."ui/jquery-ui.min.js",
						  "js/common.js"
						  );
for($i = 0; $i < count($initialFiles); $i++)
{ $cms['defaultSourcesCSS'] .= inc($initialFiles[$i]); }
$cms['defaultSourcesJS']     = ""; 
$initialFiles  = array(				
					   ASSETS."jquery.validate.js",				  
					   ASSETS."datatable/jquery.tablesorter.js",  
					   ASSETS."datatable/jquery.dataTables.min.js"
					  ); 					  
for($i = 0; $i < count($initialFiles); $i++)
{ $cms['defaultSourcesJS'] .= inc($initialFiles[$i]); }
$initialFiles_differ  = array();
$cms['defaultSourcesJsDiffer'] = ""; 
$cms['defaultSourcesJsDiffer'] .= @inc($initialFiles_differ);
$initialTemplates = array();
$cms['site:copyright']	= "&copy; ".date("Y")." Wise Exist ";