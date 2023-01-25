<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
    <title>Consolidate figures of Weapon (KHC Module)</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/bootstrap-timepicker.min.css" />
    <style type="text/css">
      .frmSearch {border: 1px solid #F0F0F0;background-color:#C8EEFD;margin: 2px 0px;padding:40px;}
      #country-list{float:left;list-style:none;margin:0;padding:0;width:190px;}
      #country-list li{padding: 10px; background:#FAFAFA;border-bottom:#F0F0F0 1px solid;}
      #country-list li:hover{background:#F0F0F0;}
      #search-box{padding: 10px;border: #F0F0F0 1px solid;}
	 .cur{
      cursor: pointer;
    }
	.links_ a{
		text-decoration:none;
		color:black;
	}
    </style>
  </head>
  <body>
<!-- Preloader -->
<div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div>
<?php
  
  //die;
?><form method="post" id="my_form">
	
<section>
  <?php $this->load->view('Btalion/html/navbar'); ?>
  <div class="mainpanel">
  <?php $this->load->view('Btalion/html/headbar'); ?>
    <div class="pageheader">
      <h3> &nbsp;&nbsp;&nbsp; Consolidate figures of Weapon (KHC Module)</h3>
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
		 
				
				
		
					<?php 
					$this->load->view('Weapon/figures/battalion_weapon_figures_category_wise');
					?>
				
		</div>
	</div>
	</div>
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
<script type="text/javascript">
jQuery(document).ready(function(){
  "use strict";
  jQuery(".select2").select2({width:"100%"}),
  jQuery("#basicForm4").validate({
    highlight:function(e){
    jQuery(e).closest(".form-group").removeClass("has-success").addClass("has-error")},
    success:function(e){jQuery(e).closest(".form-group").removeClass("has-error")}
  }), // Date Picker
  //jQuery('#datepicker1').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#datepickeri').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#odate').datepicker({dateFormat: "dd/mm/yy"});
 
$(document).on('change', '#dep', function() {
  if(this.value == 'BN'){
    $('#ts1').show();
    $('#ca1,#ca2,#ca3,#ca4').hide();
    }
  else if(this.value == 'CA'){
    $('#ts1').hide();
    $('#ca1,#ca2,#ca3,#ca4').show();
    }
     
  });



    $(document).on('change', '#todfi', function() {
      if(this.value == ''){
   $( "#link" ).html('');
   $( "#links" ).html('');
   }
  if(this.value == 'Commadent75 Btn'){
   $( "#links" ).html( "<a href='<?php echo base_url();?>bt-add-officer'><i class='fa fa-plus-circle'></i> Add Info</a>" );
   }else if(this.value == 'Ass.Commandent.75 Btn'){
     $( "#links" ).html( "<a href='<?php echo base_url();?>bt-add-officer'><i class='fa fa-plus-circle'></i> Add Info</a>" );
   }else if(this.value == 'D.S.P 75 Btn'){
    $( "#links" ).html( "<a href='<?php echo base_url();?>bt-add-officer'><i class='fa fa-plus-circle'></i> Add Info</a>" );
   }else if(this.value == 'Insp 75 Btn'){
    $( "#links" ).html( "<a href='<?php echo base_url();?>bt-add-officer'><i class='fa fa-plus-circle'></i> Add Info</a>" );
   }else if(this.value == 'N.G.O'){
    $( "#links" ).html( "<a href='<?php echo base_url();?>bt-add-officer'><i class='fa fa-plus-circle'></i> Add Info</a>" );
   }else if(this.value == 'O.R 75 Btn'){
    $( "#links" ).html( "<a href='<?php echo base_url();?>bt-add-officer'><i class='fa fa-plus-circle'></i> Add Info</a>" );
   }
});

     $(document).on('change', '#ito', function() {
      if(this.value == 'Other'){
     $('#itoOther1').show();
   }else{
    $('#itoOther1').hide();
   }
  
});

  $(document).on('click', '#showi', function() {
   $('#serviammu1').show();
   $('#part2').hide();
});

      $(document).click('#showi2', function() {
        $('#part2').show();
        $('#serviammu1').hide();
      });

    $(document).ready(function() {

    $("#towep").change(function(){
    var bodyno = $("#towep").val();
    var dataStrings = 'bodyno='+ bodyno;
      $.ajax({
    type: "POST",
    url: "<?php echo base_url();?>bt-checkarm",
    data: dataStrings,
    cache: false,
    success: function(html){
    $("#towbody").html(html);
    }  
      
    });

    });
     });


    // AJAX call for autocomplete 
$(document).ready(function(){
  $("#search-box").keyup(function(){
    $.ajax({
    type: "POST",
    url: "<?php echo base_url('bt-issueholder-name'); ?>",
    data:'keyword='+$(this).val(),
    beforeSend: function(){
      $("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
    },
    success: function(data){
      $("#suggesstion-box").show();
      $("#suggesstion-box").html(data);
      $("#search-box").css("background","#FFF");

    }
    });
  });
});
//To select country name
$(document).on( "click","[id^=a]",function () {
var Input = $(this).data('input');
$("#search-box").val( $('#a'+Input).text());
$("#idinfo").val(Input);
$("#suggesstion-box").hide();
});

function setDate(i){
  alert('hi');
  jQuery('#datepicker'+i).datepicker({dateFormat: "dd/mm/yy"});
}



$(document).ready(function() {

    $("#isutodsi").change(function(){
      var bodyno = $("#isutodsi").val();
      var dataStrings = 'bodyno='+ bodyno;
      $.ajax({
        type: "POST",
        url: "<?php echo base_url();?>bt-issueholder-namelist",
        data: dataStrings,
        cache: false,
        success: function(html){
          $("#nameofisu").html(html);
        }  
      });
    });
    // gettting the bodyno's from db and inserting into kljsdfkljad
    $("#arms").change(function(){
      var bat_id = <?php echo $this->session->userdata('userid');?>;
      var arms = $('#arms').val();   // it is a array
      var exclude_body_numbers = $('#body_numbers').val();
      console.log('Excluded body numbers are : ');
      console.log(exclude_body_numbers);
      var data = {
        'arms':arms,
        'bat_id':bat_id,
        'exclude_body_numbers':exclude_body_numbers
      }
      
      //console.log(arms);
      //console.log(data);
      $.ajax({
        type: "POST",
        url: "<?php echo base_url();?>get-body-numbers",
        data: data,
        cache: false,
        success: function(html){
          
          var body_numbers_ = JSON.parse(html);
          console.log('BODY NUMBERS From server ARE:'+body_numbers_);
          $('#body_numbers').empty();
         /* for(var i in exclude_body_numbers ){
            addBodyNumbers(i,exclude_body_numbers[i])
          }*/
          for (var key in body_numbers_) {
            addBodyNumbers(key,body_numbers_[key]);

            //add these rows to table
            var row = $('tr');
            var table_cell = $('td');
            var data = key+' '+body_numbers_[key];
            cell = table_cell.append(data);
            row.append(cell);
            
          }
        }  
      });
    });

  });
  


});
function getBodyNumbers(){
 addBodyNumbers(1,'Dalwinder') 
}
function clearBodyNumbers(){   // only clear the unselected values
  var bodynos = $('#body_numbers').val();
  $('#body_numbers').empty();
  return bodynos;
}
function selectBodyNumbers(key,val){
  $('#body_numbers option[value="'+key+'"]').prop('selected',true);
  $('#body_numbers').trigger('change');
}
function addBodyNumbers(k,val){
  $('#body_numbers').append('<option value="'+k+'">'+val+'</option>');
}
function setPage2(page){
  $('#page_no').val(page);
  document.getElementById('my_form').submit();
}
function setPage(page){
	var per_page = 10;//<?php //echo $per_page; ?>;
	//alert(page.innerText);
  $('#page_no').val(page.innerText);
  document.getElementById('my_form').submit();
}


</script>
</form>
<pre>
<?php //var_dump($this->input->post()); ?>
</body>
</html>