<?php 
if(isset($contentPage) and $contentPage=='courses'){
ob_start(); 
 ?>
 <!-- Panel and Heading -->
                    <div class="panel panel-profile panel-sea">
                        <div class="panel-heading overflow-h">
                            <h2 class="panel-title heading-sm pull-left"><i class="fa fa-tasks"></i>Courses</h2>
                            <a class="btn-u btn-brd btn-brd-hover btn-u-dark btn-u-xs pull-right" href="javascript:void(0);"  data-target="#add_edit_form" data-toggle="modal">Add New</a>
                        </div>
                        <div class="panel-body">
                                           <div class="row">
                                               <div class="col-sm-12"> 
<div id="message"></div>
<!-- Begin Table Search v2 -->
                    <div class="table-search-v2">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped"  width="99.5%" id="example" >
                                <thead>
                                    <tr>
                                        <th style="min-width:7%">S.N</th>
                                        <th>Course Name</th>
                                        <th>Added Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
$profile_id  =  $funUserObj->current_user();
$row_user    =  $funUserObj->find_by_id($profile_id); 
$result  =  $funCouresObj->dataList($row_user->org_id);
if($db->num_rows($result)>0){ ?>
    <?php  $sn=1; while($row =  $db->result($result)){ ?>
                                    <tr>
                                    <td><?php echo $sn?></td>
                                        <td>
                                            <?php echo ucwords($row->course_name);?>
                                        </td>
                                        <td class="td-width">
                                            <?php echo date("F d,Y",strtotime($row->created_at))?>
                                        </td>
                                        <td>
                                          <span class="active_inactive" data-id="<?php echo $row->id;?>"><?php echo ($row->status=='1')?"Active":"Inactive";?></span>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0);"  data-target="#add_edit_form" data-toggle="modal" onclick="addEditId('<?php echo $row->id;?>');"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
                                            <a href="javascript:void(0);" data-id="<?php echo $row->id;?>" class="delete_course"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php $sn++; }}?>
                                </tbody>
                            </table>
                        </div>    
                    </div>
                    <!-- End Table Search v2 -->
                                               </div>  
                                           </div>
                                       </div>        
                    </div>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="add_edit_form" class="modal fade" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 id="myModalLabel4" class="modal-title">Courses Management</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                       <div id="message_div"></div>
<form class="sky-form" id="course_form" name="course_form" action="#" method="post">              
            <fieldset>
                <section>
                    <label class="input">
                        <input type="text" name="course_name" id="course_name" class="required" placeholder="Course Name">
                    </label>
                </section>
                <section>
                    <div class="inline-group">
                        <label class="radio"><input type="radio" name="status" id="status_active" value="1" checked=""><i class="rounded-x"></i>Active</label>
                        <label class="radio"><input type="radio" name="status" id="status_inactive" value="0"><i class="rounded-x"></i>Inactive</label>
                     </div>
                </section>     
            </fieldset>
            <input type="hidden" name="mode" value="save_course_form">
            <input type="hidden" name="org_id" id="org_id" value="<?php echo $row_user->org_id;?>">         
            <input type="hidden" name="hidden_id" id="hidden_id" value="0">
        </form>
                    </div>
                   
                </div>
            </div>
            <div class="modal-footer">
               <button class="btn-u btn-u-primary" type="button" id="submitBtn" name="submitBtn">Save</button>
                <button data-dismiss="modal" class="btn-u btn-u-default" type="button">Close</button>
            </div>
        </div>
    </div>
</div>
                    
<?php ob_start();?>
<script type="text/javascript" src="<?php echo base_url('applications/datatable/jquery.dataTables.min.js');?>"></script>
<script type="text/javascript" charset="utf-8" id="init-code">
$(function(){
  var oTable  = $('#example').dataTable({
        "sPaginationType": "full_numbers"
    });
   $(function(){                         
        if($('#course_form').length>0)
        $('#course_form').validate(); 
        $('#submitBtn').on('click',function(){
            if($('#course_form').valid()==true){
                 var params  =  $('#course_form').serialize();
                 $.post(base_url+'page/mod_courses/ajax.php',params,function(js){
                        if(js.result=='true'){
                            $('#message_div').html(js.msg).addClass('alert alert-success');
                            window.location.href=window.location.href;
                        }
                        else{
                            $('#message_div').html(js.msg).addClass('alert alert-warning');
                        }
                 },'json');
            }
        });
        $(".active_inactive").on('click',function(){
                var _this  = $(this);
                 var id = _this.data('id');   
                 $.post(base_url+'page/mod_courses/ajax.php',{id:id,mode:'change_status'},function(js){
                            if(js.result=='true'){
                                _this.html(js.content_text);
                                $('#message').html(js.message).addClass('alert alert-success').delay(5000).fadeOut('slow');
                            }
                 },'json');             
            });
        $(".delete_course").on('click',function(){
            if(confirm('Are you sure, you want to delete this course?')){
                var _this  = $(this);
                 var id = _this.data('id');   
                 $.post(base_url+'page/mod_courses/ajax.php',{id:id,mode:'delete_course'},function(js){
                            if(js.result=='true'){
                                _this.parent().parent().remove();
                                $('#message').html(js.message).addClass('alert alert-success').delay(5000).fadeOut('slow');
                            }
                 },'json');             
              }
            });
        
    });
});
function addEditId(id){
       $('#hidden_id').val(id);
       $.post(base_url+'page/mod_courses/ajax.php',{id:id,mode:'course_by_id'},function(js){
                    if(js.result=='true'){ 
                       $('#course_name').val(js.row_content.course_name);
                       if(js.row_content['status']=='1'){
                          $('#status_active').attr('checked','checked'); 
                       }else{
                          $('#status_inactive').attr('checked','checked'); 
                       }
                    }
             },'json');
   }
</script>
<?php $scms['JS_CSS_IN_FOOTER'] .= ob_get_clean(); ?>
<?php 
$cms['module:user_courses'] = ob_get_clean();
}
?>