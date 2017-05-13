<?php
ob_start();
$row  =  $funContentsObj->find_by_id(1);
if($row):
$content_id     =  $row->id;
?>
<div class="row">
           <div class="col-md-6">
              <h1><?=$row->article_title?></h1>
              <?=$row->short_description;?>
<?php 
$content  =   htmlspecialchars_decode(trim($row->description));              
$content = explode('<hr id="system_readmore" style="border-style: dashed; border-color: orange;" />', $content); 
$readmore = (count($content) > 1) ? '<a class="btn-u btn-u-red  one-page-btn" href="'.base_url('pages/'.$row->slug).'"><i class="fa fa-eye"></i> Read More</a>' : '' ;
$content = html_entity_decode($content[0]);
?>
              <div class="margin-bottom-30"></div>
              <a class="btn-u btn-u-red  one-page-btn" href="<?php echo base_url('pages/about-us');?>"><i class="fa fa-eye"></i> Read More</a>
              <div class="margin-bottom-30"></div>
          </div>
          <div class="col-md-6">
              <?php
	if($content_id>0){
	   $row_item 	=  $funContentsObj->file_items($content_id,'image','asc',1);
			    if($row_item){ $img =  $row_item->item_name;
				$item_desc =  $row_item->item_desc;
if(file_exists(FCPATH.'uploads/images/contents/'.$img) and !empty($img)){ ?>
			<img src="<?php echo base_url('uploads/images/contents/'.$img); ?>" class="img-responsive margin-bottom-10" alt="<?php echo $item_desc; ?>" title="<?php echo $item_desc; ?>" width="100%"/>
			<?php
				 }//file exist			
				}}//if id >0?>
          </div>
      </div>
<?php
endif;
$cms['module:intro'] = ob_get_clean();
ob_start();
$row  =  $funContentsObj->find_by_id(1);
if($row):
echo substr( $row->short_description,0,200); 
endif;
$cms['module:about_short'] = ob_get_clean();