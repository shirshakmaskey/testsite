<?php
class booking extends Functions
{
		
/************************************ Booking Start *************************************/
	
		// hotel booking start here
		function bookingPage()
	{
		 $sql = "SELECT * FROM `".TABLE_BOOKING_ONLINE."`  order by id desc";
		$vals = $this->listings($sql, "index.php?_page=bookingpage&mod=booking", 20, 0,false); 
		return $vals;
	}
	
	public function bookingPageSel($id)
	{
		$sql = "SELECT * FROM `".TABLE_BOOKING_ONLINE."` where `id`='$id'";
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
		
		 public function replybookingPage()
	{
		$sql = "SELECT * FROM `".TABLE_REPLIESBOOK."` order by id desc "; 
		$vals = $this->listings($sql, "index.php?_page=replytemBooingpage&mod=booking", 20, 0,false); 
		return $vals;
	}
	
	public function replybookingPageSel($id)
	{
		$sql = "SELECT * FROM `".TABLE_REPLIESBOOK."` where `id`='$id'";
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
/************************************ Booking end *************************************/

}
?>