<?php
class Courses extends Functions
{      
     function __construct()
    {	parent::__construct();
    	$this->table = constant('TABLE_TRAINING_COURSES');
      $this->tbl_organisation = constant('TABLE_ORGANISATION');
	}
	function save($frm='',$id=0)
	{   if($this->data=='' or count($this->data)==0)
		  $this->data  = $frm;
      if(empty($id)){                
            $this->insert(); 
            $id=   $this->insert_id(false);
      }else{
      	if($this->cond=='' or count($this->cond)==0)
      	   $this->cond =  array('id'=>$id);
      	   $this->update(); 
      }   
      return $id;
	}
  function dataList($org_id,$status='')
  {   
   $addQuery  =  "";
   if($status!=''){
        $addQuery  .= " AND tc.status='$status'";
   }
    $sql =  "SELECT tc.*,o.slug as oslug,o.user_id,o.company_name,o.office_logo,o.office_country,o.office_city,o.office_street,o.office_number,o.office_email,o.status as ostatus from `".$this->table."` tc inner join `".$this->tbl_organisation."` o on tc.org_id=o.id WHERE tc.org_id='$org_id' {$addQuery} ORDER BY tc.id ASC";
     return $this->execute($sql);
  }
  function find_by_id($id)
  {  $query  =  "SELECT tc.*,o.slug as oslug,o.user_id,o.company_name,o.office_logo,o.office_country,o.office_city,o.office_street,o.office_number,o.office_email,o.status as ostatus  from `".$this->table."` tc inner join `".$this->tbl_organisation."` o on tc.org_id=o.id WHERE tc.id='$id'";
     $result = $this->execute($query);
     return $this->result($result);
  }
  function table_fields($table=TABLE_TRAINING_COURSES)
   {
     $sql = "SHOW COLUMNS FROM  `".$table."`";  
     return $this->exec($sql);
   }
  function unique_course($org_id=0)
  {  
     $addQuery  =  "";
     if(!empty($org_id)){
        $addQuery  .= " AND org_id='$org_id'";
     }
    $sql =  "SELECT DISTINCT course_name FROM `".$this->table."`  WHERE  status='1'  {$addQuery} ORDER BY course_name ASC";
     return $this->execute($sql);
  }
}            