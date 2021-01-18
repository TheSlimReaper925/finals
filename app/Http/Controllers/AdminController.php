<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as Input; 
use App\Models\Products;
use Auth;
use App\Models\Category;
use CategoryProduct;
use File;
use App\Models\CategoryProducts;

class AdminController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$category = Category::get();
    	return view('admin', ["category"=>$category]);
    }

    public function storeProduct(Request $request){
    	$imageName = uniqid().".jpg";  
    	$dp=public_path('images');
     
        $request->image->move($dp, $imageName);

    	$store = Products::create([
    		'name'=>$request->input('name'),
    		'price'=>$request->input("price"),
    		'description'=>$request->input("description"),
    		'image'=>$imageName
    	]);

        $id = $store["id"];  

        CategoryProducts::create([
            "product_id"=>$id,
            "category_id"=>$request->input('category')
        ]); 

        return redirect()->route("allproducts");

    }

    public function allproducts()
    {
    	$Products=Products::get();

    	return view('allproducts', ["products"=>$Products]);
        // return $Products;
    }

    public function deleteProduct(Request $request)
    {
        $id = $request->input('id');
        Products::where('id', $id)->delete();

        return redirect()->back();
    }

    public function editProduct($id)
    {
        $product=Products::where('id', $id)->first();
        $category=Category::get();

        return view('edit', ["products"=>$product, "category"=>$category]);
    }

    public function editStoreProduct(Request $request)
    {
        Products::where("id", $request->input("id"))->update([
            'name'=>$request->input('name'),
            'price'=>$request->input("price"),
            'description'=>$request->input("description"),
        ]);

        return redirect()->route('allproducts');
    }

    public function addcategory()
    {
        return view('category');
    }

    public function storecategory(Request $request)
    {
        Category::create([
            "category"=>$request->input('category')]);

        return redirect()->back();
    }
}
