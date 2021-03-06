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
       

        return $dataTable->render('admin.crud_admin.index');


    }


    public function adminsData()
    {



        return Datatables::of(Admin::query())->make(true);



    }


// ================================================================================================


    public function create()
    {
        return view("admin.crud_admin.create");

    }



// ================================================================================================
    public function store(Request $request)
    {
        $validate = $request->validate([
                     
                     "name" => "required|min:3|string",
                     "email" => "required|email|unique:admins",
                     'password' => ['required', 'string', 'min:6', 'confirmed'],

            ]);

        $validate['password'] = bcrypt($request->password);

        Admin::create($validate);

        session()->flash("success",trans('admin.createSucc'));

        return redirect(route("admin.index"));


    }



// ===============================================================================================

// ================================================================================================

    public function edit(Admin $admin)
    {

        return view("admin.crud_admin.edit",compact("admin"));
    }

// ================================================================================================

    public function update(Request $request, Admin $admin)
    {

            $validate = $request->validate([
                     
                     "name" => "required|min:3|string",
                     "email" => 'required|email|unique:admins,email,'.$admin->id.',id',
                     'password' => ['sometimes','nullable', 'string', 'min:6', 'confirmed'],

            ]);

            
  if($request->has("password")){
        $validate['password'] = bcrypt($request->password);
     }
        $admin->update($validate);

        session()->flash("success",trans('admin.updateSucc'));

        return redirect(route("admin.index"));
    }

// ================================================================================================

    public function destroy(Admin $admin)
    {
         $admin->delete();

        session()->flash("success",trans('admin.deleteSucc'));

        return redirect(route("admin.index"));
        
    }
}
