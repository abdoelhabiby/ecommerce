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
       

        return $dataTable->render('admin.index');


    }


    public function adminsData()
    {



        return Datatables::of(Admin::query())->make(true);



    }


// ================================================================================================


    public function create()
    {
        return view("admin.create");

    }



// ================================================================================================
    public function store(Request $request)
    {
        $validate = $request->validate([
                     
                     "name" => "required|min:3|string",
                     "email" => "required|email|unique:admins",
                     'password' => ['required', 'string', 'min:8', 'confirmed'],

            ]);

        return $validate;

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
