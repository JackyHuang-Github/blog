<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return '所有文章';   
    }

    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     // 驗證示範
    //     $validator = Validator::make($request->all(), [
    //         'title' => 'required | max:10',
    //         'desc' => 'required'
    //     ]);

    //     if($validator->fails()) {
    //         dd($validator);
    //     }

    //     return 'Ok';

    //     // return $request->all();
    //     // 返回到 index 頁面
    //     return redirect(url('posts/' . 1));   
    // }

    // public function store(Request $request)
    public function store(PostRequest $request)
    {
        // return "first row";

        // // 驗證示範
        // $validator = Validator::make($request->all(), [
        //     'title' => 'required | max:10',
        //     'desc' => 'required'
        // ]);

        // if($validator->fails()) {
        //     dd($validator);
        // }

        return 'Ok';

        // return $request->all();
        // 返回到 index 頁面
        return redirect(url('posts/' . 1));   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return '文章 $id';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
