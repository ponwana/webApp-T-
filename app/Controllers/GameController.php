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

    public function create(){
        return view('templates/header')
            .view('game/addgame')
            .view('templates/footer');
    }

    public function store(){
        $GameModel = new GameModel();
        $data = [
            'name' => $this->request->getVar('name'),
            'detail' => $this->request->getVar('detail'),
        ];
        $GameModel->insert($data);
        return $this->response->redirect(site_url('/gamelist'));
    }

    public function GameByID($id = null){
        $GameModel = new GameModel();
        $data['person_obj'] = $GameModel->where('id',$id)->first();
        // print_r($data);
        // exit();
        return view('templates/header')
            .view('game/editgame',$data)
            .view('templates/footer');
    }

    public function update(){

        $GameModel = new GameModel();
        $id = $this->request->getVar('id');
 
        $data = [
            'name' => $this->request->getVar('name'),
            'detail' => $this->request->getVar('detail'),
        ];
        // print_r($data);
        // exit();
        $GameModel->update($id,$data);
        return $this->response->redirect(site_url('/gamelist'));

    }

    public function delete($id = null){
        $GameModel = new GameModel();
        $GameModel->where('id',$id)->delete($id);
        return $this->response->redirect(site_url('/gamelist'));
    }
}
