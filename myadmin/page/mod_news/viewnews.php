<?php
include("page/setAndCheckAll.php");
if(isset($_REQUEST['aid']))
{$id  =   isset($_REQUEST['aid'])?decode($_REQUEST['aid']):0;	
$rowEdit =  $funNewsObj  -> newsSel($id);
$resultImage 	=  $funNewsObj->file_items($id);
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
		<!--   <tr >
      <td class="oddrowfirst">News Type </td>
      <td class="oddrowsecond"><?php  $type_id   =  $rowEdit->news_type_id; 
	                                  $rowType =  $funNewsObj  -> newsTypeSel($type_id);
								 echo  $rowType->news_type_name;
	  ?></td>
    </tr>-->
		<tr >
			<td class="evenrowfirst">Title</td>
			<td class="evenrowsecond"><?php echo ucwords( $rowEdit->title ); ?></td>
		</tr>
        <tr >
			<td class="oddrowfirst">Short Description</td>
			<td class="oddrowsecond"><?php echo $rowEdit->short_description; ?></td>
		</tr>
		<tr >
			<td class="oddrowfirst">Description</td>
			<td class="oddrowsecond"><?php echo html_entity_decode($rowEdit->description); ?></td>
		</tr>
		<tr >
			<td class="oddrowfirst">Author</td>
			<td class="oddrowsecond"><?php echo $rowEdit->author; ?></td>
		</tr>
        <tr >
			<td class="oddrowfirst">Added Date</td>
			<td class="oddrowsecond"><?php echo date("F d,Y",strtotime($rowEdit->created_at)); ?></td>
		</tr>
		<tr >
			<td class="oddrowfirst">File Attach</td>
			<td class="oddrowsecond">
				<?php
   if($id>0){
	  if($funObj->num_rows($resultImage )>0){
		  while($row_item =  $funObj->result($resultImage)){
			    $img =  $row_item->item_name;
				if(file_exists(FCPATH.'uploads/images/news/'.$img) and !empty($img)){ ?>
							<div class="thumb_box" id="thumb_image_<?php echo $row_item->id; ?>"><a href=""><img src="<?php echo base_url(APPLICATIONS);?>timthumb/timthumb.php?src=<?php echo base_url('uploads/images/news/'.$img); ?>&w=100&h=100" class="img-polaroid"></a><br />
								<br />
								<input type="text" name="old_preview_title_<?php echo $row_item->id; ?>" id="old_preview_title_<?php echo $row_item->id; ?>" value="<?php echo $row_item->item_title; ?>" placeholder="Title" class="form-control" />
								<br />
								<a style="cursor:pointer;" onclick="SaveImageFile(<?php echo $row_item->id; ?>);"><i class="fa fa-check-square-o"></i></a> <a style="cursor:pointer;" onclick="deleteImage(<?php echo $row_item->id; ?>);"><i class="fa fa-trash-o"></i></a> </div>
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
