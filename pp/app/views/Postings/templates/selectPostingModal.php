<style>.modal-posting {
      width: 100%;
    }

    .modal-in-posting {
      width: 90%;
      width: 1200px;
    }

    .error {
      color: red;
    }

    .breadCrumbPostings ol {
      background-color: #667C2F;
      -webkit-box-shadow: 3px 2px 5px 0px rgba(0, 0, 0, 0.75);
      -moz-box-shadow: 3px 2px 5px 0px rgba(0, 0, 0, 0.75);
      box-shadow: 3px 2px 5px 0px rgba(0, 0, 0, 0.75);
    }

    .breadCrumbPostings ol li a {
      color: white;
      text-decoration: none;
    }


    .posting-list>ul>li:hover {
      color: white;
      background-color: rgb(54, 91, 133);
      cursor: pointer;
    }

    .posting-list>ul>li>label {
      color: white;
      margin-top: 10px;
      cursor: pointer;
    }

    .posting-list>ul>li>input {
      margin-left: 10px;
    }

    #exampleModalLabel2 {
      padding: 10px;
      background: rgb(218, 32, 22);
      height: 40px;
      border-radius: 3px;
      color: white;
      display: table-cell;
      vertical-align: middle;
      text-align: center;
      margin: 5px;
      -webkit-box-shadow: 3px 2px 5px 0px rgba(0, 0, 0, 0.75);
      -moz-box-shadow: 3px 2px 5px 0px rgba(0, 0, 0, 0.75);
      box-shadow: 3px 2px 5px 0px rgba(0, 0, 0, 0.75);
    }
    </style>
    <script src="<?php echo base_url(); ?>webroot/js/myPlugins/selectPosting.js"></script>
    <script>
      var baseUrl = '<?php echo base_url(); ?>' ;
    var posting_manager = new PostingManager(pagination,baseUrl,current_posting,current_posting_);
		posting_manager.bat_id = <?php echo $this->session->userdata('userid'); ?>;
		posting_manager.leave.leave_posting_ids = <?php echo json_encode(array_keys($leaves)); ?>;
    </script>
<div class="modal fade modal-lg modal-posting" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-in-posting" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Select Posting from the list given below, to which you want to assign to the selected Police Personnel.</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body posting-list" id="posting_lists_">
          <div class="row text-center">
            <div class="col-md-12">
              <nav aria-label="breadcrumb" id="breadCrumb" class="breadCrumbPostings">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a></a></li>
                </ol>
              </nav>
            </div>
          </div>
          <div class="row" id="posting_list2">
            <div style="float:left;position:relative;left:40px;" class="col-md-2">
              <select class="form-control select2" onChange="pagination.updateRecordsPerPage()" id="my_pagination_recordsPerPage">
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="-1">All</option>
              </select>

            </div>
            <div class="col-md-5 text-right">
              <label for="global_radio">Search Result Under Selected Posting</label>
              <input type="checkbox" id="global_radio" name="under_posting" onClick="pagination.setIncludePosting(this);">
            </div>
            <div style="float:right;padding-right:20px;width:300px;" class="col-md-5">
              <!--input type="text" class="form-control" placeholder="Search.." id="posting_name_search"/><span class="glyphicon glyphicon-search"></span-->

              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search" id="posting_name_search" />
                <span class="input-group-addon" onClick="posting_manager.searchPostingByName()">
                  <i class="fa fa-search"></i>
                </span>
              </div>
            </div>
            <br><br>
            <div class="posting-list">
              <ul id="posting_list_ul" style="list-style-type:none;">

              </ul>
            </div>
          </div>
          <div class="row">
            <div class="col-md-5">
              <div class="dataTables_info" id="searchedPosting_detail" role="status" aria-live="polite" style="padding-left:30px;padding-top:20px;">

                Showing Postings under HOME

              </div>
            </div>
            <div class="col-md-7 text-right">
              <div class="dataTables_paginate paging_simple_numbers" id="searchedEmployees_paginate">
                <ul class="pagination my_pagination" id="my_pagination">
                  <li class="paginate_button previous disabled" id="searchedEmployees_previous"><a href="#" aria-controls="searchedEmployees" data-dt-idx="0" tabindex="0">Previous</a></li>
                  <li class="paginate_button active"><a href="#">1</a></li>

                  <li class="paginate_button next disabled" id="searchedEmployees_next"><a href="#">Next</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <button type="button" class="btn btn-primary" id="backButton" onClick="posting_manager.load_the_postings_in_posting_lists2(1);">Back</button>
        <div class="modal-footer">
          <!--button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button-->
          <button type="button" class="btn btn-primary" data-dismiss="modal">Save changes</button>
        </div>
      </div>
    </div>
  </div>
<script type="text/javascript">
    var search_bar = document.getElementById('posting_name_search');
    search_bar.addEventListener('keypress', function(event) {

      if (event.keyCode == 13) {
        event.preventDefault();
        posting_manager.searchPostingByName();
      }
    });
</script>
