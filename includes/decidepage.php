<?php
  $p  =  isset($_GET['p'])?$_GET['p']:'';
  switch($p){
  case 'pages':         define('PAGES_PAGE', 1);         break;
  case 'post' :         define('POST_PAGE', 1);          break;
  case 'festival' :     define('FESTIVAL_PAGE', 1);      break;
  case 'services' :      define('SERVICE_PAGE', 1);       break;
  default:              define('PAGES_PAGE', 1);         break;
  }
  $pagename  = basename($_SERVER['PHP_SELF']);
   if($pagename=="contact.php" and empty($_SERVER['QUERY_STRING'])){
	   define('CONTACT_PAGE', 1);
   }
   else if($pagename=="custom.php" and isset($_GET['slug'])){
	   define('CUSTOM_DETAIL_PAGE', 1);
   }
   else if($pagename=="enquiry.php" and isset($_GET['act_id'])){
	   define('CONTACT_PAGE', 1);
   }
   else if($pagename=="booking.php" and empty($_SERVER['QUERY_STRING'])){
	   define('BOOKING_PAGE', 1);
   }
   else if($pagename=="booking.php" and isset($_GET['act_id'])){
	   define('BOOKING_PAGE', 1);
   }
   //sponser
   else if($pagename=="sponser.php" and empty($_SERVER['QUERY_STRING'])){
     define('SPONSER_PAGE', 1);
   }
     
   else if($pagename=="sponser.php" and isset($_GET['np']) and $p==''){
     define('SPONSER_PAGE', 1);
   }
   else if($pagename=="sponser.php" and isset($_GET['slug'])){
     define('SPONSER_DETAIL_PAGE', 1);
   }
   //sponser end
   //news
   else if($pagename=="news.php" and empty($_SERVER['QUERY_STRING'])){
	   define('NEWS_PAGE', 1);
   }
   else if($pagename=="news.php" and isset($_GET['slug']) and $p=='cat'){
     define('NEWS_CAT_PAGE', 1);
   }

   else if($pagename=="news.php" and isset($_GET['np']) and isset($_GET['slug']) and $p=='cat'){
     define('NEWS_CAT_PAGE', 1);
   }
   
   else if($pagename=="news.php" and isset($_GET['np']) and $p==''){
     define('NEWS_PAGE', 1);
   }
   else if($pagename=="news.php" and isset($_GET['slug'])){
	   define('NEWS_DETAIL_PAGE', 1);
   }
   //news end
   //article start 
    else if($pagename=="article.php" and empty($_SERVER['QUERY_STRING'])){
     define('ARTICLE_PAGE', 1);
   }
   else if($pagename=="article.php" and isset($_GET['slug']) and $p=='cat'){
     define('ARTICLE_CAT_PAGE', 1);
   }

   else if($pagename=="article.php" and isset($_GET['np']) and isset($_GET['slug']) and $p=='cat'){
     define('ARTICLE_CAT_PAGE', 1);
   }
   
   else if($pagename=="article.php" and isset($_GET['np']) and $p==''){
     define('ARTICLE_PAGE', 1);
   }
   else if($pagename=="article.php" and isset($_GET['slug'])){
     define('ARTICLE_DETAIL_PAGE', 1);
   }

   //gallery start 
   else if($pagename=="gallery.php" and empty($_SERVER['QUERY_STRING'])){
	   define('GALLERY_PAGE', 1);
   }
   else if($pagename=="gallery.php" and isset($_GET['np'])){
	   define('GALLERY_PAGE', 1);
   }
   else if($pagename=="gallery.php" and isset($_GET['slug'])){
	   define('GALLERY_DETAIL_PAGE', 1);
   }
   //testimonials start 
   if($pagename=="testimonials.php" and empty($_SERVER['QUERY_STRING'])){
	   define('TESTIMONIALS_PAGE', 1);
   }
   else if($pagename=="testimonials.php" and isset($_GET['np'])){
	   define('TESTIMONIALS_PAGE', 1);
   }
   else if($pagename=="testimonials.php" and isset($_GET['slug'])){
	   define('TESTIMONIALS_DETAIL_PAGE', 1);
   }
  //package start 
  else if($pagename=="packages.php" and empty($_SERVER['QUERY_STRING'])){
	   define('PACkAGE_PAGE', 1);
  }
  else if($pagename=="packages.php" and isset($_GET['type'])){
	  define('PACKAGE_PAGE', 1);
  }
  else if($pagename=="packages.php" 
      and !empty($_GET['p']) 
	  and ($_GET['p']=='list')){
	  define('PACKAGE_PAGE', 1);
  }
   else if($pagename=="packages.php" and isset($_GET['act_id'])){
	   define('PACKAGE_PAGE', 1);
   }
   else if($pagename=="packages.php" and isset($_GET['dest_id'])){
	   define('PACKAGE_PAGE', 1);
   }
   else if($pagename=="packages_detail.php" and isset($_GET['act_id'])){
	   define('PACKAGE_DETAIL_PAGE', 1);
   }
   //destination start
   else if($pagename=="destination.php" and empty($_SERVER['QUERY_STRING'])){
	   define('DESTINATION_PAGE', 1);
   }
   else if($pagename=="destination.php" and isset($_GET['slug'])){
	   define('DESTINATION_DETAIL_PAGE', 1);
   }
   //hotel start
   else if($pagename=="hotel.php" and empty($_SERVER['QUERY_STRING'])){
	   define('HOTEL_PAGE', 1);
   }  
   else if($pagename=="hotel.php" and isset($_GET['np'])){
	   define('HOTEL_PAGE', 1);
   }
    else if($pagename=="hotel.php" and isset($_GET['slug'])){
	   define('HOTEL_DETAIL_PAGE', 1);
   }
   //download start
   else if($pagename=="download.php" and empty($_SERVER['QUERY_STRING'])){
     define('DOWNLOAD_PAGE', 1);
   }
   else if($pagename=="download.php" and isset($_GET['slug']) and $p=='cat'){
     define('DOWNLOAD_CAT_PAGE', 1);
   }

   else if($pagename=="download.php" and isset($_GET['np']) and isset($_GET['slug']) and $p=='cat'){
     define('DOWNLOAD_CAT_PAGE', 1);
   }
   
   else if($pagename=="download.php" and isset($_GET['np']) and $p==''){
     define('DOWNLOAD_PAGE', 1);
   }
   else if($pagename=="download.php" and isset($_GET['slug'])){
     define('DOWNLOAD_DETAIL_PAGE', 1);
   }
   //events start
   else if($pagename=="events.php" and empty($_SERVER['QUERY_STRING'])){
     define('EVENTS_PAGE', 1);
   }
   else if($pagename=="events.php" and isset($_GET['slug']) and $p=='cat'){
     define('EVENTS_CAT_PAGE', 1);
   }

   else if($pagename=="events.php" and isset($_GET['np']) and isset($_GET['slug']) and $p=='cat'){
     define('EVENTS_CAT_PAGE', 1);
   }
   
   else if($pagename=="events.php" and isset($_GET['np']) and $p==''){
     define('EVENTS_DETAIL_PAGE', 1);
   }
   else if($pagename=="events.php" and isset($_GET['slug'])){
     define('EVENTS_DETAIL_PAGE', 1);
   }