<?php

namespace App\Http\Controllers\test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

enum ParaSendType: string {
    case FirstType = '1';
    case SecondType = '2';
    case ThirdType = '3';
}

class TestController extends Controller
{
    public function hello() 
    {
        return 'Hello';
    }

    public function show($id = 1) 
    {
        return 'User ' . $id;
    }

    // public function paraSend($paraSendType = ParaSendType::FirstType->value)
    public function paraSend($paraSendType = '1')
    {
        switch($paraSendType) {
            case ParaSendType::FirstType->value:
            // case '1':
                // 第一種
                return view('test.paras')->with(['name' => '品爵一', 'age' => '<b>18 歲</b>']);

            case ParaSendType::SecondType->value:
            // case '2':
                // 第二種
                $data = [];
                $data['name'] = '品爵二';
                $data['age'] = '<b>19 歲</b>';
                return view('test.paras', $data);

            case ParaSendType::ThirdType->value:
            // case '3':
                // 第三種
                $name = '品爵三';
                $age = '<b>20 歲</b>';
                return view('test.paras', compact('name', 'age'));
            
            default:
                // echo "default section";
                // var_dump($paraSendType);
                // var_dump(ParaSendType::FirstType->value);
                echo "只能輸入 1 或 2 或 3 這三種狀況";
                return false;
        }

        // 第一種
        // return view('test.paras')->with(['name' => '品爵', 'age' => '<b>18</b>']);

        // 第二種
        // $data = [];
        // $data['name'] = '品爵';
        // $data['age'] = '<b>19</b>';
        // return view('test.paras', $data);

        // 第三種
        // $name = '品爵';
        // $age = '<b>20</b>';
        // return view('test.paras', compact('name', 'age'));
    }

    public function demo()
    {
        return view('test.demo');
    }
}
