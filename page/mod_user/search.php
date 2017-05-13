<?php 
if(isset($contentPage) and $contentPage=='search'){
    ob_start(); 
$sql  =  "SELECT tsv.*,ta.artist_name,ta.slug as artist_slug,tab.album_name,tab.slug as album_slug FROM tbl_songs_videos tsv
          INNER JOIN tbl_artist ta
          ON tsv.artist_id=ta.id
          INNER JOIN tbl_album  tab
          ON tsv.album_id=tab.id
          WHERE tsv.status='1' AND ta.status='1' AND tab.status='1'
          ";
  $searchtype  =  isset($_REQUEST['searchtype']) ? $_REQUEST['searchtype'] : array(); 
  foreach($searchtype as $key=>$val){
      $$val=1;
  }     
  $searchTxt  =  isset($_REQUEST['x']) ? $_REQUEST['x'] : '';
  if(isset($lyrics)){
     $sql  .=  " AND tsv.title  LIKE '%".$searchTxt."%'";
  } 
   if(isset($artist)){
     $sql  .=  " AND ta.artist_name  LIKE '%".$searchTxt."%'";
  } 
  if(isset($album)){
     $sql  .=  " AND tab.album_name  LIKE '%".$searchTxt."%'";
  } 
  if(isset($album)){
     $sql  .=  " AND tsv.genre  LIKE '%".$searchTxt."%'";
  } 

  if(!empty($_REQUEST['x'])){    
     $sql  .=  " AND 
                     (tsv.title    LIKE '%$searchTxt%'
                  OR  tsv.genre    LIKE '%$searchTxt%'
                  OR  ta.artist_name    LIKE '%$searchTxt%'
                  OR  tab.album_name    LIKE '%$searchTxt%'
                      )";
  } 
  //pr_get();
  if(isset($_REQUEST['alphabet']) and  !empty($_REQUEST['alphabet'])){   
     $alphabet   =  $_REQUEST['alphabet'];
     if(in_array($alphabet,range('a','z'))){
      $sql  .=  " AND (tsv.title    LIKE '$alphabet%' 
                  OR   ta.artist_name  LIKE '$alphabet%'
                  OR   tab.album_name  LIKE '$alphabet%'
                       )";
      }else{
        $sql  .=  " AND (tsv.title LIKE '0%'
                    OR   tsv.title  LIKE '1%'
                    OR   tsv.title  LIKE '2%'
                    OR   tsv.title  LIKE '3%'
                    OR   tsv.title  LIKE '4%'
                    OR   tsv.title  LIKE '5%'
                    OR   tsv.title  LIKE '6%'
                    OR   tsv.title  LIKE '7%'
                    OR   tsv.title  LIKE '8%'
                    OR   tsv.title  LIKE '9%'
                    )";
      }
  }  
  $sql  .=  " ORDER BY tsv.id DESC";

  $results  =  $db->listings($sql,"search.php?m=user&p=search",10,0);      
    ?>
    <h3 class="headline_title hr_bottom"><?php echo $results[0];?> Results to Display</h3>
    <div class="row">
    <!-- Clients Block-->
    <?php if($results[0]>0){ 
      $result  =  $db->execute($results[1]); $sn=1;
         while($row  =  $db->result($result)){ 
          $slug  =  $row->token_keys;
        ?>  
       <?php if(!isset($_REQUEST['alphabet'])){?>
        <div class="search_item">
                     <div class="search_item_title"><a href="<?php echo base_url('lyrics/'.$slug);?>"><?php echo $row->title;?></a></div>
                     <div class="search_item_desc">
                        <?php echo html_entity_decode($row->detail);?>
                        <p>Artist : <a href="<?php echo base_url('artist/'.$row->artist_slug);?>"><?php echo ucwords($row->artist_name);?></a>  |  Album : <a href="<?php echo base_url('album/'.$row->album_slug);?>"><?php echo ucwords($row->album_name);?></a> |  Genre : <?php echo ucwords($row->genre);?></p>
                     </div>
                    </div>
        <?php }else{?>
                  <div class="col-md-6">
                   <a href="<?php echo base_url('lyrics/'.$slug);?>"><span style="padding-right:10px;"><?php echo $sn;?>.</span><?php echo $row->title;?></a><br>
                   <p>Artist : <a href="<?php echo base_url('artist/'.$row->artist_slug);?>"><?php echo ucwords($row->artist_name);?></a>  |  Album : <a href="<?php echo base_url('album/'.$row->album_slug);?>"><?php echo ucwords($row->album_name);?></a></p>
                  </div>  
                    <!-- row -->
          <?php } ?>


    
    <?php $sn++; }}else{ echo 'No Result Found';} ?>
    <!-- End Clients Block-->
    </div>
    
    
    <!-- Pagination -->
                <div class="text-center md-margin-bottom-30">
                    <?php echo $results[2];?>                                                   
                </div>
                <!-- End Pagination -->
    <?php 
    $cms['module:user_search'] = ob_get_clean();
}
?>