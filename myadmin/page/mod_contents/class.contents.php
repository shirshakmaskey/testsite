<?php
class Contents extends Functions{
		
	function dataList()
	{   $sql =  "SELECT p.* FROM `".TABLE_CONTENTS."` p where post_type='page' ORDER BY p.post_type ASC";
		 return $this->execute($sql);		 		 
	}
	
	function find_detail_by_id($id)
	{   $sql = "SELECT pct.category_id,tpc.category_name,tpc.slug as tpc_slug 
	            FROM `".TABLE_POST_CATEGORY_TAXONOMY."` as pct
		        JOIN `".TABLE_POST_CATEGORY."` tpc on tpc.id=pct.category_id
			    WHERE  
				pct.post_id='$id'";
		return  $this->execute($sql); 				
	}
	
	function find_category_detail_by_id($id)
	{   $sql = "SELECT tpc.category_name,tpc.slug as tpc_slug FROM `".TABLE_POST_CATEGORY_TAXONOMY."` as pct
		        JOIN `".TABLE_POST_CATEGORY."` tpc on tpc.id=pct.category_id
			    WHERE  pct.post_id='$id'";
	    $result  =  $this->exec($sql); 
		$cat_array  =  array();
		if($this->num_rows($result)>0){
		    while($row  = $this->result($result))
			{
				$cat_array[]  =  $row->category_name;
			}
		}
		if(count($cat_array)>0){ return implode(",",$cat_array); }else{ return '';}		
	}
	
	function find_by_id($id)
	{
		 $query  =  "SELECT * from `".TABLE_CONTENTS."` WHERE id='$id'";
		 $result = $this->execute($query);
		 return $this->result($result);
	}
	
	function find_item_by_id($id)
	{
		 $query  =  "SELECT * from `".TABLE_ITEM_DOWNLOAD."` WHERE id='$id'";
		 $result = $this->execute($query);
		 return $this->result($result);
	}
	
	
	
	function file_items($content_id,$type='image')
	{
		 $query  =  "SELECT * from `".TABLE_ITEM_DOWNLOAD."` WHERE content_id='$content_id' and type='$type'";
		 return $this->execute($query);
	}
	
	function categoryDetails($cid)
	{
		$sql = "SELECT * FROM ".TABLE_POST_CATEGORY." WHERE id='$cid'";
		return $this->execute($sql);
	}
	
	public function articleListByCat($category_id,$type='post')
	 {
	     $sql = "SELECT p.* FROM `".TABLE_POST_CATEGORY_TAXONOMY."` as pct
		        JOIN `".TABLE_POST_CATEGORY."` tpc on tpc.id=pct.category_id
		        JOIN `".TABLE_CONTENTS."` p on p.id=pct.post_id
			    where  pct.category_id='$category_id' and pct.types='$type' and tpc.type='$type' and p.status='1'
				and tpc.status='1'
				order by p.id asc";	
				return  $this->execute($sql); 		 

	 }
	
	
	function menuListByType($parent_id=0)
	{    $sql =  "SELECT * FROM `".TABLE_CONTENTS."` WHERE post_parent='$parent_id' AND post_type='page'";
		 return $this->execute($sql);		 
	}
	
	function getCatListInDropDown($current='',$element_name="post_parent")
		{   $level=2;
			$result  =  $this->menuListByType('0');	
	         $num  =  $this->num_rows($result);?>
	        <select name="<?=$element_name?>" id="<?=$element_name?>" class="form-control required">
	        <option value="0">Self</option>
				 <?php 
				 if($num>0 and $level>0){
					 while($row = $this->result($result)){?>
						<option value="<?php echo $row->id; ?>" style="background:#333;color:#FFF;" <?php echo ($current==$row->id)?"selected":""; ?> ><?php echo $row->article_title; ?></option> 
						<?Php
						// now start the 2nd level menu
						   $parent_id  =  $row->id;
						   $result2  =  $this->menuListByType($parent_id);	
						   $num2  =  $this->num_rows($result2);			   
							if($num2>0 and $level>1){
							while($row2 = $this->result($result2)){?>
							 <option value="<?php echo $row2->id; ?>" style="background:#F60;color:#FFF;" <?php echo ($current==$row2->id)?"selected":""; ?> >-<?php echo $row2->article_title; ?></option> 
							 
						   <?php 
							   // now start the 3nd level menu
							   $parent_id2  =  $row2->id;
							   $result3  =  $this->menuListByType($parent_id2);	
							   $num3  =  $this->num_rows($result3);			   
							   if($num3>0 and $level>2){
								while($row3 = $this->result($result3)){?>
								<option value="<?php echo $row3->id; ?>" style="background:#3CF;color:#FFF;" <?php echo ($current==$row3->id)?"selected":""; ?>> --<?php echo $row3->article_title; ?></option> 
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
		
		
		
}
?>