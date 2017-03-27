<?
require_once "../inc/Image_gallery.php";
$newImg=new Image_gallery();
$id = $HTTP_GET_VARS['id'];
$newImg->imgId=$id;

$getImg=$newImg->getImage();

//$ret=$newImg->delImage();
//if(is_a($ret,"PEAR_ERROR")){
	//echo $ret->getMessage();
//}
if($getImg==true){
	if(unlink(("../gallery/".$newImg->img))){
		$message="Image successfully deleted.";
	}
	else{
		$message ="Unable to delete from folder.";
	}
}

?>
<html>
<head>
<title>Wild Nepal - Administration</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../css/fontLink.css" rel="stylesheet" type="text/css">
</head>

<body topmargin="1" leftmargin="1">
<table width="780" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="normals"><? echo $message;?></span></td>
  </tr>
</table>
<p><a href="listSports.php">Gallery home</a></p>
</body>
</html>
