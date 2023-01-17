<?php

namespace App\Controllers;
use App\Models\TestModel;

class TestController extends BaseController
{
    public function index()
    {
        return view('templates/header')
            .view('test/home')
            .view('templates/footer');
    }

    public function page1()
    {
        return view('templates/header')
            .view('test/page1')
            .view('templates/footer');
    }

    public function testlist()
    {
        $TestModel = new TestModel();
        $data['news'] = $TestModel->orderBy('id', 'DESE')->findAll();
        
        return view('templates/header')
            .view('test/testlist',$data)
            .view('templates/footer');
    }
}
