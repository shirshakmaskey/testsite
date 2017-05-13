 <?php
	$id =isset($_GET['id'])?$_GET['id']:0;
	if($id>0){
		$row = $funAlbumObj->album_detail($id);	
	}
?>
<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        View page
        <small># <?php echo @$row->album_name?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Album Mgmt</a></li>
        <li class="active">View page</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">&nbsp;</h3>
          <div class="box-tools pull-right">
            <a href="<?php echo base_url('backend/index.php?m=album&p=form')?>">
<button type="button" class="btn btn-primary btn-sm pull-left" aria-label="Add">
  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Album
</button></a>&nbsp;<button type="button" class="btn btn-primary btn-sm pull-left" id="cancel" name="cancel" value="Cancel" onclick="window.location.href='index.php?m=album&p=list';">Album Management</button>&nbsp;<a href="index.php?m=<?php echo $module?>&p=form&id=<?php echo @$row->id;?>">
<button type="button" class="btn btn-primary btn-sm pull-left" aria-label="Add">
 Update Album</button></a>
          </div>
        </div>
        <div class="box-body">
          <section class="invoice col-xs-10">
          <!-- title row -->
          
          <!-- info row -->
          <!-- /.row -->

          <!-- Table row -->
          <div class="row">
            <div class="col-xs-8 table-responsive">
              <table class="table table-striped">
                <tbody>
                    <td>Artist Name</td>
                    <td><?php echo isset($row->artist_id)?$row->artist_id:''?></td>
                  </tr>
                  <tr>
                    <td>Album Name</td>
                    <td><?php echo isset($row->album_name)?$row->album_name:''?></td>
                  </tr>
                  <tr>
                    <td>Cover Image</td>
                    <td><?php $img = @$row->cover_image;
								 if(file_exists(FCPATH."uploads/images/album/".$img) and !empty($img)){?>
								 <img src="<?php echo base_url("uploads/images/album/".$img);?>" width="80" />
						<?php }?>
                    </td>
                  </tr>
                  <tr>
                    <td>Version</td>
                    <td><?php echo isset($row->version)?$row->version:''?></td>
                  </tr>
                  <tr>
                    <td>Details</td>
                    <td><?php echo isset($row->detail)?$row->detail:''?></td>
                  </tr>
                  <tr>
                    <td>Created_On</td>
                    <td><?php echo isset($row->created_on)?$row->created_on:''?></td>
                  </tr>
                  <tr>
                    <td>Created_by</td>
                    <td><?php 
						  $created_by  = $row->created_by;
						  $row_user  = $funUserObj->user_detail($created_by);
						  echo $row_user->first_name." ".$row_user->last_name;
						  ?>
                    </td>
                  </tr>
                  <tr>
                    <td>Modified_on</td>
                    <td><?php echo isset($row->modified_on)?$row->modified_on:''?></td>
                  </tr>
                  <tr>
                    <td>Modified_by</td>
                    <td><?php 
						  $created_by  = $row->created_by;
						  $row_user  = $funUserObj->user_detail($created_by);
						  echo $row_user->first_name." ".$row_user->last_name;
						  ?>
                    </td>
                  </tr>
                  <tr>
                    <td>Status</td>
                    <td><?php echo ($row->status=='1')?'Active':'Inactive'?></td>
                  </tr>
                </tbody>
              </table>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->  
</div><!-- ./wrapper -->


