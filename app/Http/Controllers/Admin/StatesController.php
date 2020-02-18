<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\State;
use App\city;
use Illuminate\Http\Request;

use App\DataTables\StatesDatatable;


class StatesController extends Controller
{
    

    public function index(StatesDatatable $dataTable)
    {
        
       return $dataTable->render('admin.states.index');

        // $test = State::with('country','city')->get();
        // return $test;





    }

// =========================================================================
  
    public function create()
    {
        return view('admin.states.create');
    }
// =========================================================================


  function store(Request $request)
    {
        $validate = $request->validate([

                "state_name_en"  => "required|string|unique:states",
                "state_name_ar"  => "required|string|unique:states",
                "country_id"  => "required|integer",
                "city_id"  => "required|integer",

         ],[],[
            
           "name_en" => "field State Name en",
           "name_ar" => "field State Name ar",
         ]);





       State::create($validate);
   
       session()->flash("success",trans('admin.stateCreate'));

       return redirect(route('states.index'));



    }
// =========================================================================

 
    // public function show(Countries $countries)
    // {
    //     //
    // }


  public function statesCity(){

    if(request()->ajax()){

       if(request()->country && request()->country > 0){


           $country = \App\Countries::where('id',request()->country)->first();
            
           if(!empty($country)){

              $country_id = $country->id;

              $selectOld = request()->select ? request()->select : '';

              $view = view('admin.states._city',compact(['country_id','selectOld']));

             return $view->render();


           }
         }else{
              
              return response(['status' => "false"]);
         }

    }else{
           
           abort(404);

    }


  }


// =========================================================================

    public function edit($states)

    {
       
      $state = State::findOrFail($states);

        return view('admin.states.edit',compact("state"));

    }

// =========================================================================

    public function update(Request $request, $states)
    {


             $state = State::findOrFail($states);

             $validate = $request->validate([

                            "state_name_en"  => "required|string|unique:states,state_name_en,".$state->id.",id",
                            "state_name_ar"  => "required|string|unique:states,state_name_ar,".$state->id.",id",
                            "country_id"  => "required|integer",
                     ]);


           $state->update($validate);
       
           session()->flash("success",trans('admin.StateUpdate'));

           return redirect(route('states.index'));


    }

// =========================================================================
    public function destroy($states)
    {



       $state = State::findOrFail($states);

       $state->delete();

       session()->flash("success",trans('admin.StateDelete'));

       return redirect(route('states.index'));
    }






}
