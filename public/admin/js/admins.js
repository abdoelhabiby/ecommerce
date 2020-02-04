$(function(){



$(document).on("click",".deleteAdmin",function(e){ 

	e.preventDefault();

    var id = $(this).data('id');

     $("#adminDelete form").attr("action","admin/" + id);

    $("#adminDelete").modal("show");


});







});