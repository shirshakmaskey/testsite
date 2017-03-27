<?php
session_start();
include_once("../../includes/application_top.php");
$mode  =  $_POST['mode'];
if($mode=='home_search'){  
	 $txtSearch    =  @$_POST['txtSearch'];
	 $result  =  $funPackageObj->packageSearchList('','','',$txtSearch);
	 $num  =  $funObj->num_rows($result);
	 $result_con  =  $funContentsObj->search($txtSearch);
	 $num_con  =  $funObj->num_rows($result_con);
	 ob_start();
	 ?>
	    <div class="welcome">
		<h2><?php echo $txtSearch; ?></h2><br />
		</div>
		<div class="clear"></div>
		<div class="tab_container">
		  <table width="100%" cellpadding="0" cellspacing="0" id="data_table_id" border="0" class="table" >
		  <thead>
		  <th>Search Result</th>
		  </thead>
		  <tbody>
		  <?php if($num>0){
			    while($row = $funObj->result($result)){
			   ?>
		  <tr>
		  <td width="180"><strong><a href="<?php echo base_url('packages_detail-'.$row->slug); ?>" style="color:#09F;"><?php echo ucfirst($row->package_name); ?></a></strong></td>
		   </tr>	
		  <?php }} ?>	
		   <?php if($num_con>0){
			    while($row = $funObj->result($result_con)){
			   ?>
		  <tr>
		  <td width="180"><strong><a href="<?php echo base_url($row->menu_link); ?>" style="color:#09F;"><?php echo ucfirst($row->name); ?></a></strong></td>
		   </tr>	
		  <?php }} ?>  
		  </tbody>
		  </table>
		</div>
		<script type="text/javascript" charset="utf-8" id="init-code">
		$(document).ready(function() {
			$('#data_table_id').dataTable({
				"sPaginationType": "full_numbers"
				});
			});
         </script>
	 <?php
	 $contents  =  ob_get_clean();
	 echo json_encode(array("msg"=>"Search result has been listed","contents"=>$contents));}
?>