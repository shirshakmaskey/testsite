<?php
$result  =  $funArtistObj->artistAll();
?>
<div class="page-header">
      
      <div class="row">
        <!-- Page header, center on small screens -->
        <h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-tasks page-header-icon"></i>&nbsp;&nbsp;Artist Management</h1>

        <div class="col-xs-12 col-sm-8">
          <div class="row">
            <hr class="visible-xs no-grid-gutter-h">
            <!-- "Create project" button, width=auto on desktops -->
            <div class="pull-right col-xs-12 col-sm-auto"><a style="width: 100%;" class="btn btn-primary btn-labeled" href="form-<?php echo $module; ?>"><span class="btn-label icon fa fa-plus"></span>Add</a></div>

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
                        <th>Artist</th>
                        <th>Image</th>
                        <th>Album</th>
                        <th>Gallery</th>
                        <th>Songs/Videos/Lyrics</th>
                        <th>Top Artist</th>
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
                        <td><?php echo @$row->artist_name;?><br />
                        <?php echo $row->address;?>, <?php echo $row->country;?><br />
                        <?php echo $row->gender;?><br />
                       <?php echo @$row->contact_no;?><br />
					   <?php echo $row->email;?>
                        </td>
                        <td><?php $img = @$row->profile_image;
								 if(file_exists(FCPATH."uploads/images/artist/".$img) and !empty($img)){?>
								 <img src="<?php echo base_url("uploads/images/artist/".$img);?>" width="80" />
								 <?php }?>
                        </td> 
                         <td><a href="lists-album-<?php echo encode($row->id)?>" class="btn btn-default"><i class="fa fa-copy"></i> Album</a></td>
                        <td><a href="lists-gallery-<?php echo encode($row->id)?>" class="btn btn-default"><i class="fa fa-file-photo-o"></i> Gallery</a></td>
                        <td><a href="lists-svl-<?php echo encode($row->id)?>" class="btn btn-default"><i class="fa fa-music"></i> Songs</a></td>
                       <td>
                        <span class="cp" id="topArtist<?php echo $row->id; ?>" onclick="topArtist('<?php echo $row->id; ?>');"  ><?=($row->top_artist==1)?"Yes":"No";?></span></td> 
                        <td>
                        <span class="cp" id="statusChange<?php echo $row->id; ?>" onclick="changeStatus('<?php echo $row->id; ?>');"  ><?=($row->status==1)?"Published":"Un-published";?></span></td>
                        <td><a href="view-<?php echo $module; ?>-<?php echo encode($row->id)?>"><span class="glyphicon glyphicon-eye-open"></span></a>&nbsp;<a href="form-<?php echo $module?>-<?php echo encode($row->id);?>"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;
			              
                    <a href="page/mod_<?php echo $module; ?>/action.php?aid=<?php echo encode($row->id);?>&action=delete" onclick="return confirm('Are you sure you want to delete this row!!');" title="Delete"><span class="glyphicon glyphicon-trash"></span></a> 
                    </td>
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
    $(document).ready(function() {
      $('#example').dataTable({
        "sPaginationType": "full_numbers"
        });
      $('.tool_tip').tooltip({animation:true,placement:'right'});
      });
    function topArtist(id)
    {  
      $.post(admin_url+'page/mod_artist/ajax.php',{id:id,mode:'top_artist'},                    function(data){
          $("#topArtist"+id).html(data.status);
          $('#message').show('slow')
             .addClass('alert alert-success alert-dark')
             .html('<button class="close" type="button" data-dismiss="alert">×</button>Status has been changed!')
             .delay(3000)
             .fadeOut('slow');
        },'json');
    }
      function changeStatus(id)
      {  
        $.post(admin_url+'page/mod_artist/ajax.php',{id:id,mode:'change_status'},                    function(data){
            $("#statusChange"+id).html(data.status);
            $('#message').show('slow')
               .addClass('alert alert-success alert-dark')
               .html('<button class="close" type="button" data-dismiss="alert">×</button>Status has been changed!')
               .delay(3000)
               .fadeOut('slow');
          },'json');
      }
</script>
