<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\ArticleModel;
use Hash, DB;


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
}