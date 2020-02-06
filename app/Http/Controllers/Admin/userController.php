<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\DataTables\usersDatatable;

use Yajra\Datatables\Datatables;

class userController extends Controller
{
   // ================================================================================================

    public function index(usersDatatable $dataTable)
    {
       

        return $dataTable->render('admin.users.index');


    }


    // public function usersData()
    // {

    //     return Datatables::of(User::query())->make(true);



    // }


// ================================================================================================


    public function create()
    {
        return view("admin.users.create");

    }



// ================================================================================================
    public function store(Request $request)
    {
        $validate = $request->validate([
                     
                     "name" => "required|min:3|string",
                     "email" => "required|email|unique:users",
                     "level" => "required|in:user,vendor,company",
                     'password' => ['required', 'string', 'min:6', 'confirmed'],

            ]);

        $validate['password'] = bcrypt($request->password);


        User::create($validate);

        session()->flash("success",trans('admin.createSuccUs'));

        return redirect(route("users.index"));


    }



// ===============================================================================================

    public function edit($edit)
    {
         $users = User::findOrFail($edit);


        return view("admin.users.edit",compact("users"));
    }

// ================================================================================================

    public function update(Request $request,$update)
    {
         
       $users = User::findOrFail($update);

            $validate = $request->validate([
                     
                     "name" => "required|min:3|string",
                     "email" => 'required|email|unique:users,email,'.$users->id.',id',
                     "level" => "required|in:user,vendor,company",
                     'password' => ['sometimes','nullable', 'string', 'min:6', 'confirmed'],

            ]);

            
  if($request->has("password")){
        $validate['password'] = bcrypt($request->password);
     }
        $users->update($validate);

        session()->flash("success",trans('admin.updateSucc'));

        return redirect(route("users.index"));
    }

// ================================================================================================

    public function destroy($destroy)
    {
        
         $users = User::findOrFail($destroy);

         $users->delete();

        session()->flash("success",trans('admin.deleteSuccUsr'));

        return redirect(route("users.index"));
        
    }
}
