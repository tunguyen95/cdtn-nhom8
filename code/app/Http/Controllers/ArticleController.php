<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArticleModel;
use Hash, DB;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $articles = ArticleModel::orderBy('id', 'desc')->with("users")->paginate(15);
        return view('backend.content.article.article', ["articles" => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('backend.content.article.insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ArticleModel $articleModel)
    {
        $this->validateInsert($request);
            DB::beginTransaction();
        try {
            if ($request->hasFile("image") ) {
                $url_image     = $request->image->hashName('');
                $request->image->move(public_path("/images/articles/"), $url_image);
            }
            $articleModel->title       = $request->title;
            $articleModel->slug        = sanitizeTitle($request->title);
            $articleModel->description = $request->description;
            $articleModel->image_url   = $url_image;
            $articleModel->content     = $request->content;
            $articleModel->author      = Auth::user()->id;
            $articleModel->status      = $request->status;
            $articleModel->tag         = trim($request->tag, ',');
            $articleModel->save();
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }

        return redirect()->route("articles.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request, ArticleModel $articleModel)
    {
        $article = $articleModel::find($id)->with("users")->first();
        return view('backend.content.article.show', ['article' => $article]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, ArticleModel $articleModel)
    {
        $article = $articleModel::find($id);
        return view('backend.content.article.update', ['article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, ArticleModel $articleModels)
    {   
        if (!empty($id)) {
            DB::beginTransaction();
            try {
               $articleModel = $articleModels::find($id);
               $this->validateUpdate($request);
               if ($request->hasFile("image") ) {
                   $url_image     = $request->image->hashName('');
                   $request->image->move(public_path("/images/articles/"), $url_image);
               } else {
                   $url_image = $articleModel->image_url;
               }
               $articleModel->title       = $request->title;
               $articleModel->slug        = sanitizeTitle($request->title);
               $articleModel->description = $request->description;
               $articleModel->image_url   = $url_image;
               $articleModel->content     = $request->content;
               $articleModel->author      = Auth::user()->id;
               $articleModel->status      = $request->status;
               $articleModel->tag         = trim($request->tag, ',');
               $articleModel->save();
               DB::commit();
               DB::commit();
           } catch (Exception $e) {
            DB::rollback();
           }
        }
        return redirect()->route("articles.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, ArticleModel $articleModel)
    {
        $articleModel = $articleModel::find($id);
        $articleModel->delete();

        return redirect()->route("articles.index");
    }

    public function validateInsert($request){
        return $this->validate($request, [
            'title'       => 'required',
            'description' => 'required',
            'image'       => 'required',
            'content'     => 'required',
            'status'      => 'required',
            
            ], [
            'title.required'       => 'Tiêu đề không được để trống',
            'description.required' => 'Trích dẫn không được để trống',
            'image.required'       => 'Ảnh không được để trống',
            'content.required'     => 'Nội dung không được để trống',
            'status.required'      => 'Trạng thái không được để trống',
            ]
        );
    }

    public function validateUpdate($request){
        return $this->validate($request, [
            'title'       => 'required',
            'description' => 'required',
            'content'     => 'required',
            'status'      => 'required',
            
            ], [
            'title.required'       => 'Tiêu đề không được để trống',
            'description.required' => 'Trích dẫn không được để trống',
            'content.required'     => 'Nội dung không được để trống',
            'status.required'      => 'Trạng thái không được để trống',
            ]
        );
    }
}