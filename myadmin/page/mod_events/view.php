<?php
include("page/setAndCheckAll.php");
if(isset($_REQUEST['aid']))
{$id  =   isset($_REQUEST['aid'])?decode($_REQUEST['aid']):0;	
$rowEdit =  $funEventsObj  -> find_by_id($id);
$resultImage 	=  $funEventsObj->file_items($id);
$resultfile  	=  $funEventsObj->file_items($id,'file');
			?>

<div class="row">
	<div class="col-sm-12">
		<div class="panel">
		
<div class="panel-heading"> 
	<table width="100%" border="0" cellpadding="1" cellspacing="1" class="" >
		<tr >
			<td><span class="panel-title">Details [ <?php echo ucwords($rowEdit->title); ?> ]</span>
				<div style="text-align:left;float:right;"><a href="<?Php echo $_SERVER['HTTP_REFERER']; ?>">Back</a>&nbsp;|&nbsp;<a href="form-<?php echo $module?>-<?php echo encode($id);?>">Edit</a></div>
				<div style="clear:both;"> </div></td>
		</tr>
	</table>
    
</div>
<div class="panel-body">    
	<table width="100%" border="0" cellpadding="1" cellspacing="1" class="table table-bordered">
		<tr >
      <td class="oddrowfirst">Category </td>
      <td class="oddrowsecond"><?php  $category_id   =  $rowEdit->category_id; 
                                    $rowType =  $funEventsObj  -> find_by_id_type($category_id);
                 echo  $rowType->title;
    ?></td>
    </tr>
		<tr >
			<td class="evenrowfirst">Title</td>
			<td class="evenrowsecond"><?php echo ucwords( $rowEdit->title ); ?></td>
		</tr>

		<tr >
			<td class="evenrowfirst">From Date</td>
			<td class="evenrowsecond"><?php echo ucwords( $rowEdit->from_date ); ?></td>
		</tr>

		<tr >
			<td class="evenrowfirst">To Date</td>
			<td class="evenrowsecond"><?php echo ucwords( $rowEdit->to_date ); ?></td>
		</tr>

		<tr >
			<td class="evenrowfirst">From time</td>
			<td class="evenrowsecond"><?php echo ucwords( $rowEdit->from_time ); ?></td>
		</tr>

		<tr >
			<td class="evenrowfirst">To Time</td>
			<td class="evenrowsecond"><?php echo ucwords( $rowEdit->to_time ); ?></td>
		</tr>

		<tr >
			<td class="evenrowfirst">Venue</td>
			<td class="evenrowsecond"><?php echo ucwords( $rowEdit->venue ); ?></td>
		</tr>

		<tr >
			<td class="evenrowfirst">Fees</td>
			<td class="evenrowsecond"><?php echo ucwords( $rowEdit->fees ); ?></td>
		</tr>

		<tr >
			<td class="evenrowfirst">Special Events</td>
			<td class="evenrowsecond"><?php echo ( $rowEdit->special=='1') ? "Yes" : "No"; ?></td>
		</tr>
        <tr >
			<td class="oddrowfirst">Short Description</td>
			<td class="oddrowsecond"><?php echo $rowEdit->short_description; ?></td>
		</tr>
		<tr >
			<td class="oddrowfirst">Description</td>
			<td class="oddrowsecond"><?php echo html_entity_decode($rowEdit->description); ?></td>
		</tr>
		<!-- <tr >
			<td class="evenrowfirst">Added By</td>
			<td class="evenrowsecond"><?php echo $rowEdit->added_by; ?></td>
		</tr> -->
        <tr >
			<td class="oddrowfirst">Added Date</td>
			<td class="oddrowsecond"><?php echo date("F d,Y",strtotime($rowEdit->created_at)); ?></td>
		</tr>
		<tr >
			<td class="oddrowfirst">Modified Date</td>
			<td class="oddrowsecond"><?php echo date("F d,Y",strtotime($rowEdit->modified_at)); ?></td>
		</tr>
		<tr >
			<td class="oddrowfirst">File Attach</td>
			<td class="oddrowsecond">
				<?php
   if($id>0){
	  if($funObj->num_rows($resultImage )>0){
		  while($row_item =  $funObj->result($resultImage)){
			    $img =  $row_item->item_name;
				if(file_exists(FCPATH.'uploads/images/events/'.$img) and !empty($img)){ ?>
							<div id="thumb_image_<?php echo $row_item->id; ?>"><div class="thumb_box"><a href=""><img src="<?php echo base_url(APPLICATIONS);?>timthumb/timthumb.php?src=<?php echo base_url('uploads/images/events/'.$img); ?>&w=100&h=100" class="img-polaroid"></a></div><br /><hr></div>
							<?php
		      }//file exist
	  }//while
   }//if num
  }//if id >0
  ?>
<hr>Files<hr>
<?php
   if($id>0){
	  if($funObj->num_rows($resultfile )>0){
		  while($row_item =  $funObj->result($resultfile)){
			    $file =  $row_item->item_name;
				if(file_exists(FCPATH.'uploads/files/events/'.$file) and !empty($file)){ ?>
              <div id="thumb_file_<?php echo $row_item->id; ?>"><div class="thumb_box"><a href="<?php echo base_url('uploads/files/events/'.$file); ?>" target="_blank"><?php echo $file; ?></a></div><br /><hr></div>
              <?php
		      }//file exist
	  }//while
   }//if num
  }//if id >0
  ?>


			</td>
		</tr>
		<tr >
			<td class="evenrowfirst">Status</td>
			<td class="evenrowsecond"><?php echo ( $rowEdit->status==1) ? "Published" : "Un-published"; ?></td>
		</tr>
	</table>
</div>
		</div>
	</div>
</div>
<?php	} ?>
