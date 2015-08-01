$(document).on("click",".confirm",function(e){
	var link = $(this).attr("href"); // "get" the intended link in a var
	e.preventDefault();    
	bootbox.confirm("Anda yakin akan menghapus data ini?", function(result) {    
		if (result) {
			document.location.href = link;  // if result, "set" the document location       
		}    
	});
});