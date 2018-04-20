<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\ArticleModel;
use App\Models\CustomerModel;
use Hash, DB, Auth;


class HomeController extends Controller {

   public function index() {
        return view('shop.pages.trangchu');
   }

   public function categories($slug) {
   		$category = CategoryModel::where('slug', $slug)
   									->first();
   		$products   = ProductModel::where('cate_id', $category->id)
   									->paginate(10);
   		return view('shop.pages.listproduct', ['products'=>$products, 'name_category'=>$category->name]);
   }

   public function news() {
   		$news   = ArticleModel::orderBy('id', 'desc')
   									->paginate(10);

   		return view('shop.pages.new', ['news'=> $news]);
   }

   public function article($slug) {
   		$new   = ArticleModel::where('slug', $slug)
   									->first();;

   		return view('shop.pages.detailArticle', ['new'=> $new]);
   }

   public function product($id) {
      $product   = ProductModel::where('id', $id)
                           ->first();;

      return view('shop.pages.singleproduct', ['product'=> $product]);
   }

   public function register(Request $request) {
      $customerModel = new CustomerModel();
      $customerModel->name     =  $request->name;
      $customerModel->account   =  $request->account;
      $customerModel->email    =  $request->email;
      $customerModel->password =  Hash::make($request->password);
      $customerModel->save();

     
      return redirect()->route('home');
   }

   public function login(Request $request) {
      Auth::guard('customer')->attempt(['account' => $request->account, 'password' => $request->password]);
      return redirect()->route('home');
   }

   public function logout(Request $request){
      $this->guard()->logout();
      $request->session()->invalidate();
      return redirect()->route('home');
   }

   protected function guard() {
        return Auth::guard('customer');
   }
}