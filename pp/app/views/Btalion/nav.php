<section id="col-left" class="col-left-nano">
<div id="col-left-inner" class="col-left-nano-content">
<div class="collapse navbar-collapse navbar-ex1-collapse" id="sidebar-nav">
<ul class="nav nav-pills nav-stacked">
<li <?php if(base_url().'bt-dashboard' == current_url()) { ?>class="active"  <?php  } ?>>
<a href="<?php echo base_url('bt-dashboard'); ?>">
<i class="fa fa-dashboard"></i>
<span>Dashboard</span>
</a>
</li>


<li  <?php if(base_url().'bt-subject' == current_url()) { ?>class="active"  <?php  } ?>>
<a href="<?php echo base_url('bt-subject'); ?>">
<span>Main Subject</span>
</a>
</li>

<li  <?php if(base_url().'bt-topics' == current_url()) { ?>class="active"  <?php  } ?>>
<a href="<?php echo base_url('bt-topics'); ?>">
<span>Topics</span>
</a>
</li>

<li  <?php if(base_url().'bt-slider' == current_url()) { ?>class="active"  <?php  } ?>>
<a href="<?php echo base_url('bt-slider'); ?>">
<span>Image Slider</span>
</a>
</li>


<li  <?php if(base_url().'bt-hometuts' == current_url()) { ?>class="active"  <?php  } ?>>
<a href="<?php echo base_url('bt-hometuts'); ?>">
<span>Home Tution</span>
</a>
</li>

<li>
<a href="<?php echo base_url('bt-password'); ?>/<?php echo $this->session->userdata('userid'); ?>">
<i class="fa fa-key"></i>
<span>Reset Password </span>
</a>
</li>

<li>
<a href="<?php echo base_url('logout'); ?>">
<i class="fa fa-sign-out"></i>
<span>Logout </span>
</a>
</li>

</ul>

</div>
</div>
</section>