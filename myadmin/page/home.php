<?php
if(isset($_POST['post_branch_id'])){
	$_SESSION['cust_post_branch_id'] =  $_POST['post_branch_id'];
}
$_SESSION['cust_post_branch_id'] =  isset($_SESSION['cust_post_branch_id'])?$_SESSION['cust_post_branch_id']:'';
?>
<div class="page-header">
	<h1><i class="fa fa-dashboard page-header-icon"></i>&nbsp;&nbsp;Dashboard</h1>
</div>
<div class="panel">
	<div class="panel-body">
		<p align="justify">Welcome to the Admin Panal of the <strong><?php echo COMPANY_SITE_NAME; ?></strong>.It Helps you to maintain your system.</p>
	</div>
</div>

<div class="row">
	<div class="col-md-4">

<!-- 5. $PROFILE_WIDGET_LINKS_EXAMPLE ==============================================================

				Profile widget - Links example
			-->
			<div class="panel panel-success panel-dark widget-profile">
				<div class="panel-heading">
					<div class="widget-profile-bg-icon"><i class="fa fa-flask"></i></div>
					<i class="widget-profile-avatar"></i>
					<div class="widget-profile-header">
						<span>Quick Links</span><br>
					</div>
				</div> <!-- / .panel-heading -->
				<div class="list-group">
					<a href="<?php echo base_url('myadmin/list-contents');?>" class="list-group-item"><i class="fa fa-bell-o list-group-icon"></i>View Contents</a>
					<a href="<?php echo base_url('myadmin/list-article');?>" class="list-group-item"><i class="fa fa-bell-o list-group-icon"></i>View Article</a>	
					<a href="<?php echo base_url('myadmin/feedbackpage-cms');?>" class="list-group-item"><i class="fa fa-bell-o list-group-icon"></i>View inquries</a>
					<a href="#" class="list-group-item"><i class="fa fa-bell-o list-group-icon"></i>Get a Quotes Order</a>


				</div>
			</div> <!-- / .panel -->
			<!-- /5. $PROFILE_WIDGET_LINKS_EXAMPLE -->

		</div>
		<div class="col-md-4">

<!-- 6. $PROFILE_WIDGET_COUNTERS_EXAMPLE ===========================================================

				Profile widget - Counters example
			-->

			<!-- /6. $PROFILE_WIDGET_COUNTERS_EXAMPLE -->

		</div>
		<div class="col-md-4">

<!-- 7. $PROFILE_WIDGET_CENTERED_EXAMPLE ===========================================================

				Profile widget - Centered example
			-->
			<div class="panel panel-danger panel-dark panel-body-colorful widget-profile widget-profile-centered">
				<div class="panel-heading">
					<?php $rowUserImage   =  $funUserObj->userListSel($_SESSION[ENCR_KEY.'pathsaleLoginId']);
					$imgHeader  =  $rowUserImage->image;							 		  
					if(file_exists("../images/user_image/".$imgHeader)  and !empty($imgHeader))
						{ ?>
					<img src="<?php echo "../images/user_image/$imgHeader";?>" alt="" class="widget-profile-avatar"><?php } ?>
					<div class="widget-profile-header">
						<span><?php echo ucwords($rowUserImage->fullname);?></span><br>
						<?php echo $rowUserImage->email1; ?>
					</div>
				</div> <!-- / .panel-heading -->
				<div class="panel-body">
					<div class="widget-profile-text" style="padding: 0;">
						<?php echo $rowUserImage->mobile1; ?><br />
						<?php echo $rowUserImage->temporary_address; ?>
					</div>
				</div>
			</div> <!-- / .panel -->
			<!-- /7. $PROFILE_WIDGET_CENTERED_EXAMPLE -->

		</div>
	</div>   



	<div class="row">
		<div class="col-sm-12">
			<div class="panel">
				<div class="panel-body">
					<div id="accordion-example" class="panel-group panel-group-success">
						<?php /*<div class="panel">
							<div class="panel-heading"> <a href="#collapseOne" data-parent="#accordion-example" data-toggle="collapse" class="accordion-toggle"> Latest Get a Quote Orders  </a> </div>
							<!-- / .panel-heading -->
							<div class="panel-collapse collapse in" id="collapseOne" style="height: auto;">
								<div class="panel-body"> 

									<div class="table-primary">
										Latest Online Orders
									</div>
								</div>
								<!-- / .collapse --> 
							</div></div>*/ ?>	
						<div class="panel">
							<div class="panel-heading"> <a href="#collapseTwo" data-parent="#accordion-example" data-toggle="collapse" class="accordion-toggle collapsed"> Logged in Users </a> </div>
							<!-- / .panel-heading -->
							<div class="panel-collapse collapse" id="collapseTwo">
								<div class="panel-body">
									<div class="table-primary">
										<?php $rowHomeUserInfo  =  $funUserObj->user_info_home($_SESSION[ENCR_KEY.'pathsaleLoginId']);?>
										<table cellpadding="5" cellspacing="1" border="0" width="100%"  class="table table-bordered">
											<thead>
												<tr>
													<th>Fullname</th>
													<th>Username</th>
													<th>Level</th>
													<th>Image</th>
													<th>Last Logon</th>
													<th>No.of Login</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td><?php echo ucwords($rowHomeUserInfo->fullname);?></td>
													<td><?php echo $rowHomeUserInfo->username; ?></td>
													<td><?php echo $rowHomeUserInfo->designation; ?></td>
													<td><?php $img =  $rowHomeUserInfo->image; 
														if(file_exists("../images/user_image/".$img)  and !empty($img))
														{
															$userImage  = "<img src='../applications/phpthumb/phpthumb.php?src=../../images/user_image/$img&aoe=1&h=60&w=60'  border='0' >";	 
															?>
															<a href="../images/user_image/<?php echo $img; ?>" rel="lytebox[user_image]" title="<?php echo @$rows["bannername"]; ?>"><?php echo $userImage; ?></a>
															<?php
														}
														?></td>
														<td><?php echo $rowHomeUserInfo->date_of_last_logon; ?></td>
														<td><?php echo $rowHomeUserInfo->number_of_logon; ?></td>
													</tr>
												</tbody>
											</table>
										</div>
										<!-- / .panel-body --> 
									</div>
									<!-- / .panel-body --> 
								</div>
								<!-- / .collapse --> 
							</div>
						</div><!-- / accordion-example --> 
					</div><!-- / .panel-group -->					
				</div><!-- / .panel --> 
			</div><!-- / .col-sm-12 --> 
		</div><!-- / .row -->
		<hr class="no-grid-gutter-h grid-gutter-margin-b no-margin-t">
		<?php ob_start();?>
		<script>

		</script>
		<?php
		$content_footer[] = ob_get_clean();
		?>					
	</div> <!-- / .panel-body -->
</div> <!-- / .panel -->
</div>
<!-- /13. $RECENT_TASKS -->
</div>
