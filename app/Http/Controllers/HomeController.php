<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Likes;
use App\Models\Comments;
use Auth;

class HomeController extends Controller
{
    public function index()
    {
    	$products = Products::get();

    	return view('guestIndex', ["products"=>$products]);
    }

   	public function seeproduct($id)
   	{
   		$product = Products::where('id', $id)->first();
   		$likes = Likes::where('product_id', $id)->count();
   		$comments = Comments::where('product_id', $id)->get();

   		return view('oneproduct', ["product"=>$product, "likes"=>$likes, "comments"=>$comments]);
   	}

   	public function addlike(Request $request)
   	{
   		Likes::firstOrCreate([
   			"user_id"=>Auth::user()->id,
   			"product_id"=>$request->input('id')
   		]);

   		return redirect()->back();
   	}

   	public function addComment(Request $request)
   	{
   		Comments::Create([
   			"user_id"=>Auth::user()->id,
   			"product_id"=>$request->input('id'),
   			"comment"=>$request->input('comment')
   		]);

   		return redirect()->back();
   	}
}
