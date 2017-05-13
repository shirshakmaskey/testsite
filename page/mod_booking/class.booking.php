<?php
class Booking extends Functions{
     
    function checkCurrentBooking()
	{   $funUserObj  =  new User();
		$user_id  =  $funUserObj->current_user();
		if (empty($user_id)) {  return FALSE;  }
		 $query  =  "SELECT * from `".TABLE_BOOKING_MASTER."` WHERE user_id='$user_id' AND booking_status='open'";
		 $result = $this->execute($query);
		 $num_rows  =  $this->num_rows($result);
		 if($num_rows>0){        
               $query  =  "SELECT * FROM `".TABLE_BOOKING_MASTER."` WHERE `user_id`='$user_id' AND booking_status='open' ORDER BY id DESC LIMIT 1";
               $result =  $this->execute($query);
               $row    =  $this->result($result); 
             return $row->id;
        }else{
               return '0';
        }
	}

	function booking_lists($user_id=0)
	{   $funUserObj  =  new User();		
		if (empty($user_id)) {  $user_id  =  $funUserObj->current_user();}
		if (empty($user_id)) {  return FALSE;  }
		 $query  =  "SELECT * from `tbl_booking_master` WHERE user_id='$user_id' ORDER BY id desc";
		 return $this->execute($query);
	}

	function add_booking($frm)
	{   if(is_array($frm)){
			$this->table  = 'tbl_booking_master';
			$this->data  = $frm;
			$this->insert();
			$booking_id  = $this->insert_id();	
			return $booking_id;	 
		 }else{
		 	return false;
		 }		 
	}

	function find_book_by_id($id)
	{
		 $query  =  "SELECT * from `tbl_booking_master` WHERE id='$id'";
		 $result = $this->execute($query);
		 return $this->result($result);
	}
	
	function find_book_child_by_id($id)
	{
		 $query  =  "SELECT * from `tbl_booking_child` WHERE booking_id='$id'";
		 return $this->execute($query);
	}

	function currency()
	{
		 $query  =  "SELECT * from `".TABLE_CURRENCY."` WHERE status='1'";
		 return $this->execute($query);
	}

	function find_review($id)
	{
		 $query  =  "SELECT * from `tbl_rating` WHERE item_id='$id' and type='items' and review_type='0' and verify='1'";
		 return $this->execute($query);
	}
	
	function find_avg_review($id){
		$query  =  "SELECT avg(rates) as rating from `tbl_rating` WHERE item_id='$id' and type='items' and review_type='0' and verify='1'";
		  $result = $this->execute($query);
		  $row  = $this->result($result);
		  return !empty($row->rating)?$row->rating:1;
	}

	function check_items($booking_id='0',$item_id='0')
	{
      $query  =  "SELECT count(*) as cnt from `tbl_booking_child` WHERE booking_id='$booking_id' and item_id='$item_id'";
		  $result = $this->execute($query);
		  $row  = $this->result($result);
		  return $row->cnt;
	}

	function addRemoveUpdateChildItem($booking_id='0',$item_id='0',$qty='1',$price='0',$action='add')
	{   if($action=='add'){
		     $item_exists  =  $this->check_items($booking_id,$item_id);
            if($item_exists=='0'){
	         $child_frm   =  array('booking_id' => $booking_id,
			                       'item_id'    => $item_id,
								   'quantity'   => $qty,
								   'item_price' => $price
								   );
				  $this->table  = 'tbl_booking_child';
				  $this->data   = $child_frm;
				  $this->insert();
            }
		}
		else if($action=='update'){
             $funSVLObj  =  new SVL();
             $row        =  $funSVLObj->find_by_id_songs($item_id);
             $old_qty    =  $row->quantity;
             $new_qty    =  $old_qty + $qty;

	         $child_frm   =  array('quantity'   => $new_qty,
								   'item_price' => $price
								   );
				  $this->table  = 'tbl_booking_child';
				  $this->data   = $child_frm;				  
	              $this->cond   = array( 'booking_id' => $booking_id , 'item_id' => $item_id );
				  $this->update();
		}	 
		else if($action=='remove'){
             	  $this->table  = 'tbl_booking_child';				  
	              $this->cond   = array( 'booking_id' => $booking_id , 'item_id' => $item_id );
				  $this->delete();
		}
		else{} 
	}

	function paymentSuccess($booking_id,$arr)
	{
        if(is_array($arr)){
			$this->table  = 'tbl_booking_master';
			$this->data  = $arr;
			$this->cond  = array('id'=>$booking_id);
			$this->update();
			return $booking_id;	 
		 }else{
		 	return false;
		 }	
	}
}

?>
		