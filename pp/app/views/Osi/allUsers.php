<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>All users</title>
   <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
   <!--link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/bootstrap.min.css" /-->
   <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/bootstrap-timepicker.min.css" />
   <style type="text/css">
     .frmSearch {border: 1px solid #F0F0F0;background-color:#C8EEFD;margin: 2px 0px;padding:40px;}
#country-list{float:left;list-style:none;margin:0;padding:0;width:190px;}
#country-list li{padding: 10px; background:#FAFAFA;border-bottom:#F0F0F0 1px solid;}
#country-list li:hover{background:#F0F0F0;}
#search-box{padding: 10px;border: #F0F0F0 1px solid;}
   </style>
  </head>
<body>
<?php //echo validation_errors(); ?>
<!-- Preloader -->
<div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div>

<section>
<?php $this->load->view('Btalion/html/navbar'); ?>
	<div class="mainpanel">
	<?php $this->load->view('Btalion/html/headbar'); ?>
		<div class="pageheader">
			<h3> &nbsp;  &nbsp; All Users</h3>
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
					<?php if($this->session->flashdata('error_msg')): ?>
						<div class="alert alert-warning alert-dismissible" id="warning" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong>Warning!</strong> <?php echo $this->session->flashdata('error_msg'); ?>
						</div>
					 <?php  endif; ?>
				</div><!-- col-md-6 -->
			</div><!-- row -->
		</div><!-- contentpanel -->
		
        <div class="panel-heading">
			<div class="row">
				<div class="col-md-12">
					<button class="btn btn-small btn-primary" onClick="selectColumns()">View Data</button>
					<button class="btn btn-small btn-primary" onClick="selectColumnsForDownload()">Download</button>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
				<?php //var_dump($this->session);
					//echo $this->session->userdata('__ci_last_regenerate');
				?>
					<table class="table">
						<thead>
							<tr>
								<td>S. No. </td>
								<td>Man ID</td>
								<td>Name</td>
								<td>Battalion</td>
								<td>Staff Type</td>
								<td>Present Rank </td>
								<td>Belt No.</td>
								<td>Phone Number</td>
								<td>District</td>
								<td>Gender</td>
								<td>Maritial Status</td>
								<td>Caste</td>
								<td>Category</td>
								<td>Blood Group</td>
								<td>Computer Literate</td>
								<td>Date Of Birth</td>
								<td>Date Of Enlistment</td>
								<td>Date Of Retirement</td>
								<td>Qualification</td>
								<td>Present Posting</td>
								<!--td>Officer Name</td-->
								<td>Date of Posting</td>
								<td>Ono</td>
								
								<?php if(false){foreach($columns as $key=>$col_name) {?>
										<td><?php echo $col_name; ?></td>
								<?php } }?>
							</tr>
						</thead>
						
						<tbody>
							<?php $counter=1;
							foreach($users as $k=>$user){?>
							<tr>
								<td><?php echo $counter; ?></td>
								<td><?php echo $user->man_id; ?></td>
								<td><?php echo $user->empName; ?></td>
								<td><?php echo $user->nickname; ?></td>
								<td><?php echo $user->presentrank; //staff type?></td>
								<td><?php echo $user->ierank1; ?></td>
								<td><?php echo $user->depttno; ?></td>
								<td><?php echo $user->phono1; ?></td>
								<td><?php echo $user->district; ?></td>
								<td><?php echo $user->gender; ?></td>
								<td><?php echo $user->maritalstatus; ?></td>
								<td><?php echo $user->caste; ?></td>
								<td><?php echo $user->category; ?></td>
								<td><?php echo $user->bloodgroup; ?></td>
								<td><?php echo $user->comlit; ?></td>
								
								<td><?php echo $user->dateofbith; ?></td>
								<td><?php echo $user->dateofinlitment; ?></td>
								<td><?php echo $user->dateofretirment; ?></td>
								
								<td><?php echo $user->eduqalification1;?></td>
								<td><?php echo $user->posting_concat1.'<br>'.$user->officer_name; ?></td>
								
								
								<td><?php echo $user->dateofposting1; ?></td>
								<td><?php echo $user->ono; ?></td>
							</tr>
							<?php $counter++ ;
							}
							?>
						</tbody>
					</table>
				</div>
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
<script src="<?php echo base_url();?>webroot/js/bootstrap-datetimepicker.js"></script>
<script src="<?php echo base_url();?>webroot/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/custom.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	jQuery('#from_date').datepicker({dateFormat: "dd/mm/yy 00:00:00"});
	jQuery('#to_time').datepicker({dateFormat: "dd/mm/yy 23:59:59"});
	/*jQuery('#to_time').datetimepicker({
        dateFormat: 'yy-mm-dd',
        timeFormat: 'HH:mm:ss'
	});*/
});
function selectColumns(){
	$('#exampleModal').modal('toggle')
}
function selectColumnsForDownload(){
	$('#exampleModalDownload').modal('toggle')
}
</script>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width:1000px;margin-left:-100px;">
	<form method="post">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Select the columns you want to see in table.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<div class="row">		
			<div class="col-md-3">
					<input type="checkbox" id="man_id" name="columns[man_id]"><label for="Id">Id</label><br/>
					<input type="checkbox" id="battalion" name="columns[battalion]"><label for="battalion">battalion</label><br/>
					<input type="checkbox" id="name" name="columns[name]"/><label for="name">name</label><br/>
					<input type="checkbox" id="presentrank" name="columns[presentrank]"/><label for="presentrank">presentrank</label><br/>
					<input type="checkbox" id="depttno" name="columns[depttno]"/><label for="depttno">depttno</label><br/>
					<input type="checkbox" id="typeofduty" name="columns[typeofduty]"/><label for="typeofduty">typeofduty</label><br/>
					<input type="checkbox" id="fathername" name="columns[fathername]"/><label for="fathername">fathername</label><br/>
					
					<input type="checkbox" id="houseno" name="columns[houseno]"/><label for="houseno">houseno</label><br/>
					<input type="checkbox" id="streetno" name="columns[streetno]"/><label for="streetno">streetno</label><br/>
					<input type="checkbox" id="wardno" name="columns[wardno]"/><label for="wardno">wardno</label><br/>
					<input type="checkbox" id="villmohala" name="columns[villmohala]"/><label for="villmohala">villmohala</label><br/>
					<input type="checkbox" id="city" name="columns[city]"/><label for="city">city</label><br/>
					<input type="checkbox" id="postoffice" name="columns[postoffice]"/><label for="postoffice">postoffice</label><br/>
					<input type="checkbox" id="policestation" name="columns[policestation]"/><label for="policestation">policestation</label><br/>
					<input type="checkbox" id="teshil" name="columns[teshil]"/><label for="teshil">teshil</label><br/>
					<input type="checkbox" id="district" name="columns[district]"/><label for="district">district</label><br/>
					<input type="checkbox" id="Nationality" name="columns[Nationality]"/><label for="Nationality">Nationality</label><br/>
					<input type="checkbox" id="nstate" name="columns[nstate]"/><label for="nstate">nstate</label><br/>
					<input type="checkbox" id="state" name="columns[state]"/><label for="state">state</label><br/>
					<input type="checkbox" id="phouse" name="columns[phouse]"/><label for="phouse">phouse</label><br/>
					<input type="checkbox" id="pstreet" name="columns[pstreet]"/><label for="pstreet">pstreet</label><br/>
					<input type="checkbox" id="pward" name="columns[pward]"/><label for="pward">pward</label><br/>
					<input type="checkbox" id="pvillmohala" name="columns[pvillmohala]"/><label for="pvillmohala">pvillmohala</label><br/>
					<input type="checkbox" id="pcity" name="columns[pcity]"/><label for="pcity">pcity</label><br/>
					<input type="checkbox" id="ppostoffice" name="columns[ppostoffice]"/><label for="ppostoffice">ppostoffice</label><br/>
					<input type="checkbox" id="ppolicestation" name="columns[ppolicestation]"/><label for="ppolicestation">ppolicestation</label><br/>
					<input type="checkbox" id="ptehsil" name="columns[ptehsil]"/><label for="ptehsil">ptehsil</label><br/>
					<input type="checkbox" id="pdistrict" name="columns[pdistrict]"/><label for="pdistrict">pdistrict</label><br/>
					<input type="checkbox" id="pstate" name="columns[pstate]"/><label for="pstate">pstate</label><br/>
					<input type="checkbox" id="gender" name="columns[gender]"/><label for="gender">gender</label><br/>
					<input type="checkbox" id="maritalstatus" name="columns[maritalstatus]"/><label for="maritalstatus">maritalstatus</label><br/>
					<input type="checkbox" id="dateofbith" name="columns[dateofbith]"/><label for="dateofbith">dateofbith</label><br/>
					<input type="checkbox" id="caste" name="columns[caste]"/><label for="caste">caste</label><br/>
					<input type="checkbox" id="category" name="columns[category]"/><label for="category">category</label><br/>
					<input type="checkbox" id="phono1" name="columns[phono1]"/><label for="phono1">phono1</label><br/>
					<input type="checkbox" id="phono2" name="columns[phono2]"/><label for="phono2">phono2</label><br/>
					<input type="checkbox" id="email" name="columns[email]"/><label for="email">email</label><br/>
			</div>
			<div class="col-md-3">
					<input type="checkbox" id="adharno" name="columns[adharno]"/><label for="adharno">adharno</label><br/>
					<input type="checkbox" id="pan" name="columns[pan]"/><label for="pan">pan</label><br/>
					<input type="checkbox" id="nameofbank" name="columns[nameofbank]"/><label for="nameofbank">nameofbank</label><br/>
					<input type="checkbox" id="nameofbranch" name="columns[nameofbranch]"/><label for="nameofbranch">nameofbranch</label><br/>
					<input type="checkbox" id="bankacno" name="columns[bankacno]"/><label for="bankacno">bankacno</label><br/>
					<input type="checkbox" id="ifsccode" name="columns[ifsccode]"/><label for="ifsccode">ifsccode</label><br/>
					<input type="checkbox" id="bloodgroup" name="columns[bloodgroup]"/><label for="bloodgroup">bloodgroup</label><br/>
					<input type="checkbox" id="identificationmark" name="columns[identificationmark]"/><label for="identificationmark">identificationmark</label><br/>
					<input type="checkbox" id="feet" name="columns[feet]"/><label for="feet">feet</label><br/>
					<input type="checkbox" id="inch" name="columns[inch]"/><label for="inch">inch</label><br/>
					<input type="checkbox" id="eduqalification" name="columns[eduqalification]"/><label for="eduqalification">eduqalification</label><br/>
					<input type="checkbox" id="modeofrec" name="columns[modeofrec]"/><label for="modeofrec">modeofrec</label><br/>
					<input type="checkbox" id="dateofinlitment" name="columns[dateofinlitment]"/><label for="dateofinlitment">dateofinlitment</label><br/>
					<input type="checkbox" id="rankofenlistment" name="columns[rankofenlistment]"/><label for="rankofenlistment">rankofenlistment</label><br/>
					<input type="checkbox" id="eexrank" name="columns[eexrank]"/><label for="eexrank">eexrank</label><br/>
					<input type="checkbox" id="eminirank" name="columns[eminirank]"/><label for="eminirank">eminirank</label><br/>
					<input type="checkbox" id="emedirank" name="columns[emedirank]"/><label for="emedirank">emedirank</label><br/>
					<input type="checkbox" id="ecprank" name="columns[ecprank]"/><label for="ecprank">ecprank</label><br/>
					<input type="checkbox" id="eccrank" name="columns[eccrank]"/><label for="eccrank">eccrank</label><br/>
					<input type="checkbox" id="enlistmentcat" name="columns[enlistmentcat]"/><label for="enlistmentcat">enlistmentcat</label><br/>
					<input type="checkbox" id="dateofretirment" name="columns[dateofretirment]"/><label for="dateofretirment">dateofretirment</label><br/>
					<input type="checkbox" id="dateofretirment2" name="columns[dateofretirment2]"/><label for="dateofretirment2">dateofretirment2</label><br/>
					<input type="checkbox" id="gpfpranno" name="columns[gpfpranno]"/><label for="gpfpranno">gpfpranno</label><br/>
					<input type="checkbox" id="inductionrank" name="columns[inductionrank]"/><label for="inductionrank">inductionrank</label><br/>
					<input type="checkbox" id="inductionmode" name="columns[inductionmode]"/><label for="inductionmode">inductionmode</label><br/>
					<input type="checkbox" id="inductiondate" name="columns[inductiondate]"/><label for="inductiondate">inductiondate</label><br/>
					<input type="checkbox" id="prebattalion" name="columns[prebattalion]"/><label for="prebattalion">prebattalion</label><br/>
					<input type="checkbox" id="prebattno" name="columns[prebattno]"/><label for="prebattno">prebattno</label><br/>
					<input type="checkbox" id="loweschoolcdate" name="columns[loweschoolcdate]"/><label for="loweschoolcdate">loweschoolcdate</label><br/>
					<input type="checkbox" id="doc1" name="columns[doc1]"/><label for="doc1">doc1</label><br/>
					<input type="checkbox" id="doc2" name="columns[doc2]"/><label for="doc2">doc2</label><br/>
					<input type="checkbox" id="dofhc" name="columns[dofhc]"/><label for="dofhc">dofhc</label><br/>
					<input type="checkbox" id="intermediatescor" name="columns[intermediatescor]"/><label for="intermediatescor">intermediatescor</label><br/>
					<input type="checkbox" id="dofld" name="columns[dofld]"/><label for="dofld">dofld</label><br/>
					<input type="checkbox" id="dofld2" name="columns[dofld2]"/><label for="dofld2">dofld2</label><br/>
					<input type="checkbox" id="dateofoffasi" name="columns[dateofoffasi]"/><label for="dateofoffasi">dateofoffasi</label><br/>
					<input type="checkbox" id="upperschool" name="columns[upperschool]"/><label for="upperschool">upperschool</label><br/>
			</div>
			<div class="col-md-3">
					<input type="checkbox" id="dateofliste" name="columns[dateofliste]"/><label for="dateofliste">dateofliste</label><br/>
					<input type="checkbox" id="dateofliste2" name="columns[dateofliste2]"/><label for="dateofliste2">dateofliste2</label><br/>
					<input type="checkbox" id="dateoffsi" name="columns[dateoffsi]"/><label for="dateoffsi">dateoffsi</label><br/>
					<input type="checkbox" id="dateoflistf" name="columns[dateoflistf]"/><label for="dateoflistf">dateoflistf</label><br/>
					<input type="checkbox" id="dateoflistf2" name="columns[dateoflistf2]"/><label for="dateoflistf2">dateoflistf2</label><br/>
					<input type="checkbox" id="dateofinsp" name="columns[dateofinsp]"/><label for="dateofinsp">dateofinsp</label><br/>
					<input type="checkbox" id="dopdasp" name="columns[dopdasp]"/><label for="dopdasp">dopdasp</label><br/>
					<input type="checkbox" id="doprosp" name="columns[doprosp]"/><label for="doprosp">doprosp</label><br/>
					<input type="checkbox" id="doprocl" name="columns[doprocl]"/><label for="doprocl">doprocl</label><br/>
					<input type="checkbox" id="btic" name="columns[btic]"/><label for="btic">btic</label><br/>
					<input type="checkbox" id="batchgroup" name="columns[batchgroup]"/><label for="batchgroup">batchgroup</label><br/>
					<input type="checkbox" id="passoutyear" name="columns[passoutyear]"/><label for="passoutyear">passoutyear</label><br/>
					<input type="checkbox" id="bat_id" name="columns[bat_id]"/><label for="bat_id">bat_id</label><br/>
					<input type="checkbox" id="Single" name="columns[Single]"/><label for="Single">Single</label><br/>
					<input type="checkbox" id="Kg" name="columns[Kg]"/><label for="Kg">Kg</label><br/>
					<input type="checkbox" id="Gm" name="columns[Gm]"/><label for="Gm">Gm</label><br/>
					<input type="checkbox" id="UnderGraduate" name="columns[UnderGraduate]"/><label for="UnderGraduate">UnderGraduate</label><br/>
					<input type="checkbox" id="Graduate" name="columns[Graduate]"/><label for="Graduate">Graduate</label><br/>
					<input type="checkbox" id="PostGraduate" name="columns[PostGraduate]"/><label for="PostGraduate">PostGraduate</label><br/>
					<input type="checkbox" id="Doctorate" name="columns[Doctorate]"/><label for="Doctorate">Doctorate</label><br/>
					<input type="checkbox" id="Doctorateother" name="columns[Doctorateother]"/><label for="Doctorateother">Doctorateother</label><br/>
					<input type="checkbox" id="EnlistmentUnit" name="columns[EnlistmentUnit]"/><label for="EnlistmentUnit">EnlistmentUnit</label><br/>
					<input type="checkbox" id="EnlistmentUnitother" name="columns[EnlistmentUnitother]"/><label for="EnlistmentUnitother">EnlistmentUnitother</label><br/>
					<input type="checkbox" id="PRAN" name="columns[PRAN]"/><label for="PRAN">PRAN</label><br/>
					<input type="checkbox" id="BattalionUnitito" name="columns[BattalionUnitito]"/><label for="BattalionUnitito">BattalionUnitito</label><br/>
					<input type="checkbox" id="iIdentityCardNocn" name="columns[iIdentityCardNocn]"/><label for="iIdentityCardNocn">iIdentityCardNocn</label><br/>
					<input type="checkbox" id="Othertraining" name="columns[Othertraining]"/><label for="Othertraining">Othertraining</label><br/>
					<input type="checkbox" id="TrainingInstitutessti" name="columns[TrainingInstitutessti]"/><label for="TrainingInstitutessti">TrainingInstitutessti</label><br/>
					<input type="checkbox" id="TrainingInstitutesstiOther" name="columns[TrainingInstitutesstiOther]"/><label for="TrainingInstitutesstiOther">TrainingInstitutesstiOther</label><br/>
					<input type="checkbox" id="NamesofsCourses" name="columns[NamesofsCourses]"/><label for="NamesofsCourses">NamesofsCourses</label><br/>
					<input type="checkbox" id="DurationsofsCourses" name="columns[DurationsofsCourses]"/><label for="DurationsofsCourses">DurationsofsCourses</label><br/>
					<input type="checkbox" id="DurationsofsCoursest" name="columns[DurationsofsCoursest]"/><label for="DurationsofsCoursest">DurationsofsCoursest</label><br/>
					<input type="checkbox" id="NameofsRanges" name="columns[NameofsRanges]"/><label for="NameofsRanges">NameofsRanges</label><br/>
					<input type="checkbox" id="dateofprcatice" name="columns[dateofprcatice]"/><label for="dateofprcatice">dateofprcatice</label><br/>
					<input type="checkbox" id="tow" name="columns[tow]"/><label for="">tow</label><br/>
					<input type="checkbox" id="LatestAnnualMedicalDate" name="columns[LatestAnnualMedicalDate]"/><label for="LatestAnnualMedicalDate">LatestAnnualMedicalDate</label><br/>
					<input type="checkbox" id="PresentHealthStatus" name="columns[PresentHealthStatus]"/><label for="PresentHealthStatus">PresentHealthStatus</label><br/>
		</div>
			<div class="col-md-3">
					<input type="checkbox" id="ChronicDiseaseDetails" name="columns[ChronicDiseaseDetails]"/><label for="ChronicDiseaseDetails">ChronicDiseaseDetails</label><br/>
					<input type="checkbox" id="MiscDetails" name="columns[MiscDetails]"/><label for="MiscDetails">MiscDetails</label><br/>
					<input type="checkbox" id="osi_status" name="columns[osi_status]"/><label for="osi_status">osi_status</label><br/>
					<input type="checkbox" id="uid" name="columns[uid]"/><label for="uid">uid</label><br/>
					<input type="checkbox" id="com_id" name="columns[com_id]"/><label for="com_id">com_id</label><br/>
					<input type="checkbox" id="" name="columns[Ministerial]"/><label for="Ministerial">Ministerial</label><br/>
					<input type="checkbox" id="Ministerial" name="columns[]"/><label for="">Medical</label><br/>
					<input type="checkbox" id="cf1" name="columns[cf1]"/><label for="cf1">cf1</label><br/>
					<input type="checkbox" id="cf2" name="columns[cf2]"/><label for="cf2">cf2</label><br/>
					<input type="checkbox" id="exs1" name="columns[exs1]"/><label for="">exs1</label><br/>
					<input type="checkbox" id="cexrank" name="columns[cexrank]"/><label for="cexrank">cexrank</label><br/>
					<input type="checkbox" id="cminirank" name="columns[cminirank]"/><label for="cminirank">cminirank</label><br/>
					<input type="checkbox" id="cmedirank" name="columns[cmedirank]"/><label for="cmedirank">cmedirank</label><br/>
					<input type="checkbox" id="ccprank" name="columns[ccprank]"/><label for="ccprank">ccprank</label><br/>
					<input type="checkbox" id="cccrank" name="columns[cccrank]"/><label for="cccrank">cccrank</label><br/>
					<input type="checkbox" id="ierank" name="columns[ierank]"/><label for="ierank">ierank</label><br/>
					<input type="checkbox" id="iminirank" name="columns[iminirank]"/><label for="iminirank">iminirank</label><br/>
					<input type="checkbox" id="imedirank" name="columns[imedirank]"/><label for="imedirank">imedirank</label><br/>
					<input type="checkbox" id="icprank" name="columns[icprank]"/><label for="icprank">icprank</label><br/>
					<input type="checkbox" id="iccrank" name="columns[iccrank]"/><label for="iccrank">iccrank</label><br/>
					<input type="checkbox" id="gd1" name="columns[gd1]"/><label for="gd1">gd1</label><br/>
					<input type="checkbox" id="bd1" name="columns[bd1]"/><label for="bd1">bd1</label><br/>
					<input type="checkbox" id="comlit" name="columns[comlit]"/><label for="comlit">comlit</label><br/>
					<input type="checkbox" id="ono" name="columns[ono]"/><label for="ono">ono</label><br/>
					<input type="checkbox" id="cnody" name="columns[cnody]"/><label for="cnody">cnody</label><br/>
					<input type="checkbox" id="ddr" name="columns[ddr]"/><label for="ddr">ddr</label><br/>
					<input type="checkbox" id="dateblockm1" name="columns[dateblockm1]"/><label for="dateblockm1">dateblockm1</label><br/>
					<input type="checkbox" id="dateblockm2" name="columns[dateblockm2]"/><label for="dateblockm2">dateblockm2</label><br/>
					<input type="checkbox" id="dateblockm3" name="columns[dateblockm3]"/><label for="dateblockm3">dateblockm3</label><br/>
					<input type="checkbox" id="dateblockm4" name="columns[dateblockm4]"/><label for="dateblockm4">dateblockm4</label><br/>
					<input type="checkbox" id="enutherdistrict" name="columns[enutherdistrict]"/><label for="enutherdistrict">enutherdistrict</label><br/>
					<input type="checkbox" id="bunitdistrict" name="columns[bunitdistrict]"/><label for="bunitdistrict">bunitdistrict</label><br/>
			</div>
		</div>				
      </div>
      <div class="modal-footer">
		<input type="submit" value="submit" name="submitForm" class="btn btn-primary"/>
        <?php if(false){?><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button><?php } ?>
      </div>
	  </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalDownload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width:1000px;margin-left:-100px;">
	<form method="post">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Select the columns you want to see in downloaded table.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<div class="row">		
			<div class="col-md-3">
					<input type="checkbox" id="man_id" name="columns[man_id]"><label for="Id">Id</label><br/>
					<input type="checkbox" id="battalion" name="columns[battalion]"><label for="battalion">battalion</label><br/>
					<input type="checkbox" id="name" name="columns[name]"/><label for="name">name</label><br/>
					<input type="checkbox" id="presentrank" name="columns[presentrank]"/><label for="presentrank">presentrank</label><br/>
					<input type="checkbox" id="depttno" name="columns[depttno]"/><label for="depttno">depttno</label><br/>
					<input type="checkbox" id="typeofduty" name="columns[typeofduty]"/><label for="typeofduty">typeofduty</label><br/>
					<input type="checkbox" id="fathername" name="columns[fathername]"/><label for="fathername">fathername</label><br/>
					<input type="checkbox" id="houseno" name="columns[houseno]"/><label for="houseno">houseno</label><br/>
					<input type="checkbox" id="streetno" name="columns[streetno]"/><label for="streetno">streetno</label><br/>
					<input type="checkbox" id="wardno" name="columns[wardno]"/><label for="wardno">wardno</label><br/>
					<input type="checkbox" id="villmohala" name="columns[villmohala]"/><label for="villmohala">villmohala</label><br/>
					<input type="checkbox" id="city" name="columns[city]"/><label for="city">city</label><br/>
					<input type="checkbox" id="postoffice" name="columns[postoffice]"/><label for="postoffice">postoffice</label><br/>
					<input type="checkbox" id="policestation" name="columns[policestation]"/><label for="policestation">policestation</label><br/>
					<input type="checkbox" id="teshil" name="columns[teshil]"/><label for="teshil">teshil</label><br/>
					<input type="checkbox" id="district" name="columns[district]"/><label for="district">district</label><br/>
					<input type="checkbox" id="Nationality" name="columns[Nationality]"/><label for="Nationality">Nationality</label><br/>
					<input type="checkbox" id="nstate" name="columns[nstate]"/><label for="nstate">nstate</label><br/>
					<input type="checkbox" id="state" name="columns[state]"/><label for="state">state</label><br/>
					<input type="checkbox" id="phouse" name="columns[phouse]"/><label for="phouse">phouse</label><br/>
					<input type="checkbox" id="pstreet" name="columns[pstreet]"/><label for="pstreet">pstreet</label><br/>
					<input type="checkbox" id="pward" name="columns[pward]"/><label for="pward">pward</label><br/>
					<input type="checkbox" id="pvillmohala" name="columns[pvillmohala]"/><label for="pvillmohala">pvillmohala</label><br/>
					<input type="checkbox" id="pcity" name="columns[pcity]"/><label for="pcity">pcity</label><br/>
					<input type="checkbox" id="ppostoffice" name="columns[ppostoffice]"/><label for="ppostoffice">ppostoffice</label><br/>
					<input type="checkbox" id="ppolicestation" name="columns[ppolicestation]"/><label for="ppolicestation">ppolicestation</label><br/>
					<input type="checkbox" id="ptehsil" name="columns[ptehsil]"/><label for="ptehsil">ptehsil</label><br/>
					<input type="checkbox" id="pdistrict" name="columns[pdistrict]"/><label for="pdistrict">pdistrict</label><br/>
					<input type="checkbox" id="pstate" name="columns[pstate]"/><label for="pstate">pstate</label><br/>
					<input type="checkbox" id="gender" name="columns[gender]"/><label for="gender">gender</label><br/>
					<input type="checkbox" id="maritalstatus" name="columns[maritalstatus]"/><label for="maritalstatus">maritalstatus</label><br/>
					<input type="checkbox" id="dateofbith" name="columns[dateofbith]"/><label for="dateofbith">dateofbith</label><br/>
					<input type="checkbox" id="caste" name="columns[caste]"/><label for="caste">caste</label><br/>
					<input type="checkbox" id="category" name="columns[category]"/><label for="category">category</label><br/>
					<input type="checkbox" id="phono1" name="columns[phono1]"/><label for="phono1">phono1</label><br/>
					<input type="checkbox" id="phono2" name="columns[phono2]"/><label for="phono2">phono2</label><br/>
					<input type="checkbox" id="email" name="columns[email]"/><label for="email">email</label><br/>
			</div>
			<div class="col-md-3">
					<input type="checkbox" id="adharno" name="columns[adharno]"/><label for="adharno">adharno</label><br/>
					<input type="checkbox" id="pan" name="columns[pan]"/><label for="pan">pan</label><br/>
					<input type="checkbox" id="nameofbank" name="columns[nameofbank]"/><label for="nameofbank">nameofbank</label><br/>
					<input type="checkbox" id="nameofbranch" name="columns[nameofbranch]"/><label for="nameofbranch">nameofbranch</label><br/>
					<input type="checkbox" id="bankacno" name="columns[bankacno]"/><label for="bankacno">bankacno</label><br/>
					<input type="checkbox" id="ifsccode" name="columns[ifsccode]"/><label for="ifsccode">ifsccode</label><br/>
					<input type="checkbox" id="bloodgroup" name="columns[bloodgroup]"/><label for="bloodgroup">bloodgroup</label><br/>
					<input type="checkbox" id="identificationmark" name="columns[identificationmark]"/><label for="identificationmark">identificationmark</label><br/>
					<input type="checkbox" id="feet" name="columns[feet]"/><label for="feet">feet</label><br/>
					<input type="checkbox" id="inch" name="columns[inch]"/><label for="inch">inch</label><br/>
					<input type="checkbox" id="eduqalification" name="columns[eduqalification]"/><label for="eduqalification">eduqalification</label><br/>
					<input type="checkbox" id="modeofrec" name="columns[modeofrec]"/><label for="modeofrec">modeofrec</label><br/>
					<input type="checkbox" id="dateofinlitment" name="columns[dateofinlitment]"/><label for="dateofinlitment">dateofinlitment</label><br/>
					<input type="checkbox" id="rankofenlistment" name="columns[rankofenlistment]"/><label for="rankofenlistment">rankofenlistment</label><br/>
					<input type="checkbox" id="eexrank" name="columns[eexrank]"/><label for="eexrank">eexrank</label><br/>
					<input type="checkbox" id="eminirank" name="columns[eminirank]"/><label for="eminirank">eminirank</label><br/>
					<input type="checkbox" id="emedirank" name="columns[emedirank]"/><label for="emedirank">emedirank</label><br/>
					<input type="checkbox" id="ecprank" name="columns[ecprank]"/><label for="ecprank">ecprank</label><br/>
					<input type="checkbox" id="eccrank" name="columns[eccrank]"/><label for="eccrank">eccrank</label><br/>
					<input type="checkbox" id="enlistmentcat" name="columns[enlistmentcat]"/><label for="enlistmentcat">enlistmentcat</label><br/>
					<input type="checkbox" id="dateofretirment" name="columns[dateofretirment]"/><label for="dateofretirment">dateofretirment</label><br/>
					<input type="checkbox" id="dateofretirment2" name="columns[dateofretirment2]"/><label for="dateofretirment2">dateofretirment2</label><br/>
					<input type="checkbox" id="gpfpranno" name="columns[gpfpranno]"/><label for="gpfpranno">gpfpranno</label><br/>
					<input type="checkbox" id="inductionrank" name="columns[inductionrank]"/><label for="inductionrank">inductionrank</label><br/>
					<input type="checkbox" id="inductionmode" name="columns[inductionmode]"/><label for="inductionmode">inductionmode</label><br/>
					<input type="checkbox" id="inductiondate" name="columns[inductiondate]"/><label for="inductiondate">inductiondate</label><br/>
					<input type="checkbox" id="prebattalion" name="columns[prebattalion]"/><label for="prebattalion">prebattalion</label><br/>
					<input type="checkbox" id="prebattno" name="columns[prebattno]"/><label for="prebattno">prebattno</label><br/>
					<input type="checkbox" id="loweschoolcdate" name="columns[loweschoolcdate]"/><label for="loweschoolcdate">loweschoolcdate</label><br/>
					<input type="checkbox" id="doc1" name="columns[doc1]"/><label for="doc1">doc1</label><br/>
					<input type="checkbox" id="doc2" name="columns[doc2]"/><label for="doc2">doc2</label><br/>
					<input type="checkbox" id="dofhc" name="columns[dofhc]"/><label for="dofhc">dofhc</label><br/>
					<input type="checkbox" id="intermediatescor" name="columns[intermediatescor]"/><label for="intermediatescor">intermediatescor</label><br/>
					<input type="checkbox" id="dofld" name="columns[dofld]"/><label for="dofld">dofld</label><br/>
					<input type="checkbox" id="dofld2" name="columns[dofld2]"/><label for="dofld2">dofld2</label><br/>
					<input type="checkbox" id="dateofoffasi" name="columns[dateofoffasi]"/><label for="dateofoffasi">dateofoffasi</label><br/>
					<input type="checkbox" id="upperschool" name="columns[upperschool]"/><label for="upperschool">upperschool</label><br/>
			</div>
			<div class="col-md-3">
					<input type="checkbox" id="dateofliste" name="columns[dateofliste]"/><label for="dateofliste">dateofliste</label><br/>
					<input type="checkbox" id="dateofliste2" name="columns[dateofliste2]"/><label for="dateofliste2">dateofliste2</label><br/>
					<input type="checkbox" id="dateoffsi" name="columns[dateoffsi]"/><label for="dateoffsi">dateoffsi</label><br/>
					<input type="checkbox" id="dateoflistf" name="columns[dateoflistf]"/><label for="dateoflistf">dateoflistf</label><br/>
					<input type="checkbox" id="dateoflistf2" name="columns[dateoflistf2]"/><label for="dateoflistf2">dateoflistf2</label><br/>
					<input type="checkbox" id="dateofinsp" name="columns[dateofinsp]"/><label for="dateofinsp">dateofinsp</label><br/>
					<input type="checkbox" id="dopdasp" name="columns[dopdasp]"/><label for="dopdasp">dopdasp</label><br/>
					<input type="checkbox" id="doprosp" name="columns[doprosp]"/><label for="doprosp">doprosp</label><br/>
					<input type="checkbox" id="doprocl" name="columns[doprocl]"/><label for="doprocl">doprocl</label><br/>
					<input type="checkbox" id="btic" name="columns[btic]"/><label for="btic">btic</label><br/>
					<input type="checkbox" id="batchgroup" name="columns[batchgroup]"/><label for="batchgroup">batchgroup</label><br/>
					<input type="checkbox" id="passoutyear" name="columns[passoutyear]"/><label for="passoutyear">passoutyear</label><br/>
					<input type="checkbox" id="bat_id" name="columns[bat_id]"/><label for="bat_id">bat_id</label><br/>
					<input type="checkbox" id="Single" name="columns[Single]"/><label for="Single">Single</label><br/>
					<input type="checkbox" id="Kg" name="columns[Kg]"/><label for="Kg">Kg</label><br/>
					<input type="checkbox" id="Gm" name="columns[Gm]"/><label for="Gm">Gm</label><br/>
					<input type="checkbox" id="UnderGraduate" name="columns[UnderGraduate]"/><label for="UnderGraduate">UnderGraduate</label><br/>
					<input type="checkbox" id="Graduate" name="columns[Graduate]"/><label for="Graduate">Graduate</label><br/>
					<input type="checkbox" id="PostGraduate" name="columns[PostGraduate]"/><label for="PostGraduate">PostGraduate</label><br/>
					<input type="checkbox" id="Doctorate" name="columns[Doctorate]"/><label for="Doctorate">Doctorate</label><br/>
					<input type="checkbox" id="Doctorateother" name="columns[Doctorateother]"/><label for="Doctorateother">Doctorateother</label><br/>
					<input type="checkbox" id="EnlistmentUnit" name="columns[EnlistmentUnit]"/><label for="EnlistmentUnit">EnlistmentUnit</label><br/>
					<input type="checkbox" id="EnlistmentUnitother" name="columns[EnlistmentUnitother]"/><label for="EnlistmentUnitother">EnlistmentUnitother</label><br/>
					<input type="checkbox" id="PRAN" name="columns[PRAN]"/><label for="PRAN">PRAN</label><br/>
					<input type="checkbox" id="BattalionUnitito" name="columns[BattalionUnitito]"/><label for="BattalionUnitito">BattalionUnitito</label><br/>
					<input type="checkbox" id="iIdentityCardNocn" name="columns[iIdentityCardNocn]"/><label for="iIdentityCardNocn">iIdentityCardNocn</label><br/>
					<input type="checkbox" id="Othertraining" name="columns[Othertraining]"/><label for="Othertraining">Othertraining</label><br/>
					<input type="checkbox" id="TrainingInstitutessti" name="columns[TrainingInstitutessti]"/><label for="TrainingInstitutessti">TrainingInstitutessti</label><br/>
					<input type="checkbox" id="TrainingInstitutesstiOther" name="columns[TrainingInstitutesstiOther]"/><label for="TrainingInstitutesstiOther">TrainingInstitutesstiOther</label><br/>
					<input type="checkbox" id="NamesofsCourses" name="columns[NamesofsCourses]"/><label for="NamesofsCourses">NamesofsCourses</label><br/>
					<input type="checkbox" id="DurationsofsCourses" name="columns[DurationsofsCourses]"/><label for="DurationsofsCourses">DurationsofsCourses</label><br/>
					<input type="checkbox" id="DurationsofsCoursest" name="columns[DurationsofsCoursest]"/><label for="DurationsofsCoursest">DurationsofsCoursest</label><br/>
					<input type="checkbox" id="NameofsRanges" name="columns[NameofsRanges]"/><label for="NameofsRanges">NameofsRanges</label><br/>
					<input type="checkbox" id="dateofprcatice" name="columns[dateofprcatice]"/><label for="dateofprcatice">dateofprcatice</label><br/>
					<input type="checkbox" id="tow" name="columns[tow]"/><label for="">tow</label><br/>
					<input type="checkbox" id="LatestAnnualMedicalDate" name="columns[LatestAnnualMedicalDate]"/><label for="LatestAnnualMedicalDate">LatestAnnualMedicalDate</label><br/>
					<input type="checkbox" id="PresentHealthStatus" name="columns[PresentHealthStatus]"/><label for="PresentHealthStatus">PresentHealthStatus</label><br/>
		</div>
		<div class="col-md-3">
					<input type="checkbox" id="ChronicDiseaseDetails" name="columns[ChronicDiseaseDetails]"/><label for="ChronicDiseaseDetails">ChronicDiseaseDetails</label><br/>
					<input type="checkbox" id="MiscDetails" name="columns[MiscDetails]"/><label for="MiscDetails">MiscDetails</label><br/>
					<input type="checkbox" id="osi_status" name="columns[osi_status]"/><label for="osi_status">osi_status</label><br/>
					<input type="checkbox" id="uid" name="columns[uid]"/><label for="uid">uid</label><br/>
					<input type="checkbox" id="com_id" name="columns[com_id]"/><label for="com_id">com_id</label><br/>
					<input type="checkbox" id="" name="columns[Ministerial]"/><label for="Ministerial">Ministerial</label><br/>
					<input type="checkbox" id="Ministerial" name="columns[]"/><label for="">Medical</label><br/>
					<input type="checkbox" id="cf1" name="columns[cf1]"/><label for="cf1">cf1</label><br/>
					<input type="checkbox" id="cf2" name="columns[cf2]"/><label for="cf2">cf2</label><br/>
					<input type="checkbox" id="exs1" name="columns[exs1]"/><label for="">exs1</label><br/>
					<input type="checkbox" id="cexrank" name="columns[cexrank]"/><label for="cexrank">cexrank</label><br/>
					<input type="checkbox" id="cminirank" name="columns[cminirank]"/><label for="cminirank">cminirank</label><br/>
					<input type="checkbox" id="cmedirank" name="columns[cmedirank]"/><label for="cmedirank">cmedirank</label><br/>
					<input type="checkbox" id="ccprank" name="columns[ccprank]"/><label for="ccprank">ccprank</label><br/>
					<input type="checkbox" id="cccrank" name="columns[cccrank]"/><label for="cccrank">cccrank</label><br/>
					<input type="checkbox" id="ierank" name="columns[ierank]"/><label for="ierank">ierank</label><br/>
					<input type="checkbox" id="iminirank" name="columns[iminirank]"/><label for="iminirank">iminirank</label><br/>
					<input type="checkbox" id="imedirank" name="columns[imedirank]"/><label for="imedirank">imedirank</label><br/>
					<input type="checkbox" id="icprank" name="columns[icprank]"/><label for="icprank">icprank</label><br/>
					<input type="checkbox" id="iccrank" name="columns[iccrank]"/><label for="iccrank">iccrank</label><br/>
					<input type="checkbox" id="gd1" name="columns[gd1]"/><label for="gd1">gd1</label><br/>
					<input type="checkbox" id="bd1" name="columns[bd1]"/><label for="bd1">bd1</label><br/>
					<input type="checkbox" id="comlit" name="columns[comlit]"/><label for="comlit">comlit</label><br/>
					<input type="checkbox" id="ono" name="columns[ono]"/><label for="ono">ono</label><br/>
					<input type="checkbox" id="cnody" name="columns[cnody]"/><label for="cnody">cnody</label><br/>
					<input type="checkbox" id="ddr" name="columns[ddr]"/><label for="ddr">ddr</label><br/>
					<input type="checkbox" id="dateblockm1" name="columns[dateblockm1]"/><label for="dateblockm1">dateblockm1</label><br/>
					<input type="checkbox" id="dateblockm2" name="columns[dateblockm2]"/><label for="dateblockm2">dateblockm2</label><br/>
					<input type="checkbox" id="dateblockm3" name="columns[dateblockm3]"/><label for="dateblockm3">dateblockm3</label><br/>
					<input type="checkbox" id="dateblockm4" name="columns[dateblockm4]"/><label for="dateblockm4">dateblockm4</label><br/>
					<input type="checkbox" id="enutherdistrict" name="columns[enutherdistrict]"/><label for="enutherdistrict">enutherdistrict</label><br/>
					<input type="checkbox" id="bunitdistrict" name="columns[bunitdistrict]"/><label for="bunitdistrict">bunitdistrict</label><br/>
			</div>
		</div>				
      </div>
      <div class="modal-footer">
		
		<input type="submit" value="Download" name="download" class="btn btn-primary"/>
        <?php if(false){?><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button><?php } ?>
      </div>
	  </form>
    </div>
  </div>
</div>
</body>
</html>