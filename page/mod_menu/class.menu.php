<?php
class Menu extends Functions{
	 
	function __construct()
	{   parent::__construct();
		$this->table = 'tbl_menu';
	}
		 	
	function menuTypeList()
	{   return $this->get('tbl_menu_setting','',array('status'=>1));		 
	}
	
	function menuList()
	{   
	 return $this->get('tbl_menu','',array('status'=>1),array('id'=>'desc'));		 
	}
	
	
	function find_by_id($id)
	{
		 $query  =  "SELECT * from tbl_menu WHERE id='$id'";
		 $result = $this->execute($query);
		 return $this->result($result);
	}
	
	function find_name_by_id($parent_id)
	{
		 $query  =  "SELECT name from tbl_menu WHERE id='$parent_id'";
		 $result = $this->execute($query);
		 $row  = $this->result($result);
		 return $row->name;
	}
	
	function find_category_name($id)
	{
		 $query  =  "SELECT category_name from tbl_category WHERE id='$id'";
		 $result = $this->execute($query);
		 $row  = $this->result($result);
		 return $row->category_name;
	}
	
	function menuSettingById($id)
	{
		 $query  =  "SELECT * from tbl_menu_setting WHERE id='$id'";
		 $result = $this->execute($query);
		 return $this->result($result);
	}
	
	function menuSettingByPos($pos)
	{
		 $query  =  "SELECT * FROM tbl_menu_setting WHERE position in ($pos)";
		 $result = $this->execute($query);
		 return $this->result($result);
	}
	
	function menuListByType($menu_type,$parent_id=0,$limit=100)
	{   $sql =  "SELECT * from tbl_menu WHERE menu_type='$menu_type' and parent_id='$parent_id' and status='1' ORDER BY sort_order ASC LIMIT 0,$limit";
		 return $this->execute($sql);
	}
	
	function staticPageList()
	{  return $this->get('tbl_static_link','',array('status'=>1),array('id'=>'desc'));		 
	}
	
	
	function getMenuListInDropDown($menu_type_id='',$current='')
		{
			 $result  =  $this->menuListByType($menu_type_id,'0');	
	         $num  =  $this->num_rows($result);?>
	        <select name="parent_id" id="parent_id">
	        <option value="">Self</option>
				 <?php 
				 if($num>0){
					 while($row = $this->result($result)){?>
						<option value="<?php echo $row->id; ?>" style="background:#333;color:#FFF;" <?php echo ($current==$row->id)?"selected":""; ?> ><?php echo $row->name; ?></option> 
						<?Php
						// now start the 2nd level menu
						   $parent_id  =  $row->id;
						   $result2  =  $this->menuListByType($menu_type_id,$parent_id);	
						   $num2  =  $this->num_rows($result2);			   
							if($num2>0){
							while($row2 = $this->result($result2)){?>
							 <option value="<?php echo $row2->id; ?>" style="background:#F60;color:#FFF;" <?php echo ($current==$row2->id)?"selected":""; ?> >-<?php echo $row2->name; ?></option> 
							 
						   <?php 
							   // now start the 3nd level menu
							   $parent_id2  =  $row2->id;
							   $result3  =  $this->menuListByType($menu_type_id,$parent_id2);	
							   $num3  =  $this->num_rows($result3);			   
							   if($num3>0){
								while($row3 = $this->result($result3)){?>
								<option value="<?php echo $row3->id; ?>" style="background:#3CF;color:#FFF;" <?php echo ($current==$row3->id)?"selected":""; ?>> --<?php echo $row3->name; ?></option> 
								  <?php }//3 top while
									}//3 top if num2
								  ?>			 
							 <?php }//2 top while
							   }//2 top if num2
							   ?>
						   <?php				   
					  }//top while
				 }//top if num
				 ?>
	         </select>
		<?php }
		
		
		
		function getPagesList($id='',$current='')
		{    
			 if(!empty($id)){
				 $result  =  Article::articleListByCat($id);	
				 $num  =  $this->num_rows($result); ?>
				 <select name="pages" id="pages" class="required" onchange="generate_link(this.value);">
				 <option value="">Choose</option>
				 <?php 
				 if($num>0){
					 while($row = $this->result($result)){?>
						<option value="<?php echo $row->slug; ?>" <?php echo ($current==$row->slug)?"selected":""; ?> ><?php echo $row->article_title; ?></option> 
					 <?php }
				 }
				 ?>
				 </select>
				 <?php }else{
					$staticPageList        =  $this->staticPageList();					 ?>
				 <select name="pages" id="pages" class="required" onchange="generate_link(this.value);">
				 <option value="choose">Choose</option>
				 <?php if($staticPageList['num_rows']>0){ 
					while($rowGr =  $this->result($staticPageList['result'])){				
				?>
				<option value="<?php echo @$rowGr->url_link;?>" <?php echo ($current==$rowGr->url_link)?"selected":""; ?> <?php echo @($row->pages==$rowGr->id)?"selected":"";?>  ><?php echo @$rowGr->menu_name;?></option>
				<?php }} ?>
				 </select>
				 <?php }
	    }//function close
}//class close