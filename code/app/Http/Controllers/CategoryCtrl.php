<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryModel;
use Hash;


class CategoryCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = CategoryModel::paginate(15);
        return view('backend.content.user.user', ["users" => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.content.user.insert');
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
        
        $$categoryModel->name     = $request->name;
        $$categoryModel->email    = $request->email;
        $$categoryModel->phone    = $request->phone;
        $$categoryModel->address  = $request->address;
        $$categoryModel->password = Hash::make("123456");
        $$categoryModel->avatar   = $url_image;
        $$categoryModel->save();

        return redirect()->route("users.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $user = CategoryModel::find($id);
        return view('backend.content.user.update', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = CategoryModel::find($id);
        return view('backend.content.user.update', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, UserModel $userModels)
    {   
        if (!empty($id)) {
            $userModel = $userModels::find($id);
            $this->validateInsert($request);
            if ($request->hasFile("avatar") ) {
                $url_image     = $request->avatar->hashName('');
                $request->avatar->move(public_path("/images/avatar/"), $url_image);
            } else {
                $url_image = $userModel->avatar;
            }
            $userModel->name     = $request->name;
            $userModel->email    = $request->email;
            $userModel->phone    = $request->phone;
            $userModel->address  = $request->address;
            $userModel->password = Hash::make("123456");
            $userModel->avatar   = $url_image;
            $userModel->save();
        }
        return redirect()->route("users.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, UserModel $userModels)
    {
        $userModel = $userModels::find($id)->delete();
        return redirect()->route("users.index");
    }

    public function validateInsert($request){
        return $this->validate($request, [
            'name'    => 'required',
            'email'   => 'required|email',
            'phone'   => 'required',
            'address' => 'required',
            ], [
            'name.required'    => 'Tên người dùng không được để trống',
            'email.required'   => 'Email người dùng không được để trống',
            'phone.required'   => 'Số điện thoại người dùng không được để trống',
            'address.required' => 'Địa chỉ người dùng không được để trống',
            ]
        );
    }
}
