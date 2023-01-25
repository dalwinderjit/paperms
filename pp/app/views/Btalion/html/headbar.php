 <div class="headerbar backset">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" onClick="toggleSidebar()">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
  </span>
   <div class="header-left">
   <h1 class="text-center" style="color: rgb(118, 0, 0);
       text-shadow: rgb(3, 3, 3) 1px 2px 1px;"><strong>ELECTRONIC RESOURCE MANAGEMENT SYSTEM</strong> </h1>
   <h3 class="text-center" style="color: rgb(118, 0, 0);text-shadow: rgb(2, 2, 2) 1px 2px 1px;">ARMED WING (PUNJAB POLICE)</h3>
   </div>
</div><!-- headerbar -->
<script>
  async function UpdateTheNotifications(){
    
    let data = await $.ajax({
      url:"<?php echo base_url();?>getNotification",
		  type:"GET",
      contentType:"application/json",
      dataType:"json",
      success:function(response){
        return response
      },
      error:function(error){
        return error;
      }
    })
    let notification ='<ul>';
    $('#notification_count').html(data.length);
    if(data.length>0){
      data.map((a,index)=>{
        notification+=`<li id="emp_${a.man_id}">
          <div><span style="color:green"><b>${a.type}</b></span> <b>${a.rank} ${a.name} (${a.depttno})</b> from ${a.battalion_name}</div>
          <div><span>DDR NO.& Date ${a.ddr}</span> </span>Transfer Date: ${a.DateOfRelieving}<span></div>
          <div>Phone No: ${a.phoneNo} , Date of Relieving: ${a.DateOfRelieving}</div>
          <div class="text-right">
            <span style="color:red;">
              Please Update 
            </span>
            <span class="fa fa-angle-down" onClick="toggleUpdateForm(this,${a.man_id})"></span>
          </div>
          <div id="form_${a.man_id}" class="udpateEmployeeform" style="margin-top:10px;display:none;">
            <div class="form-group">
              <input type="hidden" id="employee_id" value="${a.man_id}"/>
              <input type="text" name="belt_no" value="" id="belt_no" class="form-control" placeholder="Enter New belt Number" 0="">
            </div>
            <button class="btn btn-darkblue btn-sm">Update</button>
          </div>
        </li>`;
      })
    }
    $('#notification>div.content').html(notification+"</ul>");

  }
  function toggleUpdateForm(obj,id){
    $("#form_"+id).toggle();
    $('.udpateEmployeeform').html('');
    var form = `<div class="form-group">
              <input type="hidden" id="employee_id" value="${id}"/>
              <input type="text" name="belt_no" value="" id="belt_no" class="form-control" placeholder="Enter New belt Number" 0="">
              <span class="error2" id="overallError"></span>
            </div>
            <button class="btn btn-darkblue btn-sm" onClick="updateBeltNoBattalion()">Update</button>`;
    $('div.notification span.fa-angle-up').addClass('fa-angle-down').removeClass('fa-angle-up');
    if($("#form_"+id).css('display')==='block'){
      $('#form_'+id).html(form);
      $(obj).addClass('fa-angle-up');
      $(obj).removeClass('fa-angle-down');
    }else{
      $('#form_'+id).html('');
      $(obj).removeClass('fa-angle-up');
      $(obj).addClass('fa-angle-down');
    }
  }
  document.addEventListener("DOMContentLoaded", () => {
    console.log("Hello World!");
    if(true){
      <?php if($this->session->userdata('user_log')==4){ ?>
      appendNotificationHtmlToHeader();
      UpdateTheNotifications();
      $('.fa-badge,.fa-bell').on("click",function(){$('.notification').toggle();
        if($('.notification').css('display')==='block')
          {$('#my-bell').addClass('active')}
        else{
          {$('#my-bell').removeClass('active')}
        }
      })
      <?php } ?>
    }
  });
  appendNotificationHtmlToHeader=()=>{
    let html =`
    <div class="text-right">
      <!--span id="notificationbtn"></span-->
      <div class="notification_icons">
        <span class="fa fa-badge my-badge"></span>
        <span class="fa fa-bell" id="my-bell"></span>
      </div>
      <div class="notification text-left" id="notification" style="display:none;">
        <div class="title"><h4>Notifications</h4></div>
        <div class="content"></div>
      </div>
    </div>`;
    $('div.pageheader').append(html);
  }
  redirectToUdpateEmployeePage = (emp_id)=>{
    $('div.notification>ul>li').addClass('disable');
    $(`div.notification>ul>li#emp_${emp_id}`).removeClass('disable');
    $(`div.notification>ul>li#emp_${emp_id}`).addClass('active');
    $('div.update_notification').css('display','');
    $('#employee_id').val(emp_id);
    //window.location = "<?php echo base_url()?>bt-updates-manpower/"+emp_id;
  }
  updateBeltNoBattalion=async ()=>{
    var belt_no = $('#belt_no').val();
    var employee_id = $('#employee_id').val();
    let data = await $.ajax({
      url:"<?php echo base_url();?>udpateBeltNo",
		  type:"POST",
      dataType:"json",
      data:{belt_no:belt_no,employee_id:employee_id},
      success:function(response){
        return response
      },
      error:function(error){
        return error;
      }
    });
    
    if(data.status===true){
      /*$('div.notification>ul>li').removeClass('disable');
      $('div.notification>ul>li').removeClass('active');
      $(`div.notification>ul>li#emp_${employee_id}`).removeClass('disable');
      $(`div.notification>ul>li#emp_${employee_id}`).removeClass('active');
      $('div.update_notification').css('display','none');
      $('#employee_id').val('');
      $('#belt_no').val('');*/
      UpdateTheNotifications();
    }else{
      $('#overallError').html(data.message);
      
    }
    
  }
 
</script>