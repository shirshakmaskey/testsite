<?php
//Pages Contents
ob_start();
if(defined("EVENTS_PAGE")){
$rowPage            =  $funContentsObj->find_by_static_slug('events');
/* id and meta contents */
$data['page_title']          =  $rowPage->menu_name;
$data['metakeyword']         =  $rowPage->meta_keywords;
$data['metadescription']     =  $rowPage->meta_desc; 
/* id and meta contents end*/
?>
<?php  
$results  =  $funEventsObj->rowsListPage();?>
<div class="news-v3 bg-color-white margin-bottom-30">
<br>
  <?php if($results[0]>0){
	  $result = $funObj->execute($results[1]);
	  while($row = $funObj->result($result)){
		  $events_id   =  $row->id;
		  $row_item  = $funEventsObj->file_items($events_id,'image','asc',1);
	      $image     = @$row_item->item_name;
		  $image_title     = @$row_item->item_title;
		  ?>
                <!-- News v3 -->
                <div class="row margin-bottom-20">
                    <div class="col-sm-5 sm-margin-bottom-20">
<?php if(file_exists(FCPATH."uploads/images/events/".$image) and !empty($image)){ ?>
<img src="<?=base_url("uploads/images/events/".$image)?>" class="img-responsive" title="<?=$image_title?>" alt="<?=$image_title?>"><?php }?>	
                    </div>
                    <div class="col-sm-7 news-v3">
                        <div class="news-v3-in-sm no-padding">
                            <ul class="list-inline posted-info">
                               <?php if( ($row->from_date!="0000-00-00") and ($row->to_date!="0000-00-00") ){?>
    <li>Event Date :<?php echo date("F d,Y",strtotime($row->from_date));?> to <?php echo date("F d,Y",strtotime($row->to_date));?></li>
    <?php }else{ ?>
    <li>Event Date :<?php echo date("F d,Y",strtotime($row->from_date));?></li>
    <?php  } ?>
    
    <?php if( !empty($row->from_time) and !empty($row->to_time) ){?>
    <li>Time  :<?php echo $row->from_time;?> to <?php echo $row->to_time;?></li>
    <?php }else if( !empty($row->from_time)){ ?>
    <li><?php echo $row->from_time;?></li>
    <?php  }else{} ?>
    </ul>
    <ul class="list-inline posted-info">
    <li>Venue : <?php echo ucfirst($row->venue); ?></li>
   <?php if( !empty($row->fees) ){?>
    <li>Fees : <?php echo $row->fees;?></li>
    <li>Fees : <?php echo $row->fees;?></li>
    <?php  }?>
</ul>

<h2><a href="<?php echo base_url('events/'.$row->slug); ?>"><?php echo ucfirst($row->title); ?></a></h2>

<p><?php echo $row->short_description;?></p>    



                        </div>
                    </div>
                </div><!--/end row-->
                <!-- End News v3 -->
                <div class="clearfix margin-bottom-20"><hr></div>
  <?php }//while ?>
  <?php echo $results[2]; ?>
  <?php }else{ echo "No events found!!"; } ?>
  </div>
<?php
}//check defined EVENTS_PAGE


if(defined("EVENTS_CAT_PAGE")){
$rowPage            =  $funContentsObj->find_by_static_slug('events');
/* id and meta contents */
$data['page_title']          =  $rowPage->menu_name;
$data['metakeyword']         =  $rowPage->meta_keywords;
$data['metadescription']     =  $rowPage->meta_desc; 
/* id and meta contents end*/
?>
<?php  
$results  =  $funEventsObj->rowsListPage($gslug);?>
<div class="news-v3 bg-color-white margin-bottom-30">
<br>
  <?php if($results[0]>0){ 
      $result = $funObj->execute($results[1]);
      while($row = $funObj->result($result)){
          $events_id   =  $row->id;
          $row_item  = $funEventsObj->file_items($events_id,'image','asc',1);
          $image     = @$row_item->item_name;
          $image_title     = @$row_item->item_title;
          ?>
                <!-- News v3 -->
                <div class="row margin-bottom-20">
                    <div class="col-sm-5 sm-margin-bottom-20">
<?php if(file_exists(FCPATH."uploads/images/events/".$image) and !empty($image)){ ?>
<img src="<?=base_url("uploads/images/events/".$image)?>" class="img-responsive" title="<?=$image_title?>" alt="<?=$image_title?>"><?php }?>  
                    </div>
                    <div class="col-sm-7 news-v3">
                        <div class="news-v3-in-sm no-padding">
                           <ul class="list-inline posted-info">
                               <?php if( ($row->from_date!="0000-00-00") and ($row->to_date!="0000-00-00") ){?>
    <li>Event Date :<?php echo date("F d,Y",strtotime($row->from_date));?> to <?php echo date("F d,Y",strtotime($row->to_date));?></li>
    <?php }else{ ?>
    <li>Event Date :<?php echo date("F d,Y",strtotime($row->from_date));?></li>
    <?php  } ?>
    
    <?php if( !empty($row->from_time) and !empty($row->to_time) ){?>
    <li>Time  :<?php echo $row->from_time;?> to <?php echo $row->to_time;?></li>
    <?php }else if( !empty($row->from_time)){ ?>
    <li><?php echo $row->from_time;?></li>
    <?php  }else{} ?>
    </ul>
    <ul class="list-inline posted-info">
    <li>Venue : <?php echo ucfirst($row->venue); ?></li>
   <?php if( !empty($row->fees) ){?>
    <li>Fees : <?php echo $row->fees;?></li>
    <?php  }?>
                            </ul>
    <h2><a href="<?php echo base_url('events/'.$row->slug); ?>"><?php echo ucfirst($row->title); ?></a></h2>
                            <p><?php echo $row->short_description;?></p>                            
                        </div>
                    </div>
                </div><!--/end row-->
                <!-- End News v3 -->
                <div class="clearfix margin-bottom-20"><hr></div>
  <?php }//while ?>
  <?php echo $results[2]; ?>
  <?php }else{ echo "No events found!!"; } ?>
  </div>
<?php
}//check defined EVENTS_CAT_PAGE
?>
<?php
//single EVENTS by Slug
if(defined("EVENTS_DETAIL_PAGE")){
$row            =  $funEventsObj->find_by_slug($gslug);
/* id and meta contents */
$events_id     =  $row->id;
$event_title   =  $row->title;
$data['page_title']          =  $row->title;
$data['metakeyword']         =  $row->meta_keywords;
$data['metadescription']     =  $row->meta_desc; 
/* id and meta contents end*/
?>
<div class="news-v3 bg-color-white margin-bottom-30">
<?php ob_start()?>			
<?php   
   if($events_id>0){
	   $resultImage 	=  $funEventsObj->file_items($events_id);
	   $num   = $funObj->num_rows($resultImage);
	  if($num>0){ $sn_cnt=1;?>
	<?php echo '<div id="myCarousel" class="carousel slide carousel-v1">
                    <div class="carousel-inner">';
		  while($row_item =  $funObj->result($resultImage)){
			    $img =  $row_item->item_name;
				$item_desc =  $row_item->item_desc;
				if(file_exists(FCPATH.'uploads/images/events/'.$img) and !empty($img)){ ?>
                        <div class="item <?php echo ($sn_cnt==1)?"active":"";?>">
                            <img src="<?php echo base_url('uploads/images/events/'.$img); ?>"  alt="<?php echo $item_desc; ?>" class="img-responsive full-width" >
                            <div class="carousel-caption">
                                <p><?php echo ucfirst($item_desc); ?></p>
                            </div>
                        </div>     
	<?php
		      }//file exist
		      $sn_cnt++;
	  }//while
	  echo '</div>';
                if($num>1){    
                    echo '<div class="carousel-arrow">
                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>';}
    			echo '</div>';
    }//if num
	else{}	
 }//if id >0
  // Images listing ends
  ?>
<?php $the_contents_image =  ob_get_clean(); ?>
    <?php echo $the_contents_image?>
    <div class="news-v3-in">
        <ul class="list-inline posted-info">
                               <?php if( ($row->from_date!="0000-00-00") and ($row->to_date!="0000-00-00") ){?>
    <li>Event Date :<?php echo date("F d,Y",strtotime($row->from_date));?> to <?php echo date("F d,Y",strtotime($row->to_date));?></li>
    <?php }else{ ?>
    <li>Event Date :<?php echo date("F d,Y",strtotime($row->from_date));?></li>
    <?php  } ?>
    
    <?php if( !empty($row->from_time) and !empty($row->to_time) ){?>
    <li>Time  :<?php echo $row->from_time;?> to <?php echo $row->to_time;?></li>
    <?php }else if( !empty($row->from_time)){ ?>
    <li><?php echo $row->from_time;?></li>
    <?php  }else{} ?>
    </ul>
    <ul class="list-inline posted-info">
    <li>Venue : <?php echo ucfirst($row->venue); ?></li>
   <?php if( !empty($row->fees) ){?>
    <li>Fees : <?php echo $row->fees;?></li>
    <?php  }?>
                            </ul>

        <h2><?php echo $row->title;?></h2>
        <?php echo html_entity_decode($row->description);?> 
<div class="margin-bottom-30"><hr></div>

<form action="<?php echo base_url();?>page/mod_events/act_events.php" method="post" name="addEditForm" id="addEditForm" class="wpcf7-form">
<input type="hidden" name="event_id" value="<?php echo $events_id;?>">
<input type="hidden" name="event_title" value="<?php echo $event_title;?>">
<input type="hidden" name="redirect_to" value="<?php echo $funObj->curPageURL();?>">

        <h3>BOOK EVENTS TICKETS</h3> 
        <div class="row">
                  <div class="col-lg-6">
        <div class="form-group">
             <label>Fullname</label>
              <input type="text" name="fullname" id="fullname" class="form-control required" value="<?php if(isset($_POST['fullname'])){echo $_POST['fullname'];}?>" >
         </div> 

                    <div class="form-group">
             <label>Email Address</label>
              <input type="text" name="email" id="email" class="form-control required" value="<?php if(isset($_POST['email'])){echo $_POST['email'];}?>">
         </div> 
                    
                  </div>
          <div class="col-lg-6">
          <div class="form-group">
             <label>Contact No.</label>
              <input type="text" name="contact_no" id="contact_no" class="form-control required" value="<?php if(isset($_POST['contact_no'])){echo $_POST['contact_no'];}?>">
         </div>

          <div class="form-group">
             <label>Address</label>
              <input type="text" name="address" id="address" class="form-control required" value="<?php if(isset($_POST['address'])){echo $_POST['address'];}?>">
         </div> 
        </div>

        <div class="col-lg-6">
            <div class="form-group">
             <label>Event Date</label>
              <input type="text" name="event_date" id="event_date" class="form-control required" value="<?php echo @isset($_POST['event_date'])?$_POST['event_date']:""; ?>">
         </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
             <label>Qty</label>
             <input type="text" name="ticket_qty" id="ticket_qty" value="<?php if(isset($_POST['ticket_qty'])){echo $_POST['ticket_qty'];}?>" class="form-control" required >
         </div>
        </div>

        <div class="col-lg-6">
              <div class="form-group">
             <label>Message</label>
              <textarea name="message" id="message" class="form-control required"><?php echo @isset($_POST['message'])?$_POST['message']:""; ?></textarea>
         </div>
        </div>

        <div class="col-lg-6">

        <div class="form-group">
<img id="siimage" style="border: 1px solid #000; margin-right: 15px" src="<?php echo base_url(); ?>applications/securimage-master/securimage_show.php?sid=<?php echo md5(uniqid()) ?>" alt="CAPTCHA Image" align="left" />
            <object type="application/x-shockwave-flash" data="<?php echo base_url(); ?>applications/securimage-master/securimage_play.swf?bgcol=#ffffff&amp;icon_file=<?php echo base_url(); ?>applications/securimage-master/images/audio_icon.png&amp;audio_file=<?php echo base_url(); ?>applications/securimage-master/securimage_play.php" height="32" width="32">
              <param name="movie" value="<?php echo base_url(); ?>applications/securimage-master/securimage_play.swf?bgcol=#ffffff&amp;icon_file=<?php echo base_url(); ?>applications/securimage-master/images/audio_icon.png&amp;audio_file=<?php echo base_url(); ?>applications/securimage-master/securimage_play.php" />
            </object>
            &nbsp; <a tabindex="-1" style="border-style: none;" href="#" title="Refresh Image" onclick="document.getElementById('siimage').src = '<?php echo base_url(); ?>applications/securimage-master/securimage_show.php?sid=' + Math.random(); this.blur(); return false" id="refresh_image"><img src="<?php echo base_url(); ?>applications/securimage-master/images/refresh.png" alt="Reload Image" height="32" width="32" onclick="this.blur()" align="bottom" border="0" /></a><br />
            Enter Code <span class="star">*</span>:
            <div>
            <input type="text" name="ct_captcha" id="ct_captcha" onkeyup="checkCaptcha(this.value);" size="12" maxlength="8" class="required form-control" /></div>
            <input type="hidden" name="errorCheck" id="errorCheck" value="0" />
            <div id="ct_captchaErr"></div>
            </div>

</div>

        </div>

        <div class="col-lg-12">
               <div class="form-group">
              <input type="submit" class="btn btn-danger" name="submitBtn" value="Book Event">
             </div>
             <div class="wpcf7-response-output wpcf7-display-none"></div>

        </div>

      </div> 
      <!--end row-->   
</form>
<script language="javascript" src="<?php echo base_url('page/mod_events/events.js');?>"></script>
    </div>
</div>
<?php	
}//EVENTS_DETAIL_PAGE
$cms['module:events'] = ob_get_clean();
?>