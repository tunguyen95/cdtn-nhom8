<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryModel;
use Hash, DB;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $category = CategoryModel::orderBy('id', 'desc')->paginate(15);
        return view('backend.content.category.category', ["categories" => $category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $category = CategoryModel::select("name", "id", "parent_id")
                                    ->get();
        return view('backend.content.category.insert', ["categories" => $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CategoryModel $categoryModel)
    {
        $this->validateInsert($request);
            DB::beginTransaction();
        try {
            if ($request->parent_id != 0) {
                $name_parent = CategoryModel::find($request->parent_id)->name;
            } else {
                $name_parent ="";
            }
            $url = url('')."/categories/".sanitizeTitle($request->name);
            $categoryModel->name       = $request->name;
            $categoryModel->slug       = sanitizeTitle($request->name);
            $categoryModel->url_link   = $url;
            $categoryModel->tag        = trim($request->tag, ',');
            $categoryModel->parent_id  = $request->parent_id;
            $categoryModel->name_parent = $name_parent;
            $categoryModel->save();
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }

        return redirect()->route("categories.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $cate = CategoryModel::find($id);
        return view('backend.content.category.update', ['user' => $cate]);
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
        $cate = CategoryModel::find($id);
        return view('backend.content.category.update', ['category' => $cate, 
                                                        'categories' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, CategoryModel $categoryModels)
    {   
        if (!empty($id)) {
            DB::beginTransaction();
           try {
               $categoryModel = $categoryModels::find($id);
               $this->validateInsert($request);
               if ($request->parent_id != 0) {
                   $name_parent = CategoryModel::find($request->parent_id)->name;
               } else {
                    $name_parent ="";
                }
               $url = url('')."/categories/".sanitizeTitle($request->name);
               $categoryModel->name      = $request->name;
               $categoryModel->slug      = sanitizeTitle($request->name);
               $categoryModel->url_link  = $url;
               $categoryModel->tag       = trim($request->tag, ',');
               $categoryModel->parent_id = $request->parent_id;
               $categoryModel->name_parent = $name_parent;
               $categoryModel->save();
               DB::commit();
           } catch (Exception $e) {
            DB::rollback();
           }
        }
        return redirect()->route("categories.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, CategoryModel $categoryModel)
    {
        $categoryModel = $categoryModel::find($id);
        $data = $categoryModel::where('parent_id', $categoryModel->id)
                            ->get()->toArray();
        if (empty($data)) {
            $categoryModel->delete();
        }
        return redirect()->route("categories.index");
    }

    public function validateInsert($request){
        return $this->validate($request, [
            'name'      => 'required',
            'parent_id' => 'required',
            
            ], [
            'name.required'      => 'Tên người dùng không được để trống',
            'parent_id.required' => 'Email người dùng không được để trống',
            ]
        );
    }
}
