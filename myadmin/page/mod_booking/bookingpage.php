<?php
if(!isset($_SESSION['user_agent'])){echo "<script>window.location.href='http://google.com'</script>";}
?>
<?php
$pages   =        $funBookingObj -> bookingPage();
?>
<script language="javascript">
function replytoAll()
{
   if(validcheck())
   {
    $("#replyform").submit(); 
    }
	else
	{
	alert('Please select atleast one');	
	}
}
</script>

<div class="page-header">
  <div class="row"> 
    <!-- Page header, center on small screens -->
    <h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-tasks page-header-icon"></i>&nbsp;&nbsp;Manage Booking Order</h1>
    <div class="col-xs-12 col-sm-8">
      <div class="row">
        <hr class="visible-xs no-grid-gutter-h">
        <!-- "Create project" button, width=auto on desktops -->
        <div class="pull-right col-xs-12 col-sm-auto"> <a href="page/mod_booking/exportToCsv.php" title="List Content" style="width: 100%;" class="btn btn-primary btn-labeled" ><span class="btn-label icon fa fa-arrow-up"></span> Export to CSV</a> <a style="width: 100%;" class="btn btn-primary btn-labeled" href="javascript:void(0);" onclick="replytoAll();"><span class="btn-label icon fa fa-arrow-up"></span>Reply to selected</a> </div>
      </div>
    </div>
  </div>
</div>
<!--page-header-->
<div class="row">
<div class="col-sm-12">
<div class="panel">
<div class="panel-body">
<div class="table-primary">
<form id="replyform" action="index.php?_page=replyBookingpage&action=add&mod=booking" method="post" >
  <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="table_module_display" width="100%">
    <?php if($pages[0]>0){?>
    <thead>
      <tr>
        <th><input type="checkbox" name="parent_checkbox" id="parent_checkbox"   onclick="$('input[name*=\'selected\']').prop('checked', this.checked);"/></th>
        <th>NAME</th>
        <th>BOOKING DATE</th>
        <th>EMAIL</th>
        <th>COUNTRY</th>
        <th>PHONE</th>
        <th>ACTION</th>
      </tr>
    </thead>
    <tbody>
      <?php
	$altCol=0;
	//foreach($recordStart as $rows)
	 $resultExec    =    $funBookingObj ->exec($pages[1]);
	 while($rows     =    $funBookingObj ->fetch_array($resultExec))
	{
$rowCountry = $funBookingObj->CountrySel($rows['country']);     
$country  =  isset($rowCountry->Country)?$rowCountry->Country:'';
	?>
      <tr <?php echo (($altCol%2)>0)?"class='even'":"class='odd'";?>>
        <td  width="5%" align="center"><input type="checkbox" name="selected[]"  id="selected_<?php echo $altCol;?>" value="<?php echo $rows['id']?>"></td>
        <td><?php echo ucwords($rows["fullname"]);?></td>
        <td><?php echo date("F d,Y",strtotime($rows['booked_date']))?></td>
        <td><?php echo $rows["email"];?></td>
        <td><?php echo $country;?></td>
        <td><?php echo $rows["phone"];?>,<?php echo $rows["mobile"];?></td>
        <td><a href="index.php?_page=viewbookingpage&aid=<?php echo $rows["id"]?>&action=view&mod=booking"  title="View" class="btn btn-default"><span class="glyphicon glyphicon-eye-open"></span></a>&nbsp;&nbsp;<a href="page/mod_booking/getPdf.php?aid=<?php echo $rows["id"]?>" title="Get Pdf" target="_blank" class="btn btn-default"><span class="fa  fa-download"></span></a> &nbsp;&nbsp;<a href="index.php?_page=replyBookingpage&aid=<?php echo $rows["id"]?>&action=add&mod=booking"  title="Reply" class="btn btn-default" ><span class="fa fa-external-link-square"></span></a>&nbsp;&nbsp; <a href="page/mod_booking/actBookingpage.php?aid=<?php echo $rows["id"]?>&action=delete" onclick="return confirm('Are you sure you want to delete this row!!');" title="Delete"  class="btn btn-default"><span class="glyphicon glyphicon-trash"></span></a></td>
      </tr>
     <?php $altCol++;}//while close 		 
		   }else{
			echo '<tr><td>No record found!</td></tr>';   
		   }?>
		</tbody>   
</table>
  <input type="hidden" value="<?php echo $altCol; ?>" id="countCheck" name="countCheck">
</form>
<script type="text/javascript" charset="utf-8" id="init-code">
    
		$(document).ready(function() {				
				var oTable =  $('#table_module_display').dataTable( {
					"sPaginationType": "full_numbers",
					"bFilter": true,
					"bLengthChange": true,
					"iDisplayLength": 10
					,"fnDrawCallback": function (oSettings) {
							  var pgr = $(oSettings.nTableWrapper).find('.dataTables_paginate')
							  if (oSettings._iDisplayLength > oSettings.fnRecordsDisplay()) {
								pgr.hide();
							  } else {
								pgr.show()
							  }
	/* auto change settings if it has fewer than iDisplayLength rows */
        var oListSettings = this.fnSettings();
        var wrapper = this.parent();         
        if (oListSettings.fnRecordsTotal() < 25) {
            //$('.dataTables_paginate', wrapper).hide();
            //$('.dataTables_filter', wrapper).hide();
            $('.dataTables_info', wrapper).hide();
            //$('.dataTables_length', wrapper).hide();
        }						  
							  
							}
				});
				//oTable.fnSetColumnVis( 0,false );
								
		$('.tool_tip').tooltip({animation:true,placement:'right'});
			});
</script>
</div></div></div></div></div>
