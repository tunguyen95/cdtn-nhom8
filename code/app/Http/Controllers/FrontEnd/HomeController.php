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
      return $this->validate($request, [
         'name'       => 'required',
         'account'          => 'required',
         'email'            => 'required|unique:customer,email|email',
         'confirmPassword' => 'required',
         'password'         => 'required| min:8| max: 30|same:confirm_password',
         
            ], [
         'name.required'            => 'Họ tên không được để trống',
         'account.required'         => 'Tài khoản không được để trống',
         'password.required'        => 'Mật khẩu không được để trống',
         'password.max'             => 'Mật khẩu dài từ 8 đến 30 kí tự',
         'password.min'             => 'Mật khẩu dài từ 8 đến 30 kí tự',
         'confirmPassword.required' => 'Nhập lại mật khẩu không được để trống',
         'password.same'            => 'Mật khẩu nhật lại không chính xác',
         'email.required'           => 'Email không được để trống',
         'email.unique'             => 'Email đã tồn tại',
         'email.email'              => 'Email không đúng định dạng'
            ]
        );
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