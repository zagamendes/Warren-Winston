$(document).ready(function(){
	$(".btn-primary").click(function(){
		$("#myModal").modal({backdrop: "static"});
		$("#id").val($(this).data("id"));
    	$("#title").val($(this).data("title"));
    	$("#description").val($(this).data("description"));
    	$("#oldphoto").val($(this).data("oldphoto"));
	});


	$("#myModal").on('hidden.bs.modal', function(){
		$("#id").val("");
    	$("#title").val("");
    	$("#description").val("");
    	$("#oldphoto").val("");
  });
});