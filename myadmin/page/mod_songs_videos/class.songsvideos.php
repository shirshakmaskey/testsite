<?php
	class Gallery extends Functions
	{
		function gallery_detail($id=0)
		{
			$sql = "SELECT * FROM `tbl_gallery` WHERE id = '$id'";
			$result = $this->query($sql);
			return $this->result($result);	
		}
		
		function galleryAll($artist_id)
		{
			$sql = "SELECT * FROM `tbl_gallery` where artist_id='$artist_id'";
			return $this->query($sql);
		}
		
		//function galleryAll()
//		{
//			$sql=  "select tg.*,ta.artist_name 
//			       from tbl_gallery tn 
//				   inner join tbl_artist ta 
//				   on tg.artist_id = ta.id 				  
//				   where (tg.del_flag='0' 
//				       or tg.del_flag is null)";
//			return  $this->query($sql);
//		}
	}
?>