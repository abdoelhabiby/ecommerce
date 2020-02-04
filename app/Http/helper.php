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