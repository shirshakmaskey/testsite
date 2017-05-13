<?php
	class Videos extends Functions
	{
		function featuredVideos($limit=5)
		{
			$sql=  "SELECT * FROM tbl_videos 
			        WHERE status='1'  AND featured='1'
			        ORDER BY id DESC 
			        LIMIT 0, $limit";
			return  $this->query($sql);
		}
		function homeVideos($limit=5)
		{
			$sql=  "SELECT * FROM tbl_videos 
			        WHERE status='1'  AND show_in_home='1'
			        ORDER BY id DESC 
			        LIMIT 0, $limit";
			return  $this->query($sql);
		}
	}
?>