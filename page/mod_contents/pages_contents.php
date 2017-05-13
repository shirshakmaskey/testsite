<?php
//Pages Contents
ob_start();
if(defined("PAGES_PAGE") or defined("POST_PAGE") or defined("FESTIVAL_PAGE") or defined("SERVICE_PAGE")){
$row            =  $funContentsObj->find_by_slug($gslug);
if($row):
$content_page_layout  =  $row->layout;
/* id and meta contents */
$content_id     =  $row->id;
$data['page_title']          =  $row->article_title;
$data['metakeyword']         =  $row->meta_keywords;
$data['metadescription']     =  $row->meta_desc;
$image_folder  =  'contents'; $page_url = "pages";
if($p=='post'){$image_folder='article';}
$fbtags  =  
'<meta property="og:url"    content="'.base_url($image_folder.'/'.$gslug).'" />
 <meta property="og:type"   content="website" />
 <meta property="og:title"  content="'.$data['page_title'].'-'.COMPANY_SITE_NAME.'" />
 <meta property="og:description"  content="'.$data['metadescription'].COMPANY_SITE_NAME_DESC.'" />
 ';

/* id and meta contents end*/
$banner                =  $row->banner;
$banner_title          =  $row->banner_title;
if(file_exists(FCPATH.'uploads/images/'.$image_folder.'/'.$banner) and !empty($banner)){
?>
<style>
.breadcrumbs-v3.img-v3 {
    background: rgba(0, 0, 0, 0) url("<?php echo base_url('uploads/images/'.$image_folder.'/'.$banner);?>") no-repeat scroll center center / cover ;
}
<?php } ?>
</style>
   <!--=== Breadcrumbs v3 ===-->
	<div class="breadcrumbs-v3 img-v3 text-center">
		<div class="container">
			<h1><?php echo  $post_title =  $row->article_title;?></h1>
			<p><?php echo !empty($banner_title)?$banner_title:''?></p>
		</div>
		<!--/end container--> 
	</div>
	<!--=== End Breadcrumbs v3 ===--> 

<!--=== Content Part ===-->
<div class="container content">
  <div class="row magazine-page">
    <!-- Begin Content -->
    <div class="col-md-12">      
       <div class="margin-bottom-60">
           <?php ob_start()?>
			
			<?php 
	  $has_image=0; 
   if($content_id>0){
	   $resultImage 	=  $funContentsObj->file_items($content_id);
	   $num   = $funObj->num_rows($resultImage);
	  if($num>0){ $sn_cnt=1; $has_image=1;?>
	<?php echo '<div id="myCarousel" class="carousel slide carousel-v1">
                    <div class="carousel-inner">';
		  while($row_item =  $funObj->result($resultImage)){
			    $img =  $row_item->item_name;
				$item_desc =  $row_item->item_desc;
				if(file_exists(FCPATH.'uploads/images/'.$image_folder.'/'.$img) and !empty($img)){ 
$fbtags .='<meta property="og:image" content="'.base_url('uploads/images/'.$image_folder.'/'.$img).'" />';
          ?>
                        <div class="item <?php echo ($sn_cnt==1)?"active":"";?>">
                            <img src="<?php echo base_url('uploads/images/'.$image_folder.'/'.$img); ?>"  alt="<?php echo $item_desc; ?>" class="img-responsive full-width" >
                            <div class="carousel-caption">
                                <p><?php echo $item_desc; ?></p>
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
    $data['fbtags'] = $fbtags;
 }//if id >0
  // Images listing ends
 echo '<div class="margin-bottom-30"></div>';
  ?>
	<?php $the_contents_image =  ob_get_clean(); ?>
    <?php ob_start()?>  
    <?php $content  =   htmlspecialchars_decode(trim($row->description));              
          $content = explode('<hr id="system_readmore" style="border-style: dashed; border-color: orange;" />', $content); 
          $content = implode("", $content); ?>
	<?=html_entity_decode($content);?>	
    <?php $the_contents_text =  ob_get_clean(); ?>            
    <div class="col-md-12"><h3><?php echo $post_title =  $row->article_title;?></h3></div>
           <?php if($content_page_layout=='two_col_left_image' and $has_image==1){ ?>
			<div class="col-md-6 md-margin-bottom-50"><?php echo $the_contents_image?></div>
			<div class="col-md-6"><?php echo $the_contents_text?></div>
            <?php }else if($content_page_layout=='two_col_right_image' and $has_image==1){ ?>
            <div class="col-md-6"><?php echo $the_contents_text?></div>
			<div class="col-md-6 md-margin-bottom-50"><?php echo $the_contents_image?></div>			
            <?php 
			}else if($content_page_layout=='full_page' and $has_image==1){ ?>            
			<div class="col-md-12 md-margin-bottom-50"><?php echo $the_contents_image?></div>
            <div class="col-md-12"><?php echo $the_contents_text?></div>			
            <?php }else{ ?>
            	<div class="col-md-12"><?php echo $the_contents_text?></div>
            <?php }	?>
            
		</div>
		<!--/end row-->	  
<div class="margin-bottom-35"><hr class="hr-md"></div>
<div class="row margin-bottom-30">
        <div class="col-md-12 mb-margin-bottom-30">                
             

    <!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="https://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4d9d79c30a2d0a7f" async="async"></script>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<div class="addthis_sharing_toolbox"></div>             


        </div><!--/col-md-12-->
</div>
   

<div class="margin-bottom-35"><hr class="hr-md"></div>


      </div>
    <!-- End Content -->
 
    <!-- Begin Sidebar -->
    <!-- <div class="col-md-4">
        <?php         
        //include(FCPATH."page/mod_videos/videos.php");
        //echo $cms['module:video_featured']?>

        <?php 
        //include(FCPATH."page/mod_sponser/sponser_footer.php");
        //echo $cms['module:sponser_home']?>
    </div> -->
    <!-- End Sidebar -->
  </div>
</div><!--/container-->     
<!-- End Content Part -->
<?php
else:
echo '<div class="container content text-center"><h2>404 Error</h2><p>No Page found!</p></div>';
endif;
}//check defined PAGES_PAGE
$cms['module:contents'] = ob_get_clean();