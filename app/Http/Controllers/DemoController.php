<?php

namespace App\Http\Controllers;

class DemoController extends Controller
{
    public function demo()
    {
        // 第一種
        // return view('test.demo')->with(['name' => '品爵', 'age' => '<b>18</b>']);

        // 第二種
        // $data = [];
        // $data['name'] = '品爵';
        // $data['age'] = '<b>19</b>';
        // return view('test.demo', $data);

        // 第三種
        $name = '品爵';
        $age = '<b>20</b>';
        return view('test.demo', compact('name', 'age'));
    }
}