<?php
class Menu extends Functions{
	
	function dataList()
	{   $sql =  "SELECT m.*,ms.menu_type_name FROM 
	             tbl_menu m INNER JOIN
				 tbl_menu_setting ms ON m.menu_type=ms.id
				 ORDER BY m.id ASC";
		 return $this->execute($sql);		 
	}
	function menuTypeList()
	{   
		return $this->get(TABLE_MENU_SETTING,'',array('status'=>1));		 
	}
	
	function menuList()
	{   
		$this->table	=	"tbl_menu";
		$this->cond		=	array('status'=>1);
		$this->order_by	=	array('id'=>'asc');
	 	return $this->get();		 
	}
	
	
	function find_by_id($id)
	{
		 $query  =  "SELECT * from `".TABLE_MENU."` WHERE id='$id'";
		 $result = $this->execute($query);
		 return $this->result($result);
	}
	
	function find_name_by_id($parent_id)
	{
		 $query  =  "SELECT name from `".TABLE_MENU."` WHERE id='$parent_id'";
		 $result = $this->execute($query);
		 $row  = $this->result($result);
		 return $row->name;
	}
	
	function find_category_name($id)
	{	 $query  =  "SELECT category_name from `".TABLE_POST_CATEGORY."` WHERE id='$id'";
		 $result = $this->execute($query);
		 $row  = $this->result($result);
		 return $row->category_name;
	}
	
	function pages_category($id)
	{
		 $query  =  "SELECT slug from `".TABLE_POST_CATEGORY."` WHERE id='$id'";
		 $result = $this->execute($query);
		 $row  = $this->result($result);
		 return @$row->slug;
	}
	
	function menuListByType($menu_type,$parent_id=0)
	{    $sql =  "SELECT * from `".TABLE_MENU."` WHERE menu_type='$menu_type' and parent_id='$parent_id'";
		 return $this->execute($sql);		 
	}
	
	function staticPageList()
	{  
		$this->table	=	TABLE_STATIC_LINK;
		$this->cond		=	array('status'=>1);
		$this->order_by	=	array('id'=>'asc');
		return $this->get();		 
	}
	
	
	function getMenuListInDropDown($menu_type_id='',$current='')
		{
			$result  =  $this->menuListByType($menu_type_id,'0');	
	         $num  =  $this->num_rows($result);?>
	        <select name="parent_id" id="parent_id" class="form-control">
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
		{     $funContentsObj  = new Contents();
		      $funItemsObj  = new Items();
		      if($id==1000){
				 $result  =  Rooms::dataListActive();	
				 $num  =  $this->num_rows($result); ?>
				 <select name="pages" id="pages" class="form-control required" onchange="generate_link(this.value);">
				 <option value="">Choose</option>
				 <?php 
				 if($num>0){
					 while($row = $this->result($result)){?>
						<option value="<?php echo $row->slug; ?>" <?php echo ($current==$row->slug)?"selected":""; ?> ><?php echo $row->article_title; ?></option> 
					 <?php }
				 }?>
				 </select>
			 <?php } else if($id=='-1'){
				     $level=2;
			         $result  =  $funContentsObj->menuListByType('0');	
	                 $num  =  $this->num_rows($result);?>
	                 <select name="pages" id="pages" class="form-control required" onchange="generate_link(this.value);">
				 <option value="">Choose</option>
				 <?php 
				 if($num>0 and $level>0){
					 while($row = $this->result($result)){?>
						<option value="<?php echo $row->slug; ?>" <?php echo ($current==$row->slug)?"selected":""; ?> ><?php echo $row->article_title; ?></option> 
						<?Php
						// now start the 2nd level menu
						   $parent_id  =  $row->id;
						   $result2  =  $funContentsObj->menuListByType($parent_id);	
						   $num2  =  $this->num_rows($result2);			   
							if($num2>0 and $level>1){
							while($row2 = $this->result($result2)){?>
							 <option value="<?php echo $row2->slug; ?>" <?php echo ($current==$row2->slug)?"selected":""; ?>>-<?php echo $row2->article_title; ?></option> 
							 
						   <?php 
							   // now start the 3nd level menu
							   $parent_id2  =  $row2->id;
							   $result3  =  $funContentsObj->menuListByType($parent_id2);	
							   $num3  =  $this->num_rows($result3);			   
							   if($num3>0 and $level>2){
								while($row3 = $this->result($result3)){?>
								<option value="<?php echo $row3->slug; ?>" <?php echo ($current==$row3->slug)?"selected":""; ?> > --<?php echo $row3->article_title; ?></option> 
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
				 else if($id=='-10'){
				     $level=2;
			         $result  =  $funItemsObj->menuListByType('0');	
	                 $num  =  $this->num_rows($result);?>
	                 <select name="pages" id="pages" class="form-control required" onchange="generate_link(this.value);">
				 <option value="">Choose</option>
				 <?php 
				 if($num>0 and $level>0){
					 while($row = $this->result($result)){?>
						<option value="cat/<?php echo $row->slug; ?>" <?php echo ($current==$row->slug)?"selected":""; ?> ><?php echo $row->category_name; ?></option> 
						<?Php
						// now start the 2nd level menu
						   $parent_id  =  $row->id;
						   $result2  =  $funItemsObj->menuListByTypeByCat('category',$parent_id);	
						   $num2  =  $this->num_rows($result2);			   
							if($num2>0 and $level>1){
							while($row2 = $this->result($result2)){?>
							 <option value="<?php echo $row2->slug; ?>" <?php echo ($current==$row2->slug)?"selected":""; ?>>-<?php echo $row2->article_title; ?></option> 
							 
						   <?php 
							   // now start the 3nd level menu
							   $parent_id2  =  $row2->id;
							   $result3  =  $funItemsObj->menuListByTypeByCat('parent_id',$parent_id2);	
							   $num3  =  $this->num_rows($result3);			   
							   if($num3>0 and $level>2){
								while($row3 = $this->result($result3)){?>
								<option value="<?php echo $row3->slug; ?>" <?php echo ($current==$row3->slug)?"selected":""; ?> > --<?php echo $row3->article_title; ?></option> 
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
				 else if(!empty($id)){
				 $result  =  $funContentsObj->categoryDetails($id);				 	
				 $num  =  $this->num_rows($result); ?>
				 <select name="pages" id="pages" class="form-control required" onchange="generate_link(this.value);">
				 <option value="">Choose</option>
				 <?php 
				 if($num>0){
					 while($row = $this->result($result)){?>
						<option value="cat/<?php echo $row->slug; ?>" <?php echo ($current==$row->slug)?"selected":""; ?> ><?php echo $row->category_name; ?>(Category)</option> 
						  <?php $res  =  $funContentsObj->articleListByCat($id);
						        $res_num  =  $this->num_rows($res);
								if($res_num>0){
								   while($row_res  =  $this->result($res)){
									   ?>
									 <option value="<?php echo $row_res->slug; ?>" <?php echo ($current==$row_res->slug)?"selected":""; ?> ><?php echo $row_res->article_title; ?></option>  
									 <?php  
								   }
								}
						   ?>
						
						
					 <?php }
				 }
				 ?>
				 </select>
				 <?php }else{ 
					$staticPageList        =  $this->staticPageList(); ?>
				 <select name="pages" id="pages" class="form-control required" onchange="generate_link(this.value);">
				 <option value="choose">Choose</option>
				 <?php if($staticPageList['num_rows']>0){ 
					while($rowGr =  $this->result($staticPageList['result'])){				
				?>
				<option value="<?php echo @$rowGr->url_link;?>" <?php echo ($current==$rowGr->url_link)?"selected":""; ?> <?php echo @($row->pages==$rowGr->id)?"selected":"";?>  ><?php echo @$rowGr->menu_name;?></option>
				<?php }} ?>
				 </select>
				 <?php }
	    }//function close
		
		function table_fields($table=TABLE_MENU)
	 {
		 $sql = "SHOW COLUMNS FROM  `".$table."`"; 
		 return $this->exec($sql);
	 }
	
}//class close
?>