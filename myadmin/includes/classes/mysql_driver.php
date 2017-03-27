<?php
include_once("class.paging.php");
class Database 
{
public $con;
public $rs;
public $rsa;
public $data;
public $cond;
public $query;
public $result;
public $conn_id		   = FALSE;
public $autoinit	   = TRUE; // Whether to automatically initialize the DB
public $delete_hack    = TRUE;  
public $table; 

var $condtion;
var $dist;
var $order_by;
var $lim;
var $fields = array();
var $flds;


/*
 * @the vars array
 * @access private
 */
 private $vars = array();

 /**
 *
 * @set undefined vars
 *
 * @param string $index
 *
 * @param mixed $value
 *
 * @return void
 *
 */
 public function __set($index, $value)
 {  
	$this->vars[$index] = $value;
	
 }

 /**
 *
 * @get variables
 *
 * @param mixed $index
 *
 * @return mixed
 *
 */
 public function __get($index)
 { if (array_key_exists($index, $this->vars)) {
            return $this->vars[$index];
        }
 }

	public function connect_db() 
	{
		$this->con = mysql_connect(constant("HOST"),constant("USER"),constant("PASS")) or  die("Failed Connecting To Mysql<br>".mysql_error());
		mysql_select_db(constant("DBNAME")) or die("Failed Connecting To Database<br>".mysql_error());
		return $this->con;
	}
	
	
	public function disconnect_db()
	{
		@mysql_close($this->con);
	}
	
	public function exec( $sql = "" )
	{   if(empty($sql)) { die("Query is Empty"); }
	    $this->query  =  $sql;
		$this->query  = $this->prepare_query($this->query);
		$this->result = mysql_query( $this->query ) or die("error_occur here at exec"
										 ."<li>errorno=".mysql_errno()
										 ."<li>error=".mysql_error()
										 ."<li>query=".$this->query
										 );
		
		if($this->result){
			return $this->result;
		}
		return NULL;	
	}
	
	public function execute( $sql = "" )
	{   if(empty($sql)) { die("Query is Empty"); }
	    $this->query  =  $sql;
		$this->query  = $this->prepare_query($this->query);
		$this->result = mysql_query( $this->query ) or die("error_occur here at exec"
										 ."<li>errorno=".mysql_errno()
										 ."<li>error=".mysql_error()
										 ."<li>query=".$this->query
										 );
		
		if($this->result){
			return $this->result;
		}
		return NULL;	
	}	
		
	
	function last_query()
	{
	  return $this->query;	
	}
	
	
	function initialize()
	{
		// If an existing connection resource is available
		// there is no need to connect and select the database
		if (is_resource($this->conn_id) or is_object($this->conn_id))
		{
			return TRUE;
		}	
		
		$this->conn_id = $this->connect_db();

		// No connection resource?  Throw an error
		if ( ! $this->conn_id)
		{
			die('error :: Unable to connect to the database');			
			return FALSE;
		}
				
		return TRUE;
	}
		
	function prepare_query($sql)
	{
		// "DELETE FROM TABLE" returns 0 affected rows This hack modifies
		// the query so that it returns the number of affected rows
		if ($this->delete_hack === TRUE)
		{
			if (preg_match('/^\s*DELETE\s+FROM\s+(\S+)\s*$/i', $sql))
			{
				$sql = preg_replace("/^\s*DELETE\s+FROM\s+(\S+)\s*$/", "DELETE FROM \\1 WHERE 1=1", $sql);
			}
		}

		return $sql;
	}
	
	
	function insert($table="",$data="")
	{   $arr=array();
	    if(!empty($table)){ $this->table  = $table; }
	    if(!empty($data) and is_array($data)){
		$this->data  =   $data;	}
	   	$this->query  =   "INSERT INTO `".$this->table."` SET ";
		foreach($this->data as $key=>$val)
		{
		   $arr[$key]  =  "`$key`='$val'";	
		}
		if(count($arr)>0){
		$this->query  .=  implode(" , ", $arr);	
		}else{
		  echo "Wrong Query";
		  exit; 	
		}
		$this->result  = $this->execute($this->query);
		$this->table = FALSE;
		$this->data  = FALSE;
		if($this->result) return $this->result;
	}
	
	function update($table="",$data="",$cond="")
	{   $arr=array();$ar=array();
	    if(!empty($table)){ $this->table  = $table; }
	    if(!empty($data) and is_array($data)){$this->data  =   $data;	}
		if(!empty($cond) and is_array($cond)){$this->cond  =   $cond;	}
	   	$this->query  =   "UPDATE `".$this->table."` SET ";
		foreach($this->data as $key=>$val)
		{
		   $arr[$key]  =  "`$key`='$val'";	
		}
		if(count($arr)>0){
		$this->query  .=  implode(" , ", $arr);	
		}else{
		  echo "Wrong Query";
		  exit; 	
		}
		$this->query  .= " WHERE ";
		foreach($this->cond as $k=>$v)
		{  $expKey   =  explode(" ",$k);
		   if(count($expKey)==2){ 
		   $ar[$expKey[0]]  =  "`".$expKey[0]."`".$expKey[1]."'$v'";	
		   }else{
		   $ar[$k]  =  "`$k`='$v'";	 	   
		   }
		}
		if(count($ar)>0){
		$this->query  .=  implode(" AND ", $ar);	
		}else{
		  echo "Wrong Query";
		  exit; 	
		}		
		$this->result  = $this->execute($this->query);
		$this->table = FALSE;
		$this->data  = FALSE;
		$this->cond  = FALSE;
		if($this->result) return $this->result;
	}
	
	function delete($table="",$cond="")
	{   $ar=array();
	    if(!empty($table)){ $this->table  = $table; }
		if(!empty($cond) and is_array($cond)){$this->cond  =   $cond;	}
		if(empty($this->table) and empty($table)){
			  die("No table name found in function name :delete");
		    }
	   	$this->query   =   "DELETE FROM `".$this->table."` ";
			$this->query  .= " WHERE ";
		if(count($this->cond)>0 and is_array($this->cond)){
			foreach($this->cond as $k=>$v)
			{  $expKey   =  explode(" ",$k);
			   if(count($expKey)==2){ 
			   $ar[$expKey[0]]  =  "`".$expKey[0]."`".$expKey[1]."'$v'";	
			   }else{
			   $ar[$k]  =  "`$k`='$v'";	 	   
			   }
			}
			if(count($ar)>0){
			$this->query  .=  implode(" AND ", $ar);	
			}else{
			  echo "Wrong Query";
			  exit; 	
			}
		}else{
			$this->cond  =  $cond;
			$this->query  .= $this->cond;
		}		
		$this->result  = $this->execute($this->query);
		$this->table = FALSE;
		$this->cond  = FALSE;
		if($this->result) return $this->result;
	}	
	
	
	function begin()
	{
	@mysql_query(" BEGIN ");	
	}
	function commit()
	{
	 return @mysql_query(" COMMIT ");	
	}
	function rollback()
	{
		@mysql_query("ROLLBACK");	
    }
	
	function free_result( $result )
	{	return mysql_free_result( $result );
	}
	
   //fetch data from array method
   public function fetch_array($rs="",$debug=false)
   {   if($debug){ die($this->query); }  
       if(empty($rs)){ $rs = $this->result; }    
	    return mysql_fetch_array($rs);   
   }
   //fetch data from associative array method
   public function fetch_assoc($rs="",$debug=false)
   {   if($debug){ die($this->query); }  
       if(empty($rs)){ $rs = $this->result; }    
	    return mysql_fetch_assoc($rs);   
   }
    //fetch data from object method
   public function fetch_object($rs="",$debug=false)
   {   if($debug){ die($this->query); }  
       if(empty($rs)){ $rs = $this->result; }    
	    return mysql_fetch_object($rs);   
   }
   
   //fetch data from row method
   public function fetch_row($rs="",$debug=false)
   {   if($debug){ die($this->query); }  
       if(empty($rs)){ $rs = $this->result; }    
	    return mysql_fetch_row($rs);   
   }
   
   
   //fetch data from array method
   public function result_array($rs="",$debug=false)
   {   if($debug){ die($this->query); }  
       if(empty($rs)){ $rs = $this->result; }    
	    return mysql_fetch_array($rs);   
   }
   //fetch data from associative array method
   public function result_assoc($rs="",$debug=false)
   {   if($debug){ die($this->query); }  
       if(empty($rs)){ $rs = $this->result; }    
	    return mysql_fetch_assoc($rs);   
   }
    //fetch data from object method
   public function result_object($rs="",$debug=false)
   {   if($debug){ die($this->query); }  
       if(empty($rs)){ $rs = $this->result; }    
	    return mysql_fetch_object($rs);   
   }
   
   //fetch data from row method
   public function result_row($rs="",$debug=false)
   {   if($debug){ die($this->query); }  
       if(empty($rs)){ $rs = $this->result; }    
	    return mysql_fetch_row($rs);   
   }
   
   public function result($rs="",$debug=false)
   {   if($debug){ die($this->query); }  
       if(empty($rs)){ $rs = $this->result; }    
	    return $this->result_object($rs);
   }
   
   //count the total number of rows of current query   
   public function total_rows($rs="",$debug=false)
   {   if($debug){ die($this->query); }  
       if(empty($rs)){ $rs = $this->result; }    
	    return mysql_num_rows($rs);   
   }  
   
   public function num_rows($rs="",$debug=false)
   {   if($debug){ die($this->query); }  
       if(empty($rs)){ $rs = $this->result; }    
	    return mysql_num_rows($rs);   
   } 
   	
	public function rows_id($debug=false)
	{   if($debug){ die($this->query); } 
		return mysql_insert_id();
	}
	
	public function insert_id($debug=false)
	{   if($debug){ die($this->query); } 
		return mysql_insert_id();
	}
	
	public function error($rs="",$debug=false)
	{  if($debug){ die($this->query); }  
       if(empty($rs)){ $rs = $this->result; }
	   return mysql_error($rs);
	}
	
	public function select($sql, $debug=false){
	
		if($debug){
			die($sql);
		}
		else{
			$myresult=$this->exec($sql);
			if($this->num_rows($myresult)>0){
				$this->rs = $this->fetch_object($myresult);
				$this->free_result($myresult);
				return $this->rs;
			}
			else{
				return false;
			}
		}
	}
	
	public function selectArray($sql, $debug=false){
	
		if($debug){
			die($sql);
		}
		else{
			$myresult=$this->exec($sql);
			if($this->num_rows($myresult)>0){
				$this->rs = $this->fetch_assoc($myresult);
				$this->free_result($myresult);
				return $this->rs;
			}
			else{
				return false;
			}
		}
	}
	
	public function selectAll($sql, $debug=false){
	
		if($debug){
			die($sql);
		}
		else{
			$myresult=$this->exec($sql);
			if($this->num_rows($myresult)>0){
				$count = 0;
				while($ars = $this->fetch_assoc($myresult)) {
					foreach($ars as $key => $val) {
							$this->rsa[$count][$key] = $val; 
					}				
					$count++;									
				}
				$this->free_result($myresult);
				return $this->rsa;				
			}
			else{
				return false;
			}
		}
	}
	
	public function listings($sql, $path, $plimit=10000, $seo=0, $debug=false) { 
	
		if($debug){
			die($sql);
		}
		else{
			$pagelist=$sql;
			$pageid =1;	// Get the pid value 	
			if(isset($_REQUEST['np'])) $pageid = $_REQUEST['np'];
			$Paging = new paging($seo);
			$Paging->conObj = $this->obj=new Database;
			$records = $Paging->myRecordCount($pagelist); // count records
			$totalpage = $Paging->processPaging($plimit,$pageid);
			$resultlist = $Paging->startPaging($pagelist); // get records in the databse
			$links = $Paging->pageLinks($path.(isset($queryString)?"?".$queryString:"")); // 1234 links 
			unset($Paging);
			
			$pagingValue = array($records,$resultlist,$links);
			return $pagingValue; 
		}
	}
	
	function escape_str($str, $like = FALSE)
	{
		if (is_array($str))
		{
			foreach ($str as $key => $val)
	   		{
				$str[$key] = $this->escape_str($val, $like);
	   		}

	   		return $str;
	   	}

		if (function_exists('mysql_real_escape_string'))
		{
			$str = mysql_real_escape_string($str);
		}
		elseif (function_exists('mysql_escape_string'))
		{
			$str = mysql_escape_string($str);
		}
		else
		{
			$str = addslashes($str);
		}

		// escape LIKE condition wildcards
		if ($like === TRUE)
		{
			$str = str_replace(array('%', '_'), array('\\%', '\\_'), $str);
		}

		return $str;
	} 
	
	function get($table="",$fields="",$cond="",$order_by="",$lim=0)
		{   
		    if(!empty($table))$this->table = $table;
		    if( empty($this->dist)){ $this->dist = ''; }
		    if( empty($this->lim) and empty($lim)){ $this->lim = ''; }
			if(!empty($lim) and empty($this->lim)){ $this->limit($lim);}
			
		    if(empty($this->table)){
			   $this->table =  $table;
		    }
			if(empty($this->table) and empty($table)){
			  die("No table name!!");
		    }

			if(count($this->fields)>0){
				
				 if(is_array($this->fields)){
					 $ar =  array();
					 foreach($this->fields as $k=>$v){
						 $ar[]  =  "`".$v."`";
					 }
					 if(count($ar)>0){  $this->flds  =  implode(" , ",$ar); }
					 else { echo "Wrong Query"; exit(); }
				}else{
					$this->flds  =  $this->fields;
				}
                    
			}else{
				if(is_array($fields)){
					 $ar =  array();
					 foreach($fields as $k=>$v){
						 $ar[]  =  "`".$v."`";
					 }
					 if(count($ar)>0){  $this->flds  =  implode(" , ",$ar); }
					 else { echo "Wrong Query"; exit(); }
				}else{
					$this->flds  =  $fields;
				}
				
			}

			if(count($this->cond)>0 and $this->cond!=FALSE){
				
				 if(is_array($this->cond)){
					 $arr =  array();
					 foreach($this->cond as $k=>$v){
						 $fieldExp  =  explode(" ",$k);
						 if(count($fieldExp)>1){ 
						     $arr[]  =  "`".$fieldExp[0]."`".$fieldExp[1]."'$v'"; 
							 }else{	 $arr[]  =  "`".$k."`='$v'"; }
					 }
					 if(count($arr)>0){  $this->condition  =  " WHERE ".implode(" AND ",$arr); }
					 else { echo "Wrong Query"; exit(); }
				}else{
					if(!empty($this->cond)){	
					$this->condition  =  " WHERE "; 
					$this->condition  .=  $this->cond;
					}
				}
                    
			}else{  
				if(is_array($cond)){ 
					 $arr =  array();
					 foreach($cond as $k=>$v){
						 $fieldExp  =  explode(" ",$k);
						 if(count($fieldExp)>1){ 
						     $arr[]  =  "`".$fieldExp[0]."`".$fieldExp[1]."'$v'"; 
							 }else{	 $arr[]  =  "`".$k."`='$v'"; }
					 }
					 if(count($arr)>0){  $this->condition  =  " WHERE ".implode(" AND ",$arr); }
					 else { echo "Wrong Query"; exit(); }
				}else{
					if(!empty($cond)){	
					$this->condition  =  " WHERE ";
					$this->condition  .=  $cond;
					 }
					
				}
				
			}
			
			
			if(count($this->order_by)>0){
				
				 if(is_array($this->order_by)){
					 $arr =  array();
					  if(count($this->order_by)==1){ 
					 foreach($this->order_by as $order_key=>$order_by){
					      $this->order_by  =  " ORDER BY ".$order_key." ".strtoupper($order_by); }
					 }
					 else { echo "Wrong query"; die("Wrong parameter passed in order by"); }
				}
                    
			}else{ 
				if(is_array($order_by) and !empty($order_by)){
					 $arr =  array();					 
					 if(count($order_by)==1){ 
					 foreach($order_by as $order_key=>$order_by){
					      $this->order_by  =  " ORDER BY ".$order_key." ".strtoupper($order_by); }
					 }
					 else { echo "Wrong query"; die("Wrong parameter passed in order by"); }
				}else{ 
					if(!empty($order_by)){  	 
					  $this->order_by  =  $order_by;
					 }else{
					  $this->order_by ='';	 
					 }
					
				}
				
			}					

			if($this->flds=='') $this->flds = "*";
			if($this->condition=='' or (count($this->condtion)==0)) $this->condition = "";
             
			$sql  =  "SELECT {$this->dist} $this->flds FROM `{$this->table}` {$this->condition} {$this->order_by} {$this->lim}";		$this->query =  $sql; 
		    $result  = $myresult =   $this->execute($this->query);
			$this->table      =  FALSE;
			$this->dist       =  FALSE;
			$this->flds       =  array();
			$this->cond      =  FALSE;
			$this->condition  =  array();
			$this->order_by   =  array();
			$this->lim        =  FALSE;
			$this->query      =  FALSE;
			$this->fields      =  FALSE;			
			return array('result'=>$myresult,"num_rows"=>$this->num_rows($myresult));
		}
		
		function row(){
		  if($this->result!='')
		  return $this->result_object();	
		}
		
		
		function distinct()
		{
		   $this->dist  =  " DISTINCT ";	
		}
		
		function limit($offset=10000,$start=0)
		{
		   $this->lim  =  " LIMIT {$start},{$offset} ";	
		}
}
?>