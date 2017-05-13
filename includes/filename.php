<?php
$filename_constant  =  array("DEFAULT"=>"index",
	                         "CONTAINER"=>"container",
	                         "CONTROL"=>"control",
	                         "CUSTOM"=>"custom",
	                         "NEWS"=>"news",
	                         "ARTICLE"=>"article",
	                         "GALLERY"=>"gallery",
	                         "CONTACT"=>"contact",
	                         "ENQUIRY"=>"enquiry",
	                         "PACKAGES"=>"packages",
	                         "DOWNLOAD"=>"download",
	                         "DESTINATION"=>"destination",
	                         "HOTEL"=>"hotel",
                             "TESTIMONIALS"=>"testimonials",
                             "SPONSER"=>"sponser",
	                         "PACKAGES_DETAIL"=>"packages_detail",
	                         "BOOKING"=>"booking",
                             "LOGIN_REGISTER"=>"login_register",
                             "USER"=>"user",
                             "SEARCH"=>"search",
                             "GETAQUOTE"=>"get_a_quote"
	                         );
$filename_constant =  array_filter(array_unique($filename_constant));
foreach($filename_constant as $key=>$val){
	if(!defined("FILENAME_".$key))
		define("FILENAME_".$key,$val.".php");
}