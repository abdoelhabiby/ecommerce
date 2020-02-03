<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\DataTables\AdminDatatable;

use Yajra\Datatables\Datatables;


class AdminController extends Controller
{



// ================================================================================================

    public function index(AdminDatatable $dataTable)
    {
       

        return $dataTable->render('admin.dataTables.index');


    }


    public function adminsData()
    {



        return Datatables::of(Admin::query())->make(true);



    }


// ================================================================================================


    public function create()
    {


    }



// ================================================================================================
    public function store(Request $request)
    {
        //
    }



// ================================================================================================


    public function show(Admin $admin)
    {
        //
    }


// ================================================================================================

    public function edit(Admin $admin)
    {
        //
    }

// ================================================================================================

    public function update(Request $request, Admin $admin)
    {
        //
    }

// ================================================================================================

    public function destroy(Admin $admin)
    {
        return "test";
    }
}
