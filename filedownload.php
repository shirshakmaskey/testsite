<?php
    require("includes/application_top.php");
    $user_id     =  isset($_GET['u']) ? $_GET['u'] : ''; 
    $slug        =  isset($_GET['s']) ? $_GET['s'] : ''; 
    
    $row_item_songs         =  $funSVLObj->find_by_slug($slug);    

    //now check for the user is valid or not
    $songs_list_array = array();
    $result  =  $funBookingObj->booking_lists($user_id);
        $num     =  $db->num_rows($result);
        if($num>0){
        while($row =  $db->result($result)){
              $result_items   =  $funBookingObj->find_book_child_by_id($row->id);
              $num_items      =  $db->num_rows($result_items);
              $booking_status =  $row->booking_status;
              $has_payment    =  $row->has_payment;
              if($num_items>0){ $sn=1; 
                  while($row_items  =  $db->result($result_items)){ 
                  	    if($has_payment=='1' and $booking_status=='close'){
                            $item_id  =  $row_items->item_id;
                            $songs_list_array[]  = $item_id;
                        }
                    }}
          }
      }
    
    if(!in_array($row_item_songs->id,$songs_list_array)){
    	die('The provided file path is not valid.');
    }
    $songs_file  =  $row_item_songs->songs_file;
    $filePath =  FCPATH."uploads/songs/".$songs_file;          
    if(file_exists($filePath) and !empty($songs_file)){
        $fileName = basename($filePath);
        $fileSize = filesize($filePath);
        $fileName  = str_replace(" ", "-",$fileName);
        
        //header("Cache-Control: private");
        header("Content-Type: application/stream");
        header("Content-Length: ".$fileSize);
        header("Content-Disposition: attachment; filename=".$fileName);
        readfile ($filePath);                   
        exit();
    }
    else {
        die('The provided file path is not valid.');
    }
?>