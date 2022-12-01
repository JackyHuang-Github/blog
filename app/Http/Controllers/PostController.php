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
        $modes = ['recommend' => '編輯精選', 'season' => '當季商品', 'cp' => '超值商品'];
        $mode = 'cp';
        return view('posts.create', compact('modes', 'mode'));
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
        // return $request->all();

        // return "first row";

        // // 驗證示範
        // $validator = Validator::make($request->all(), [
        //     'title' => 'required | max:10',
        //     'desc' => 'required'
        // ]);

        // if($validator->fails()) {
        //     dd($validator);
        // }

        // //$data = $request->all(); //取得所有前台傳入的資料
        // $data = $request->except('_token'); //取得所有前台傳入的資料
        // $data['options'] = implode(',',$data['options']);
        
        if ($request->hasFile('pic')) {
            $file = $request->file('pic');      //獲取UploadFile例項
            if ($file->isValid()) {            //判斷檔案是否有效
                //$filename = $file->getClientOriginalName(); //檔案原名稱
                $extension = $file->getClientOriginalExtension(); //副檔名
                $filename = time() . "." . $extension;    //重新命名
                // $data['pic'] = $filename;
                //$file->move('D:\xampp\htdocs\form\storage\app\public\images', $filename); //移動至指定目錄
                $file->storeAs('public/pic', $filename);
            }
        }
        else {
            echo "未指定圖片";
        }
            

        return 'Ok';

        // return $request->all();
        // 返回到 index 頁面
        return redirect(url('/posts/create'));   
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
