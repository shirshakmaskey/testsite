<?php
//Now start only functions but not in class
function get_instance()
{ return new Functions();
}
if(!function_exists("pr")){
	function pr($array,$stop=FALSE){
		echo "<pre>";
		print_r($array);
		echo "</pre>";
		if($stop) die();
	}
}

if(!function_exists("pr_session")){
	function pr_session($stop=FALSE){
		echo "<pre>";
		print_r($_SESSION);
		echo "</pre>";
		if($stop) die();
	}
}

if(!function_exists("pr_post")){
	function pr_post($stop=FALSE){
		echo "<pre>";
		print_r($_POST);
		echo "</pre>";
		if($stop) die();
	}
}

if(!function_exists("pr_get")){
	function pr_get($stop=FALSE){
		echo "<pre>";
		print_r($_GET);
		echo "</pre>";
		if($stop) die();
	}
}

if(!function_exists("pr_request")){
	function pr_request($stop=FALSE){
		echo "<pre>";
		print_r($_REQUEST);
		echo "</pre>";
		if($stop) die();
	}
}

if(!function_exists("redirect")){
	function redirect($url){
		if(headers_sent()){
			echo "<script>window.location.href='$url';</script>";
			exit;
		}else{
		   session_write_close();
		   header("Location:$url");
		   exit;
		}
	}
}

function login_id()
{
	return $_SESSION[ENCR_KEY."pathsaleLoginId"];
}
		
function login_group()
{
	$id =  $_SESSION[ENCR_KEY."pathsaleLoginId"];
	$funUserObj= new User();
	$row   =  $funUserObj->userSel($id);
	return $row->group_type;
}

function today()
{
   return date("Y-m-d");	
}

function fulldate()
{
   return date("Y-m-d H:i:s");	
}

function dateformat($date,$format='fdy')
{
   return date("F d,Y",strtotime($date));	
}

function isset_get($field,$default='')
{
	return isset( $_GET[$field] ) ? $_GET[$field] : $default;
}

function isset_post($field,$default='')
{
	return isset( $_POST[$field] ) ? $_POST[$field] : $default;
}

function isset_request($field,$default='')
{
	return isset( $_REQUEST[$field] ) ? $_REQUEST[$field] : $default;
}

function isset_val($variable,$default='')
{
	return isset( $variable ) ? $variable : $default;
}

function redirect_back($back_again=0)
{
   if(!empty($back_again)){redirect($_SERVER['HTTP_REFERER']);}	
}

if(!function_exists("check")){
	function check($field,$strip_tag=false){ 
		if(is_array($field))return $field;
		
		if($strip_tag==false){
		$field  =  strip_tags($field);
		}
		
		$field  =  trim($field);
		$field  =  stripslashes ($field);	
		$field  =  htmlspecialchars ($field);
        $funObj = new Functions();   
		$field  =  mysqli_real_escape_string ($funObj->conn_id,$field);	
		return $field;
	}
}

if(!function_exists("randomKeys")){
	function randomkeys($length,$str=''){
	   $keys = '';	
	   $add  = '';
	   if(empty($str)){
		$str  =  "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";   
	   }
	   $i = 0;
	   $strLength  =  @(strlen($str) - 1);
	   for($i=1;$i<=$length;$i++){
		   $add     =  $str[mt_rand(0,$strLength)];
		   if(empty($add)){
		   $add     =  $str[mt_rand(0,$strLength)];
		   $keys   .= $add; 
		   }
		   else if(empty($add)){
		   $add     =  $str[mt_rand(0,$strLength)];
		   $keys   .= $add; 
		   }
		   else if(empty($add)){
		   $add     =  $str[mt_rand(0,$strLength)];
		   $keys   .= $add; 
		   }
		   else{
			 $keys   .= $add;   
		   }		  
	   }
	   return $keys;
	}
}
	 
function salt($length=15)
	{
		return substr(md5(uniqid(rand(), true)), 0, $length);
	}	 


if(!function_exists("base_url")){
	function base_url($arg='')
	{	$base_url  = '';
	    $base_url  =  "http://".$_SERVER['HTTP_HOST'].DS.PROJECT_FOLDER;
		$base_url = preg_replace('/([^:])(\/{2,})/', '$1/', $base_url);
	    if(!empty($arg)){
			$base_url  .= $arg;
		}
		return $base_url;
	}
}

if(!function_exists("site_url")){
	function site_url($arg='')
	{	$base_url  = '';
	    $base_url  =  "http://".$_SERVER['HTTP_HOST'].DS.PROJECT_FOLDER;
		$base_url = preg_replace('/([^:])(\/{2,})/', '$1/', $base_url);
	    if(!empty($arg)){
			$base_url  .= $arg;
		}
		return $base_url;
	}
}

function siteUrl($isAdmin=false)
{  if($isAdmin)
   {   $siteurl  =  "http://".$_SERVER['HTTP_HOST'].DS.PROJECT_FOLDER.ADMINISTRATOR;
	   $siteurl = preg_replace('/([^:])(\/{2,})/', '$1/', $siteurl);
	   return $siteurl;
	}else{
	   $siteurl  =  "http://".$_SERVER['HTTP_HOST'].DS.PROJECT_FOLDER;
	   $siteurl = preg_replace('/([^:])(\/{2,})/', '$1/', $siteurl);
	   return $siteurl;
	}		 		
}



function checkAdmin()
{
   $current_url  =  $_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];	
   $exp_current_url  =  explode("/",$current_url);
   if(in_array("admin",$exp_current_url)){
	   return true;
   }else{
	   return false;   
   }
}

if(!function_exists("set_flashdata")){
	function set_flashdata($key='',$val='')
	{	if(empty($key)) return "Invalid flash data";
	    $_SESSION[$key]=  $val;
	}
}

if(!function_exists("flashdata")){
	function flashdata($key='')
	{	 $message='';
	     if(empty($key)) return "Invalid flash data";
	     if(isset($_SESSION[$key])){
	     $message =   $_SESSION[$key];
		 unset( $_SESSION[$key]);
		}
	    return $message;
	}
}

if(!function_exists("set_userdata")){
	function set_userdata($key='',$val='')
	{	if(empty($key)) return "Invalid session data";
	     if(is_array($key)){
			 foreach($key as $k=>$v)
			 { $_SESSION[$k]=  $v; }
		 }else{
			 $_SESSION[$key]=  $val; 
		 }
		
	}
}

if(!function_exists("unset_userdata")){
	function unset_userdata($key='',$val='')
	{	if(empty($key)) return "Invalid session data";
	     if(is_array($key)){
			 foreach($key as $k=>$v)
			 { unset($_SESSION[$v]); }
		 }else{
			  unset($_SESSION[$key]); 
		 }
		
	}
}

/*
methods : is_login
parameter : type and check
*/
if(!function_exists("is_login")){
	function is_login($type='admin',$check=false)
	{  //if type is empty. set it admin
	   if(empty($type)) $type='admin';
	   if($type=='admin'){
		  //if check is set, it means it is checking weather it is login or not, it will return true or false; 
		  if($check){
			    if(isset($_SESSION['admin_user_id']) and ($_SESSION['user_agent']==$_SERVER['HTTP_USER_AGENT']))
				return true;
				else
				return false;
			  
		  }else{
			  //if check is not set, then it will check for login or not and redirect to login page.		  
			  if(!isset($_SESSION['admin_user_id']) and ($_SESSION['user_agent']!=$_SERVER['HTTP_USER_AGENT'])){
				redirect('login.php');  
			  }
		  }		  
		}	
				
	}
}


function symbol_filter($str) 
{  $str = htmlspecialchars_decode($str);
 $search = array('/#/','/\./','/  /','/ /','/\,/','/\'/','/&/','/\//','/\(/','/\)/','/\?/','/\-/');	
 $replace = array('','','-','-','','','and','','','','','-');
 return preg_replace($search, $replace, $str);
}

function create_slug($str) 
{ $str = htmlspecialchars_decode($str);
  $str  = strtolower($str);
  $str  = trim($str);
  $str  =  substr($str,0,100);
  return symbol_filter($str);  
}

function randomNum($length){
	   $i = "";
	   $key     = "";
	   for($i=0;$i<$length;$i++){	
	   $random_digit = mt_rand(0, 9);
		 $key .= $random_digit;		 
	   }
	   return $key;
}
function encode($str) {
         $strs  = strtr(base64_encode($str), '+/', '-_');
		 $strs  = bin2hex($strs);
		 return urlencode($strs);
		}
		
		function decode($base64url) {
		 $strs  =  urldecode($base64url);
		 $strs = pack('H*', $strs);
		 return base64_decode(strtr($strs, '-_', '+/'));
		}
		
		function web_encode($string,$key='wise') {
			$i=0;$j=0;$hash='';
			$key = sha1($key);
			$strLen = strlen($string);
			$keyLen = strlen($key);
			for ($i = 0; $i < $strLen; $i++) {
				$ordStr = ord(substr($string,$i,1));
				if ($j == $keyLen) { $j = 0; }
				$ordKey = ord(substr($key,$j,1));
				$j++;
				$hash .= strrev(base_convert(dechex($ordStr + $ordKey),16,36));
			}
			return $hash;
		}
		
		function web_decode($string,$key='wise') {
			$i=0;$j=0;$hash='';
			$key = sha1($key);
			$strLen = strlen($string);
			$keyLen = strlen($key);
			for ($i = 0; $i < $strLen; $i+=2) {
				$ordStr = hexdec(base_convert(strrev(substr($string,$i,2)),36,16));
				if ($j == $keyLen) { $j = 0; }
				$ordKey = ord(substr($key,$j,1));
				$j++;
				$hash .= chr($ordStr - $ordKey);
			}
			return $hash;
		}
function CroppedThumbnailWithOutResize($imgSrc,$dest,$thumbnail_width=100,$thumbnail_height=100) { 
 list($width_orig, $height_orig,$img_type) = @getimagesize($imgSrc);  
   if($img_type == 1 || $img_type == 2 || $img_type == 3){
       if($img_type == 1) $myImage = imagecreatefromgif($imgSrc);
	   elseif($img_type == 2) $myImage = imagecreatefromjpeg($imgSrc);
	   else $myImage = imagecreatefrompng($imgSrc);
        $ratio_orig = $width_orig/$height_orig;
			
$new_width  = $thumbnail_width;
$new_height = $thumbnail_height;
	   
			$x_mid = $new_width/2;  //horizontal middle
			$y_mid = $new_height/2; //vertical middle
		   
	 $process = imagecreatetruecolor(round($new_width), round($new_height));


//preserve transparency
if($img_type == 1 or $img_type == 3){ 
imagecolortransparent($process, imagecolorallocatealpha($process, 0, 0, 0, 127));
imagealphablending($process, false);
imagesavealpha($process, true); 
}
	 
imagecopyresampled($process, $myImage, 0, 0, 0, 0, $new_width, $new_height, $width_orig, $height_orig);
$thumb=imagecreatetruecolor($new_width, $new_height);

//preserve transparency
if($img_type == 1 or $img_type == 3){ 
imagecolortransparent($thumb, imagecolorallocatealpha($thumb, 0, 0, 0, 127));
imagealphablending($thumb, false);
imagesavealpha($thumb, true); 
}	
		
imagecopyresampled($thumb, $myImage, 0, 0, 0, 0, $new_width, $new_height, $width_orig, $height_orig);

		
		switch($img_type)
		{
			  case '1':
				  imagegif($thumb,$dest);
			  break;
			  case '2':
				  imagejpeg($thumb,$dest,100);
			  break;
			  case '3':
				  imagepng($thumb,$dest);
			  break;
			  default:			   
			  break;
		  }
		
			imagedestroy($process);
			imagedestroy($myImage);
			}
}// CroppedThumbnailWithOutResize close	

function CroppedThumbnail($imgSrc,$dest,$thumbnail_width=100,$thumbnail_height=100) { 
 list($width_orig, $height_orig,$img_type) = @getimagesize($imgSrc);  
   if($img_type == 1 || $img_type == 2 || $img_type == 3){
       if($img_type == 1) $myImage = imagecreatefromgif($imgSrc);
	   elseif($img_type == 2) $myImage = imagecreatefromjpeg($imgSrc);
	   else $myImage = imagecreatefrompng($imgSrc);
        $ratio_orig = $width_orig/$height_orig;
			
			if (($thumbnail_width/$thumbnail_height) < $ratio_orig) {
			   if($thumbnail_width>$width_orig){$new_height = $height_orig;}else{$new_height = $thumbnail_width/$ratio_orig;}
			   
			   if($thumbnail_width>$width_orig){$new_width = $width_orig;}else{$new_width = $thumbnail_width;}
			} else {
			   if($thumbnail_height>$height_orig){$new_width = $width_orig;}else{$new_width = $thumbnail_height*$ratio_orig;}
			   if($thumbnail_height>$height_orig){$new_height = $height_orig;}else{$new_height = $thumbnail_height;}
			}
		   
			$x_mid = $new_width/2;  //horizontal middle
			$y_mid = $new_height/2; //vertical middle
		   
			$process = imagecreatetruecolor(round($new_width), round($new_height));

//preserve transparency
if($img_type == 1 or $img_type == 3){ 
imagecolortransparent($process, imagecolorallocatealpha($process, 0, 0, 0, 127));
imagealphablending($process, false);
imagesavealpha($process, true); 
}			
			imagecopyresampled($process, $myImage, 0, 0, 0, 0, $new_width, $new_height, $width_orig, $height_orig);
			$thumb=imagecreatetruecolor($new_width, $new_height);
			
			
		 imagecopyresampled($thumb, $process, 0, 0, ($x_mid-($new_width/2)), ($y_mid-($new_height/2)), $new_width, $new_height, $new_width, $new_height);
		
		switch($img_type)
		{
			  case '1':
				  imagegif($thumb,$dest);
			  break;
			  case '2':
				  imagejpeg($thumb,$dest);
			  break;
			  case '3':
				  imagepng($thumb,$dest);
			  break;
			  default:			   
			  break;
		  }
		
			imagedestroy($process);
			imagedestroy($myImage);
			}
}// CroppedThumbnail close	

function remakeImage($src,$destination,$targ_w=100,$targ_h=100)
{ 	 list($width_orig, $height_orig,$img_type) = @getimagesize($src); 
	 if($width_orig>$targ_w or $height_orig>$targ_h){
	 if($width_orig>$targ_w){
		 $crop_ratio  =  ($targ_w/$width_orig); 
		 $targ_h = $crop_ratio*$height_orig;
	 }
	 
	 $jpeg_quality = 80;		 
	 if($img_type == 1 || $img_type == 2 || $img_type == 3 ){
	   if($img_type == 1) $img_r = imagecreatefromgif($src);
	   elseif($img_type == 2) $img_r = imagecreatefromjpeg($src);
	   else $img_r = imagecreatefrompng($src);			   
						   
			$dst_r = imagecreatetruecolor(round($targ_w), round($targ_h));	
			
//preserve transparency
if($img_type == 1 or $img_type == 3){ 
imagecolortransparent($dst_r, imagecolorallocatealpha($dst_r, 0, 0, 0, 127));
imagealphablending($dst_r, false);
imagesavealpha($dst_r, true); 
}
					
			imagecopyresampled($dst_r,$img_r,0,0,0,0,$targ_w,$targ_h,$width_orig,$height_orig);
	
		switch($img_type)
		   {  case '1': imagegif($dst_r,$destination); break;
			  case '2': imagejpeg($dst_r,$destination,$jpeg_quality); break;
			  case '3': imagepng($dst_r,$destination); break;			  
			  default:	  break;
		  }
		 imagedestroy($img_r);
	   }
	 }//width>640
}	


function get_youtube_code($url)
{
        $parse = parse_url($url);
        if(!empty($parse['query'])) {
          preg_match("/v=([^&]+)/i", $url, $matches);
          return $matches[1];
        } else {
          //to get basename
          $info = pathinfo($url);
          return $info['basename'];
        }
}

function get_youtube_thumbnail($url)
{
    $parse = parse_url($url);
    if(!empty($parse['query'])) {
    preg_match("/v=([^&]+)/i", $url, $matches);
    $id = $matches[1];
    } else {
    //to get basename
    $info = pathinfo($url);
    $id = $info['basename'];
    }   
    $img = "http://img.youtube.com/vi/$id/0.jpg";
    return $img;
}

function get_metacafe_thumbnail($id, $title, $size='large'){
    if($id && $title){
        if($size=='large'){
            return "http://s4.mcstatic.com/thumb/{$id}/0/6/videos/0/6/{$title}.jpg";   
        }elseif($size=='small'){
            return "http://s4.mcstatic.com/thumb/{$id}/0/4/directors_cut/0/1/{$title}.jpg";   
        }
    }
    return false;
}

function dailymotion_video_details($url)
{
    preg_match('~(?:www\.)?dailymotion\.(?:com|alice\.it)/(?:(?:[^"]*?)?video|swf)/([a-z0-9]{1,18})~imu', $url, $matches);
    if($matches) {
        $dailymotion = array();
        $dailymotion['id'] = $matches[1];
        $dailymotion['thumbnail'] = "http://www.dailymotion.com/thumbnail/160x120/video/".$matches[1];
        return $dailymotion;
    }
}

function metacafe_video_details($url)
{
    preg_match('|metacafe\.com/watch/([\w\-\_]+)(.*)|', $url, $matches);
    if($matches) {
        $metacafe = array();
        $metacafe['id'] = $matches[1];
        $metacafe['title'] = ltrim(rtrim($matches[2], '/'), '/');
        return $metacafe;
    }
}

//function is used to get vimeo link ID
function parse_vimeo($link)
{
        $regexstr = '~
            # Match Vimeo link and embed code
            (?:<iframe [^>]*src=")?       # If iframe match up to first quote of src
            (?:                         # Group vimeo url
                https?:\/\/             # Either http or https
                (?:[\w]+\.)*            # Optional subdomains
                vimeo\.com              # Match vimeo.com
                (?:[\/\w]*\/videos?)?   # Optional video sub directory this handles groups links also
                \/                      # Slash before Id
                ([0-9]+)                # $1: VIDEO_ID is numeric
                [^\s]*                  # Not a space
            )                           # End group
            "?                          # Match end quote if part of src
            (?:[^>]*></iframe>)?        # Match the end of the iframe
            (?:<p>.*</p>)?              # Match any title information stuff
            ~ix';

        preg_match($regexstr, $link, $matches);
        return $matches[1];
}

function get_vimeo_thumbnail($url)
{
    $id = parse_vimeo($url);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://vimeo.com/api/v2/video/$id.php");
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    $output = unserialize(curl_exec($ch));
    $output = $output[0]['thumbnail_medium'];
    curl_close($ch);
    return $output;
}

function getMyvideo($v_url='',$v_type=''){
    $v_url = check_url($v_url);
    $html = file_get_contents_curl($v_url);

    if($html){
        //parsing begins here:
        $doc = new DOMDocument();
        @$doc->loadHTML($html);
        $nodes = $doc->getElementsByTagName('title');

        //get and display what you need:
        $title = $nodes->item(0)->nodeValue;
        $metas = $doc->getElementsByTagName('meta');

        for ($i = 0; $i < $metas->length; $i++){
            $meta = $metas->item($i);
            if($meta->getAttribute('name') == 'description')
            $description = $meta->getAttribute('content');
        }
        $thumbnail='';
        switch($v_type){
            case "youtube":
                $thumbnail = get_youtube_thumbnail($v_url);
                $class = "youtube";
            break;
            case "vimeo":
                $thumbnail = get_vimeo_thumbnail($v_url);
                $class = "vimeo";
            break;
            case "soundcloud":
                $thumbnail = IMAGE_PATH."apanel/soundcloud.png";
                $class = "soundcloud";
            break;
            case "metacafe":
                $metacafe = metacafe_video_details($v_url);
                $thumbnail = get_metacafe_thumbnail($metacafe['id'], $metacafe['title']);
                $class = "metacafe";
            break;
            case "dailymotion":
                $daily_motion = dailymotion_video_details($v_url);
                $thumbnail = $daily_motion['thumbnail'];
                $class = "dailymotion";
            break;
        }

        /*$myArr = array("title"        => $title,
                       "thumb_image" => $thumbnail,
                       "url"          => $v_url,
                       "host"        => getHost($v_url),
                       "content"      => $description,
                       "class"         => $class
                       );*/
       return $thumbnail;
    }
  }

function my_curl_url($url)
   {
       //  Initiate curl
    $ch = curl_init();
    // Disable SSL verification
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    // Will return the response, if false it print the response
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // Set the url
    curl_setopt($ch, CURLOPT_URL,$url);
    // Execute
    $result=curl_exec($ch);
    // Closing
    curl_close($ch);
    return $result;
   }


function get_youtube_id($url)
{       $values = '';
        $id     = array();
        if (preg_match('/youtube\.com\/watch\?v=([^\&\?\/]+)/', $url, $id)) {
        $values = $id[1];
        } else if (preg_match('/youtube\.com\/embed\/([^\&\?\/]+)/', $url, $id)) {
          $values = $id[1];
        } else if (preg_match('/youtube\.com\/v\/([^\&\?\/]+)/', $url, $id)) {
          $values = $id[1];
        } else if (preg_match('/youtu\.be\/([^\&\?\/]+)/', $url, $id)) {
          $values = $id[1];
        } else {   
        // not an youtube video
        }
       return $values;
}

function get_youtube_video_id($url)
{
    if (strpos( $url,"v=") !== false)
    {
        return substr($url, strpos($url, "v=") + 2, 11);
    }
    elseif(strpos( $url,"embed/") !== false)
    {
        return substr($url, strpos($url, "embed/") + 6, 11);
    }

}


function parseArrayToObject($array) {
$object = new stdClass();
if (is_array($array) && count($array) > 0) {
	foreach ($array as $name=>$value) {
		$name = strtolower(trim($name));
		if (!empty($name)) {
			$object->$name = $value;
		}
	}
}
return $object;
}

function parseObjectToArray($object) {
	$array = array();
	if (is_object($object)) {
		$array = get_object_vars($object);
	}
	return $array;
}

/**
 * Sanitize input to prevent against XSS and other nasty stuff.
 * Taken from cakephp (http://cakephp.org)
 * Licensed under the MIT License
 *
 * @internal
 * @param string $val input value
 * @return string
 */
function cleanValue($val) {
  if ($val == "") return $val;
  //Replace odd spaces with safe ones
  $val = str_replace(" ", " ", $val);
  $val = str_replace(chr(0xCA), "", $val);
  //Encode any HTML to entities (including \n --> <br />)
  $_cleanHtml = function($string,$remove = false) {
    if ($remove) {
      $string = strip_tags($string);
    } else {
      $patterns = array("/\&/", "/%/", "/</", "/>/", '/"/', "/'/", "/\(/", "/\)/", "/\+/", "/-/");
      $replacements = array("&amp;", "&#37;", "&lt;", "&gt;", "&quot;", "&#39;", "&#40;", "&#41;", "&#43;", "&#45;");
      $string = preg_replace($patterns, $replacements, $string);
    }
    return $string;
  };
  $val = $_cleanHtml($val);
  //Double-check special chars and remove carriage returns
  //For increased SQL security
  $val = preg_replace("/\\\$/", "$", $val);
  $val = preg_replace("/\r/", "", $val);
  $val = str_replace("!", "!", $val);
  $val = str_replace("'", "'", $val);
  //Allow unicode (?)
  $val = preg_replace("/&amp;#([0-9]+);/s", "&#\\1;", $val);
  //Add slashes for SQL
  //$val = $this->sql($val);
  //Swap user-inputted backslashes (?)
  $val = preg_replace("/\\\(?!&amp;#|\?#)/", "\\", $val);
  return $val;
}


if(!function_exists("combine_array")){
function combine_array( $pairs, $atts) {
        $atts = (array)$atts;
        $out = array();
        foreach ($pairs as $name => $default) {
            if ( array_key_exists($name, $atts) )
                $out[$name] = $atts[$name];
            else
                $out[$name] = $default;
        }
        return $out;
    }
}


function getFileFormattedSize($size=0){
  $formattedSize = $size;
  if($size > 0)
  {
    $formattedSize = $size.' B';
  }
  if($size > 1024)
  {
    $formattedSize = ceil($size/1024).' KB';
  }
  if($size > 1048576)
  {
    $formattedSize = ceil($size/1048576).' MB';
  }
  return $formattedSize;
}

?>