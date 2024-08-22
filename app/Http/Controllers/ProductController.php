<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function form(){
        return view('create');
    }



    public function create(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);

        $create = product::create([
            'name' => $validated['name'],
            'price' => $validated['price'],
        ]);

        //return redirect()->to('/');
        return response()->json([
            'status' => 'success',
        ]);
    }

    public function show(){
        $show = product::orderBy('name','ASC')->paginate(5);
        return view('welcome',compact('show'));
    }

    public function update_product(Request $request){
        $validated = $request->validate([
            'up_id' => 'required|exists:products,id',
            'up_name' => 'required|string|max:255',
            'up_price' => 'required|numeric',
        ]);
    
        $update = Product::where('id', $request->up_id)->update([
            'name' => $request->up_name,
            'price' => $request->up_price,
        ]);
    
        return response()->json([
            'status' => $update ? 'success' : 'error',
        ]);
    }

    public function delete_product(Request $request){
        $delete = Product::find($request->pro_id)->delete();

        return response()->json([
            'status' => 'success',
        ]);
    }

    //pagination
    public function pagination(Request $request){
        $show = Product::paginate(5);
        return view('pagination_products',compact('show'))->render();
    }

    //search
    public function search_product(Request $request){
        $show = Product::where('name','like', '%'.$request->search_string .'%')
                ->orWhere('price','like','%'.$request->search_string.'%')->orderBy('name','asc')
                ->paginate(5);

        if($show->count() >=1){
            return view('pagination_products',compact('show'))->render();
        }else{
            return response()->json([
                'status' => 'nothing_found',
            ]);
        }
    }













    
}
