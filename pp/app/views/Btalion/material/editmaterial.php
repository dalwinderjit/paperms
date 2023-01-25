<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>Edit Material</title>
   <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
  </head>
<body>
<!-- Preloader -->
<div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div>
<?php //echo validation_errors(); ?>
<section>
<?php $this->load->view('Btalion/html/navbar'); ?>
  <div class="mainpanel">
<?php $this->load->view('Btalion/html/headbar'); ?>
    <div class="pageheader">
      <h3> &nbsp;  &nbsp; Edit Material</h3>
    </div>

    <div class="contentpanel">
      <div class="row">
           <div class="col-md-12">        
      <?php if($this->session->flashdata('success_msg')): ?>
        <div class="alert alert-success alert-dismissible" id="warning" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Success!</strong> <?php echo $this->session->flashdata('success_msg'); ?>
</div>
      <?php  endif; ?>
                <div class="col-md-12">        
      <?php if($this->session->flashdata('error_msg')): ?>
        <div class="alert alert-warning alert-dismissible" id="warning" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Success!</strong> <?php echo $this->session->flashdata('error_msg'); ?>
</div>
      <?php  endif; ?>
<?php 
 /*Form Validation set*/
 $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
  /*----End Form Validation----*/
  
 /*Create HTML form*/
 $attributes = array(
      'name'        => 'basicForm4',
      'id'        => 'basicForm4',
      'accept-charset'  => 'utf-8',
      'autocomplete'    =>'off', 
      );
 echo form_open_multipart("", $attributes);
?>
          <div class="panel panel-default">
              <div class="panel-body">
               
			   
<?php if($mskitemlist->recived_type == 'Received'): ?>
			<input type="hidden" name="tpi" value="<?php echo $mskitemlist->recived_type;  ?>"> 
                     <div class="form-group"  id="Received11">
                  <label class="col-sm-3 control-label">Type of Item</label>
                  <div class="col-sm-9">
                  <?php $bdn = array();
                      $bdn[''] = '--Type of Item--';

                    foreach ($mskitem as  $value) {
                      if($value->item == 'Other MISC Itesm'){
                         $bdn[$value->item] = 'Other MISC Items';
                      }else{
                         $bdn[$value->item] = $value->item;
                      }
                    } 
                     ?>
                 <?php  
/*newarea Textfield*/
 echo form_dropdown('toi', $bdn, set_value('toi',$mskitemlist->typeofitem),'id="toi" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('toi');
/*----End newarea Textfield----*/
 ?>  <label for="toi" class="error"></label>
                  </div>
                </div> 
                  <div class="form-group" id="namelist">
                  <label class="col-sm-3 control-label">Name of Item</label>
                  <div class="col-sm-9">
				  
<?php $rnoi = array();
					if(null!=$this->input->post('toi')){
						$item = $this->input->post('toi');
					}else{
						$item = $mskitemlist->typeofitem;
					}
                    $rnoi[''] = '--Type of Item--';
					$listing = fetchoneinfoall('mskitems',array('item' => $item));
					//var_dump($listing);
                    foreach ($listing as  $value) {
						$rnoi[$value->name] = $value->name;
					}
/*newarea Textfield*/
 echo form_dropdown('rn', $rnoi, set_value('rn',$mskitemlist->nameofitem),'id="nameitem11" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('rn');
/*----End newarea Textfield----*/
 ?> 
                  </div></div>


                 <div class="form-group" id="Received00882">
                  <label class="col-sm-3 control-label">Add Info</label>
                  <div class="col-sm-9">
<?php
$addinfo = array('type' => 'text','name' => 'addinfo','id' => 'addinfo','class' => 'form-control','placeholder' =>'Add Info','value' => (null!=$this->input->post('addinfo'))?$this->input->post('addinfo'):$mskitemlist->infos);
echo form_input($addinfo);
echo form_error('addinfo');
?>
                    <label for="quantitys" class="error"></label>
                  </div>
                </div>


                 <div class="form-group" id="Received5">
                  <label class="col-sm-3 control-label">Category of Item</label>
                  <div class="col-sm-9">

           <?php  
$ctir = array_merge(array('' => '--Select--'),$category_of_item);
/*newarea Textfield*/
 echo form_dropdown('ctir', $ctir, set_value('ctir',$mskitemlist->catofitem),'id="ctir" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('ctir'); ?>
                    <label for="ctir" class="error"></label>
                  </div>
                </div>

                  <div class="form-group" id="Received6">
                  <label class="col-sm-3 control-label">Condition of Item</label>
                  <div class="col-sm-9">
                 <?php  
$cnir = array_merge(array('' => '--Condition of Item--'),$conditions_of_item);
/*newarea Textfield*/
 echo form_dropdown('cnir', $cnir, set_value('cnir',$mskitemlist->conofitem),'id="cnir" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('cnir');
/*----End newarea Textfield----*/
 ?>
                    <label for="cnir" class="error"></label>
                  </div>
                </div> 
				<div class="form-group" id="Received6Quantity">
                  <label class="col-sm-3 control-label">Quantity</label>
                  <div class="col-sm-9">
	<input type="text" disabled value="<?php echo $mskitemlist->recqut; ?>" class="form-control"/>
                  </div>
                </div> 
 <div class="form-group" id="condomqty" style="display: none;">
                  <label class="col-sm-3 control-label">Condemn Quantity</label>
                  <div class="col-sm-9">
<?php
$rn = array('type' => 'text','name' => 'condomqty','id' => 'rn','class' => 'form-control','placeholder' =>'Condom Quantity','value' => set_value('condomqty'));
echo form_input($rn);
echo form_error('condomqty');
?>
                    <label for="condomqty" class="error"></label>
                  </div>
                </div> 

                <div class="form-group" id="Received81">
                  <label class="col-sm-3 control-label">Quantity</label>
                  <div class="col-sm-9"><input type="checkbox" name="check" id="r" value="1" class="" <?php echo ((null!=$this->input->post('check'))?"checked":'')?>>
                    <?php  
$cnir = array_merge(array(0 => '--Quantity Type--'),$calculations);//'1' => 'Plus','2' => 'Minus');
//var_dump($cnir);
/*newarea Textfield*/
 echo form_dropdown('qlog', $cnir, set_value('qlog',$mskitemlist->conofitem),'id="qlog" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('qlog');
/*----End newarea Textfield----*/
 ?>
 <BR>
<BR>	
                    <?php
$rn = array('type' => 'text','name' => 'tqut','id' => 'tqut','class' => 'form-control','placeholder' =>'Quantity','value' => set_value('tqut'));
echo form_input($rn);
echo form_error('tqut');
?><BR>
<?php
$rn = array('type' => 'text','name' => 'quantitys','id' => 'rqt','class' => 'form-control','placeholder' =>'Quantity','value' => $mskitemlist->recqut, 'readonly' => 'readonly');
echo form_input($rn);
echo form_error('quantitys');
?>
                    <label for="quantitys" class="error"></label>
                  </div>
                </div>
                

                

                     <div class="form-group" id="Received1">
                  <label class="col-sm-3 control-label">Received Mode</label>
                  <div class="col-sm-9">
                 <?php //var_dump($mskitemlist); echo $mskitemlist->recmode;
$Receivedmode = array_merge(array('' => '--Select--'),$received_mode);
/*newarea Textfield*/
 echo form_dropdown('Receivedmode', $Receivedmode, set_value('Receivedmode',$mskitemlist->recmode),'id="Receivedmode" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('Receivedmode');
/*----End newarea Textfield----*/
 ?>
                    <label for="Receivedmode" class="error"></label>
                  </div>
                </div> 

                 <div class="form-group" id="Received100">
                  <label class="col-sm-3 control-label">Received From</label>
                  <div class="col-sm-9">
                 <?php $data = explode('&nbsp;',$mskitemlist->recfrom);
					$selected = $data[0];
					$others = (isset($data[1]))?$data[1]:'';
				 
$Receivedfrom_ = array_merge(array('' => '--Select--'), $received_from);
/*newarea Textfield*/
 echo form_dropdown('Receivedfrom', $Receivedfrom_, set_value('Receivedfrom',$selected),'id="Receivedfrom" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('Receivedfrom');
/*----End newarea Textfield----*/
 ?>
                    <label for="Receivedfrom" class="error"></label>
                  </div>
                </div> 

                  <div class="form-group" id="Receivedothers2">
                  <label class="col-sm-3 control-label">Others</label>
                  <div class="col-sm-9">
<?php
$Receivedothers = array('type' => 'text','name' => 'Receivedothers','id' => 'Receivedothers','class' => 'form-control','placeholder' =>'Others','value' => set_value('Receivedothers',$others));
echo form_input($Receivedothers);
echo form_error('Receivedothers');
?>
                    <label for="Receivedothers" class="error"></label>
                  </div>
                </div>

                   <div class="form-group" id="Received2">
                  <label class="col-sm-3 control-label">RC Number</label>
                  <div class="col-sm-9">
<?php
$rcno = array('type' => 'text','name' => 'rcno','id' => 'rcno','class' => 'form-control','placeholder' =>'RC Number','value' => $mskitemlist->rc_number);
echo form_input($rcno);
echo form_error('rcno');
?>
                    <label for="rcno" class="error"></label>
                  </div>
                </div>

                <div class="form-group" id="Received3">
                  <label class="col-sm-3 control-label">RC Date</label>
                  <div class="col-sm-9">
                     <div class="input-group">
<?php
$rcdate = array('type' => 'text','name' => 'rcdate','id' => 'rcdate','class' => 'form-control','placeholder' =>'RC Date','value' => $mskitemlist->rc_date);
echo form_input($rcdate);
echo form_error('rcdate');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="rcdate" class="error"></label>
                  </div>
                </div>

                <div class="form-group" id="Received4">
                  <label class="col-sm-3 control-label">Received Date</label>
                  <div class="col-sm-9">
                  <div class="input-group">
<?php
$rcdt = array('type' => 'text','name' => 'rcdt','id' => 'rcdt','class' => 'form-control','placeholder' =>'Received Date','value' => $mskitemlist->recdate);
echo form_input($rcdt);
echo form_error('rcdt');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="rcdt" class="error"></label>
                  </div>
                </div>

             

                  <div class="form-group" id="Received7">
                  <label class="col-sm-3 control-label">Funds Type</label>
                  <div class="col-sm-9">
                 <?php  
$fname = array('' => '--Select--','Govt. Fund' => 'Govt. Fund','ADGP Armed Bns. Private Fund' => 'ADGP Armed Bns. Private Fund', 'Private Bn. Hqrs.Fund' => 'Private Bn. Hqrs.Fund', 'Other Funds' => 'Other Funds');
/*newarea Textfield*/
 echo form_dropdown('fname', $fname, set_value('fname',$mskitemlist->fund_name),'id="fname" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('fname');
/*----End newarea Textfield----*/
 ?>
                    <label for="fname" class="error"></label>
                  </div>
                </div> 

                 <div class="form-group" id="OtherFunds1" style="display:none;">
                  <label class="col-sm-3 control-label">Other Funds </label>
                  <div class="col-sm-9">
                 <?php  
$ofname = array('' => '--Select--','MP LED FUND' => 'MP LED FUND','MLA FUND' => 'MLA FUND', 'Donation' => 'DONATION');
/*newarea Textfield*/
 echo form_dropdown('ofname', $ofname, set_value('ofname',$mskitemlist->other_fund),'id="ofname" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('ofname');
/*----End newarea Textfield----*/
 ?>
                    <label for="ofname" class="error"></label>
                  </div>
                </div>

                  <div class="form-group" id="one"  id="Received8" style="display:none;">
                  <label class="col-sm-3 control-label">Govt. Fund</label>
                  <div class="col-sm-9">
                 <?php  
$gfund = array('' => '--Select--','Office Expenses' => 'Office Expenses', 'CTS' => 'CTS', 'Other Expenses' => 'Other Expenses', 'Mech. & Equip.' => 'Mech. & Equip.', 'Computers' => 'Computers','Computer Software' => 'Computer Software', 'Computer Furniture' => 'Computer Furniture', 'Maintenance' => 'Maintenance', 'Computer Stationery (Expendable)' => 'Computer Stationery (Expendable)','Office Expenses' => 'Office Expenses', 'CTS' => 'CTS', 'Other Expenses' => 'Other Expenses', 'Mech. & Equip.' => 'Mech. & Equip.', 'Computers' => 'Computers','Computer Software' => 'Computer Software', 'Computer Furniture' => 'Computer Furniture', 'Maintenance' => 'Maintenance', 'Computer Stationery (Expendable)' => 'Computer Stationery (Expendable)');
/*newarea Textfield*/
 echo form_dropdown('gfund', $gfund, set_value('gfund',$mskitemlist->govt_fund),'id="gfund" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('gfund');
/*----End newarea Textfield----*/
 ?>
                    <label for="gfund" class="error"></label>
                  </div></div> <?php endif; ?>
            <!--      <div class="form-group" id="two" style="display:none">
                  <label class="col-sm-3 control-label">ADGP Armed Bns.</label>
                   <div class="col-sm-9">
                 <?php  
/*$gfundadcp = array('' => '--Select--','Cable TV Fund' => 'Cable TV Fund', 'Ladies Welfare Fund' => 'Ladies Welfare Fund', 'Juice Bar' => 'Juice Bar', 'PAPCOS Fund' => 'PAPCOS Fund', 'Consumer Store Fund' => 'Consumer Store Fund','Office Expenses' => 'Office Expenses', 'CTS' => 'CTS', 'Other Expenses' => 'Other Expenses', 'Mech. & Equip.' => 'Mech. & Equip.', 'Computers' => 'Computers','Computer Software' => 'Computer Software', 'Computer Furniture' => 'Computer Furniture', 'Maintenance' => 'Maintenance', 'Computer Stationery (Expendable)' => 'Computer Stationery (Expendable)');*/
/*newarea Textfield*/
 /*echo form_dropdown('gfundadcp', $gfundadcp, set_value('gfundadcp',1),'id="gfund" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('gfundadcp');*/
/*----End newarea Textfield----*/
 ?>
                    <label for="gfund" class="error"></label>
                  </div></div> -->
             <!--      <div class="form-group" id="three" style="display:none">
                  <label class="col-sm-3 control-label">Private Bn. Hqrs.Fund</label>
                   <div class="col-sm-9">
                 <?php  
/*$gfundbhf = array('' => '--Select--','Mess Fund' => 'Mess Fund', 'Mess Security Fund' => 'Mess Security Fund', 'Emergency Fund' => 'Emergency Fund', 'Canteen Fund' => 'Canteen Fund', 'Sports' => 'Sports','Office Expenses' => 'Office Expenses', 'CTS' => 'CTS', 'Other Expenses' => 'Other Expenses', 'Mech. & Equip.' => 'Mech. & Equip.', 'Computers' => 'Computers','Computer Software' => 'Computer Software', 'Computer Furniture' => 'Computer Furniture', 'Maintenance' => 'Maintenance', 'Computer Stationery (Expendable)' => 'Computer Stationery (Expendable)','Bn. Hqrs fund' => 'Bn.  Hqrs fund', 'Welfare Fund' => 'Welfare Fund');*/
/*newarea Textfield*/
/* echo form_dropdown('gfundbhf', $gfundbhf, set_value('gfundbhf',1),'id="gfundbhf" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('gfundbhf');*/
/*----End newarea Textfield----*/
 ?>
                    <label for="gfundbhf" class="error"></label>
                  </div>
                </div>  -->
             
 <?php if($mskitemlist->recived_type == 'Purchased'): ?>
  <input type="hidden" name="tpi" value="<?php echo $mskitemlist->recived_type;  ?>">
                 <div class="form-group"  id="Purchased14">
                  <label class="col-sm-3 control-label">Type of Item</label>
                  <div class="col-sm-9">
                  <?php $toiss = array();
                      $toiss[''] = '--Type of Item--';

                        foreach ($mskitem as  $value) {
                     if($value->item == 'Other MISC Itesm'){
                        $toiss[$value->item] = 'Other MISC Items';
                      }else{
                         $toiss[$value->item] = $value->item;
                      }
                      } 
                  
                     ?>
                 <?php   
/*newarea Textfield*/
 echo form_dropdown('toiss', $toiss, set_value('toiss',$mskitemlist->typeofitem),'id="toiss" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('toiss');
/*----End newarea Textfield----*/
 ?>
                    <label for="toiss" class="error"></label>
                  </div>
                </div> 

                <div class="form-group" id="namelist2">
                  <label class="col-sm-3 control-label">Name of Item</label>
                  <div class="col-sm-9">
				  <?php $rntwo = array();
                      $rntwo[''] = '--Name of Item--';
					  if(null!=$this->input->post('toiss')){
						  $item = $this->input->post('toiss');
					  }else{
						   $item = $mskitemlist->typeofitem;
					  }
						$listing = fetchoneinfoall('mskitems',array('item' => $item)); 
                       foreach ($listing as  $value) {
                     if($value->item == 'Other MISC Itesm'){
                        $rntwo[$value->name] = 'Other MISC Items';
                      }else{
                         $rntwo[$value->name] = $value->name;
                      }
                      } 
                  
                     ?>
                 <?php   
/*newarea Textfield*/
 echo form_dropdown('rntwo', $rntwo, set_value('rntwo',$mskitemlist->nameofitem),'id="rntwo" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('rntwo');?>
                  </div></div>


                 <div class="form-group" id="perchase00882">
                  <label class="col-sm-3 control-label">Add Info</label>
                  <div class="col-sm-9">
<?php
	
$addinfo = array('type' => 'text','name' => 'addinfop','id' => 'addinfo','class' => 'form-control','placeholder' =>'Add Info','value' =>  (null!=$this->input->post('addinfop'))?$this->input->post('addinfop'):$mskitemlist->infos);
echo form_input($addinfo);
echo form_error('addinfop');
?>
                    <label for="quantitys" class="error"></label>
                  </div>
                </div>

                <div class="form-group" id="rnOthers111" style="display:none">
                  <label class="col-sm-3 control-label">Others</label>
                  <div class="col-sm-9">
<?php
$rno = array('type' => 'text','name' => 'trno','id' => 'rnOthers','class' => 'form-control','placeholder' =>'Others','value' => set_value('trno'));
echo form_input($rno);
echo form_error('trno');
?>
                    <label for="rn" class="error"></label>
                  </div>
                </div>


                  <div class="form-group" id="Purchased12">
                  <label class="col-sm-3 control-label">Category of Item</label>
                  <div class="col-sm-9">

           <?php  
$cti = array_merge(array('' => '--Select--'), $category_of_item);
/*newarea Textfield*/
 echo form_dropdown('cti', $cti, set_value('cti',$mskitemlist->catofitem),'id="cti" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('cti'); ?>
                    <label for="cti" class="error"></label>
                  </div>
                </div>

                  <div class="form-group" id="Purchased13">
                  <label class="col-sm-3 control-label">Condition of Item</label>
                  <div class="col-sm-9">
                 <?php  
$cni = array_merge( array('' => '--Condition of Item--'),$conditions_of_item);
/*newarea Textfield*/
 echo form_dropdown('cni', $cni, set_value('cni',$mskitemlist->conofitem),'id="cni" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('cni');
/*----End newarea Textfield----*/
 ?>
                    <label for="cni" class="error"></label>
                  </div>
                </div> 

                 <div class="form-group" id="condomqtyi" style="display: none;">
                  <label class="col-sm-3 control-label">Condemn Quantity</label>
                  <div class="col-sm-9">
<?php
$rn = array('type' => 'text','name' => 'condomqtyi','id' => 'rn','class' => 'form-control','placeholder' =>'Condemn Quantity','value' => set_value('condomqtyi'));
echo form_input($rn);
echo form_error('condomqtyi');
?>
                    <label for="condomqty" class="error"></label>
                  </div>
                </div> 

                  <div class="form-group" id="Purchased212">
                  <label class="col-sm-3 control-label">Quantity</label>
                  <div class="col-sm-9"><input type="checkbox" name="checki" id="p" value="1" <?php echo (null!=$this->input->post('checki'))?'checked':''; ?>>
                             <?php  
$cnir = array_merge(array(0 => '--Quantity Type--'),$calculations);
/*newarea Textfield*/
 echo form_dropdown('qplog', $cnir, set_value('qplog',$mskitemlist->conofitem),'id="qplog" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('qplog');
/*----End newarea Textfield----*/
 ?><BR><BR>

                    <?php
$rn = array('type' => 'text','name' => 'tpqut','id' => 'tpqut','class' => 'form-control','placeholder' =>'Quantity','value' => set_value('tpqut'));
echo form_input($rn);
echo form_error('tpqut');
?>
                  <BR>             
<?php
$rn = array('type' => 'text','name' => 'quantitys1','id' => 'pqt','class' => 'form-control','placeholder' =>'Quantity','value' => $mskitemlist->recqut,'required' => 'required','readonly' => 'readonly');
echo form_input($rn);
echo form_error('quantitys1');
?>
                    <label for="quantitys" class="error"></label>
                  </div>
                </div>
              

                <div class="form-group" id="Purchased1">
                  <label class="col-sm-3 control-label">Firm Name</label>
                  <div class="col-sm-9">
<?php
$fn = array('type' => 'text','name' => 'fn','id' => 'fn','class' => 'form-control','placeholder' =>'Firm Name','value' => (null!=$this->input->post('fn'))?$this->input->post('fn'):$mskitemlist->firm_name);
echo form_input($fn);
echo form_error('fn');
?>
                    <label for="fn" class="error"></label>
                  </div>
                </div>

                <div class="form-group" id="Purchased2">
                  <label class="col-sm-3 control-label">Address</label>
                  <div class="col-sm-9">
<?php
$add = array('type' => 'text','name' => 'addss','id' => 'add','class' => 'form-control','placeholder' =>'Address','value' => (null!=$this->input->post('addss'))?$this->input->post('addss'):$mskitemlist->firm_address);
echo form_input($add);
echo form_error('addss');
?>
                    <label for="add" class="error"></label>
                  </div>
                </div>

                <div class="form-group" id="Purchased4">
                  <label class="col-sm-3 control-label">Contact No.</label>
                  <div class="col-sm-9">
<?php
$cn = array('type' => 'text','name' => 'cn','id' => 'cn','class' => 'form-control','placeholder' =>'Contact No.','value' => (null!=$this->input->post('cn'))?$this->input->post('cn'):$mskitemlist->contact_num);
echo form_input($cn);
echo form_error('cn');
?>
                    <label for="cn" class="error"></label>
                  </div>
                </div>
                <div class="form-group" id="Purchased5">
                  <label class="col-sm-3 control-label">Purchased Amount</label>
                  <div class="col-sm-9">
<?php
$pa = array('type' => 'text','name' => 'pa','id' => 'pa','class' => 'form-control','placeholder' =>'Purchased Amount','value' => (null!=$this->input->post('pa'))?$this->input->post('pa'):$mskitemlist->perchase_amount);
echo form_input($pa);
echo form_error('pa');
?>
                    <label for="pa" class="error"></label>
                  </div>
                </div>
                <div class="form-group" id="Purchased6">
                  <label class="col-sm-3 control-label">Bill No.</label>
                  <div class="col-sm-9">
<?php
$bn = array('type' => 'text','name' => 'bn','id' => 'bn','class' => 'form-control','placeholder' =>'Bill No.','value' => (null!=$this->input->post('bn'))?$this->input->post('bn'):$mskitemlist->billno);
echo form_input($bn);
echo form_error('bn');
?>
                    <label for="bn" class="error"></label>
                  </div>
                </div>
                <div class="form-group" id="Purchased7">
                  <label class="col-sm-3 control-label">Bill Date</label>
                  <div class="col-sm-9">
                  <div class="input-group">
<?php
$bd = array('type' => 'text','name' => 'bd','id' => 'bd','class' => 'form-control','placeholder' =>'Bill Date','value' => $mskitemlist->billdate);
echo form_input($bd);
echo form_error('bd');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="bd" class="error"></label>
                  </div>
                </div>
                <div class="form-group" id="Purchased8">
                  <label class="col-sm-3 control-label">Received Date</label>
                  <div class="col-sm-9">
                   <div class="input-group">
<?php
$rd = array('type' => 'text','name' => 'rd','id' => 'rd','class' => 'form-control','placeholder' =>'Received Date','value' => $mskitemlist->per_rec_date);
echo form_input($rd);
echo form_error('rd');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="rd" class="error"></label>
                  </div>
                </div>
				<?php if(false){?>
                <div class="form-group" id="Purchased9">
                  <label class="col-sm-3 control-label">Receipt No.</label>
                  <div class="col-sm-9">
<?php
$rn = array('type' => 'text','name' => 'rni','id' => 'rn','class' => 'form-control','placeholder' =>'Receipt No.','value' => $mskitemlist->per_recpit_no);
echo form_input($rn);
echo form_error('rn');
?>
                    <label for="rn" class="error"></label>
                  </div>
                </div>
                <div class="form-group" id="Purchased10">
                  <label class="col-sm-3 control-label">Receipt Date</label>
                  <div class="col-sm-9">
                  <div class="input-group">
<?php
$rtd = array('type' => 'text','name' => 'rtd','id' => 'rtd','class' => 'form-control','placeholder' =>'Receipt Date','value' => $mskitemlist->per_recipt_date);
echo form_input($rtd);
echo form_error('rtd');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for=rtd" class="error"></label>
                  </div>
                </div>
				<?php } ?>
                <div class="form-group" id="Purchased11">
                  <label class="col-sm-3 control-label">Payment Status</label>
                  <div class="col-sm-9">

           <?php  
$paysta = array('' => '--Select--', 'Paid through Private Fund' => 'Paid through Private Fund', 'Paid Through treasury' => 'Paid Through treasury', 'Pending Credit' => 'Pending Credit');
/*newarea Textfield*/
 echo form_dropdown('paysta', $paysta, set_value('paysta',$mskitemlist->payment_status),'id="paysta" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('paysta'); ?>
                    <label for="paysta" class="error"></label>
                  </div>
                </div>

              

                  <div class="form-group" id="Purchased16" style="display:none;">
                  <label class="col-sm-3 control-label">Funds Type</label>
                  <div class="col-sm-9">
                 <?php  
$fname = array('' => '--Select--','Govt. Fund' => 'Govt. Fund'/*,'ADGP Armed Bns. Private Fund' => 'ADGP Armed Bns. Private Fund', 'Private Bn. Hqrs.Fund' => 'Private Bn. Hqrs.Fund', 'Other Funds' => 'Other Funds'*/);
/*newarea Textfield*/
 echo form_dropdown('fname1', $fname, set_value('fname1',$mskitemlist->fund_name),'id="fname1" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('fname');
/*----End newarea Textfield----*/
 ?>
                    <label for="fname" class="error"></label>
                  </div>
                </div>


                    <div class="form-group" id="Purchased1622" style="display:none;">
                  <label class="col-sm-3 control-label">Funds Type</label>
                  <div class="col-sm-9">
                 <?php  
$fname = array('' => '--Select--','ADGP Armed Bns. Private Fund' => 'ADGP Armed Bns. Private Fund', 'Private Bn. Hqrs.Fund' => 'Private Bn. Hqrs.Fund','Other Funds' => 'Other Funds');
/*newarea Textfield*/
 echo form_dropdown('fname1', $fname, set_value('fname1',$mskitemlist->fund_name),'id="fname1" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('fname');
/*----End newarea Textfield----*/
 ?>
                    <label for="fname" class="error"></label>
                  </div>
                </div> 

                 <div class="form-group" id="Purchased17" style="display:none;">
                  <label class="col-sm-3 control-label">Other Funds </label>
                  <div class="col-sm-9"> 
                 <?php  
$ofname = array('' => '--Select--','MP LED FUND' => 'MP LED FUND','MLA FUND' => 'MLA FUND', 'Donation' => 'DONATION');
/*newarea Textfield*/
 echo form_dropdown('ofname1', $ofname, set_value('ofname1',1),'id="ofname121" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('ofname');
/*----End newarea Textfield----*/
 ?>
                    <label for="ofname" class="error"></label>
                  </div>
                </div> 

               <!--    <div class="form-group"  id="Purchased18" style="display:none;">
                  <label class="col-sm-3 control-label"></label>
                  <div class="col-sm-9">
                 <?php  
/*$gfund = array('' => '--Select--','Office Expenses' => 'Office Expenses', 'CTS' => 'CTS', 'Other Expenses' => 'Other Expenses', 'Mech. & Equip.' => 'Mech. & Equip.', 'Computers' => 'Computers','Computer Software' => 'Computer Software', 'Computer Furniture' => 'Computer Furniture', 'Maintenance' => 'Maintenance', 'Computer Stationery (Expendable)' => 'Computer Stationery (Expendable)');*/
/*newarea Textfield*/
 /*echo form_dropdown('gfund1', $gfund, set_value('gfund1',1),'id="gfund1" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('gfund');*/
/*----End newarea Textfield----*/
 ?>
                    <label for="gfund" class="error"></label>
                  </div></div> -->

                   <!--   <div class="form-group" id="Purchased30" style="display:none">
                  <label class="col-sm-3 control-label">ADGP Armed Bns.</label>
                   <div class="col-sm-9">
                 <?php  
/*$gfundadcp1 = array('' => '--Select--','Cable TV Fund' => 'Cable TV Fund', 'Ladies Welfare Fund' => 'Ladies Welfare Fund', 'Juice Bar' => 'Juice Bar', 'PAPCOS Fund' => 'PAPCOS Fund', 'Consumer Store Fund' => 'Consumer Store Fund','Office Expenses' => 'Office Expenses', 'CTS' => 'CTS', 'Other Expenses' => 'Other Expenses', 'Mech. & Equip.' => 'Mech. & Equip.', 'Computers' => 'Computers','Computer Software' => 'Computer Software', 'Computer Furniture' => 'Computer Furniture', 'Maintenance' => 'Maintenance', 'Computer Stationery (Expendable)' => 'Computer Stationery (Expendable)');*/
/*newarea Textfield*/
 /*echo form_dropdown('gfundadcp1', $gfundadcp1, set_value('gfundadcp1',1),'id="gfund" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('gfundadcp1');*/
/*----End newarea Textfield----*/
 ?>
                    <label for="gfund" class="error"></label>
                  </div></div> 
    -->               <!-- <div class="form-group" id="Purchased31" style="display:none">
                  <label class="col-sm-3 control-label">Private Bn. Hqrs. Fund </label>
                   <div class="col-sm-9">   
                 <?php  
/*$gfundbhf1 = array('' => '--Select--','Mess Fund' => 'Mess Fund', 'Mess Security Fund' => 'Mess Security Fund', 'Emergency Fund' => 'Emergency Fund', 'Canteen Fund' => 'Canteen Fund', 'Sports' => 'Sports','Office Expenses' => 'Office Expenses', 'CTS' => 'CTS', 'Other Expenses' => 'Other Expenses', 'Mech. & Equip.' => 'Mech. & Equip.', 'Computers' => 'Computers','Computer Software' => 'Computer Software', 'Computer Furniture' => 'Computer Furniture', 'Maintenance' => 'Maintenance', 'Computer Stationery (Expendable)' => 'Computer Stationery (Expendable)','Bn. Hqrs fund' => 'Bn. Hqrs fund', 'Welfare Fund' => 'Welfare Fund');*/
/*newarea Textfield*/
/* echo form_dropdown('gfundbhf1', $gfundbhf1, set_value('gfundbhf1',1),'id="gfundbhf" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('gfundbhf');*/
/*----End newarea Textfield----*/
 ?>
                    <label for="gfundbhf" class="error"></label>
                  </div>
                </div>  -->

                   <div class="form-group" id="doneteds" style="display:none;">
                  <label class="col-sm-3 control-label">Donated By</label>
                  <div class="col-sm-9">
<?php
$donatedby = array('type' => 'text','name' => 'donatedby','id' => 'rtd','class' => 'form-control','placeholder' =>'Donated By','value' => set_value('donatedby'));
echo form_input($donatedby);
echo form_error('donatedby');
?>
         <label for=rtd" class="error"></label>
                  </div>
                </div>

                     <div class="form-group" id="Purchased18" style="display:none">
                  <label class="col-sm-3 control-label">Fund Head </label>
                   <div class="col-sm-9">   
                 <?php  
$gfundbhf1 = array('' => '--Select--','UNDER HEAD 2055-POLICE-104-01-SPECIAL POLICE' => 'UNDER HEAD 2055-POLICE-104-01-SPECIAL POLICE', 'UNDER HEAD 4055-CAPITAL OUTLAY ON POLICE-208-01-SPECIAL POLICE' => 'UNDER HEAD 4055-CAPITAL OUTLAY ON POLICE-208-01-SPECIAL POLICE', 'UNDER HEAD 2055-POLICE-113-01-POLICE HOSPITAL' => 'UNDER HEAD 2055-POLICE-113-01-POLICE HOSPITAL', 'UNDER HEAD 4055-CAPITAL OUTLAY ON POLICE-207-06-POLICE HOSPITAL' => 'UNDER HEAD 4055-CAPITAL OUTLAY ON POLICE-207-06-POLICE HOSPITAL', 'UNDER HEAD"2055-POLICE-114-WIRELESS & COMPUTER STAFF' => 'UNDER HEAD"2055-POLICE-114-WIRELESS & COMPUTER STAFF', 'UNDER HEAD 4055-CAPITAL OUTLAY ON POLICE-207-STATE-POLICE-08-PH-02-MODERNISATION OF STATE POLICE FORCES-SCHEME (NON PLAN)' => 'UNDER HEAD 4055-CAPITAL OUTLAY ON POLICE-207-STATE-POLICE-08-PH-02-MODERNISATION OF STATE POLICE FORCES-SCHEME (NON PLAN)');
/*newarea Textfield*/
 echo form_dropdown('gfundbhf1', $gfundbhf1, set_value('gfundbhf1',1),'id="gvt" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('gfundbhf');
/*----End newarea Textfield----*/
 ?>
                    <label for="gfundbhf" class="error"></label>
                  </div>
                </div> 


                 <div class="form-group" id="u1" style="display:none">
                  <label class="col-sm-3 control-label">Sub Head</label>
                   <div class="col-sm-9">   
                 <?php  
$part1 = array('' => '--Select--','SALARY' => 'SALARY', 'WAGES' => 'WAGES', 'REWARD' => 'REWARD', 'T.E.' => 'T.E.', 'F.T.E.' => 'F.T.E.','O.E.' => 'O.E.', 'RRT' => 'RRT', 'COST OF RATION' => 'COST OF RATION', ' POL' => ' POL', 'CTS' => 'CTS','PUBLICITY' => 'PUBLICITY', 'MAINTENANCE' => 'MAINTENANCE', 'PPSS' => 'PPSS', ' CONTRIBUTION' => ' CONTRIBUTION','O.C.' => 'O.C.', 'RME' => 'RME', 'TELEPHONE' => 'TELEPHONE', 'ELECTRICITY' => 'ELECTRICITY','WATER CHG.' => 'WATER CHG.');
/*newarea Textfield*/
 echo form_dropdown('part1', $part1, set_value('part1',1),'id="gfundbhf" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('part1');
/*----End newarea Textfield----*/
 ?>
                    <label for="part1" class="error"></label>
                  </div>
                </div> 


                 <div class="form-group" id="u2" style="display:none">
                  <label class="col-sm-3 control-label">Sub Head</label>
                   <div class="col-sm-9">   
                 <?php  
$part2 = array('' => '--Select--','ARMS& AMMU.' => 'ARMS& AMMU.', 'M & E' => 'M & E');
/*newarea Textfield*/
 echo form_dropdown('part2', $part2, set_value('part2',1),'id="gfundbhf" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('part2');
/*----End newarea Textfield----*/
 ?>
                    <label for="part2" class="error"></label>
                  </div>
                </div> 

                <div class="form-group" id="u3" style="display:none">
                  <label class="col-sm-3 control-label">Sub Head</label>
                   <div class="col-sm-9">   
                 <?php  
$part4 = array('' => '--Select--','SALARY' => 'SALARY', 'T.E.' => 'T.E.','O.E.' => 'O.E.',' M & S' => ' M & S','MAINTENANCE' => 'MAINTENANCE','RME' => 'RME');
/*newarea Textfield*/
 echo form_dropdown('part4', $part4, set_value('part4',1),'id="gfundbhf" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('part4');
/*----End newarea Textfield----*/
 ?>
                    <label for="part4" class="error"></label>
                  </div>
                </div> 

                  <div class="form-group" id="u4" style="display:none">
                  <label class="col-sm-3 control-label">Sub Head</label>
                   <div class="col-sm-9">   
                 <?php  
$part5 = array('' => '--Select--','M & E' => 'M & E');
/*newarea Textfield*/
 echo form_dropdown('part5', $part5, set_value('part5',1),'id="part5" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('part5');
/*----End newarea Textfield----*/
 ?>
                    <label for="part5" class="error"></label>
                  </div>
                </div> 

              <div class="form-group" id="u5" style="display:none">
                  <label class="col-sm-3 control-label">Sub Head</label>
                   <div class="col-sm-9">   
                 <?php  
$part6 = array('' => '--Select--','PURCHASE OF COMPUTER RELATED  HARDWARE-13-OFFICE EXPENSES' => 'PURCHASE OF COMPUTER RELATED  HARDWARE-13-OFFICE EXPENSES','PURCHASE OF SOFTWARE-28-PROF. SER.' => 'PURCHASE OF SOFTWARE-28-PROF. SER.', 'COMUTER STATIONARY AND CONSUMEABLE ITEMS-13-OFFICE EXPENSES' => 'COMUTER STATIONARY AND CONSUMEABLE ITEMS-13-OFFICE EXPENSES','COMPUTER FURNITURE ITEMS-13-OFFICE EXPENSES' => 'COMPUTER FURNITURE ITEMS-13-OFFICE EXPENSES','MEN POWER-28-PROF.SER.' => 'MEN POWER-28-PROF.SER.','DEVELOPMENT OF APPLICATION   SOFTWARE-28-PROF. SER.' => 'DEVELOPMENT OF APPLICATION   SOFTWARE-28-PROF. SER.','DEVELOPMENT OF HOSTING OF WEBSITE-28-PROF. SER.' => 'DEVELOPMENT OF HOSTING OF WEBSITE-28-PROF. SER.','A.M.C. FOR I.T. RELATED ITEMS-13-OFFICE EXPENSES' => 'A.M.C. FOR I.T. RELATED ITEMS-13-OFFICE EXPENSES','A.T.S. FOR APPLICATION SOFTWARE & WEBSITE-28-PROF.SER.' => 'A.T.S. FOR APPLICATION SOFTWARE & WEBSITE-28-PROF.SER.');
/*newarea Textfield*/
 echo form_dropdown('part6', $part6, set_value('part6',1),'id="part6" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('part6');
/*----End newarea Textfield----*/
 ?>
                    <label for="part6" class="error"></label>
                  </div>
                </div> 
                     <div class="form-group" id="u6" style="display:none">
                  <label class="col-sm-3 control-label">Sub Head</label>
                   <div class="col-sm-9">   
                 <?php  
$part7 = array('' => '--Select--',' MACH. & EQUIP.' => ' MACH. & EQUIP.');
/*newarea Textfield*/
 echo form_dropdown('part7', $part7, set_value('part7',1),'id="part7" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('part7');
/*----End newarea Textfield----*/
 ?>
                    <label for="part7" class="error"></label>
                  </div>
                </div> 
              <?php endif; ?>

              </div><!-- panel-body -->
              
              <div class="panel-footer">
                <div class="row">
                  <div class="col-sm-9 col-sm-offset-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a  href="" class="btn btn-default">Reset</a>
                  </div>
                </div>
              </div><!-- panel-footer -->
          </div><!-- panel -->
      <?php echo form_close(); ?>
         </div><!-- col-md-6 -->
    </div><!-- row -->
    </div><!-- contentpanel -->

  </div><!-- mainpanel -->

</section>
<script src="<?php echo base_url();?>webroot/js/jquery-2.1.3.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/jquery-ui-1.10.3.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/modernizr.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/toggles.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/retina.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/jquery.cookies.js"></script>
<script src="<?php echo base_url();?>webroot/js/jquery.mousewheel.js"></script>
<script src="<?php echo base_url();?>webroot/js/select2.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url();?>webroot/plugin/fileupload/fileinput.js"></script>
<script src="<?php echo base_url();?>webroot/js/custom.js"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
  "use strict";
  jQuery(".select2").select2({width:"100%",}),
  jQuery("#basicForm4").validate({
    highlight:function(e){
    jQuery(e).closest(".form-group").removeClass("has-success").addClass("has-error")},
    success:function(e){jQuery(e).closest(".form-group").removeClass("has-error")}
  }),
  jQuery('#rcdate').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#rcdt').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#bd').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#rd').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#rtd').datepicker({dateFormat: "dd/mm/yy"});


  $("#toi").change(function(){
    var ic = $("#toi").val();
    var dataStrings = 'ic='+ ic;
      $.ajax({
    type: "POST",
    url: "<?php echo base_url();?>bt-msk-ajss",
    data: dataStrings,
    cache: false,
    success: function(html){
    $("#nameitem11").html(html);
    }  
      
    });

    });


  $("#toiss").change(function(){
	  
    var ic = $("#toiss").val();
    var dataStrings = 'ic='+ ic;
      $.ajax({
    type: "POST",
    url: "<?php echo base_url();?>bt-msk-ajss",
    data: dataStrings,
    cache: false,
    success: function(html){
		$("#rntwo").html(html);
		
    }  
      
    });

    });

  $(document).on('change', '#gvt', function() {
  if(this.value == 'UNDER HEAD 2055-POLICE-104-01-SPECIAL POLICE'){
    $('#u1').show();
    $('#u2').hide();
    $('#u3').hide();
    $('#u4').hide();
    $('#u5').hide();
    $('#u6').hide();
   }else if(this.value == 'UNDER HEAD 4055-CAPITAL OUTLAY ON POLICE-208-01-SPECIAL POLICE'){
    $('#u1').hide();
    $('#u2').show();
    $('#u3').hide();
    $('#u4').hide();
    $('#u5').hide();
    $('#u6').hide();
   }
   else if(this.value == 'UNDER HEAD 2055-POLICE-113-01-POLICE HOSPITAL'){
   $('#u1').hide();
    $('#u2').hide();
    $('#u3').show();
    $('#u4').hide();
    $('#u5').hide();
    $('#u6').hide();
     
   }else if(this.value == 'UNDER HEAD 4055-CAPITAL OUTLAY ON POLICE-207-06-POLICE HOSPITAL'){
    $('#u1').hide();
    $('#u2').hide();
    $('#u3').hide();
    $('#u4').show();
    $('#u5').hide();
    $('#u6').hide();
    
   }else if(this.value == 'UNDER HEAD"2055-POLICE-114-WIRELESS & COMPUTER STAFF'){
  $('#u1').hide();
    $('#u2').hide();
    $('#u3').hide();
    $('#u4').hide();
    $('#u5').show();
    $('#u6').hide();
   
   }else if(this.value == 'UNDER HEAD 4055-CAPITAL OUTLAY ON POLICE-207-STATE-POLICE-08-PH-02-MODERNISATION OF STATE POLICE FORCES-SCHEME (NON PLAN)'){
     $('#u1').hide();
    $('#u2').hide();
    $('#u3').hide();
    $('#u4').hide();
    $('#u5').hide();
    $('#u6').show();
   }else{
    $('#u1').hide();
    $('#u2').hide();
    $('#u3').hide();
    $('#u4').hide();
    $('#u5').hide();
    $('#u6').hide();
   }


   
});


  

  $(document).on('change', '#fname', function() {
  if(this.value == 'Govt. Fund'){
     /*$('#two').hide();
     $('#three').hide();*/
     $('#Purchased18').show();
    // $('#OtherFunds1').hide();

   }else if(this.value == 'ADGP Armed Bns. Private Fund'){
     $('#u1').hide();
    $('#u2').hide();
    $('#u3').hide();
    $('#u4').hide();
    $('#u5').hide();
    $('#u6').hide();
    $('#Purchased18').hide();
     $('#OtherFunds1').hide();
    $('#doneteds').hide();
    /*$('#two').show();
     $('#three').hide();
     $('#one').hide();
     $('#OtherFunds1').hide();*/
   }
   else if(this.value == 'Private Bn. Hqrs.Fund'){
    /*$('#three').show();
    $('#two').hide();
     $('#one').hide();
     $('#OtherFunds1').hide();*/
      $('#u1').hide();
    $('#u2').hide();
    $('#u3').hide();
    $('#u4').hide();
    $('#u5').hide();
    $('#u6').hide();
    $('#Purchased18').hide();
     $('#OtherFunds1').hide();
    $('#doneteds').hide();
   }else if(this.value == 'Other Funds'){
    $('#OtherFunds1').show();  
     /*$('#three').hide();
    $('#two').hide();
     $('#one').hide();*/
      $('#u1').hide();
    $('#u2').hide();
    $('#u3').hide();
    $('#u4').hide();
    $('#u5').hide();
    $('#u6').hide();
    $('#Purchased18').hide();
   }else{
    /*$('#three').hide();
    $('#two').hide();
     $('#one').hide();
     $('#OtherFunds1').hide();*/
   }


   
});


  $(document).on('change', '#Receivedfrom', function() {
  if(this.value == 'others'){
     $('#Receivedothers2').show();
   }else{
    $('#Receivedothers2').hide();
   }
});


   $(document).on('change', '#paysta', function() {
  if(this.value == 'Paid through Private Fund'){
     $('#Purchased1622').show();
     $('#Purchased16').hide();
   }else if(this.value == 'Paid Through treasury'){
    $('#Purchased16').show();
    $('#Purchased1622').hide();
   }
});


  


  $(document).on('change', '#restoi', function() {
  if(this.value == 'Others'){
     $('#rnOthers11').show();
   }else{
    $('#rnOthers11').hide();
   }
});

    $(document).on('change', '#toiss', function() {
  if(this.value == 'Other misc. items'){
     $('#rnOthers111').show();
   }else{
    $('#rnOthers111').hide();
   }
});
  

$(document).on('change', '#tpi', function() {
  if(this.value == 'Received'){
     $('#Received1').show();
     $('#Received2').show();
     $('#Received3').show();
     $('#Received4').show();
     $('#Received5').show();
     $('#Received6').show();
     $('#Received7').show();
     $('#Received8').show();
      $('#Received11').show();
       $('#Received12').show();
       $('#Received81').show();
       $('#Received100').show();
        $('#Received00882').show();
        $('#namelist').show();

     

     $('#Purchased1').hide();
     $('#Purchased2').hide();
     $('#Purchased3').hide();
     $('#Purchased4').hide();
     $('#Purchased5').hide();
     $('#Purchased6').hide();
     $('#Purchased7').hide();
     $('#Purchased8').hide();
     $('#Purchased9').hide();
     $('#Purchased10').hide();
     $('#Purchased11').hide();
     $('#Purchased12').hide();
     $('#Purchased13').hide();
     $('#Purchased14').hide();
     $('#Purchased15').hide();
     $('#Purchased16').hide();
     $('#Purchased17').hide();
     $('#Purchased18').hide();
     $('#Purchased19').hide();
      $('#rnOthers111').hide();
      $('#Purchased212').hide(); 
   }else if(this.value == 'Purchased'){
      $('#Purchased1').show();
      $('#Purchased2').show();
      $('#Purchased3').show();
      $('#Purchased4').show();
      $('#Purchased5').show();
      $('#Purchased6').show();
      $('#Purchased7').show();
      $('#Purchased8').show();
      $('#Purchased9').show();
      $('#Purchased10').show();
      $('#Purchased11').show();
      $('#Purchased12').show();
      $('#Purchased13').show();
      $('#Purchased14').show();
      $('#Purchased15').show();
      $('#Purchased16').hide(); 
      $('#Purchased212').show();  
      $('#perchase00882').show();
      $('#namelist2').show();

      $('#Received1').hide();
     $('#Received2').hide();
     $('#Received3').hide();
     $('#Received4').hide();
     $('#Received5').hide();
     $('#Received6').hide();
     $('#Received7').hide();
     $('#Received8').hide();
     $('#Received11').hide();
       $('#Received12').hide();
        $('#Receivedothers2').hide();
        $('#OtherFunds1').hide();
         $('#rnOthers11').hide();
         $('#Received81').hide();
         $('#Received00882').hide();
         $('#namelist').hide();
   }else{
       $('#Received1').hide();
     $('#Received2').hide();
     $('#Received3').hide();
     $('#Received4').hide();
     $('#Received5').hide();
     $('#Received6').hide();
     $('#Received7').hide();
     $('#Received8').hide();
     $('#Received11').hide();
     $('#Received81').hide();
       $('#Received12').hide();
        $('#Receivedothers2').hide();
        $('#OtherFunds1').hide();
         $('#rnOthers11').hide();

     $('#Purchased1').hide();
     $('#Purchased2').hide();
     $('#Purchased3').hide();
     $('#Purchased4').hide();
     $('#Purchased5').hide();
     $('#Purchased6').hide();
     $('#Purchased7').hide();
     $('#Purchased8').hide();
      $('#Purchased9').hide();
     $('#Purchased10').hide();
     $('#Purchased11').hide();
     $('#Purchased12').hide();
     $('#Purchased13').hide();
     $('#Purchased14').hide();
     $('#Purchased15').hide();
          $('#Purchased16').hide();
     $('#Purchased17').hide();
     $('#Purchased18').hide();
     $('#Purchased19').hide();
      $('#rnOthers111').hide();
      $('#Purchased212').hide(); 
   }

});


  $(document).on('change', '#ofname121', function() {
  if(this.value == 'Donation'){
     $('#doneteds').show();
   }else{
    $('#doneteds').hide();
   }
});


   $(document).on('change', '#ofname', function() {
  if(this.value == 'Donation'){
     $('#doneteds').show();
   }else{
    $('#doneteds').hide();
   }
});


  

  $(document).on('change', '#fname1', function() {
  if(this.value == 'Govt. Fund'){
     $('#Purchased18').show();
     $('#Purchased17').hide();
     $('#Purchased19').hide();
     $('#Purchased30').hide();
     $('#Purchased31').hide();
          $('#Purchased999').hide();
    $('#Purchased1000').hide();
    $('#Purchased1001').hide();
     $('#Purchased1002').hide();
    $('#Purchased1003').hide();
     $('#Purchased1004').hide();
      $('#Purchased1005').hide();
   }else if(this.value == 'ADGP Armed Bns. Private Fund'){
     $('#Purchased18').hide();
     $('#Purchased17').hide();
     $('#Purchased19').hide();
     $('#Purchased30').show();
     $('#Purchased31').hide();
          $('#Purchased999').hide();
    $('#Purchased1000').hide();
    $('#Purchased1001').hide();
     $('#Purchased1002').hide();
    $('#Purchased1003').hide();
     $('#Purchased1004').hide();
      $('#Purchased1005').hide();
   }
    else if(this.value == 'Private Bn. Hqrs.Fund'){
     $('#Purchased17').hide();
     $('#Purchased18').hide();
     $('#Purchased19').hide();
     $('#Purchased30').hide();
     $('#Purchased31').show();
          $('#Purchased999').hide();
    $('#Purchased1000').hide();
    $('#Purchased1001').hide();
     $('#Purchased1002').hide();
    $('#Purchased1003').hide();
     $('#Purchased1004').hide();
      $('#Purchased1005').hide();
    }
    else if(this.value == 'Other Funds'){
     $('#Purchased18').hide();
     $('#Purchased17').show();
     $('#Purchased19').hide();
     $('#Purchased30').hide();
     $('#Purchased31').hide();
          $('#Purchased999').hide();
    $('#Purchased1000').hide();
    $('#Purchased1001').hide();
     $('#Purchased1002').hide();
    $('#Purchased1003').hide();
     $('#Purchased1004').hide();
      $('#Purchased1005').hide();
   }else if(this.value == 'SOE'){
         $('#Purchased17').hide();
     $('#Purchased18').hide();
     $('#Purchased19').hide();
     $('#Purchased30').hide();
     $('#Purchased31').hide();

    $('#Purchased999').show();
    $('#Purchased1000').show();
    $('#Purchased1001').show();
     $('#Purchased1002').show();
    $('#Purchased1003').show();
     $('#Purchased1004').show();
      $('#Purchased1005').show();
   }else{
      $('#Purchased18').hide();
     $('#Purchased17').hide();
     $('#Purchased19').hide();
     $('#Purchased30').hide();
     $('#Purchased31').hide();

     $('#Purchased999').hide();
    $('#Purchased1000').hide();
    $('#Purchased1001').hide();
     $('#Purchased1002').hide();
    $('#Purchased1003').hide();
     $('#Purchased1004').hide();
      $('#Purchased1005').hide();
   }
});

  

});

$(document).on("click","#p", function(){ //user click on remove text
  $('#pqt').prop("disabled", false);
        
    });

$(document).on("click","#r", function(){ //user click on remove text
  $('#rqt').prop("disabled", false);
        
    });

   $(document).on('change', '#cni', function() {
  if(this.value == 'C'){
     $('#condomqtyi').show();
   }else{
    $('#condomqtyi').hide();
   }
});
$(document).ready(function(){
	var a = $('#cnir').val();
	if(a=='C'){
		$('#condomqty').show();
	 $('#Received81').hide();
	 $('#Received6Quantity').show();
	 
	}else{
		$('#condomqty').hide();
		$('#Received6Quantity').hide();
		$('#Received81').show();
	}
	
	var b = $('#cni').val();
	
	if(b=='C'){
		$('#condomqtyi').show();
		$('#Purchased212').hide();
		;
	}else{
		$('#condomqtyi').hide();
		
	 $('#Purchased212').show();
	}
	
});
     $(document).on('change', '#cnir', function() {
  if(this.value == 'C'){
     $('#condomqty').show();
	 $('#Received81').hide();
	  $('#Received6Quantity').show()
   }else{
    $('#condomqty').hide();
	 $('#Received81').show();
	 $('#Received6Quantity').hide();
   }
   
   
});

$(document).on('change', '#cni', function() {
	if(this.value == 'C'){
     $('#condomqtyi').show();
	 $('#Purchased212').hide();
	 
   }else{
    $('#condomqtyi').hide();
	 $('#Purchased212').show();
   }
})

   
</script>
</body>
</html>