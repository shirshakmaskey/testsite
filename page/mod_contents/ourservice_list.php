<?php
ob_start();
?>
<section id="services" class="section bg-image has-header" style="background-image: url('<?php echo base_url('themes/default/img/our_services.jpg');?>');">
					<div class="overlay"></div>
					<header class="section-header bg-default bg-dark">
						<h2 class="section-title title-lg">{OUR_SERVICES}</h2>
						<p>{OUR_SERVICES_THEME}</p>
						<img src="<?php echo base_url('themes/default/img/hr.png');?>" alt="Break"></header>
					<div class="container">
						<div class="row">
<?php
$result  =  $funContentsObj->articleListByCatSlug('services');
$num  = $funObj->num_rows($result);
$sn=0;
if($num>0){ 
   while($row =  $funObj->result($result)){
?>
<div class="col col-lg-4">
	<div class="panel panel-default panel-sm" data-effect="fadeIn" data-effect-delay="<?php echo $sn;?>">
		<div class="panel-top"><span></span></div>
		<div class="panel-heading"><i class="fa <?php if($sn==0){ echo "fa-birthday-cake"; }else if($sn==0.3){ echo "fa-glass"; }else{echo "fa-heart";}?> fa-secondary fa-inverse"></i>
			<h3 class="panel-title"><?php echo ( (current_lang()=='danish') ? $row->article_title_de:$row->article_title); ?></h3>
		</div>
		<div class="panel-body"><?php echo substr( ( (current_lang()=='danish') ? $row->short_description_de:$row->short_description),0,160);?></div>
		<footer class="panel-footer"><a class="btn btn-default btn-sm" href="<?php echo base_url('post/'.$row->slug);?>" role="button">{LEARN_MORE}</a></footer>
		<div class="panel-bottom"><span></span></div>
	</div>
</div>
<?php
   $sn  = $sn+0.3; }
}
?>
</div>
</div>
</section>
<?php				
$cms['module:ourservice_list'] = ob_get_clean();