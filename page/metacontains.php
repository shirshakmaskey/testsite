<?php ob_start(); 
$def_page_title  =  COMPANY_SITE_NAME_DESC;
$seo             =  $funObj->seo();
$meta_keywords   =  $seo->keywords;
$metasubject     =  $seo->metasubject;
$metadesc        =  $seo->metadesc;
$metakeywords    =  $seo->metakeyword;
$metaabstract    =  $seo->metaabstract;
$metakeyphrase   =  $seo->metakeyphrase;
$metaclassification  =  $seo->metaclassification;
$copyright       =  $seo->copyright;
$metacatagory    =  $seo->metacatagory;
$reply_to        =  $seo->reply_to;
$author          =  $seo->author;
?>
<title><?php echo !empty($data['page_title'])?$data['page_title']."-":''; ?><?php echo $def_page_title; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="keywords" content="<?php echo !empty($data['metakeyword'])?$data['metakeyword']." , ":''; ?><?php echo $metakeywords; ?>" />
<meta name="description" content="<?php echo !empty($data['metadescription'])?$data['metadescription']." , ":''; ?><?php echo $metadesc; ?>" />
<meta name="Subject" content="<?php echo $metasubject; ?>">
<meta name="abstract" content="<?php echo $metaabstract; ?>">
<meta name="category" content="<?php echo $metacatagory; ?>"/>
<meta http-equiv="Reply-to" content="<?php echo $reply_to; ?>">
<meta name="robots" content="index,follow,all">
<meta name="Author" content="<?php echo $author; ?>">
<meta name="Copyright" content="<?php echo $copyright; ?>"  />
<meta name="Rating" content="General" />
<meta name="msnbot" content="INDEX, FOLLOW" />
<meta name="googlebot" content="INDEX, FOLLOW" />
<meta name="distribution" content="global">
<meta name="revisit-after" content="daily">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="msvalidate.01" content="91F7421FB9133DC6F9403EB9271EDE25" />
<!-- Favicon -->
<link rel="shortcut icon" href="favicon.ico">
<?php
if(isset($data['fbtags']) and !empty($data['fbtags'])){
   echo $data['fbtags'];
}
?>
<?php
$cms['metacontains'] = ob_get_clean();
?>