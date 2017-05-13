<?php
//Pages Contents
ob_start();
if(defined("CUSTOM_DETAIL_PAGE")){
$row            =  $funCustomObj->find_by_slug($gslug);
/* id and meta contents */
$block_id     =  $row->id;
$data['page_title']          =  $row->block_title;
$data['metakeyword']         =  $row->block_title;
$data['metadescription']     =  $row->block_title; 
/* id and meta contents end*/
?>
<div class="welcome">
<h2><?php echo $block_title  = $row->block_title; ?></h2><br>
<div style="padding-bottom:50px;">
<?php   
			    $img =  $row->image;
				if(file_exists(FCPATH.'uploads/images/sponser/'.$img) and !empty($img)){ ?>
<li><a href="#"><img src="<?php echo base_url('uploads/images/sponser/'.$img); ?>" alt="<?php echo $block_title; ?>" title="<?php echo $block_title; ?>" class="img-polaroid" width="100%"></a></li>
				<?php
		      }//file exist	 
  // Images listing ends
  ?>
  <div><?php echo html_entity_decode($row->description); ?></div> 
  
  <div class='clearfix'></div>
  <style>.stButton .stFb, .stButton .stTwbutton, .stButton .stMainServices{height:25px;}</style>
 <?php $p_page = 'custom'; ?>
 <span class='st_facebook_hcount' displayText='Facebook' st_title='<?php echo $post_title; ?>'
 st_url='<?php echo base_url($p_page.'/'.$row->slug); ?>' ></span>
<span class='st_twitter_hcount' displayText='Tweet' st_title='<?php echo $post_title; ?>'
 st_url='<?php echo base_url($p_page.'/'.$row->slug); ?>'></span>
<span class='st_linkedin_hcount' displayText='LinkedIn' st_title='<?php echo $post_title; ?>'
 st_url='<?php echo base_url($p_page.'/'.$row->slug); ?>'></span>
<span class='st_email_hcount' displayText='Email' st_title='<?php echo $post_title; ?>'
 st_url='<?php echo base_url($p_page.'/'.$row->slug); ?>'></span>
<span class='st_sharethis_hcount' displayText='ShareThis' st_title='<?php echo $post_title; ?>'
 st_url='<?php echo base_url($p_page.'/'.$row->slug); ?>'></span>
</div> 
<?php	
}//DETAIL PAGE
$cms['module:custom'] = ob_get_clean();