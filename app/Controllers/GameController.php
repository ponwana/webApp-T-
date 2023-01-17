<?php

namespace App\Controllers;
use App\Models\GameModel;

class GameController extends BaseController
{
    public function index()
    {
        $GameModel = new GameModel();
        $data['items'] = $GameModel->orderBy('id', 'DESE')->findAll();

        return view('templates/header')
            .view('game/gamelist',$data)
            .view('templates/footer');
    }
}
