<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
    <title> ManPower Report</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/data/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/data/css/buttons.dataTables.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/data/css/dataTables.colVis.css"/>
</head>
<body>
<!-- Preloader -->
<div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div>

<section>
<?php $this->load->view('Btalion/html/navbar'); ?>
  <div class="mainpanel">
<?php $this->load->view('Btalion/html/headbar'); ?>
    <div class="pageheader">
      <h3> &nbsp; &nbsp;  ManPower Report</h3>
    </div>

    <div class="contentpanel">  
      <div class="row">
        <div class="col-sm-12">
       <?php if($this->session->flashdata('success_msg')): ?>
        <div class="alert alert-success alert-dismissible" id="warning" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Success!</strong> <?php echo $this->session->flashdata('success_msg'); ?>
</div>
      <?php  endif; ?>
    <div class="panel panel-default">
        <div class="panel-heading">
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
          <div class="row">

           <div class="col-sm-3"><div class="form-group">
<?php
$name = array('type' => 'text','name' => 'name','id' => 'name','class' => 'form-control','placeholder' =>'Offical Name','value' => set_value('name'));
echo form_input($name);
echo form_error('name');
?>
                    <label for="name" class="error"></label>
                  </div>
                </div>
                
                  <div class="col-sm-3"><div class="form-group">
<?php
$bloodgroup = array('' => '--Blood Group--',  'A+VE' => 'A+VE', 'A-VE' => 'A-VE', 'AB+VE' => 'AB+VE', 'AB-VE' => 'AB-VE', 'B+VE' => 'B+VE', 'B-VE' => 'B-VE','O+VE' => 'O+VE', 'O-VE' => 'O-VE');
/*newarea Textfield*/
 echo form_dropdown('bloodgroup', $bloodgroup, set_value('bloodgroup',1),'id="bloodgroup" data-placeholder="Choose One" class="select2"'); 
 echo form_error('bloodgroup');
?>
                    <label for="bloodgroup" class="error"></label>
                  </div>
                </div>

                   
                   <div class="col-sm-3"> <div class="form-group">
<?php
$rcnum = array('type' => 'text','name' => 'rcnum','id' => 'rcnum','class' => 'form-control','placeholder' =>'Dept No.','value' => set_value('rcnum'));
echo form_input($rcnum);
echo form_error('rcnum');
?>
                    <label for="rcnum" class="error"></label>
                  </div>
                </div>

                 <div class="col-sm-3"><div class="form-group">
                <?php  
$RankRankre = array('' => '--Present Rank--', 'CT' => 'CT', 'Sr.Const' => 'Sr. Const', 'C-II' => 'C-II', 'HC/PR' => 'HC/PR', 'HC' => 'HC', 'ASI/LR' => 'ASI/LR','ASI/CR' => 'ASI/CR',  'ASI' => 'ASI', 'SI/CR' => 'SI/CR','SI/LR' => 'SI/LR', 'SI' => 'SI', 'INSP/CR' => 'INSP/CR','INSP/LR' => 'INSP/LR', 'INSP' => 'INSP', 'DSP/CR' =>'DSP/CR','DSP' =>'DSP', 'SP/CR' => 'SP/CR', 'SP' => 'SP','Asst. Commandant' =>'Asst. Commandant','Commandant' => 'Commandant');
 echo form_dropdown('RankRankre', $RankRankre, set_value('RankRankre',1),'id="RankRankre" data-placeholder="Choose One" class="select2"'); 
 echo form_error('RankRankre');
 ?>
                    <label for="Receivedfrom" class="error"></label>
                  </div>
                </div>

                </div><br/>

                  <div class="row">

                  <div class="col-sm-3"> <div class="form-group">

                       <?php 
                 $postate = array();
                  $postate[''] = '--State--'; 
                 foreach ($statelist as $value) {
                   $postate[$value->state] = $value->state;
                 }

 ?>
            <?php  
/*newarea Textfield*/
 echo form_dropdown('postate', $postate, set_value('postate',''),'id="postate" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('postate');
/*----End newarea Textfield----*/
 ?>
                    <label for="postate" class="error"></label>
                  </div>
                </div>


              <div class="col-sm-3"><div class="form-group"><select name="pcity"  id="dis" data-placeholder="City" title="Please select at least 1 value" class="form-control">';
              <option value=''>--City--</option>
                </select></div></div>
      

                 <div id="listing2"></div>


                  
                  <div class="col-sm-3"><div class="form-group">
                 <?php  
$stts = array('' => '--Education--',  'Illiterate' => 'Illiterate', 'Under Matric' => 'Under Matric', '10th' => '10th', 'H. Sec' => 'H. Sec', 'Prep' => 'Prep', '10+1' => '10+1','10+2' =>'10+2','Under Graduate' => 'Under Graduate', 'Graduate' => 'Graduate', 'Post Graduate' => 'Post Graduate','Doctorate' => 'Doctorate');
/*newarea Textfield*/
 echo form_dropdown('stts', $stts, set_value('stts',1),'id="stts" data-placeholder="Choose One" class="select2"'); 
 echo form_error('stts');
/*----End newarea Textfield----*/
 ?>
                    <label for="stts" class="error"></label>
                  </div>
                </div> 

                   <div class="col-sm-3">
                <div class="form-group">
<?php
$gender = array('' => '--Gender--',  'Male' => 'Male', 'Female' => 'Female');
/*newarea Textfield*/
 echo form_dropdown('gender', $gender, set_value('gender',1),'id="gender" data-placeholder="Choose One" class="select2"'); 
 echo form_error('gender');
?>
                    <label for="gender" class="error"></label>
                  </div>
                </div>
                 

                 </div>

                        <br/><div class="row">
               
   <div class="col-sm-3">
                <div class="form-group">
<?php
$single = array('' => '--Marital--',  'Married' => 'Married', 'Single' => 'Single');
/*newarea Textfield*/
 echo form_dropdown('single', $single, set_value('single',1),'id="single" data-placeholder="Choose One" class="select2"'); 
 echo form_error('single');
?>
                    <label for="single" class="error"></label>
                  </div>
                </div>


                 
                  <div class="col-sm-3"><div class="form-group">
                 <?php  
$Modemdr = array('' => '--Mode of Recruitment--', 'Special Cases' => 'Special Cases','Direct' => 'Direct', 'Direct (Ex-Serviceman)' => 'Direct (Ex-Serviceman)','Direct(SPORTS)' => 'Direct(SPORTS)', 'PLI' => 'PLI', 'Court cases' => 'Court cases','Direct (Freedom Fighter)' => 'Direct (Freedom Fighter)');
/*newarea Textfield*/
 echo form_dropdown('Modemdr', $Modemdr, set_value('Modemdr',1),'id="Modemdr" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('Modemdr');
/*----End newarea Textfield----*/
 ?>
                    <label for="Modemdr" class="error"></label>
                  </div>
                </div> 

                 <div class="col-sm-3"><div class="form-group">
                 <?php  
$Rankre = array('' => '--Rank of Enlistment--',  'Constable' => 'Constable', 'ASI' =>'ASI','SI' => 'SI', 'Insp' => 'Insp', 'DSP' => 'DSP', 'ASP' =>'ASP');
 echo form_dropdown('Rankre', $Rankre, set_value('Rankre',1),'id="Rankre" data-placeholder="Choose One" class="select2"'); 
 echo form_error('Rankre');
 ?>
                    <label for="Rankre" class="error"></label>
                  </div>
                </div>
 <div class="col-sm-3"><div class="form-group">
                 <?php  
$Enlistmentec = array('' => '--Category--', 'GEN' => 'GEN', 'SCO' => 'SCO','SCBM' => 'SCBM', 'BC' => 'BC', 'OBC' => 'OBC', 'ST' => 'ST', 'NA' => 'NA');
 echo form_dropdown('Enlistmentec', $Enlistmentec, set_value('Enlistmentec',1),'id="Enlistmentec" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('Enlistmentec');
 ?>
                    <label for="Enlistmentec" class="error"></label>
                  </div>
                </div>   
           
</div>
<br/>
<div class="row">
                  <div class="col-sm-3"> <div class="form-group">
                 <?php  
$InductionModeim = array('' => '--Induction Mode--', 'Transfer' => 'Transfer', 'Transfer(Promotion)' => 'Transfer(Promotion)', 'Transfer(Excess)' => 'Transfer(Excess)', 'Attachment' => 'Attachment','Transfer Pay Purpose' => 'Transfer Pay Purpose');
 echo form_dropdown('InductionModeim', $InductionModeim, set_value('InductionModeim',1),'id="InductionModeim" data-placeholder="Choose One" class="select2"'); 
 echo form_error('InductionModeim');
 ?>
                    <label for="InductionModeim" class="error"></label>
                  </div>
                </div> 

      

                <div class="col-sm-3">
                   <button type="submit" class="btn btn-primary">Submit</button>
                   <a href="" class="btn btn-default">Reset</a>
                </div>

</div>

<?php echo form_close(); ?>
          </div>
        <div class="panel-body"> 
          <!-- Example split danger button -->
          <h3>Total Records: <?php echo count($weapon); ?></h3>
          <div class="table-responsive">
            <table class="table"  id="table">
              <thead>
                 <tr>
              <th>S.No</th>
              <th>F.O.N.I</th>
              <th>P.F.P.P</th>
              <th>NOT REPORTED</th>
              <th>NOT RELIEVED</th>
              <th>EXCESS ATTACHED</th>
              <th>Battalion/Unit</th>
              <th>Name</th>
              <th>Present Rank</th>
              <th>Dept. No </th>
                </tr>
              </thead>
              <tbody>
                <?php  $count = 0; if($weapon!=''){ foreach($weapon as $value): $count = $count+1; ?>
                 <tr class="odd gradeX">
                    <td><?php echo $count; ?></td>
                  
                      <td> 
                       <div class="dropdown">
  <button class="btn btn-primary btn-xs dropdown-toggle" type="button" data-toggle="dropdown"> Manage
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="<?php echo base_url('bt-osifoni'); ?>" target="_blank"> <i class="fa fa-plus"></i> Add</a></li>
  </ul>
</div>
                     </td>
                      <td> 
                       <div class="dropdown">
  <button class="btn btn-primary btn-xs dropdown-toggle" type="button" data-toggle="dropdown"> Manage
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="<?php echo base_url('bt-add-ranks/'.$value->man_id); ?>" target="_blank"> <i class="fa fa-plus"></i> Add</a></li>
    <li><a href="<?php echo base_url('bt-edit-ranks/'.$value->man_id); ?>" target="_blank"> <i class="fa fa-edit"></i> Edit</a></li>
    <li><a href="<?php echo base_url('bt-secdele'); ?>" target="_blank"> <i class="fa fa-minus"></i> Delete</a></li>
  </ul>
</div>
                     </td>
                      <td> 
                       <div class="dropdown">
  <button class="btn btn-primary btn-xs dropdown-toggle" type="button" data-toggle="dropdown"> Manage
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="<?php echo base_url('bt-add-ranks/'.$value->man_id); ?>" target="_blank"> <i class="fa fa-plus"></i> Add</a></li>
    <li><a href="<?php echo base_url('bt-edit-ranks/'.$value->man_id); ?>" target="_blank"> <i class="fa fa-edit"></i> Edit</a></li>
    <li><a href="<?php echo base_url('bt-secdele'); ?>" target="_blank"> <i class="fa fa-minus"></i> Delete</a></li>
  </ul>
</div>
                     </td>
                      <td> 
                       <div class="dropdown">
  <button class="btn btn-primary btn-xs dropdown-toggle" type="button" data-toggle="dropdown"> Manage
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="<?php echo base_url('bt-add-ranks/'.$value->man_id); ?>" target="_blank"> <i class="fa fa-plus"></i> Add</a></li>
    <li><a href="<?php echo base_url('bt-edit-ranks/'.$value->man_id); ?>" target="_blank"> <i class="fa fa-edit"></i> Edit</a></li>
    <li><a href="<?php echo base_url('bt-secdele'); ?>" target="_blank"> <i class="fa fa-minus"></i> Delete</a></li>
  </ul>
</div>
                     </td>
                      <td> 
                       <div class="dropdown">
  <button class="btn btn-primary btn-xs dropdown-toggle" type="button" data-toggle="dropdown"> Manage
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="<?php echo base_url('bt-add-ranks/'.$value->man_id); ?>" target="_blank"> <i class="fa fa-plus"></i> Add</a></li>
    <li><a href="<?php echo base_url('bt-edit-ranks/'.$value->man_id); ?>" target="_blank"> <i class="fa fa-edit"></i> Edit</a></li>
    <li><a href="<?php echo base_url('bt-secdele'); ?>" target="_blank"> <i class="fa fa-minus"></i> Delete</a></li>
  </ul>
</div>
                     </td>
                     <td><?php $btname = fetchoneinfo('users',array('users_id' => $value->BattalionUnitito));
                     if($btname!=''){
                      echo $btname->nick ;
                     } //echo $value->EnlistmentUnit;
                        ?></td>
                    <td> <?php echo $value->name; ?></td>
                    <td><?php echo $value->cexrank.$value->cminirank.$value->cmedirank.$value->ccprank.$value->cccrank; ?></td>
                    <td><?php echo $value->depttno; ?></td>
                    </tr>
                <?php endforeach; } ?>
              </tbody>
           </table>
          </div><!-- table-responsive -->  
          <?php echo $links; ?> 
        </div><!-- panel-body -->
        </div><!-- panel -->
      </div><!-- col-sm-12 -->
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
<script src="<?php echo base_url();?>webroot/js/bootstrap-timepicker.min.js"></script>

<script src="<?php echo base_url();?>webroot/js/custom.js"></script>

<script src="<?php echo base_url(); ?>webroot/data/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webroot/data/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webroot/data/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webroot/data/js/jszip.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webroot/data/js/pdfmake.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webroot/data/js/vfs_fonts.js"></script></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webroot/data/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webroot/data/js/buttons.print.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webroot/data/js/dataTables.colVis.js"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
  "use strict";
  jQuery("select").select2({width:"100%"}),
  jQuery("select").removeClass("form-control"),

  jQuery('#ircd').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#id').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#ircdi').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#idi').datepicker({dateFormat: "dd/mm/yy"});
});
   
     $("#postate").change(function(){
    var state = $("#postate").val();
    var dataStrings = 'state='+ state;
      $.ajax({
    type: "POST",
    url: "<?php echo base_url();?>bt-sti-ajfilter",
    data: dataStrings,
    cache: false,
    success: function(html){
    $("#dis").html(html);
    }  
      
    });

    });

$(document).ready(function() {
var table = $('#table').DataTable( {
         dom: 'C<"clear">Bfrtip',

       buttons: [
            {
               extend: 'excel',
                exportOptions: {
                    columns: ':visible'
                }
            },{
               extend: 'print',
                exportOptions: {
                    columns: ':visible'
                }
            },{
               extend: 'csv',
                exportOptions: {
                    columns: ':visible'
                }
            },{
               extend: 'copy',
                exportOptions: {
                    columns: ':visible'
                }
            }
        ],
        colVis: {
            exclude: [ 0 ]
        }
    } );
  

});
</script>
</body>
</html>