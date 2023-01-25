class PostingManager {
    //porperties variable fields
    posting_route = [];
	selected_posting_id = null;
	selected_posting_ids = [];
    selected_postings ={};
    props={
        posting_name_element : 'selected_posting_name',
        multipleSelection:false
    };
    current_posting_id = null;
    current_posting_ = null;
    current_posting= null;
    baseUrl='';
    var_name = 'posting_manager';
    url='get-sub-postings-employee-list';
    leave = {};
    //constructor
    constructor(pagination,baseUrl,current_posting,current_posting_){
        this.baseUrl = baseUrl;
        this.pagination = pagination;
        //console.log("i am acontru");
        this.current_posting = current_posting;
        this.current_posting_ = current_posting_;
        this.leave = {
			type: 'POSTING'
		};
		//this.leave.leave_posting_ids = <?php echo json_encode(array_keys($leaves)); ?>;

		this.leave.setToLeaveForm = function() { //DALWINDER
			$('#order_number_div').hide();
			$('#order_date_div').hide();
			$('#leave_from_date_div').css('display', 'inline');
			$('#leave_to_date_div').css('display', 'inline');
			$('#leave_date_div').css('display', 'inline');
			$('#posting_date_div').css('display', 'none');
			$('#type').val('LEAVE');
			//$('#addPostingButton').attr('onClick','markLeave()');
			$('#add_posting_button').val('Mark Leave');
		}
		this.leave.setToPostingForm = function() {
			$('#order_number_div').show();
			$('#order_date_div').show();
			$('#leave_from_date_div').css('display', 'none');
			$('#leave_to_date_div').css('display', 'none');
			$('#leave_date_div').css('display', 'none');
			$('#posting_date_div').css('display', 'inline');
			$('#type').val('POSTING');
			//$('#addPostingButton').attr('onClick','updateEmployeePosting()');
			$('#add_posting_button').val('Add Posting');
		}
    }
    showModal=(posting_name_element='selected_posting_name',props=null)=>{
        if(props!=null){
            if(props.multiple===true){
                this.props.multipleSelection = props.multiple;
            }else if(props.multiple===false){
                this.props.multipleSelection = props.multiple;
            }
        }
        //console.log(props.multiple);
        //console.log(this.props.multipleSelection);
        if(this.props.multipleSelection===true){
            $('input[name=posting_list_name]').attr('type','checkbox');
        }else{
            $('input[name=posting_list_name]').attr('type','radio');
        }
        this.props.posting_name_element=posting_name_element;
        $('#exampleModal2').modal('toggle');
    }
    load_the_postings_in_posting_lists2=(selectedPostingId, posting_name)=>{
        this.pagination.selectedPostingId = selectedPostingId;
        this.pagination.currentPostingName = 'Postings under ' + posting_name;
        this.current_posting_id = selectedPostingId;
        this.current_posting = {
            id: selectedPostingId,
            name: posting_name
        };
        this.posting_route.push(this.current_posting);
        var data = {
            id: selectedPostingId
        };
        var cur_obj = this;
        $.ajax({
            type: "POST",
            url: baseUrl+'get-sub-postings-employee-list',
            data: data,
            success: function(response) {
                //console.log(response);
                //obj = JSON.parse(response);
                let obj = JSON.parse(response);
                //console.log(obj);
                $('#backButton').attr('onClick', cur_obj.var_name+'.load_the_postings_in_posting_lists2(' + obj['posting_detail'][0].parent_posting_id + ',"' + obj['posting_detail'][0].name + '"),'+cur_obj.var_name+'.pop_posting_route()');
                cur_obj.insertDataInPostingList2(obj['subpostings']);
            }
        });
    }
    pop_posting_route=()=>{
        this.posting_route.pop();
        this.posting_route.pop();
    }
    getButtonType=()=>{
        if(this.props.multipleSelection===true){
            return 'checkbox';
        }else{
            return 'radio';
        }
    }
    insertDataInPostingList2=(obj)=> {
        //console.log(obj);
        $('#posting_list_ul').empty();
        let type = this.getButtonType();
        for (var i = 0; i < obj.length; i++) {
            var radio_ = $('<input>')
                .attr('type', type)
                .attr('id', 'nestedListname' + obj[i].id)
                .attr('name', 'posting_list_name')
                .attr('onClick', this.var_name+'.setPostingNameOnPage("' + obj[i].link_ + '",' + obj[i].id + ')')
                .attr('value', obj[i].id);
            if (this.current_posting_ == obj[i].id) {
                radio_.attr('checked', true);
                //setPostingNameOnPage(obj[i].name);
            }
            var add_ = $('<span>')
                .attr('onClick', this.var_name+'.addSubposting(' + obj[i].id + ')')
                .attr('style', 'cursor:pointer;')
                .append('&nbsp;&nbsp;+');
            //console.log(obj[i]);

            var list = $('<li>').attr('id', 'nestedList' + obj[i].id).attr('style', 'height:100%');
            if (obj[i].haveChilds !== true) {
                list.append(radio_);
                var label_ = $('<label>')
                    .attr('for', 'nestedListname' + obj[i].id)
                    //.attr('onClick','setPostingNameOnPage("'+obj[i].link_+'")')
                    .append('&nbsp;&nbsp;' + obj[i].name);
                list.append(label_);
            } else {
                var label_ = $('<label>')
                    .attr('for', 'nestedListname' + obj[i].id)
                    .attr('onClick', this.var_name+'.load_the_postings_in_posting_lists2(' + obj[i].id + ',"' + obj[i].link_ + '")')
                    .append('&nbsp;&nbsp;' + obj[i].name);
                list.append('&nbsp;&nbsp;&nbsp;&nbsp;');
                list.append(label_);
            }
            $('#posting_list_ul').append(list);
            this.writeBreadCums();
        }
    }
    writeBreadCums=()=> {
        //console.log('Writing bread Cums');
        $('#breadCum').empty();
        var j = this.posting_route.length;
        var i = 0;
        $('#breadCrumb>ol').empty();
        $('#breadCrumb>ol').append($('<li>')
            .attr('class', 'breadcrumb-item')
            .attr('id', 'breadCum0')
            //.attr('onClick',""+'posting_manager.pop_postings('+j+'),getSubPostings('+obj.id+')')
            .attr('onClick', this.var_name+'.load_the_postings_in_posting_lists2(0,""),pop_postings(' + (j + 1) + ')')
            .append($('<a>')
                //.attr('href','')
                .append('/')
            )
        );
        $.each(this.posting_route, (key, value_)=> {
            //console.log(key);
            j--;
            //console.log(value_);
            $('#breadCrumb>ol').append($('<li>')
                .attr('class', 'breadcrumb-item')
                .attr('id', 'breadCum' + value_.id)
                //.attr('onClick',""+'posting_manager.pop_postings('+j+'),getSubPostings('+obj.id+')')
                .attr('onClick', this.var_name+'.load_the_postings_in_posting_lists2(' + value_.id + ',"' + value_.name + '"),'+this.var_name+'.pop_postings(' + j + ')')
                .append($('<a>')
                    //.attr('href','')
                    .append(value_.name)
                )
            );
        });
    }
    pop_postings=(i)=> {
        this.posting_route.pop();
        for (var j = 0; j < i; j++) {
            this.posting_route.pop();
        }
    }
    addSubposting=(id)=> {
        var data = {
            'id': id
        }
        let type = this.getButtonType();
        $.ajax({
            type: "POST",
            url: this.baseUrl+"get-sub-postings",
            data: data,
            success: function(html) {
                //alert('hi');
                //console.log(html);
                var obj = JSON.parse(html);
                var posting_id = 5;
                for (var i = 0; i < obj.length; i++) {
                    //console.log(i);
                    var posting_name = obj[i].name;
                    var radio = $('<input>')
                        .attr('type', type)
                        .attr('id', 'nestedListname' + obj[i].id)
                        .attr('name', 'posting_list_name')
                        .attr('value', obj[i].id);
                    var label = $('<label>')
                        .attr('for', 'nestedListname' + obj[i].id)
                        .append(posting_name);
                    var span = $('<span>')
                        .attr('onClick', this.var_name+'.addSubposting(' + obj[i].id + ')')
                        .attr('style', 'cursor:pointer;')
                        .append('&nbsp;&nbsp;+');
                    $('#nestedList' + id)
                        .append($('<ul>')
                            .attr('style', 'list-style-type:none;')
                            .append($('<li>')
                                .attr('id', 'nestedList' + obj[i].id)
                                .append(radio)
                                .append(label)
                                .append(span)
                            ));
                    //console.log(i);			
                }
                $('#postingBackButton').attr('onClick', 'getSubPostings(' + html + '),pop_postings()');
            }
        });
    }
    insertDataInList=(obj)=> {
        //console.log(obj);
        let type = this.getButtonType();
        $("#posting_lists ul").empty();
        for (var i = 0; i < obj.length; i++) {
            //console.log(obj[i]);
            $('#posting_lists ul').append($('<li>')
                .attr('id', 'nestedList' + obj[i].id)
                .append($('<input>')
                    .attr('type', type)
                    .attr('id', 'nestedListname' + obj[i].id)
                    .attr('name', 'posting_list_name')
                ).append($('<label>')
                    .attr('for', 'nestedListname' + obj[i].id)
                    .append('&nbsp;&nbsp;' + obj[i].name)
                ).append($('<span>')
                    .attr('onClick', this.var_name+'.addSubposting(' + obj[i].id + ')')
                    .attr('style', 'cursor:pointer;')
                    .append('&nbsp;&nbsp;+')
                )
            );

        }
        $('#exampleModal').modal('toggle');
    }
    setPostingNameOnPage=(posting_name, posting_id)=>{
        
        if(this.props.multipleSelection===true){
            this.selected_posting_id = '';
            //console.log('checked','#nestedListname'+posting_id,$('#nestedListname'+posting_id).attr('checked'));
            if($('#nestedListname'+posting_id).attr('checked')=='checked'){
                this.selected_posting_ids.push(posting_id);
                this.selected_postings[posting_id]={
                    id:posting_id,
                    name:posting_name
                };
            }else{
                let index = this.selected_posting_ids.indexOf(posting_id);
                this.selected_posting_ids.splice(index,1);
                delete this.selected_postings[posting_id];
            }
            let posting_name_ ='';
            Object.entries(this.selected_postings).map((item,index)=>{
                if(posting_name_!=''){
                    posting_name_+=','    ;
                }
                //console.log(item[1]);
                posting_name_+=item[1].name;
            })
            $('#'+this.props.posting_name_element).html('&nbsp;&nbsp;&nbsp;&nbsp;Selected Posting is : [<i>' + posting_name_ + '</i>]')

        }else{
            this.selected_posting_id = posting_id;
            $('#'+this.props.posting_name_element).html('&nbsp;&nbsp;&nbsp;&nbsp;Selected Posting is : [<i>' + posting_name + '</i>]')
            if ($.inArray(this.selected_posting_id, this.leave.leave_posting_ids) != -1) {

                this.leave.setToLeaveForm();
                this.leave.type = 'LEAVE'
            } else {
                this.leave.setToPostingForm();
                this.leave.type = 'POSTING';
            }
            this.getAdditionalPostingInfo();
        }
        //this.selected_posting_id = posting_id;
        //$('#selected_posting_name').html('&nbsp;&nbsp;&nbsp;&nbsp;Selected Posting is : [<i>' + posting_name + '</i>]')
        
        
        
        
    }
    getAdditionalPostingInfo=()=>{
        let posting_id = this.selected_posting_id;
        $.ajax({
            url: this.baseUrl+'ajaxGetAdditionalPostingInfo',
            method: 'POST',
            data: {
                selected_posting_id: posting_id
            },
            success: function(html) {
                var data = JSON.parse(html);
                $('select#additional_posting_info').empty().trigger('change');
                var data_ = {
                    id: '',
                    text: `-- Optional --`
                };
                var newOption = new Option(data_.text, data_.id, false, false);
                $('select#additional_posting_info').append(newOption).trigger('change');
                //console.log(data.data.length);
                //console.log(data);
                if (data.data.length == 0) {
                    $('select#additional_posting_info').parent().css('display', 'none');
                }
                $.each(data.data, function(k, val) {
                    var data_ = {
                        id: val.id,
                        text: `${val.title} - ${val.type_title}`
                    };
                    var newOption = new Option(data_.text, data_.id, false, false);
                    $('select#additional_posting_info').append(newOption);
                });
                $('select#additional_posting_info').trigger('change');
            }
        });
    }
    searchPostingByName=()=> {
        this.pagination.currentPageNumber = 1;
        this.searchPosting();
    }
    searchPosting= async ()=> {
        /*$( "#posting_name_search" ).keyup(function(event) {
            if (event.keyCode === 13) {*/
        //alert('hi');
        let search_text = $('#posting_name_search').val();
        var recordsPerPage = this.pagination.recordsPerPage
        var data = {
            'searchText': search_text,
            'recordsPerPage': this.pagination.recordsPerPage,
            'pageNumber': this.pagination.currentPageNumber,
            'includePosting': this.pagination.includePosting,
            'id': this.pagination.selectedPostingId,
            'bat_id': this.bat_id
            //'id':current_posting.id
        };
        let cur_obj = this;
        let response_  = await $.ajax({
            url: this.baseUrl+"search-posting",
            type: "POST",
            data: data,
            success: function(response) {
                //console.log(response);
                var obj = JSON.parse(response);
                return obj;
                //console.log(obj['postings']);
                
            }
        });
        let response = JSON.parse(response_);
        //console.log("dalwinder");
        //console.log(response);
        this.insertDataInPostingList2(response['postings']);
        this.pagination.totalRecords = response['total_postings'];
        this.pagination.totalFilteredRecords = response['total_filtered_postings'];
        this.pagination.paginate();
        //alert( search_text + "Enter button presed." );
    }
}

