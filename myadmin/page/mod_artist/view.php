 <?php
include("page/setAndCheckAll.php");
if(isset($_REQUEST['aid']))
{$id  =   isset($_REQUEST['aid'])?decode($_REQUEST['aid']):0; 
    $row = $funArtistObj->artist_detail($id); 
?>
<div class="row">
  <div class="col-sm-12">
    <div class="panel">
    
<div class="panel-heading"> 
  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="" >
    <tr >
      <td><span class="panel-title">Details [ <?php echo @$row->artist_name?> ]</span>
        <div style="text-align:left;float:right;">
 &nbsp;&nbsp;
<a class="btn btn-primary btn-sm" href="form-<?php echo $module; ?>">
  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Artist</a> &nbsp;&nbsp;        
  <a class="btn btn-primary btn-sm" href="form-<?php echo $module?>-<?php echo encode($id);?>">Update Artist</a>

  &nbsp;&nbsp;
  <button type="button" class="btn btn-primary btn-sm" id="cancel" name="cancel" value="Cancel" onclick="window.location.href='lists-<?php echo $module; ?>';">Artist Management</button>


        </div>
        <div style="clear:both;"> </div></td>
    </tr>
  </table>
    
</div>
<div class="panel-body">    
  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="table table-bordered">
                <tbody>
                  <tr>
                    <td>Artist Name</td>
                    <td><?php echo isset($row->artist_name)?$row->artist_name:''?></td>
                  </tr>
                  <tr>
                    <td>Address</td>
                    <td><?php echo isset($row->address)?$row->address:''?></td>
                  </tr>
                  <tr>
                    <td>Country</td>
                    <td><?php echo isset($row->country)?$row->country:''?></td>
                  </tr>
                  <tr>
                    <td>Profile Image</td>
                    <td><?php $img = @$row->profile_image;
								 if(file_exists(FCPATH."uploads/images/artist/".$img) and !empty($img)){?>
								 <img src="<?php echo base_url("uploads/images/artist/".$img);?>" width="80" />
								 <?php }?>
                    </td> 
                  </tr>
                  
                    <tr>
                    <td>Email</td>
                    <td><?php echo isset($row->email)?$row->email:''?></td>
                  </tr>
                  <tr>
                    <td>Password</td>
                    <td><?php echo isset($row->password)?$row->password:''?></td>
                  </tr>
                  <tr>
                    <td>Gender</td>
                    <td><?php echo ($row->gender=='male')?'Male':'Female'?></td>
                  </tr>
                  <tr>
                    <td>Contact No</td>
                    <td><?php echo isset($row->contact_no)?$row->contact_no:''?></td>
                  </tr>
                  
                  <tr>
                    <td>Biography</td>
                    <td><?php echo isset($row->biography)?$row->biography:''?></td>
                  </tr>
                  <tr>
                    <td>Created on</td>
                    <td><?php echo isset($row->created_on)?$row->created_on:''?></td>
                  </tr>
                  <tr>
                    <td>Created By</td>
                    <td><?php 
						  $created_by  = $row->created_by;
						  $row_user  = $funUserObj->userSel($created_by);
						  echo $row_user->fullname;
						  ?>
                    </td>
                  </tr>
                  <tr>
                    <td>Modified on</td>
                    <td><?php echo isset($row->modified_on)?$row->modified_on:''?></td>
                  </tr>
                  <tr>
                    <td>Modified by</td>
                    <td><?php 
						  $created_by  = $row->created_by;
						  $row_user  = $funUserObj->userSel($created_by);
						  echo $row_user->fullname;
						  ?>
                    </td>
                  </tr>
                  <tr>
                    <td>Status</td>
                    <td><?php echo ($row->status=='1')?'Active':'Inactive'?></td>
                  </tr>
                </tbody>
              </table>
      </div>
    </div>
  </div>
</div>
<?php } ?>