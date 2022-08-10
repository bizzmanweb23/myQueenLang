<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App;
use Session;
use App\Models\Product;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }
    public function about()
    {
        return view('frontend.about');
    }   
    public function contact()
    {
        return view('frontend.contact');
    }
    public function products()
    {
        $products = Product::all();
        return view('frontend.products',compact('products'));
    }
    public function productdetails($id)
    {
        print_r('called');exit();
        $product_data = Product::where('id', $id)->first();
        return view('frontend.products',compact('products'));
            }
    public function privacyPolicy()
	{
		return view('frontend.privacy');
	}
	
    public function changeLang($langcode){
       //echo 'Hello';die;
	   //echo(session::get("lang_code"));
      App::setLocale($langcode);
       session()->put("lang_code",$langcode);
	  //$result = setcookie('lang_code',$langcode,time() + (86400), "/");
	  //echo '<pre>';print_r(session()->get("lang_code",$langcode));die;
      return redirect()->back();
	  //echo json_encode(true);exit;
	  
  }  
   
}
