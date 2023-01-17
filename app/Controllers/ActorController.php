<?php

namespace App\Controllers;
use App\Models\ActorModel;

class ActorController extends BaseController
{
    public function index()
    {
        $ActorModel = new ActorModel();
        $data['persons'] = $ActorModel->orderBy('id', 'DESE')->findAll();
        
        return view('templates/header')
            .view('actor/actorlist',$data)
            .view('templates/footer');
    }

    public function create(){
        return view('templates/header')
            .view('actor/addactor')
            .view('templates/footer');
    }

    public function store(){
        $ActorModel = new ActorModel();
        $data = [
            'name' => $this->request->getVar('name'),
            'address' => $this->request->getVar('address'),
            'sex' => $this->request->getVar('sex'),
            'birthday' => $this->request->getVar('birthday'),
            'age' => $this->request->getVar('age'),
            'activity' => $this->request->getVar('activity'),
            'image' => $this->request->getVar('image'),
        ];
        $ActorModel->insert($data);
        return $this->response->redirect(site_url('/actorlist'));
    }

    public function ActorByID($id = null){
        $ActorModel = new ActorModel();
        $data['person_obj'] = $ActorModel->where('id',$id)->first();
        return view('templates/header')
            .view('actor/editactor',$data)
            .view('templates/footer');
    }

    public function update(){

        $ActorModel = new ActorModel();
        $id = $this->request->getVar('id');
 
        $data = [
            'name' => $this->request->getVar('name'),
            'address' => $this->request->getVar('address'),
            'sex' => $this->request->getVar('sex'),
            'birthday' => $this->request->getVar('birthday'),
            'age' => $this->request->getVar('age'),
            'activity' => $this->request->getVar('activity'),
            'image' => $this->request->getVar('image'),
        ];
        // print_r($data);
        // exit();
        $ActorModel->update($id,$data);
        return $this->response->redirect(site_url('/actorlist'));

    }

    public function delete($id = null){
        $ActorModel = new ActorModel();
        $ActorModel->where('id',$id)->delete($id);
        return $this->response->redirect(site_url('/actorlist'));
    }
}
