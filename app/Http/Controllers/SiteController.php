<?php

namespace App\Http\Controllers;

class SiteController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }

    public function gallery()
    {
        return view('galleries.gallery');
    }

    public function demo()
    {
        return 'demo';
    }

    public function gallery2()
    {
        // $picCount = 5;
        // $picNames = [];
        // for($i = 1; $i <= $picCount; $i++) {
        //     $picNames["pic{$i}"] = "pic{$i}.jpg";
        // }

        // 第一種
        // return view('galleries.gallery2')->with(['pic1' => 'pic1.jpg']);

        // 第二種
        // $data = [];
        // $data['pic1'] = 'pic1.jpg';
        // return view('galleries.gallery2', $data);

        // 第三種
        $pic1 = 'pic1.jpg';
        $pic2 = 'pic2.jpg';
        $pic3 = 'pic3.jpg';
        $pic4 = 'pic4.jpg';
        $pic5 = 'pic5.jpg';
        return view('galleries.gallery2', compact('pic1', 'pic2', 'pic3', 'pic4', 'pic5'));

        // $pic1 = 'pic1.jpg';
        // $pic2 = 'pic2.jpg';
        // $pic3 = 'pic3.jpg';
        // $pic4 = 'pic4.jpg';
        // $pic5 = 'pic5.jpg';
        // $picNames = [$pic1, $pic2, $pic3, $pic4, $pic5];
        // $picNamesString = '';
        // for($i = 0; $i < count($picNames); $i++) {
        //     if($i < count($picNames) - 1) 
        //         $picNamesString = $picNamesString . $picNames[$i] . ',';
        //     else
        //         $picNamesString = $picNamesString . $picNames[$i];
        // }
            
        // return view('galleries.gallery2', compact('picNamesString'));
    }
}