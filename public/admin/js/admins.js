$(function(){





$(document).on("click",".ButtonDelete",function(e){ 
   e.preventDefault();
    var id = $(this).data('id');
    var action = $(this).data('action');
     $("#modelDelete form").attr("action",action + "/" + id);
    $("#modelDelete").modal("show");
});









});