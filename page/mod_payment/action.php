<?php
if(@$mode=='payment_section'):   
   	if(isset($_POST['submitBtn'])){   $post = clean_post();
 		foreach($post as $key=>$val){$$key=$val;}
    $grand_total  =   0;
    if(count($_POST['service'])>0){
        foreach($_POST['service'] as $key=>$val){
            $id  =  $val;
            $results =  $db->query("select * from tbl_product_price where id='$id'");
            $row=  $db->result($results);
            $grand_total  =  $grand_total + $row->price;
        }   
    }else{
      redirect(base_url('payment/paynow'));
      exit();
    }
 		 $token_keys   = randomkeys(6);
     $data=array('fullname'=>$fullname,                   
                 'address'=>$address, 
                 'contact_no'=>$contact_no,              
                 'email'=>$email_address,
                 'grand_total'=>$grand_total,
                 'delivery_address_detail'=>$delivery_address_detail,
                 'has_payment'=>'0',
                 'payment_method'=>$payment_method,
                 'created_at'=>fulldate(),
                 'status'=>'pending',
                 'token_keys'=>$token_keys
                 );

         $db->insert('tbl_payment',$data);
         $payment_id =   $db->insert_id();
      if(count($_POST['service'])>0){
          foreach($_POST['service'] as $key=>$val){
                $id      =  $val;
                $results =  $db->query("select * from tbl_product_price where id='$id'");
                $row     =  $db->result($results);
                $item_name   =  $row->title;
                $price   =  $row->price;

          $data   =  array('payment_id'=>$payment_id,                   
                           'item'     => $id, 
                           'item_name'=> $item_name, 
                           'qty'      => '1',              
                           'price'    => $price
                           );
               $db->insert('tbl_payment_child',$data);
          }   
      }

 echo '<form action="'.base_url('payments.php').'" method="post"  id="paylater_form" name="paylater_form">
       <input type="hidden" name="payment_method" id="payment_method" value="'.$payment_method.'" />
       <input type="hidden" name="token_keys" id="token_keys" value="'.$token_keys.'" />
       </form>';
      echo "<script>document.getElementById('paylater_form').submit();</script>"; 		
   	}   	
endif;
 
?>