<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
    <title>Material Details </title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/jquery.datatables.css"/>
</head>
<body>
<!-- Preloader -->
<div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div>

<section>
<?php $this->load->view(F_BTALION.'html/navbar'); ?>
  <div class="mainpanel">
<?php $this->load->view(F_BTALION.'html/headbar'); ?>
    <div class="pageheader">
      <h3>&nbsp; &nbsp;  &nbsp;  OSI Details </h3>
    </div>

    <div class="contentpanel">  
      <div class="row">
        <div class="col-sm-12">
          <div class="panel panel-dark">
            <div class="panel-heading">
              <div class="panel-btns">
                <a class="minimize" href="#">−</a>
              </div><!-- panel-btns -->
              <h3 class="panel-title">Man Power Details</h3>
            </div>
            <div class="panel-body">
              <h1>Personal Information</h1>
              <strong>Name:</strong> <?php echo $weapon->name; ?><hr/>
              <strong>Father Name:</strong> <?php echo $weapon->fname; ?><hr/>
              <strong>Residential Address:</strong> <?php echo $weapon->radd; ?><hr/>
              <strong>House No:</strong> <?php echo $weapon->hno; ?><hr/>
              <strong>Street No:</strong> <?php echo $weapon->sno; ?><hr/>
              <strong>Village/Mohalla:</strong> <?php echo $weapon->vm; ?><hr/>
              <strong>City:</strong> <?php echo $weapon->ct; ?><hr/>
              <strong>Post Office:</strong> <?php echo $weapon->po; ?><hr/>
              <strong>Police Station:</strong> <?php echo $weapon->ps; ?><hr/>
              <strong>Tehsil:</strong> <?php echo $weapon->tl; ?><hr/>
              <strong>State:</strong> <?php echo $weapon->st; ?><hr/>

              <h1>Permanent Address</h1>
              <strong>House No:</strong> <?php echo $weapon->phno; ?><hr/>
              <strong>Street No:</strong> <?php echo $weapon->psno; ?><hr/>
               <strong>Village/Mohalla:</strong> <?php echo $weapon->pvm; ?><hr/>
              <strong>City Post Office:</strong> <?php echo $weapon->pcpo; ?><hr/>
              <strong>Police Station:</strong> <?php echo $weapon->pps; ?><hr/>
              <strong>Tehsil:</strong> <?php echo $weapon->ptl; ?><hr/>
              <strong>District:</strong> <?php echo $weapon->pd; ?><hr/>
              <strong>State:</strong> <?php echo $weapon->pst; ?><hr/>
              <strong>Gender:</strong> <?php echo $weapon->gender; ?><hr/>
              <strong>Marital Status:</strong> <?php echo $weapon->mstatus; ?><hr/>

              <h1>Educational Details</h1>
              <strong>Status:</strong> <?php echo $weapon->stts; ?><hr/>
              <strong>Under Graduate:</strong> <?php echo $weapon->ug; ?><hr/>
              <strong>Graduate:</strong> <?php echo $weapon->g; ?><hr/>
              <strong>Post Graduate:</strong> <?php echo $weapon->pg; ?><hr/>
              <strong>Doctorate:</strong> <?php echo $weapon->d; ?><hr/>

              <h1>Enlistment Details</h1>
              <strong>Mode of Recruitment:</strong> <?php echo $weapon->mdr; ?><hr/>
              <strong>Direct(Ex-SPO Mode of Recruitmento):</strong> <?php echo $weapon->dmr; ?><hr/>
              <strong>Rank of Enlistment:</strong> <?php echo $weapon->re; ?><hr/>
              <strong>Enlistment Category:</strong> <?php echo $weapon->ec; ?><hr/>
              <strong>Enlistment Unit:</strong> <?php echo $weapon->eu; ?><hr/>
              <strong>Date of Retirement:</strong> <?php echo $weapon->dor; ?><hr/>
              <strong>GPF Pol. No./PRAN No:</strong> <?php echo $weapon->gpf; ?><hr/>

              <h1>Present Service Details</h1>
              <strong>Batalion:</strong> <?php echo $weapon->bt; ?><hr/>
              <strong>Rank:</strong> <?php echo $weapon->rk; ?><hr/>
              <strong>Dept. No:</strong> <?php echo $weapon->dn; ?><hr/>
              <strong>Identity Card No:</strong> <?php echo $weapon->icn; ?><hr/>
              <strong>Induction Rank:</strong> <?php echo $weapon->ir; ?><hr/>
              <strong>Induction Mode:</strong> <?php echo $weapon->im; ?><hr/>
              <strong>Induction Date:</strong> <?php echo $weapon->ind; ?><hr/>
              <strong>Previous Batalion:</strong> <?php echo $weapon->pb; ?><hr/>
              <strong>Previous No:</strong> <?php echo $weapon->prn; ?><hr/>
              <strong>Casual Leave:</strong> <?php echo $weapon->cl; ?><hr/>
              <strong>Induction Mode:</strong> <?php echo $weapon->inm; ?><hr/>

              <h1>Basic Training Course Details</h1>
              <strong>Training Institute:</strong> <?php echo $weapon->ti; ?><hr/>
              <strong>Date of Commencing:</strong> <?php echo $weapon->doc; ?><hr/>
              <strong>Batch No:</strong> <?php echo $weapon->bn; ?><hr/>
              <strong>Belt No:</strong> <?php echo $weapon->belt; ?><hr/>

            </div>
          </div><!-- panel -->
      </div><!-- col-sm-12 -->
    </div><!-- row -->
    </div><!-- contentpanel -->
  </div><!-- mainpanel -->
</section>
<script src="<?php echo base_url();?>webroot/js/jquery-2.1.3.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/modernizr.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/toggles.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/retina.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/jquery.cookies.js"></script>
<script src="<?php echo base_url();?>webroot/js/custom.js"></script>

</body>
</html>