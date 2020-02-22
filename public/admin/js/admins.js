$(function(){





$(document).on("click",".ButtonDelete",function(e){ 
   e.preventDefault();
    var id = $(this).data('id');
    var action = $(this).data('action');
    var name = $(this).data('name');
     $("#modelDelete form").attr("action",action + "/" + id);
     $("#modelDelete .modal-body span").text(name);
    $("#modelDelete").modal("show");
});









});