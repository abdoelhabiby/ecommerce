$(function(){



$(document).on("click",".deleteAdmin",function(e){ 

	e.preventDefault();

    var id = $(this).data('id');

     $("#adminDelete form").attr("action","admin/" + id);

    $("#adminDelete").modal("show");


});

$(document).on("click",".deleteUser",function(e){ 

	e.preventDefault();

    var id = $(this).data('id');

     $("#deleteUers form").attr("action","users/" + id);

    $("#deleteUers").modal("show");


});










});