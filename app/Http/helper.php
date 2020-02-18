<?php


// if(!method_exists("datatableLang")){

	function datatableLang(){
		return [
             "sEmptyTable"=>     trans("admin.sEmptyTable"),
             "sInfo"=>           trans("admin.sInfo"),
             "sInfoEmpty"=>      trans('admin.login'),
             "sInfoFiltered"=>   trans("admin.sInfoFiltered"),
             "sInfoPostFix"=>    "",
             "sInfoThousands"=>      ".",
             "sLengthMenu"=>     trans("admin.sLengthMenu"),
             "sLoadingRecords"=>     trans("admin.sLoadingRecords"),
             "sProcessing"=>     trans("admin.sLoadingRecords"),
             "sSearch"=>         trans("admin.sSearch"),
             "sZeroRecords"=>    trans("admin.sZeroRecords"),
             "oPaginate"=> [
                 "sFirst"=>      trans("admin.sFirst"),
                 "sPrevious"=>   trans("admin.sPrevious"),
                 "sNext"=>       trans("admin.sNext"),
                 "sLast"=>       trans("admin.sLast")
             ],
             "oAria"=> [
                 "sSortAscending"=>  ": aktivieren, um Spalte aufsteigend zu sortieren",
                 "sSortDescending"=> ": aktivieren, um Spalte absteigend zu sortieren"
             ]
		];
	}
// }



 // if(!method_exists("setting")){

    function setting(){
        return \App\Settings::orderBy("id","desc")->first();
    }

 // }



        function validateImage($img = null){

            if($img === null){
                return 'image|mimes:jpeg,jpg,png,gif|max:10000';
            }else{
                return ['image','mimes:'.$img];
            }


        }


        function Uploade(){

            return new App\Http\Controllers\upload;
        }


      function langLocal(){

         return LaravelLocalization::getCurrentLocale();
      }



    ?>