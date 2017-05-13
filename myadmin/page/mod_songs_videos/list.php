<?php
$result  =  $funSVLObj->svlAll();
?>
    <div class="wrapper">
  <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Tables
            <small>Album Management</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Album Tables</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"><a href="<?php echo base_url('backend/index.php?m=songs_videos&p=form')?>">
<button type="button" class="btn btn-primary btn-sm pull-right" aria-label="Add">
  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add New Songs/Videos/Lyrics
</button></a></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>S.N</th>
                        <th>Artist Name</th>
                        <th>Album Name</th>
                        <th>Cover Image</th>
                        <th>Version</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $sn=1;
					   if($db->num_rows($result)>0){
					   while($row  =  $db->result($result)){
					?>
                      <tr>
                        <td><?php echo $sn;?></td>
                        <td><?php echo @$row->artist_id;?></td>
                        <td><?php echo $row->album_name;?></td>
                        <td><?php $img = @$row->cover_image;
								 if(file_exists(FCPATH."uploads/images/album/".$img) and !empty($img)){?>
								 <img src="<?php echo base_url("uploads/images/album/".$img);?>" width="80" />
								 <?php }?>
                        </td> 
                        <td><?php echo $row->version;?></td>
                        <td><?php echo $row->detail;?></td>
                        <td><span class="cp change_status" title="<?php echo ($row->status==1)?"Click to make inactive":"Click to make active";?>" data-id='<?php echo $row->id?>'><?php echo ($row->status==1)?"Active":"Inactive";?></span></td>
                        <td><a href="index.php?m=<?php echo $module?>&p=view&id=<?php echo @$row->id;?>"><span class="glyphicon glyphicon-eye-open"></span></a>&nbsp;<a href="index.php?m=<?php echo $module?>&p=form&id=<?php echo @$row->id;?>"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;
			 <?php if($_SESSION['admin_login_id']!=$row->id){;?>
             <a href="page/mod_<?php echo $module?>/action.php?id=<?php echo @$row->id;?>" onClick="return confirm('Are you sure?');"><span class="glyphicon glyphicon-trash"></span></a>
             <?php } ?> </td>
                      </tr>
                      <?php $sn++;}
						   }else{
							   echo "No Record in Table";
						   }
					  ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <script>
$(document).ready(function() {
    $('#table_data').dataTable( {
        "pagingType": "full_numbers",
		"scrollX": true
    } );
});
$(function(){
	$(document).on('click','.change_status',function(){
	     var id  =  $(this).data('id');
         var _this  =  $(this);
		 $.post(base_url_admin+'page/mod_album/ajax.php',{id:id,mode:'change_status'},function(data){   
			     if(data.result=='true'){
					  _this.html(data.status);
					  _this.attr('title',data.title);
				 }
			 },'json');
});
});
</script>
