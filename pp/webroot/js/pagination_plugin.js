
var pagination = {
	startRecordNumber : 1,
	endRecordNumber : 10,
	currentPageNumber : 1,
	totalRecords : 101	,
	totalFilteredRecords : 90,
	recordsPerPage : 10,
	pageDivId : 'my_pagination' ,
	pageMessageId : 'paginate_message',
	totalPages : 10,
	includePosting:'no',
	selectedPostingId:1,
	currentPostingName:'HOME',
	listPages : ''
}
pagination.currentPageNumber = 1;
pagination.pageMessageId = 'searchedPosting_detail';
 pagination.setMessage = function(){
	 if(this.includePosting=='yes' && false){
		 $('#'+this.pageMessageId).html('Showing Postings under '+this.currentPostingName);
	 }else{
		$('#'+this.pageMessageId).html("Showing "+this.startRecordNumber+" to "+this.endRecordNumber+"  of "+this.totalFilteredRecords+" records (filtered From "+this.totalRecords+" records)");
	 }
}
pagination.setPageNumber= function(page_number){
	pagination.currentPageNumber = page_number;
}
pagination.createPageNode= function(i){
	var class_='';
	if(i==this.currentPageNumber){
		class_=" active";
	}
	$('div>ul#'+this.pageDivId).append('<li class="paginate_button'+class_+'" onClick="pagination.setPageNumber('+i+');searchPosting();"><a href="#">'+i+'</a></li>');
	//$('div>ul#'+this.pageDivId).append($('li').append($('a').text(i)).addClass('paginate_button'+class_));
}
pagination.setPageNumbers = function(){
	
	 if(this.includePosting=='yes' && false){
		 $('div>ul#'+this.pageDivId).html('');
		 $('div>ul#'+this.pageDivId).append('<li class="paginate_button disabled"><a href="#">Previous</a></li>');
		 $('div>ul#'+this.pageDivId).append('<li class="paginate_button active"><a href="#">1</a></li>');
		 $('div>ul#'+this.pageDivId).append('<li class="paginate_button disabled"><a href="#">Next</a></li>');
		 
	 }else{
	$('div>ul#'+this.pageDivId).html('');
	var class_ = '';
	var previous_page = '';
	if(this.currentPageNumber==1){
		class_='disabled';
		previous_page = '';
	}else{
		previous_page="pagination.setPageNumber("+(this.currentPageNumber-1)+");searchPosting();";
	}
	$('div>ul#'+this.pageDivId).append('<li class="paginate_button '+class_+'" ><a href="#" onClick="'+previous_page+'">Previous</a></li>');
	if(this.totalPages<10){
		for(var i=1;i<=this.totalPages;i++){
			this.listPages += this.createPageNode(i);
		}
	}else{
		
		if(this.currentPageNumber>5){
			$('div>ul#'+this.pageDivId).append('<li class="paginate_button" onClick="pagination.setPageNumber(1);searchPosting();"><a href="#">1</a></li>');
			$('div>ul#'+this.pageDivId).append('<li class="paginate_button disabled"><a href="#">...</a></li>');
			for(var i=this.currentPageNumber-2;i<=this.currentPageNumber+2 && i<=this.totalPages;i++){
				this.listPages += this.createPageNode(i);
			}
			if(this.currentPageNumber<this.totalPages-2){
				$('div>ul#'+this.pageDivId).append('<li class="paginate_button disabled"><a href="#">...</a></li>');
				if(this.totalPages==this.currentPageNumber){
					class_= 'active';
				}else{
					class_ = '';
				}
				$('div>ul#'+this.pageDivId).append('<li class="paginate_button '+class_+'" onClick="pagination.setPageNumber('+this.totalPages+');searchPosting();"><a href="#">'+this.totalPages+'</a></li>');
			}
		}else{
			for(var i=1;i<=5;i++){
				this.listPages += this.createPageNode(i);
			}
			$('div>ul#'+this.pageDivId).append('<li class="paginate_button disabled"><a href="#">...</a></li>');
			
			$('div>ul#'+this.pageDivId).append('<li class="paginate_button"><a href="#" onClick="pagination.setPageNumber('+this.totalPages+');searchPosting();">'+this.totalPages+'</a></li>');
		}
		
		
	}
	class_ = '';
	
	//alert(this.currentPageNumber + ' '+ this.totalPages);
	if(this.currentPageNumber==this.totalPages){
		class_='disabled';
		next_page="";
	}else{
		next_page="pagination.setPageNumber("+(this.currentPageNumber+1)+");searchPosting();";
	}
	$('div>ul#'+this.pageDivId).append('<li class="paginate_button '+class_+'"><a href="#"  onClick="'+next_page+'">Next</a></li>');
	 }
		//alert('setting pages');
}
/** Process on provided data
*/
pagination.calculate= function(){
	if(this.recordsPerPage==-1){
		this.recordsPerPage = this.totalFilteredRecords;
	}
	this.totalPages = parseInt(this.totalFilteredRecords/this.recordsPerPage);
	if(this.totalFilteredRecords%this.recordsPerPage>0){
		this.totalPages++;
	}
	//get the start and end
	this.startRecordNumber = ((this.currentPageNumber-1)*this.recordsPerPage)+1;
	if(this.totalPages==0){
		this.endRecordNumber = 0;
		this.startRecordNumber = 0;
	}else if(this.totalPages==this.currentPageNumber){
		if(this.totalFilteredRecords<=this.recordsPerPage){
			
			this.endRecordNumber = this.totalFilteredRecords;
		}else{
			
			if(this.currentPageNumber==1){
				this.endRecordNumber =  ((this.currentPageNumber-1)*this.recordsPerPage) + (this.totalFilteredRecords%this.recordsPerPage);
			}else{
				this.endRecordNumber =  ((this.currentPageNumber)*this.recordsPerPage) + (this.totalFilteredRecords%this.recordsPerPage);
			}
		}
	}else{
		this.endRecordNumber =  ((this.currentPageNumber)*this.recordsPerPage);
	}
};
pagination.updateRecordsPerPage = function(){
	this.recordsPerPage = $('#my_pagination_recordsPerPage').val();
	
}
pagination.setIncludePosting = function(obj){
	if($(obj).prop('checked')==true){

		this.includePosting = 'yes';
	}else{
		this.includePosting = 'no';
	}
}
pagination.paginate = function(){
	
	this.calculate()
	this.setMessage(); 
	this.setPageNumbers();
}