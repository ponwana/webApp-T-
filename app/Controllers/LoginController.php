<?php namespace App\Controllers;

use App\Models\UserModel;

class LoginController extends BaseController {
    public function index() {
        // include helper form
        helper(['form']);
        echo view('users/login');
    }

    public function auth() {

        $session = session();
        // print("test");
        // exit();
        $model = new UserModel();

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $data = $model->where('email', $email)->first();
        if ($data) {
            $pass = $data['password'];
            // $verify_password = password_verify($password, $pass);
            // if ($verify_password) {
            if($pass == $password){
                $ses_data = [
                    'user_id' => $data['user_id'],
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'logged_in' => TRUE
                ];
                $session->set($ses_data);
                // return redirect()->to('/dashboard');
                return redirect()->to('/actorlist');
            } else {
                $session->setFlashdata('msg', 'Wrong password');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'Email not found');
            return redirect()->to('/login');
        }
    }

    public function logout() {
        $session = session();
        $session->destroy();
        return redirect()->to('/actorshow');
    }
}