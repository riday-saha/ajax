<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use App\Models\Country;
use Illuminate\Http\Request;

class DropdownController extends Controller
{
    public function index(){
        $all_country = Country::all();
        return view('dropdown',compact('all_country'));
    }

    public function fetchState(Request $request){
        $states = State::where('country_id', $request->country_code)->get();
                return response()->json(['states' => $states]);
    }

    public function fetchCity(Request $request){
        $city = City::where('state_id',$request->state_no)->get();

        return response()->json([
            'cities' => $city
        ]);
    }

    
}
