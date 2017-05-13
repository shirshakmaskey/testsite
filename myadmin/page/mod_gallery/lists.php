<?php
  $artist  =   isset($_REQUEST['aid'])?decode($_REQUEST['aid']):0;
  $artist_row = $funArtistObj->artist_detail($artist);
  $result  =  $funGalleryObj->galleryAll($artist);
?>
<div class="page-header">
      
      <div class="row">
        <!-- Page header, center on small screens -->
        <h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-tasks page-header-icon"></i>&nbsp;&nbsp;<?php echo $artist_row->artist_name ?>
            <small>Gallery Management</small></h1>

        <div class="col-xs-12 col-sm-8">
          <div class="row">
            <hr class="visible-xs no-grid-gutter-h">
            <!-- "Create project" button, width=auto on desktops -->
            <div class="pull-right col-xs-12 col-sm-auto">

            <a class="btn btn-primary btn-labeled" href="form-<?php echo $module; ?>-<?php echo encode($artist)?>"><span class="btn-label icon fa fa-plus"></span>Add New Gallery</a>

<a  href="lists-artist" class="btn btn-primary btn-labeled">
<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Back to Artist List</a>

            </div>

          </div>
        </div>
      </div>
    </div><!--page-header-->


<div class="row"><div class="col-sm-12"><div class="panel"><div class="panel-body">
<div class="table-primary">
<table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="example" width="100%">
                    <thead>
                      <tr>
                        <th>S.N</th>
                        <th>Gallery Name</th>
                        <th>Cover Image</th>
                        <th>Description</th>
                        <th>Images</th>
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
                        <td><?php echo $row->gallery_name;?></td>
                        <td><?php $img = @$row->cover_image;
								 if(file_exists(FCPATH."uploads/images/gallery/".$img) and !empty($img)){?>
								 <img src="<?php echo base_url("uploads/images/gallery/".$img);?>" width="80" />
								 <?php }?>
                        </td> 
                        <td><?php echo $row->description;?></td>
                         <td><a href="lists-photo-<?php echo encode($row->id)?>" class="btn btn-default"><i class="fa fa-file-photo-o"></i> View</a></td>
                        <td><span class="cp change_status" title="<?php echo ($row->status==1)?"Click to make inactive":"Click to make active";?>" data-id='<?php echo $row->id?>'><?php echo ($row->status==1)?"Active":"Inactive";?></span></td>
                        <td><a href="view-<?php echo $module; ?>-<?php echo encode($row->id)?>"><span class="glyphicon glyphicon-eye-open"></span></a>&nbsp;<a href="form-<?php echo $module; ?>-<?php echo encode($artist)?>-<?php echo encode($row->id);?>"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;
			 
             <a href="page/mod_<?php echo $module; ?>/action.php?aid=<?php echo encode($row->id);?>&action=delete" onclick="return confirm('Are you sure you want to delete this row!!');" title="Delete"><span class="glyphicon glyphicon-trash"></span></a> </td>
                      </tr>
                      <?php $sn++;}
						   }else{
							   echo "No Record in Table";
						   }
					  ?>
                    </tbody>
                  </table>
</div></div></div></div></div>
<script type="text/javascript" charset="utf-8" id="init-code">
$(function(){

$('#example').dataTable({
        "sPaginationType": "full_numbers"
        });
      $('.tool_tip').tooltip({animation:true,placement:'right'});
      $(document).on('click','.change_status',function(){
       var id  =  $(this).data('id');
         var _this  =  $(this);
     $.post(admin_url+'page/mod_gallery/ajax.php',{id:id,mode:'change_status'},function(data){   
           if(data.result=='true'){
            _this.html(data.status);
            _this.attr('title',data.title);
            $('#message').show('slow')
               .addClass('alert alert-success alert-dark')
               .html('<button class="close" type="button" data-dismiss="alert">×</button>Status has been changed!')
               .delay(3000)
               .fadeOut('slow');
         }
       },'json');
    });
});
</script>
