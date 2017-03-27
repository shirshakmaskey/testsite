<?php
class Items extends Functions{
		
	function dataList()
	{   $sql =  "SELECT a.*,cur.currency_title,cur.symbol ,tcu.category_name 
	            FROM `".TABLE_ITEMS."` a 
	            INNER JOIN `".TABLE_CURRENCY."` cur ON a.currency=cur.cur_id 
				INNER JOIN `".TABLE_CATEGORY_ITEMS."` tcu ON tcu.id=a.category				
				ORDER BY a.id ASC";
		 return $this->execute($sql);		 
	}
	
	public function categoryListDataTable()
	 {
		$sql = "SELECT tcu.*,tcu1.category_name as parent_name FROM `".TABLE_CATEGORY_ITEMS."` tcu left join `".TABLE_CATEGORY_ITEMS."` tcu1 on tcu.parent_id=tcu1.id  order by id asc";
		return  $this->exec($sql); 
		 
	 }
	
	function dataListActive()
	{   $sql =  "SELECT a.*,cur.currency_title,cur.symbol  FROM `".TABLE_ITEMS."` a INNER JOIN `".TABLE_CURRENCY."` cur ON a.currency=cur.cur_id AND a.status='1' ORDER BY a.id ASC";
		 return $this->execute($sql);		 
	}
	
	
	function find_by_id($id)
	{
		 $query  =  "SELECT * from `".TABLE_ITEMS."` WHERE id='$id'";
		 $result = $this->execute($query);
		 return $this->result($result);
	}
	
	function find_item_by_id($id)
	{
		 $query  =  "SELECT * from `".TABLE_ITEM_DOWNLOAD."` WHERE id='$id'";
		 $result = $this->execute($query);
		 return $this->result($result);
	}
	
	function currency()
	{
		 $query  =  "SELECT * from `".TABLE_CURRENCY."` WHERE status='1'";
		 return $this->execute($query);
	}
	
	function file_items($content_id,$type='image')
	{
		 $query  =  "SELECT * from `".TABLE_ITEM_DOWNLOAD."` WHERE food_item_id='$content_id' and type='$type'";
		 return $this->execute($query);
	}
	
	public function catSel($id)
	{
		$sql = "SELECT * FROM `".TABLE_CATEGORY_ITEMS."` where `id`='$id'";
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
	 
	function menuListByType($parent_id=0)
	{  $sql =  "SELECT * from `".TABLE_CATEGORY_ITEMS."` WHERE parent_id='$parent_id'";
	   return $this->execute($sql);		 
	}
	
	function menuListByTypeByCat($field=0,$value)
	{  $sql =  "SELECT * from `".TABLE_ITEMS."` WHERE $field='$value'";
	   return $this->execute($sql);		 
	}
	 
	 function getCatListInDropDown($current='',$element_name="parent_id")
     {   $level=2;
		 $result  =  $this->menuListByType('0');	
		 $num  =  $this->num_rows($result);?>
		<select name="<?=$element_name?>" id="<?=$element_name?>" class="form-control required">
		<option value="0">Self</option>
			 <?php 
			 if($num>0 and $level>0){
				 while($row = $this->result($result)){?>
					<option value="<?php echo $row->id; ?>" style="background:#333;color:#FFF;" <?php echo ($current==$row->id)?"selected":""; ?> ><?php echo $row->category_name; ?></option> 
					<?Php
					// now start the 2nd level menu
					   $parent_id  =  $row->id;
					   $result2  =  $this->menuListByType($parent_id);	
					   $num2  =  $this->num_rows($result2);			   
						if($num2>0 and $level>1){
						while($row2 = $this->result($result2)){?>
						 <option value="<?php echo $row2->id; ?>" style="background:#F60;color:#FFF;" <?php echo ($current==$row2->id)?"selected":""; ?> >-<?php echo $row2->category_name; ?></option> 
						 
					   <?php 
						   // now start the 3nd level menu
						   $parent_id2  =  $row2->id;
						   $result3  =  $this->menuListByType($parent_id2);	
						   $num3  =  $this->num_rows($result3);			   
						   if($num3>0 and $level>2){
							while($row3 = $this->result($result3)){?>
							<option value="<?php echo $row3->id; ?>" style="background:#3CF;color:#FFF;" <?php echo ($current==$row3->id)?"selected":""; ?>> --<?php echo $row3->category_name; ?></option> 
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
	
	function getCatListInDropDownItems($current='',$element_name="parent_id")
     {   $level=2;
		 $result  =  $this->menuListByType('0');	
		 $num  =  $this->num_rows($result);?>
		<select name="<?=$element_name?>" id="<?=$element_name?>" class="form-control required">
		<option value="">Choose Category</option>
			 <?php 
			 if($num>0 and $level>0){
				 while($row = $this->result($result)){?>
					<option value="<?php echo $row->id; ?>" style="background:#333;color:#FFF;" <?php echo ($current==$row->id)?"selected":""; ?> ><?php echo $row->category_name; ?></option> 
					<?Php
					// now start the 2nd level menu
					   $parent_id  =  $row->id;
					   $result2  =  $this->menuListByType($parent_id);	
					   $num2  =  $this->num_rows($result2);			   
						if($num2>0 and $level>1){
						while($row2 = $this->result($result2)){?>
						 <option value="<?php echo $row2->id; ?>" style="background:#F60;color:#FFF;" <?php echo ($current==$row2->id)?"selected":""; ?> >-<?php echo $row2->category_name; ?></option> 
						 
					   <?php 
						   // now start the 3nd level menu
						   $parent_id2  =  $row2->id;
						   $result3  =  $this->menuListByType($parent_id2);	
						   $num3  =  $this->num_rows($result3);			   
						   if($num3>0 and $level>2){
							while($row3 = $this->result($result3)){?>
							<option value="<?php echo $row3->id; ?>" style="background:#3CF;color:#FFF;" <?php echo ($current==$row3->id)?"selected":""; ?>> --<?php echo $row3->category_name; ?></option> 
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