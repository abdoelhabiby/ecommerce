<!DOCTYPE html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>@yield("title")</title>

  <!-- Custom fonts for this template-->
  <link href="{{asset('admin')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->

@if(langLocal() == 'ar')

  <link href="{{asset('admin')}}/rtl/css/sb-admin-2.css" rel="stylesheet">

@else
  <link href="{{asset('admin')}}/css/sb-admin-2.css" rel="stylesheet">

@endif
<!-- <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
 -->


  <link href="{{asset('admin')}}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <link href="https://cdn.datatables.net/rowreorder/1.2.6/css/rowReorder.dataTables.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
  
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

  <link href="{{asset('admin')}}/css/admin.css" rel="stylesheet">



<style type="text/css">
  
@if(LaravelLocalization::getCurrentLocale() == 'en')
  div.dataTables_wrapper div.dataTables_paginate ul.pagination {
    justify-content: flex-end !important;
}


@endif


</style>


</head>