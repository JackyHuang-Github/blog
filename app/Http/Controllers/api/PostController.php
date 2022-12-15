<?php

namespace App\Http\Controllers\api;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    // 用於生成 JSON 字串
    private function makeJson($status, $data, $msg)
    {
        // 轉 JSON 時確保中文不會變成 Unicode
        return response()->json([
                'status' => $status, 
                'data' => $data, 
                'message' => $msg
            ])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 取得 posts 所有表格資料
        $posts = Post::get();

        if (isset($posts) && count($posts) > 0) {
            $data = ['posts' => $posts];
            return $this->makeJson(1, $data, null);
        } else {
            return $this->makeJson(0, null, '找不到任何文章');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
