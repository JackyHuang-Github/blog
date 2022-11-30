<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('articles.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('pic')) {
            // 獲取UploadFile例項
            $file = $request->file('pic');
            // 判斷檔案是否有效
            if ($file->isValid()) {            
                // 檔案原名稱
                // $filename = $file->getClientOriginalName();
                // 副檔名
                $extension = $file->getClientOriginalExtension();
                // 重新命名
                $filename = time() . "." . $extension;
                // $data['pic'] = $filename;
                // 移動至指定目錄
                // $file->move('D:\xampp8\htdocs\form\storage\app\public\images', $filename); 
                $file->storeAs('public/pic', $filename);
            }
        }
        else {
            echo "未指定圖片";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
