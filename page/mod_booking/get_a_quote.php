<?php
ob_start();
if(defined('HOMEPAGE')){
?>
<!-- <div class="col-md-9 animated fadeInLeft">
   <span>Emergency Assistance Services in Nepal</span>
   <p>We are in the business of providing an honest and transparent service to support tourism in Nepal and securing it for the future.Nepal Assistance provides a 24 hour emergency service, everyday of the year, ensuring the best outcome for travellers.</p>
</div>            
<div class="col-md-3 btn-buy animated fadeInRight">
<a class="btn-u btn-u-lg" href=""><i class="fa fa-cloud-download"></i> Read More</a>
</div> -->
  <span>Get a Quote</span>
  <form action="<?php echo base_url('get_a_quote');?>" method="post" class="sky-form" name="searchForm" id="searchForm" style="border:none;" onsubmit="return checkGetaQuote();">
  <div class="col-md-2 animated fadeInLeft">   
       <div class="input-group">
            <select name="type_of_plan" id="type_of_plan" class="form-control required get_a_quote_input">
              <option value="">Type of Plan</option>   
              <option value="Individual">Individual</option> 
              <option value="Family">Family</option> 
              <option value="Student">Student</option>            
            </select>
          </div>
  </div><div class="col-md-2 animated fadeInLeft"> 
        <div class="input-group">
            <select name="term_plan" id="term_plan" class="form-control required get_a_quote_input">
              <option value="">Term</option>
              <option value="Annual Plan">Annual Plan</option>
              <option value="Short Term">Short Term</option>              
            </select>
          </div> 
  </div><div class="col-md-3 animated fadeInLeft">        
        <div class="input-group">
            <select name="max_days_of_plan" id="max_days_of_plan" class="form-control required get_a_quote_input">
              <option value="">Maximum Days of Trips</option>
              <?php $arrs =  array('15'=>'15',
                                   '30'=>'30',
                                   '45'=>'45',
                                   '60'=>'60',
                                   '90'=>'90',
                                   '180'=>'180',
                                   '365'=>'365'
                                   );
               foreach($arrs as $v){?> 
              <option value="<?php echo $v?> Days"><?php echo $v?> Days</option>
              <?php } ?>            
            </select>
          </div>
  </div><div class="col-md-3 animated fadeInLeft">        
        <div class="input-group">
            <select name="coverage" id="coverage" class="form-control required get_a_quote_input">
              <option value="">Coverage</option>
              <option value="Medical Only">Medical Only</option>
              <option value="Medical and Security">Medical and Security</option>              
            </select>
          </div>
  </div> 
  <div class="col-md-2 animated fadeInRight">
<a class="btn-u" href="javascript:void(0);" onclick="$('#searchForm').submit();"><i class="fa fa-send"></i> Select a Plan</a>
</div>              
  </form>
<?php ob_start();?>          
<script type="text/javascript">
  function checkGetaQuote()
  { $('.get_a_quote_input').css('border','none');
    if($('#type_of_plan').val()=='')
      { $('#type_of_plan').css('border','1px solid #f00');return false;
    }
    else if($('#term_plan').val()=='')
      { $('#term_plan').css('border','1px solid #f00');return false;
    }
    else if($('#max_days_of_plan').val()=='')
      { $('#max_days_of_plan').css('border','1px solid #f00');return false;
    }
    else if($('#coverage').val()=='')
      { $('#coverage').css('border','1px solid #f00');return false;
    }
    else{ return true; }
  }
</script>            
<?php $scms['JS_CSS_IN_FOOTER'] .= ob_get_clean(); ?>

<?php
}
$cms['module:get_a_quote_home'] = ob_get_clean();

ob_start();
if(defined('CONTROLPAGE')){
?>
<div class="headline"><h2 class="heading-sm">Get a Quote</h2></div>

  <form action="<?php echo base_url('get_a_quote');?>" method="post" class="sky-form" name="searchForm" id="searchForm" style="border:none;" onsubmit="return checkGetaQuote();">
  <div class="col-md-12 animated fadeInLeft">   
       <div class="input-group">
            <select name="type_of_plan" id="type_of_plan" class="form-control required get_a_quote_input">
              <option value="">Type of Plan</option>   
              <option value="Individual">Individual</option> 
              <option value="Family">Family</option> 
              <option value="Student">Student</option>            
            </select>
          </div>
  </div>
  <div class="margin-bottom-10"></div>
  <div class="col-md-12 animated fadeInLeft"> 
        <div class="input-group">
            <select name="term_plan" id="term_plan" class="form-control required get_a_quote_input">
              <option value="">Term</option>
              <option value="Annual Plan">Annual Plan</option>
              <option value="Short Term">Short Term</option>              
            </select>
          </div> 
  </div>
<div class="margin-bottom-10"></div>
  <div class="col-md-12 animated fadeInLeft">        
        <div class="input-group">
            <select name="max_days_of_plan" id="max_days_of_plan" class="form-control required get_a_quote_input">
              <option value="">Maximum Days of Trips</option>
              <?php $arrs =  array('15'=>'15',
                                   '30'=>'30',
                                   '45'=>'45',
                                   '60'=>'60',
                                   '90'=>'90',
                                   '180'=>'180',
                                   '365'=>'365'
                                   );
               foreach($arrs as $v){?> 
              <option value="<?php echo $v?> Days"><?php echo $v?> Days</option>
              <?php } ?>            
            </select>
          </div>
  </div>
  <div class="margin-bottom-10"></div>
  <div class="col-md-12 animated fadeInLeft">        
        <div class="input-group">
            <select name="coverage" id="coverage" class="form-control required get_a_quote_input">
              <option value="">Coverage</option>
              <option value="Medical Only">Medical Only</option>
              <option value="Medical and Security">Medical and Security</option>              
            </select>
          </div>
  </div>
  <div class="margin-bottom-10"></div> 
  <div class="col-md-12 animated fadeInRight">
<a class="btn-u" href="javascript:void(0);" onclick="$('#searchForm').submit();"><i class="fa fa-send"></i> Select a Plan</a>
</div>  
<div class="margin-bottom-35"></div>      
  </form>
<?php ob_start();?>          
<script type="text/javascript">
  function checkGetaQuote()
  { $('.get_a_quote_input').css('border','none');
    if($('#type_of_plan').val()=='')
      { $('#type_of_plan').css('border','1px solid #f00');return false;
    }
    else if($('#term_plan').val()=='')
      { $('#term_plan').css('border','1px solid #f00');return false;
    }
    else if($('#max_days_of_plan').val()=='')
      { $('#max_days_of_plan').css('border','1px solid #f00');return false;
    }
    else if($('#coverage').val()=='')
      { $('#coverage').css('border','1px solid #f00');return false;
    }
    else{ return true; }
  }
</script>

<?php $scms['JS_CSS_IN_FOOTER'] .= ob_get_clean(); ?>
<?php
}
$cms['module:get_a_quote_inner'] = ob_get_clean();

ob_start();
if(defined('GETAQUOTE')){
?>
<!--=== Breadcrumbs v3 ===-->
	<div class="breadcrumbs-v3 img-v3 text-center">
		<div class="container">
			<h1>Get a Quote</h1>
			<p>Please ask about us</p>
		</div>
		<!--/end container--> 
	</div>
	<!--=== End Breadcrumbs v3 ===--> 

<!--=== Content Part ===-->
<div class="container content">
  <div class="row magazine-page">
    <!-- Begin Content -->
    <div class="col-md-9">      
        
<div class="headline">
<h2 class="heading-sm">Get a Quote</h2>
</div>
        <form action="<?php echo base_url('get_a_quote');?>" method="post" class="sky-form form-horizontal" name="searchFormQuote" id="searchFormQuote" style="border:none;">
        <h3>Select a Plan</h3>
  <div class="col-md-3 animated fadeInLeft">   
       <div class="input-group">
            <select name="type_of_plan" id="type_of_plan" class="form-control required get_a_quote_input">
              <option value="">Type of Plan</option>   
              <option value="Individual" <?php echo (isset($_POST['type_of_plan']) and $_POST['type_of_plan']=='Individual') ? "selected":"";?> >Individual</option> 
              <option value="Family" <?php echo (isset($_POST['type_of_plan']) and $_POST['type_of_plan']=='Family') ? "selected":"";?> >Family</option> 
              <option value="Student" <?php echo (isset($_POST['type_of_plan']) and $_POST['type_of_plan']=='Student') ? "selected":"";?> >Student</option>            
            </select>
          </div>
  </div>
  <div class="col-md-2 animated fadeInLeft"> 
        <div class="input-group">
            <select name="term_plan" id="term_plan" class="form-control required get_a_quote_input">
              <option value="">Term</option>
              <option value="Annual Plan" <?php echo (isset($_POST['term_plan']) and $_POST['term_plan']=='Annual Plan') ? "selected":"";?> >Annual Plan</option>
              <option value="Short Term" <?php echo (isset($_POST['term_plan']) and $_POST['term_plan']=='Short Term') ? "selected":"";?> >Short Term</option>              
            </select>
          </div> 
  </div>
  <div class="col-md-3 animated fadeInLeft">        
        <div class="input-group">
            <select name="max_days_of_plan" id="max_days_of_plan" class="form-control required get_a_quote_input">
              <option value="">Max. Days of Trips</option>
              <?php $arrs =  array('15'=>'15',
                                   '30'=>'30',
                                   '45'=>'45',
                                   '60'=>'60',
                                   '90'=>'90',
                                   '180'=>'180',
                                   '365'=>'365'
                                   );
               foreach($arrs as $v){?> 
              <option value="<?php echo $v?> Days" <?php echo (isset($_POST['max_days_of_plan']) and $_POST['max_days_of_plan']==$v.' Days') ? "selected":"";?>  ><?php echo $v?> Days</option>
              <?php } ?>             
            </select>
          </div>
  </div>
  <div class="col-md-2 animated fadeInLeft">        
        <div class="input-group">
            <select name="coverage" id="coverage" class="form-control required get_a_quote_input">
              <option value="">Coverage</option>
              <option value="Medical Only" <?php echo (isset($_POST['coverage']) and $_POST['coverage']=='Medical Only') ? "selected":"";?> >Medical Only</option>
              <option value="Medical and Security" <?php echo (isset($_POST['coverage']) and $_POST['coverage']=='Medical and Security') ? "selected":"";?> >Medical and Security</option>              
            </select>
          </div>
  </div>
  
  <div class="col-md-2 animated fadeInLeft"> 
        <div class="input-group">
            <select name="term_year" id="term_year" class="form-control required get_a_quote_input">
              <option value="">Year</option>
              <option value="Annual Plan" <?php echo (isset($_POST['term_plan']) and $_POST['term_plan']=='Annual Plan') ? "selected":"";?> >1 Year</option>
              <option value="Short Term" <?php echo (isset($_POST['term_plan']) and $_POST['term_plan']=='Short Term') ? "selected":"";?> >2 Year</option>              
            </select>
          </div> 
  </div>

  <div class="margin-bottom-40"></div>
  <h3>Members Details</h3>
  
  <div class="col-md-6 animated fadeInLeft">
         <div class="form-group">
          <label class="col-lg-4 control-label" for="first_name">First Name</label>
          <div class="col-lg-8">
              <input type="text" placeholder="Firstname" id="firstname" name="firstname" class="form-control required">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-4 control-label" for="middlename">Middle Name</label>
          <div class="col-lg-8">
              <input type="text" placeholder="Middle Name" id="middlename" name="middlename" class="form-control">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-4 control-label" for="lastname">Last Name</label>
          <div class="col-lg-8">
              <input type="text" placeholder="Last Name" id="lastname" name="lastname" class="form-control required">
          </div>
        </div> 

        <div class="form-group">
          <label class="col-lg-4 control-label" for="gender">Gender</label>
          <div class="col-lg-8 checkbox-inline">
              <input type="radio" name="gender" value="male" checked="checked"> Male &nbsp;
              <input type="radio" name="gender" value="female"> Female &nbsp;
          </div>
        </div> 

        <div class="form-group">
          <label class="col-lg-4 control-label" for="email">Email</label>
          <div class="col-lg-8">
              <input type="email" placeholder="Email" id="email" name="email" class="form-control email required">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-4 control-label" for="Contact No">Contact No</label>
          <div class="col-lg-8">
              <input type="text" placeholder="Contact No" id="contact_no" name="contact_no" class="form-control required">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-4 control-label" for="Birthdate">Birth Date</label>
          <div class="col-lg-8">
              <input type="text" placeholder="Birth Date" id="birthdate" name="birthdate" class="form-control required datepicker">
          </div>
        </div>

  </div>

  <div class="col-md-6 animated fadeInLeft">        
        <div class="form-group">
          <label class="col-lg-4 control-label" for="Home_Address">Street Address</label>
          <div class="col-lg-8">
              <input type="text" placeholder="Street" id="street" name="street" class="form-control required">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-4 control-label" for="Home_Address">Street Address 2</label>
          <div class="col-lg-8">
              <input type="text" placeholder="Street" id="street2" name="street2" class="form-control required">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-4 control-label" for="City">City</label>
          <div class="col-lg-8">
              <input type="text" placeholder="City" id="city" name="city" class="form-control required">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-4 control-label" for="state_province">State/Province</label>
          <div class="col-lg-8">
              <input type="text" placeholder="State/Province" id="state_province" name="state_province" class="form-control required">
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-4 control-label" for="Country">Country</label>
          <div class="col-lg-8">
              <input type="text" placeholder="Country" id="country" name="country" class="form-control required">
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-4 control-label" for="Zip Code">Zip Code</label>
          <div class="col-lg-8">
              <input type="text" placeholder="Zip Code" id="zip_code" name="zip_code" class="form-control required">
          </div>
        </div>
  </div>

  <div class="margin-bottom-60"></div>

    <div class="col-md-12 animated fadeInLeft"> 
        <div class="form-group">
              <div class="col-lg-3">.</div>
              <div class="col-lg-3">First Name</div>
              <div class="col-lg-3">Last Name</div>
              <div class="col-lg-3">Birth Date</div>
        </div>
        <div class="form-group">
              <div class="col-lg-3">Spouse</div>
              <div class="col-lg-3"><input type="text" placeholder="Firstname" name="first_name[]" class="form-control"></div>
              <div class="col-lg-3"><input type="text" placeholder="Lastname" name="last_name[]" class="form-control"></div>
              <div class="col-lg-3"><input type="text" placeholder="Birth Date" name="birth_date[]" class="form-control datepicker"></div>
        </div>
        <?php for($i=1; $i<=4; $i++){?>
        <div class="form-group">
              <div class="col-lg-3">Dependent <?php echo $i?></div>
              <div class="col-lg-3"><input type="text" placeholder="Firstname" name="first_name[]" class="form-control"></div>
              <div class="col-lg-3"><input type="text" placeholder="Lastname" name="last_name[]" class="form-control"></div>
              <div class="col-lg-3"><input type="text" placeholder="Birth Date" name="birth_date[]" class="form-control datepicker"></div>
        </div>
         <?php } ?>
    </div>
  
  <div class="col-md-12 animated fadeInLeft"> 
        <div class="form-group"> 
        <div class="col-lg-3">&nbsp;</div>
        <div class="col-lg-9">
        <button type='submit' name='submitBtn' id="submitBtn" value="1" class="btn-u" href="javascript:void(0);"><i class="fa fa-send"></i> Submit</button>
        </div>  </div>     
  </div> 
  </form>
<?php
ob_start();
?>
<script type="text/javascript">
 jQuery(document).ready(function() {
  var addEditForm  =   jQuery("#searchFormQuote"); 
  var validator =  addEditForm.validate({
        rules: {
            type_of_plan: {
                required: true
            }
        },
        messages:{  
            type_of_plan: {
                required: "Please select the type of plan"
            }                    
        },         
      submitHandler: function(form) { 
                 var params  =    $(form).serialize();      
                 jQuery.ajax({
                        url: base_url + 'page/mod_booking/ajax.php',
                        method: 'POST',
                        dataType: 'json',
                        data: params+'&mode=get_a_quote',
                        error: function()
                        {  $(form).append('<div class="alert alert-danger">An error occoured!</div>');
                           $('.alert').show().delay(5000).fadeOut('slow').remove();
                        },
                        success: function(response)
                        {   $('.alert').remove(); 
                               if(response.success==true){
                               $(form).append('<div class="alert alert-success">'+response.message+'</div>');
                               $('.alert').show().delay(3000).fadeOut('slow');
                                 addEditForm[0].reset();
                                  /*setTimeout(function()
                                  { var redirect_url = base_url;              
                                    if(response.redirect_url && response.redirect_url.length)
                                    redirect_url = response.redirect_url; 
                                    window.location.href = redirect_url;                           
                                  }, 3000);*/                                  
                              }
                              else if(response.success==false && response.item_exists==true){
                                $(form).append('<div class="alert alert-danger">'+response.message+'</div>');
                                $('.alert').show().delay(5000).fadeOut('slow');
                              } 
                              else {
                                $(form).append('<div class="alert alert-danger">'+response.message+'</div>');
                                $('.alert').show().delay(5000).fadeOut('slow');
                              } 
                        }
                  });
           }            
      });   

    $('.datepicker').datepicker({
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'yy-mm-dd',
        yearRange: "-80:+0"
        /*minDate: '0'*/
      });
});
</script>
<?php $scms['JS_CSS_IN_FOOTER'] .= ob_get_clean(); ?>


       <div class="margin-bottom-60"></div>    
    </div>
    <!-- End Content -->
    <!-- Begin Sidebar -->
    <div class="col-md-3">
        <?php 
$result =  $funArticleObj->latest_article(5);
$num    =  $funObj->num_rows($result);  
if($num>0){  $i=1;
  echo '<div class="headline"><h2 class="heading-sm">Archives</h2></div>';
  while($row = $funObj->result($result)){ 
    $content_id   = $row->id;
    $row_item  = $funArticleObj->file_items($content_id,'image','asc',1);
    $img = "";
    if(!empty($row_item)){  $img     = $row_item->item_name;   }
    if(file_exists(FCPATH.'uploads/images/article/'.$img) and !empty($img)){
        $img  =  base_url('uploads/images/article/'.$img);  
       }
       if(file_exists(FCPATH.'uploads/images/article/'.$img) and !empty($img)){
        $img  =  base_url('uploads/images/article/'.$img);  
       }
       $created_at = $row->created_at;
    ?>
      <!-- Latest News -->
      <div class="margin-bottom-40">
        <div class="magazine-mini-news">
          <h3><a href="<?php echo base_url('post/'.$row->slug)?>"><?=mb_substr($row->article_title,0,470);?></a></h3>
          <div class="post-author">
            <strong><?php echo $row->postedby?></strong> 
            <span>/ <?php echo date("F d,Y",strtotime($created_at));?></span>
          </div>
          <p><?=mb_substr( $row->short_description,0,100);?>...<a href="<?php echo base_url('post/'.$row->slug)?>">More..</a></p>
        </div>
        <hr class="hr-md">
      </div>
      <!-- End Latest News -->
<?php } 
}
        //echo $cms['module:inner_articles']?>
    </div>
    <!-- End Sidebar -->
  </div>
</div><!--/container-->     
<!-- End Content Part -->
<?php
}
$cms['module:get_a_quote'] = ob_get_clean();
?>