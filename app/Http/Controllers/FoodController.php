<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;
use App\Category;
class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods = Food::latest()->get();
        return view('food.index',compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('food.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|min:3',
            'description' => 'required',
            'category' => 'required',
            'price' => 'required',
            'image' => 'required|mimes:png,jpeg,jpg',
        ]); 
        $image = $request->file('image');
        $file_name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath,$file_name);
        Food::create([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'category_id' => $request->get('category'),
            'price' => $request->get('price'),
            'image' => $file_name
        ]);
        return redirect()->back()->with('message','Food Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $food = Food::find($id);
        return view('food.edit',compact('food'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|min:3',
            'description' => 'required',
            'category' => 'required',
            'price' => 'required',
            'image' => 'mimes:png,jpeg,jpg',
        ]); 
        $food = Food::find($id);
        $file_name = $food->image;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $file_name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath,$file_name);
        }
       
           $food->name = $request->get('name');
           $food->description = $request->get('description');
           $food->category_id = $request->get('category');
           $food->price = $request->get('price');
           $food->image = $file_name;
            $food->save();
      
        return redirect()->route('food.index')->with('message','Food Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $food = Food::find($id);
        $food->delete();
        return redirect()->route('food.index')->with('message','Food Deleted');
    }

    public function listfoods(){
          $categoies = Category::with('food')->get();
         return view('food.list',compact('categoies'));
    }
    public function view($id){
        $food = Food::find($id);
        return view('food.view',compact('food'));
    }
}
