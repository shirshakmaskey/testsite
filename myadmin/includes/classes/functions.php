<?php 
include_once("mysqli_driver.php");
@include_once("class.phpmailer.php");
class Functions extends Database
{  public $action;
   public $aid;
   public $table;
   public $url_back;
	
	    function doAction()
		{    $action = $this->action; 
			 if($action =="add")
			{  
			 $queryResult  =   $this->insert(); 
			$_SESSION['latest_insert_id']  = mysqli_insert_id($this->conn_id);
			$_SESSION['successMsg']="Data has been added sucessfully!!";
			return $queryResult;
			}
			
			if($action =="edit")
			{
				if(count($this->cond)==0)
				{ $this->cond=array("id"=>$this->aid); }
				
     		$queryResult  =  $this->update();
			$_SESSION['successMsg']="Data has been edited sucessfully!!";			
			return $queryResult;
			}
			if($action =="delete")
			{		
			    if(count($this->cond)==0)
				{ $this->cond=array("id"=>$this->aid); }
			$queryResult  =  $this->delete();
			$_SESSION['successMsg']="Data has been deleted sucessfully!!";
			return $queryResult;
			}						
		}
		
		function login_id()
		{
			return $_SESSION[ENCR_KEY."pathsaleLoginId"];
		}
		
		function login_group()
		{
			$id =  $_SESSION[ENCR_KEY."pathsaleLoginId"];
			$funUserObj  =  new User();
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
		
		public function print_arr( $arrayName )
		{
			echo "<pre>";
			print_r( $arrayName );
			echo "</pre>";
		}
		
		function siteUrl($isAdmin=false)
		{  if($isAdmin)
		   {   $siteurl  =  "http://".$_SERVER['HTTP_HOST'].DS.PROJECT_FOLDER.ADMINISTRATOR;
			   $siteurl = preg_replace('/([^:])(\/{2,})/', '$1/', $siteurl);
			   return $siteurl;
			}else{
			   $siteurl  =  "http://".$_SERVER['HTTP_HOST'].DS.PROJECT_FOLDER;
			   $siteurl = str_replace("//","/",$siteurl);
			   $siteurl = preg_replace('/([^:])(\/{2,})/', '$1/', $siteurl);
			   return $siteurl;
			   return $siteurl;
			}		 		
		}
		
		function base_url($arg='')
		{	$base_url  = '';
			$base_url  =  "http://".$_SERVER['HTTP_HOST'].DS.PROJECT_FOLDER;
			$base_url = preg_replace('/([^:])(\/{2,})/', '$1/', $base_url);
			if(!empty($arg)){
				$base_url  .= $arg;
			}
			return $base_url;
		}

		function site_url($arg='')
		{	$base_url  = '';
			$base_url  =  "http://".$_SERVER['HTTP_HOST'].DS.PROJECT_FOLDER;
			$base_url = preg_replace('/([^:])(\/{2,})/', '$1/', $base_url);
			if(!empty($arg)){
				$base_url  .= $arg;
			}
			return $base_url;
		}


		
	 function check($field,$strip_tag=false){ 
		if(is_array($field))return $field;
		
		if($strip_tag==false){
		$field  =  strip_tags($field);
		}
		
		$field  =  trim($field);
		$field  =  stripslashes ($field);	
		$field  =  htmlspecialchars ($field);
		$field  =  mysqli_real_escape_string ($this->conn_id,$field);
		return $field;
	}
	   
	   function uE($url_string_value)
	   {
		return urlencode($url_string_value);   
	   }
	   
	   // GET THE CURRENT PAGE URL
		function curPageURL(){
		
			$pageURL = 'http';
			if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
			$pageURL .= "://";
				if ($_SERVER["SERVER_PORT"] != "80") {
				$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
			} 
			else {
				$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
			}
			return $pageURL;
		}

function func_filter($in) 
{
$search = array ('@[éèêëÊË]@i','@[áãàâäÂÄ]@i','@[ìíiiîïÎÏ]@i','@[úûùüÛÜ]@i','@[òóõôöÔÖ]@i','@[ñÑ]@i','@[ýÿÝ]@i','@[ç]@i','@[ ]@i','@[^a-zA-Z0-9\-]@','@[�]@');	
$replace = array ('e','a','i','u','o','n','y','c','\-','','');
return preg_replace($search, $replace, $in);
}


	   
	   function file_count($current_path)
	   {
		   if(file_exists($current_path))
										{  
										    $mydir  =  $current_path;
											$d  =  dir($mydir);
											$filenum  =0;
											while($entry  =  $d->read())
											{
											    if($entry!="." && $entry!="..")
												{
												$filenum++;												
												}												
											}
											$d->close();										
											
										}
										return $filenum;
	   }
		
		function symbol_filter($str) 
		{$str = htmlspecialchars_decode($str);
		 $search = array('/#/','/\./','/  /','/ /','/\,/','/\'/','/&/','/\//','/\(/','/\)/','/\?/','/\-/');
		 $replace = array('','','-','-','','','and','','','','','-');
		 return preg_replace($search, $replace, $str);
		}
	   
	   function map_me($str,$withnum=false) 
		{		
		if($withnum){
		$search = array('/1/','/2/','/3/','/4/','/5/','/6/','/7/','/8/','/9/','/0/');	
		$replace = array('akA','blB','cmC','dnD','eoE','fpF','gqG','hrH','isI','jtJ');	
		}else{
		$search = array('/1/','/2/','/3/','/4/','/5/','/6/','/7/','/8/','/9/','/0/');	
		$replace = array('ak','bl','cm','dn','eo','fp','gq','hr','is','jt');	
		}
		return preg_replace($search, $replace, $str)."";
		}
		
	    function map_me_reverse($str,$withnum=false)
	    {   
		if($withnum){
			if(is_numeric($str)){
			       $_SESSION['errorMessage']  =  "Page is not accessible";
				   $_SESSION['errorPageUrl']  = $this->curPageURL();
				   $this->redirect($this->siteUrl(1)."index.php");
		      }
			
		$search = array('/akA/','/blB/','/cmC/','/dnD/','/eoE/','/fpF/','/gqG/','/hrH/','/isI/','/jtJ/');	
		$replace = array('1','2','3','4','5','6','7','8','9','0');
		}else{
		$search = array('/ak/','/bl/','/cm/','/dn/','/eo/','/fp/','/gq/','/hr/','/is/','/jt/');	
		$replace = array('1','2','3','4','5','6','7','8','9','0');
		}		
		return preg_replace($search, $replace, $str);
		}
		
	   
	    function file_permissions($mode) {
// determine type
    if ( ($mode & 0xC000) == 0xC000) { // unix domain socket
      $type = 's';
    } elseif ( ($mode & 0x4000) == 0x4000) { // directory
      $type = 'd';
    } elseif ( ($mode & 0xA000) == 0xA000) { // symbolic link
      $type = 'l';
    } elseif ( ($mode & 0x8000) == 0x8000) { // regular file
      $type = '-';
    } elseif ( ($mode & 0x6000) == 0x6000) { //bBlock special file
      $type = 'b';
    } elseif ( ($mode & 0x2000) == 0x2000) { // character special file
      $type = 'c';
    } elseif ( ($mode & 0x1000) == 0x1000) { // named pipe
      $type = 'p';
    } else { // unknown
      $type = '?';
    }

// determine permissions
    $owner['read']    = ($mode & 00400) ? 'r' : '-';
    $owner['write']   = ($mode & 00200) ? 'w' : '-';
    $owner['execute'] = ($mode & 00100) ? 'x' : '-';
    $group['read']    = ($mode & 00040) ? 'r' : '-';
    $group['write']   = ($mode & 00020) ? 'w' : '-';
    $group['execute'] = ($mode & 00010) ? 'x' : '-';
    $world['read']    = ($mode & 00004) ? 'r' : '-';
    $world['write']   = ($mode & 00002) ? 'w' : '-';
    $world['execute'] = ($mode & 00001) ? 'x' : '-';

// adjust for SUID, SGID and sticky bit
    if ($mode & 0x800 ) $owner['execute'] = ($owner['execute'] == 'x') ? 's' : 'S';
    if ($mode & 0x400 ) $group['execute'] = ($group['execute'] == 'x') ? 's' : 'S';
    if ($mode & 0x200 ) $world['execute'] = ($world['execute'] == 'x') ? 't' : 'T';

    return $type .
           $owner['read'] . $owner['write'] . $owner['execute'] .
           $group['read'] . $group['write'] . $group['execute'] .
           $world['read'] . $world['write'] . $world['execute'];
  }
		
		
		function tep_session_register($sesion_name)
		{
		return session_register($sesion_name);
		}

		function redirect($url)
		{
				if(headers_sent()){
				echo "<script language=\"Javascript\">window.location.href='$url';</script>";
				exit;
				}
				else{
				session_write_close();
				header("Location:$url");
				exit;
	           }
		}
		
		function explode_php( $pagename="" )
		{
			if( empty( $pagename ) )
			{ return false;
			}
			else
			{
			   $pagenameArr   =  explode( ".php", $pagename );
			   return $pagenameArr[0];
			}
		}
		
		function subString($str,$strlen,$strpos=0){
	
		if(strlen($str)>$strlen)
			return substr(strip_tags(html_entity_decode($str)),$strpos,$strlen)."...";
		else
			return strip_tags(html_entity_decode($str));
	}

/**
	* Get current date
	* @return current date
	*/
	function currentDate(){ 
	
		return date('Y-m-d');
	}
	
	/**
	* Get current time	
	* @return current time
	*/
	function currentTime(){
	
		return date("H:i:s");
	}
	
	/**
	* Add Days
	* @return added date
	*/
	function addDays ($days, $fmt="Y-m-d", $date=NULL) {
	// Adds days to date or from now // By JM, www.Timehole.com
		if ($date==NULL) { $t1 = time(); }
		else $t1 = strtotime($date);
		$t2 = $days * 86400; // make days to seconds
		return date($fmt,($t2+$t1));
	}

	/**
	* Get current time	
	* @return current time
	*/
	function currentTimestamp(){
	
		return $this->currentDate()." ".$this->currentTime();
	}
	
	/**
	* Format date
	* @param date $date	
	* @return formatted date
	*/
	function getDateFormatted($date){
	
		$date = date('d/m/Y H:i:s', strtotime($date));
		return $date;
	}
	function myDate($date)
	{
	return date( 'F j,l Y' ,strtotime($date));	
	}
	/**
	* Email function
	* @param string $fromName	
	* @param string $fromEmail	
	* @param string $receiverEmail	
	* @param string $subject	
	* @param string $content	
	* @param string $replyName	
	* @param boolean $debug	
	* @return 1 or null
	*/
	function sendEmail($fromName, $fromEmail, $receiverEmail, $subject, $content, $replyTo="", $debug=false) {
	
		$sendMail = new PHPMailer();
		$sendMail->FromName = $fromName;
		$sendMail->From = $fromEmail;
		$sendMail->AddAddress($receiverEmail);	
		if(trim($replyTo)!="")
			$sendMail->AddReplyTo($replyTo);
		$sendMail->IsHtml(true);
		$sendMail->Subject = $subject;
		$sendMail->Body = html_entity_decode($content);
		if($debug)
			die(html_entity_decode($content));
		else
			return $sendMail->Send();
	}
	

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
	
	function randomNum($length){
	   $i = "";
	   $key     = "";
	   for($i=0;$i<$length;$i++){	
	   $random_digit = mt_rand(0, 9);
		 $key .= $random_digit;		 
	   }
	   return $key;
     }
	
	/**
	* Display FCKEditor	
	* @param string $elementName	
	* @param string $elementValue	
	* @param string $fckPath	
	* @param string $toolbarSet	
	* @param string $fckHeight	
	* @param string $fckWidth		
	* @return fckeditor
	*/
	function fckEditor($elementName, $elementValue, $fckPath="", $toolbarSet="Default", $fckHeight="600", $fckWidth="100%"){
		
		$oFCKeditor = new FCKeditor($elementName) ;
		$oFCKeditor->BasePath = $fckPath."fckeditor/" ;
		$oFCKeditor->ToolbarSet = $toolbarSet; 
		$oFCKeditor->Value = html_entity_decode($elementValue); 
	    $oFCKeditor->Height = $fckHeight; 
		$oFCKeditor->Width = $fckWidth;
		return $oFCKeditor->Create() ;
	}


/**
	* Rename the uploaded image	
	* @param string $imageName	
	* @param string $imageId	
	* @param string $extra		
	* @return new image name
	*/
	function renameImage($imageName, $imageId, $extra=""){
		$imgExt = substr($imageName, strrpos($imageName,"."));	
		return $imageId.$extra.$imgExt;
	}
	
	/**
	* Set Message
	* @param string $sessionName
	* @return string
	*/
	function setMessage($msg, $sessionName){
		$_SESSION[$sessionName] = $msg;		
	}
	
	
	// To find the extension of the given $filename
	function getExtension($fileName){
		
		$ext =explode(".",$fileName);
		$fileExt=$ext[sizeof($ext)-1];
		
		return $fileExt;
	}
	
	function tep_image($src, $alt = '', $width = '', $height = '', $resizeImageSize='', $parameters = '' ) 
		{  

// alt is added to the img tag even if it is null to prevent browsers from outputting
// the image filename as default
    $image = '<img src="' . $src . '" border="0" alt="' . $alt . '"';

    if (!empty($alt)) {
      $image .= ' title=" ' . $alt . ' "';
    }

    if ( ($resizeImageSize == 'true') && (empty($width) || empty($height)) ) {
      if ($image_size = @getimagesize($src)) {
        if (empty($width) && !empty($height)) {
          $ratio = $height / $image_size[1];
          $width = intval($image_size[0] * $ratio);
        } elseif (!empty($width) && empty($height)) {
          $ratio = $width / $image_size[0];
          $height = intval($image_size[1] * $ratio);
        } elseif (empty($width) && empty($height)) {
          $width = $image_size[0];
          $height = $image_size[1];
        }
      } 
    }

    if (!empty($width) && !empty($height)) {
      $image .= ' width="' . $width . '" height="' . $height . '"';
    }

    if (!empty($parameters)) $image .= ' ' . $parameters;

    $image .= '>';

    return $image;
  } 
	
		
	public function ConfigValue($configname)
	{
		$sql = "SELECT * FROM `".TABLE_CONFIGURATION."` where `configname`='$configname' and status='1'";
		$result  =   $this->exec($sql);
		$row     =   $this->fetch_object($result);
		return $row->configvalue;
	 }
	 
	 public function ConfigList()
	{
		$sql = "SELECT * FROM `".TABLE_CONFIGURATION."` where status='1'";
		return $this->exec($sql);
	} 
	
	public function userLevelList()
	{   global $LevelRow;
		$sql = "SELECT * FROM `".TABLE_GROUP_TYPE."` where status='1'  and verify='1'";
		$result  =   $this->exec($sql);
		while($row   =   $this->fetch_object($result)){
		      $LevelRow[$row->code]  = $row->id;  }
	}
	 
	/************************************ Modules  users *****************************************/
	
	 
	 public function countryList()
	 {
		 $sql = "SELECT * FROM `".TABLE_COUNTRY."`  order by id desc";
		return  $this->exec($sql); 
		 
	 }
	 
	 public function CountrySel($id)
	{
		$sql = "SELECT * FROM `".TABLE_COUNTRY."` where `id`='$id'";
		if($this->select($sql,false))
		        {
						return $this->rs;
						unset($this->rs);
				}
		      else
				{
					return false;
				}
	 }
	    	 
	 public function checkPermissionRowSel($type,$ugid,$module_id)
	{   if($type=="user")
	   {
		$sql = "SELECT * FROM `".TABLE_PERMISSION."` where `module_id`='$module_id' and user_id='$ugid' and type='$type'";   
	   }else{
		$sql = "SELECT * FROM `".TABLE_PERMISSION."` where `module_id`='$module_id' and group_id='$ugid' and type='$type'";
	   }
		$result = $this->exec($sql);
		$num = $this->total_rows($result);
		if($num>0){ $row = $this->fetch_object($result);
		            return $row->id;
		  }else{
			return false;  
		  }
	 }
	 
	 
	 public function checkPermissionSelected($type,$group_id,$module_id)
	{
		$sql = "SELECT * FROM `".TABLE_PERMISSION."` where `module_id`='$module_id' and group_id='$group_id' and type='$type'";
		$result = $this->exec($sql);
		$num = $this->total_rows($result);
		if($num>0){ return $this->fetch_object($result);
		  }else{
			return false;  
		  }
	 }
	 
	 public function checkUserPermissionSelected($type,$user_id,$module_id)
	{
		$sql = "SELECT * FROM `".TABLE_PERMISSION."` where `module_id`='$module_id' and user_id='$user_id' and type='$type'";
		$result = $this->exec($sql);
		$num = $this->total_rows($result);
		if($num>0){ return $this->fetch_object($result);
		  }else{
			return false;  
		  }
	 }

    public function modulesList()
	 { $sql = "SELECT * FROM `".TABLE_MODULES."` where status='1' and parent_id='0'  order by ordering asc"; 
    	return  $this->exec($sql);		 
	 }
	 
	 public function modulesListPermisson($user_id,$group_id,$pid="0")
	 { 
	 $sql = "select distinct(tm.id),tm.* from ".TABLE_MODULES." tm,".TABLE_PERMISSION." tmp WHERE tm.status='1' and tm.parent_id='$pid' and tmp.user_id='$user_id' and tm.id=tmp.module_id and tmp.status='1' order by tm.ordering asc";
	  $result  =  $this->exec($sql);
	  $num   =  $this->total_rows($result);
	  if($num>0)
	  { 
		return $result;  
	  }
	  else if($num==0 and $group_id=="1")
	  {
	  $sql = "select distinct(tm.id),tm.* from ".TABLE_MODULES." tm WHERE tm.status='1' and tm.parent_id='$pid'  order by tm.ordering asc";
	   return $this->exec($sql); 
	  }		
	  else
	  {
	  $sql = "select distinct(tm.id),tm.* from ".TABLE_MODULES." tm,".TABLE_PERMISSION." tmp WHERE tm.status='1' and tm.parent_id='$pid' and tmp.group_id='$group_id' and tm.id=tmp.module_id and tmp.status='1' order by tm.ordering asc";
	   return $this->exec($sql); 
	  }			 
	 }
	 
	  public function moduleSelected($fieldVal)
	 {
		$sql = "SELECT * FROM `".TABLE_MODULES."` where `module_fol_name`='$fieldVal' and status='1' and parent_id='0'"; 
		if($this->select($sql,false))
		        {
						return $this->rs;
						unset($this->rs);
				}
		      else
				{
					return false;
				}
	 }
	 
	 public function moduleSelFromId($id)
	 {
		$sql = "SELECT * FROM `".TABLE_MODULES."` where `id`='$id'"; 
		if($this->select($sql,false))
		        {
						return $this->rs;
						unset($this->rs);
				}
		      else
				{
					return false;
				}
	 }
	 
	  public function modulesSelectedFromId($id)
	 { $sql = "SELECT * FROM `".TABLE_MODULES."` where parent_id='$id' and status='1'  order by ordering asc";
	   return  $this->exec($sql); 		 
	 }
	 
	 public function pagePermission($contentPage,$module="")
	 {  
	       // code here
		    $accesiblePage  =  array();
			$accesibleMod  =  array();
			$resultModules  =  $this->modulesListPermisson($_SESSION[ENCR_KEY.'pathsaleLoginId'],$_SESSION[ENCR_KEY.'level'],0); 
			while($rowModules   =  $this->fetch_object($resultModules))
			{    ////////////////////////////////////////
				 $accesiblePage[]   =  $rowModules->page;
				  $accesibleMod[$rowModules->module_fol_name][]   =  $rowModules->page;
				 ////////////////////////////////////////							
				
				$resultModulesSub  =  $this->modulesListPermisson($_SESSION[ENCR_KEY.'pathsaleLoginId'],$_SESSION[ENCR_KEY.'level'],$rowModules->id);
				  if($this->total_rows($resultModulesSub)>0){		  
					   while($rowsubMod   =  $this->fetch_object($resultModulesSub)){
						   ////////////////////////////////////////
						   $accesiblePage[]   =  $rowsubMod->page;
				 $accesibleMod[$rowsubMod->module_fol_name][]   =  $rowsubMod->page;
						   ////////////////////////////////////////					
							  }			   
						   }
			}	
			
			if(!empty($module))
				{
				  if(!in_array($contentPage,$accesibleMod[$module]))
						{  
						   return false;
						}
						
						else if(!in_array($contentPage,$accesiblePage))
						{  	return false;
						}
						else{
							return true;
						}
				}else{
					if(!in_array($contentPage,$accesiblePage))
						{  	return false;
						}
						else{
							return true;
						}					
				}
				    
				// code end here	 
	 }
	 
	 function deleteChildTableRow($parentTableId,$fieldName,$tableName,$filePaths="",$fileField="")
	{
		 if(!empty($filePaths))
	  {
		  $sql  =  "select * from `".$tableName."` where $fieldName='$parentTableId'";
		  $res  =  $this->exec($sql);
		  while($row  =  $this->fetch_object($res))
		  { if(file_exists($filePaths.$row->$fileField))
		       @unlink($filePaths.$row->$fileField);  
		  }
	  }
		
	   	 $sql = "DELETE  FROM `".$tableName."` where $fieldName='$parentTableId'";
	  $result =    $this->exec($sql);
	  return $result;
	}
	 
	 function folderDelete($pathfoldername)
	 {
						  if(file_exists($pathfoldername))
						{
							$mydir   =  $pathfoldername."/";
							$d   = dir($mydir);
							while($entry   = $d->read())
							{
								if($entry !="." && $entry!="..")
								{
								unlink($mydir.$entry);
								}
								
							}
							$d->close();
							rmdir($mydir);
							
						} 
	 }
	 
	 public function staticDescription($id)
	{
		$sql = "SELECT * FROM `".TABLE_STATIC."` where `id`='$id' ";
		$result  =   $this->exec($sql);
		$row     =   $this->fetch_object($result);
		return $row->pagedescription;
	 }
	 
	  public function comments_list_all($table_field_id,$tablename)
	 {
	 $sql = "SELECT * FROM `".TABLE_COMMENT."` where table_field_id='$table_field_id' and tablename='$tablename'  order by id asc";
		return  $this->exec($sql); 
		 
	 }
	 
	  function rateVote($row_id,$tablename)
	{
		$sql  =  "select * from ".TABLE_RATE_ANYTHING." where row_id='$row_id' and tablename='$tablename'";
     $result  =    $this->exec($sql);
	 $num   =  $this->total_rows($result);
	 if($num>0)
	 {
	    while($row  =  $this->fetch_array($result))
		 {
			$votes[]  =  $row['rate_value']; 
		 }
          $votes_sum  = array_sum($votes);
		  $count  =  count($votes);
		  $percentage_vote = ($votes_sum/$count)*100;
		  return number_format($percentage_vote,2); 
			  
	 }
	 else
	 {
		return 5; 
	 }
	}
	
	
	function getTotalRows($tablename,$status="1",$anything="")
	{
	 $sql  =  "select * from {$tablename} where status='$status' $anything ";
     $result  =    $this->exec($sql);
	 $num =  $this->total_rows($result);
	 return ($num>0) ? $num : "0";
	}
	
	function getTotalRowsWithOutStatus($tablename,$anything="")
	{
	 $sql  =  "select * from {$tablename} where 1=1 {$anything} ";
     $result  =    $this->exec($sql);
	 $num =  $this->total_rows($result);
	 return ($num>0) ? $num : "0";
	}
	
	
	function zone_district($parent_id="0")
	{
     $sql   =  "select * from `".TABLE_ZONE_DISTRICT."` where parent_id='$parent_id' order by id asc";
	   return  $this->exec($sql);
	 } 
	 
	 function zone_district_par()
	{
    $sql   =  "select * from `".TABLE_ZONE_DISTRICT."` where parent_id!='0' order by id asc";
	   return  $this->exec($sql);
	 } 
	 
	 function zoneDistrictSel($rowVal)
	{ 
       $sql   =  "select * from `".TABLE_ZONE_DISTRICT."` where zone_district='$rowVal'";
	   $result  =  $this->exec($sql);
	   $vals   =  $this->fetch_object($result);
	   return $vals;
	} 
	
	function getResult($tablename,$cond="",$orderbyfield="id",$orderby="asc",$limitStart="",$limitEnd="")
	{  $Condition  = "";
       $order_by   = ""; 
	   $Limit_query     = ""; 
	   if(!empty($cond))
	    {
		   $Condition .= " WHERE {$cond} ";
		}
		if(!empty($orderbyfield) and !empty($orderby))
	    {
		   $order_by .= " ORDER BY {$orderbyfield} {$orderby} ";
		}
		if(!empty($limitStart) and !empty($limitEnd))
	    {
		   $Limit_query .= " LIMIT {$limitStart}, {$limitEnd} ";
		}
		$sql     =  "SELECT * FROM ".$tablename." {$Condition} {$order_by}  {$Limit_query}";
		return $this->exec($sql);
	}
		
	function dropdownList($label,$name,$id,$key,$value,$result,$selectedVal="",$parameters="")
	{   $dropDown = "";
		$dropDown  .='<select name="'.$name.'" id="'.$id.'" '.$parameters.' >
		<option value="">'.$label.'</option>';
		$num  =  $this->total_rows($result);
		if($num>0){
				while($row =  $this->fetch_object($result))
					{  $selected   =  ($row->$value==$selectedVal)? "selected":"";
		$dropDown  .='<option value="'.$row->$value.'"  '.$selected.'  >'.$row->$key.'</option>';		
				   }
		}
    	 $dropDown .='</select>';
		 return $dropDown;
	}	
	
 function dropDownArr($dropdownArray,$name,$id,$selectedVal="",$parameters=""){ $dropDown = "";
      if(count($dropdownArray)>0){
		$dropDown  .='<select name="'.$name.'" id="'.$id.'" '.$parameters.' >';
		foreach($dropdownArray as $key=>$val){
	{  $selected   =  ($val==$selectedVal)? "selected":"";
		$dropDown  .='<option value="'.$key.'"  '.$selected.'  >'.$val.'</option>';		
				   }
		}
    	 $dropDown .='</select>';
	  }
		 return $dropDown;
		
	}
	
	function dropDownRecordLimit()
	{ //class="styled"  ?>   
<select name="recordPerPage" id="recordPerPage" class="styled_by_me span1"  onchange="onlySubmitForm();">
  <option value="1" <?php echo ($_SESSION['recordPerPage']==1)?"selected='selected'":""; ?>>1</option>
  <option value="2" <?php echo ($_SESSION['recordPerPage']==2)?"selected='selected'":""; ?>>2</option>
  <option value="5" <?php echo ($_SESSION['recordPerPage']==5)?"selected='selected'":""; ?>>5</option>
  <option value="10" <?php echo ($_SESSION['recordPerPage']==10)?"selected='selected'":""; ?>>10</option>
  <option value="15" <?php echo ($_SESSION['recordPerPage']==15)?"selected='selected'":""; ?>>15</option>
  <option value="20" <?php echo ($_SESSION['recordPerPage']==20)?"selected='selected'":""; ?>>20</option>
  <option value="50" <?php echo ($_SESSION['recordPerPage']==50)?"selected='selected'":""; ?>>50</option>
  <option value="100" <?php echo ($_SESSION['recordPerPage']==100)?"selected='selected'":""; ?>>100</option>
</select>
<?php
	}	
} // end class
include(FCPATH_ADMIN."includes/helpers.php");	
?> 