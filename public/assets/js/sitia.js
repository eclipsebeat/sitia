$(function(){
	
});

$(document).on("click",".confirm",function(e){
	var link = $(this).attr("href"); // "get" the intended link in a var
	e.preventDefault();    
	bootbox.confirm("Anda yakin akan menghapus data ini?", function(result) {    
		if (result) {
			document.location.href = link;  // if result, "set" the document location       
		}    
	});
});

$(document).on("click",".confirm-kembali",function(e){
	var link = $(this).attr("href"); // "get" the intended link in a var
	var judul = $(this).attr("judul");
	var peminjam = $(this).attr("peminjam");
	var tgl = $(this).attr("tgl");
	e.preventDefault();
	var msg = "Arsip ini akan dikembalikan?<br/>Judul\t: "+judul+"<br/>Peminjam\t: "+peminjam+"<br/>Tgl Pinjam\t: "+tgl;
	bootbox.confirm(msg, function(result) {    
		if (result) {
			document.location.href = link;  // if result, "set" the document location       
		}    
	});
});

$(document).on("click",".fileview",function(e){
	var pdf_link = $(this).attr('href');
	var iframe = '<div class="iframe-container"><iframe src="'+pdf_link+'"></iframe></div>'
	$.viewFileModal({
	title:'File Arsip',
	message: iframe,
	closeButton:true,
	scrollable:false
	});
	return false;  
	e.preventDefault();    
});

$(document).on('click','.submenu',function(e){
	var menu = $(this).attr('menu');
	$.post('active-menu',{active:menu});
});

$(document).on('click','.pinjamarsip',function(e){
	var id = $(this).attr('id');
	$('#id_arsip').val(id);
});

(function(a){a.viewFileModal=function(b){defaults={title:"",message:"Your Message Goes Here!",closeButton:true,scrollable:false};var b=a.extend({},defaults,b);var c=(b.scrollable===true)?'style="max-height: 420px;overflow-y: auto;"':"";html='<div class="modal fade" id="myModal">';html+='<div class="modal-dialog modal-lg">';html+='<div class="modal-content">';html+='<div class="modal-header">';html+='<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>';if(b.title.length>0){html+='<h4 class="modal-title">'+b.title+"</h4>"}html+="</div>";html+='<div class="modal-body" '+c+">";html+=b.message;html+="</div>";html+='<div class="modal-footer">';if(b.closeButton===true){html+='<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>'}html+="</div>";html+="</div>";html+="</div>";html+="</div>";a("body").prepend(html);a("#myModal").modal().on("hidden.bs.modal",function(){a(this).remove()})}})(jQuery);