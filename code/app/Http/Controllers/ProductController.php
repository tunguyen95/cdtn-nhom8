<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryModel;
use Hash, DB;
use App\Models\ProductModel;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductModel $productModel)
    {   
        $products = $productModel::orderBy('id', 'desc')->paginate(15);
        return view('backend.content.product.product', ["products" => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $category = CategoryModel::select("name", "id", "parent_id")
                                    ->get();
        return view('backend.content.product.insert', ["categories" => $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CategoryModel $categoryModel, ProductModel $productModel)
    {
        $this->validateInsert($request);
            DB::beginTransaction();
        try {
            $this->validateInsert($request);
            if ($request->hasFile("image_url") ) {
                $url_image     = $request->image_url->hashName('');
                $request->image_url->move(public_path("/images/products/"), $url_image);
            } else {
                $url_image = "avatar_default.png";
            }
            if (isset($request->cate_id)) {
                $name_cate = $categoryModel::find($request->cate_id)->name;
            }

            $productModel->name         = $request->name;
            $productModel->slug         = sanitizeTitle($request->name);
            $productModel->code_product = $request->code_product;
            $productModel->cate_name    = $name_cate;
            $productModel->image_url    = $url_image;
            $productModel->cate_id      = $request->cate_id;
            $productModel->description  = $request->description;
            $productModel->tag          = trim($request->tag, ',');
            $productModel->price        = $request->price;
            $productModel->made_in      = $request->made_in;
            $productModel->trade        = $request->trade;
            $productModel->status       = $request->status;
            $productModel->promotion    = $request->promotion;
            $productModel->save();

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }

        return redirect()->route("products.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $product = ProductModel::find($id);
        return view('backend.content.product.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = CategoryModel::select("name", "id", "parent_id")
                                    ->get();
        $product = ProductModel::find($id);
        return view('backend.content.product.update', ['product' => $product, 
                                                        'categories' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, CategoryModel $categoryModels, ProductModel $productModels)
    {   
        if (!empty($id)) {
            DB::beginTransaction();
           try {
               $productModel = $productModels::find($id);
               $this->validateUpdate($request);
               if ($request->hasFile("image_url") ) {
                   $url_image     = $request->image_url->hashName('');
                   $request->image_url->move(public_path("/images/products/"), $url_image);
               } else {
                   $url_image = $productModel->image_url;
               }
               if (isset($request->cate_id)) {
                   $name_cate = $categoryModels::find($request->cate_id)->name;
               }
               $productModel->name         = $request->name;
               $productModel->slug         = sanitizeTitle($request->name);
               $productModel->cate_name    = $name_cate;
               $productModel->image_url    = $url_image;
               $productModel->cate_id      = $request->cate_id;
               $productModel->description  = $request->description;
               $productModel->tag          = trim($request->tag, ',');
               $productModel->price        = $request->price;
               $productModel->made_in      = $request->made_in;
               $productModel->trade        = $request->trade;
               $productModel->status       = $request->status;
               $productModel->promotion    = $request->promotion;
               $productModel->save();

               DB::commit();
           } catch (Exception $e) {
            DB::rollback();
           }
        }
        return redirect()->route("products.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, ProductModel $productModel)
    {
        $productModel = $productModel::find($id)->delete();
        return redirect()->route("products.index");
    }

    public function validateInsert($request){
        return $this->validate($request, [
            'name'         => 'required',
            'code_product' => 'required',
            'image_url'    => 'required',
            'cate_id'      => 'required',
            'description'  => 'required',
            'price'        => 'required',
            'made_in'      => 'required',
            'status'       => 'required',
            
            ], [
            'name.required'         => 'Tên sản phẩm không được để trống',
            'code_product.required' => 'Mã sản phẩm không được để trống',
            'image_url.required'    => 'Ảnh sản phẩm không được để trống',
            'cate_id.required'      => 'Loại sản phẩm không được để trống',
            'description.required'  => 'Mô tả sản phẩm không được để trống',
            'price.required'        => 'Giá sản phẩm không được để trống',
            'made_in.required'      => 'Nơi sản xuất không được để trống',
            'status.required'       => 'Trạng thái hàng không được để trống',
            ]
        );
    }
    public function validateUpdate($request){
        return $this->validate($request, [
            'name'         => 'required',
            'cate_id'      => 'required',
            'description'  => 'required',
            'price'        => 'required',
            'made_in'      => 'required',
            'status'       => 'required',
            
            ], [
            'name.required'         => 'Tên sản phẩm không được để trống',
            'image_url.required'    => 'Ảnh sản phẩm không được để trống',
            'cate_id.required'      => 'Loại sản phẩm không được để trống',
            'description.required'  => 'Mô tả sản phẩm không được để trống',
            'price.required'        => 'Giá sản phẩm không được để trống',
            'made_in.required'      => 'Nơi sản xuất không được để trống',
            'status.required'       => 'Trạng thái hàng không được để trống',
            ]
        );
    }
}