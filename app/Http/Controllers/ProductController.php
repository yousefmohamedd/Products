<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $products = Product::all();
        return view('products.index' , compact('products'));
    }

    public function create(){
        return view('products.create')->with('categories' , Category::all());
    }


    public function store(Request $request)
    {
        // validation
        $this->validate($request,[
            "title" => "required",
            "price" => "required",
            "image" => "image|mimes:png,jpg,jpeg,svg",
        ]);
//upload image
        $image = $request->file('image');
        $image_name = time().$image->getClientOriginalName();
        $image->move("images/" , $image_name);

        $product = Product::create([
            "title"=>$request->title,
            "category_id"=>$request->category_id,
            "price"=>$request->price,
            "description"=>$request->description,
            "image"=>$image_name,
        ]);

        return redirect()->route('products')->with('message' , 'Product Added SuccessFully');
    }


    public function show($id)
    {
        $product = Product::find($id);
        return view('products.show' , compact('product'));
    }


    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit' , compact('product'));
    }


    public function update(Request $request,$id)
    {
        $product = Product::find($id);
    }


    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('prosduct')->with('message' , 'product Deleted SuccessFully');
    }
}
