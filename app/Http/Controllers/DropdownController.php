<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Range;
use App\Models\State;
use App\Models\Country;
use App\Models\Daterange;
use App\Models\Selectbox;
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


    //Load Recordings using SelectBox
    public function select(){
        $users = Selectbox::all();
        return view('recording',compact('users'));
    }

    public function city(Request $request){
        $slc_city = Selectbox::where('city',$request->city)->get();
        if($slc_city->count() > 0){
            $view = view('test',compact('slc_city'))->render();
            return response()->json([
                'status' => 'success',
                'html' => $view
            ]);
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'Select City first'
            ]);
        }
    }

    //range slider
    public function home(){
        $record = Range::all();
        return view('range slider.home',compact('record'));
    }

    public function age_range(Request $request){
        $all_age = Range::whereBetween('age',[$request->range1,$request->range2])->get();
        if($all_age->count() >0){
            $views = view('range slider.range',compact('all_age'))->render();
            return response()->json([
                'status' => 'success',
                'age' =>$views
            ]);
        }
        else{
            return response()->json([
                'status' => 'error',
                'message' => 'search valid age'
            ]);
        }
    }

    //date range slider
    public function range_date(){
        $date = Daterange::all();
        return view('date_range.data',compact('date'));
    }

    public function get_date(Request $request) {
        $date1 = $request->date1;
        $date2 = $request->date2;
        
        $get_data = Daterange::whereBetween('DOB', [$date1, $date2])->get();
        
        if ($get_data->count() > 0) {
            $dates = view('date_range.range_date', compact('get_data'))->render();
            return response()->json([
                'status' => 'success',
                'htmls' => $dates
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => "No data found for the selected date range"
            ]);
        }
    }

    //auto compleate textbox
    public function auto(Request $request){

        if($request->ajax()){
           $city =  Range::where('city','LIKE',$request->ser_val.'%')->get();
           $output = '';
           if($city->count() > 0){
            $output = '<ul class="list-group" style="display:block;position:relative;z-index:1">';
            foreach($city as $row){
                $output .= '<li class="list-group-item">'.$row->city.'</li>';  
            }
            $output .= '</ul>';
           }else{
            $output .= '<li class="list-group-item m-auto"> No Data Found </li>';
           }
           return $output;
        }
        return view('auto_com.index');
    }

    public function auto_data(Request $request){
        $auto_data = Range::where('city','LIKE','%'.$request->value.'%')->get();

        if($auto_data->count() >0){
            $new_data = view('auto_com.table',compact('auto_data'))->render();
            return response()->json([
                'status' => 'success',
                'html' => $new_data
            ]);
        }
    }



























    
    

    
}
