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

    public function actorshow()
    {
        $ActorModel = new ActorModel();
        $data['persons'] = $ActorModel->orderBy('id', 'DESE')->findAll();
        
        return view('templates/header')
            .view('actor/actorshow',$data)
            .view('templates/footer');
    }

    public function create(){
        return view('templates/header')
            .view('actor/addactor')
            .view('templates/footer');
    }

    public function store(){
        $file = $this->request->getFile('image');

        if($file->isValid()){
            $imgname = $file->getRandomName();
            $file->move(ROOTPATH.'public/images/', $imgname);
        }

        $ActorModel = new ActorModel();
        $data = [
            'name' => $this->request->getVar('name'),
            'address' => $this->request->getVar('address'),
            'sex' => $this->request->getVar('sex'),
            'birthday' => $this->request->getVar('birthday'),
            'age' => $this->request->getVar('age'),
            'activity' => $this->request->getVar('activity'),
            'image' => $imgname,
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
        $file = $this->request->getFile('image');

        if($file->isValid()){
            $imgname = $file->getRandomName();
            $file->move(ROOTPATH.'public/images/', $imgname);
            $old = ROOTPATH.'public/images/'.$this->request->getVar('old_image');
            // print($old);
            // exit();
            unlink("$old");   
        }else{
            $imgname = $this->request->getVar('old_image');
        }

        $ActorModel = new ActorModel();
        $id = $this->request->getVar('id');
 
        $data = [
            'name' => $this->request->getVar('name'),
            'address' => $this->request->getVar('address'),
            'sex' => $this->request->getVar('sex'),
            'birthday' => $this->request->getVar('birthday'),
            'age' => $this->request->getVar('age'),
            'activity' => $this->request->getVar('activity'),
            'image' => $imgname,
        ];
        // print_r($data);
        // exit();
        $ActorModel->update($id,$data);
        return $this->response->redirect(site_url('/actorlist'));

    }

    public function delete($id = null){
        $ActorModel = new ActorModel();
        $image = $ActorModel->where('id',$id)->findColumn('image');
        $image = $image[0];
        $img = ROOTPATH.'public/images/'.$image;
        unlink("$img");
        $ActorModel->where('id',$id)->delete($id);
        return $this->response->redirect(site_url('/actorlist'));
    }
}
