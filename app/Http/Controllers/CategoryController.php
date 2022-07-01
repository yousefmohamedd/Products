<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
       $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }


    public function store(Request $request){
        // 1 validate
        $this->validate($request,[
            "name" => "required",
        ]);

        // 2 store code
        $category = new Category();
        $category->name = $request->name;
        $category->save();

        // 3
        return redirect()->route('categories')->with('message' , 'Category Added SuccessFully');
    }


    public function show(Category $category)
    {
        //
    }

    public function edit($id){
        $category = Category::find($id);
      return view('categories.edit' , compact('category'));
  }

  public function update(Request $request, $id){
      $category = Category::find($id);
      $category->name = $request->name;
      $category->save();
      return redirect()->route('categories')->with('message' , 'Category Updated SuccessFully');
  }


    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('categories')->with('message' , 'Category Deleted SuccessFully');
    }
}
