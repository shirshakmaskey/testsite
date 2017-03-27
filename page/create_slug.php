<?php
if(1==2){
	$sql= "select * from tbl_items";
	$res  =  $db->execute($sql);
	while($row  = $db->result($res)){
		$id  =  $row->id;
		$article_title  =  $row->article_title;
		$slug  =  create_slug($article_title);
		//$db->update('tbl_items',array('slug'=>$slug),array('id'=>$id));	
	}
}
?>