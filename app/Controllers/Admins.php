<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\I18n\Time;

class Admins extends BaseController
{
    public function index()
    {
        if ($dataSesi = session()->get('userid')) {
            $user = $this->UsersModel->where('userid', $dataSesi)->first();
            if ($user['role'] != "admin"){
                return redirect()->to('/');
            }
        } else {
            return redirect()->to('login');
        }
        $users = $this->UsersModel->findAll();
        $product = $this->ProductsModel->findAll();
        $data = [
            'user'          => $users,
            'product'       =>  $product,
        ];
        return view('admin/index',$data);
    }
    public function users()
    {
        if ($dataSesi = session()->get('userid')) {
            $user = $this->UsersModel->where('userid', $dataSesi)->first();
            if ($user['role'] != "admin"){
                return redirect()->to('/');
            }
        } else {
            return redirect()->to('login');
        }
        $users = $this->UsersModel->findAll();
        $data = [
            'user'          =>  $users,
            'validation'    =>  \Config\Services::validation(),
        ];
        return view('admin/users', $data);
    }
    public function products()
    {
        if ($dataSesi = session()->get('userid')) {
            $user = $this->UsersModel->where('userid', $dataSesi)->first();
            if ($user['role'] != "admin"){
                return redirect()->to('/');
            }
        } else {
            return redirect()->to('login');
        }
        $users = $this->UsersModel->findAll();
        $product = $this->ProductsModel->findAll();
        $data = [
            'user' => $users,
            'product'       =>  $product,
            'validation'    =>  \Config\Services::validation(),
        ];
        return view('admin/products',$data);
    }




    public function newUser()
    {
        if ($dataSesi = session()->get('userid')) {
            $user = $this->UsersModel->where('userid', $dataSesi)->first();
            if ($user['role'] != "admin"){
                return redirect()->to('/');
            }
        } else {
            return redirect()->to('login');
        }
        if (!$this->validate($this->UsersModel->getValidationRules())) {
            $validation = \Config\Services::validation();
            return redirect()->back()->withInput()->with('validation',$validation);
        }
        $userid     =   rand();
        $avatar     =   "default.jpg";
        $name       =   $this->request->getVar('name');
        $email      =   $this->request->getVar('email');
        $password   =   $this->request->getVar('password');
        $hash       =   password_hash($password, PASSWORD_DEFAULT);
        $phone      =   " ";
        $address1   =   " ";
        $address2   =   " ";
        $city       =   " ";
        $province   =   " ";
        $postcode   =   " ";
        $country    =   "indonesia";
        $role       =   "member";
        $create_at  =   Time::now();
        $update_at  =   Time::now();

        $query   =   [
            'userid'    =>  htmlspecialchars($userid),
            'avatar'    =>  htmlspecialchars($avatar),
            'name'      =>  htmlspecialchars($name),
            'email'     =>  htmlspecialchars($email),
            'password'  =>  htmlspecialchars($hash),
            'phone'     =>  htmlspecialchars($phone),
            'address1'  =>  htmlspecialchars($address1),
            'address2'  =>  htmlspecialchars($address2),
            'city'      =>  htmlspecialchars($city),
            'province'  =>  htmlspecialchars($province),
            'postcode'  =>  htmlspecialchars($postcode),
            'country'   =>  htmlspecialchars($country),
            'role'      =>  htmlspecialchars($role),
            'create_at' =>  htmlspecialchars($create_at),
            'update_at' =>  htmlspecialchars($update_at),
        ];

        if ($this->UsersModel->insert($query)){
            return redirect()->back()->with("status","<div id='status' class='text-success shadow text-center' style='background:white; position: fixed; height: auto; padding: 2em; width: auto; top: 50%; left: 50%; transform: translate(-50%, -50%)'><i class='fal fa-check-circle fa-4x mb-4'></i><p class='fs-5'>successfully added user</p><button class='btn btn-outline-success' onclick='document.querySelector(`#status`).classList.add(`d-none`)'>OKE</button></div>");
        } else {
            return redirect()->to('admin/users')->with("status","<div id='status' class='text-danger shadow text-center' style='background:white; position: fixed; height: auto; padding: 2em; width: auto; top: 50%; left: 50%; transform: translate(-50%, -50%)'><i class='fal fa-times fa-4x mb-4'></i><p class='fs-5'>successfully added user</p><button class='btn btn-outline-success' onclick='document.querySelector(`#status`).classList.add(`d-none`)'>OKE</button></div>");
        }
    }

    public function newProduct()
    {
        if ($dataSesi = session()->get('userid')) {
            $user = $this->UsersModel->where('userid', $dataSesi)->first();
            if ($user['role'] != "admin"){
                return redirect()->to('/');
            }
        } else {
            return redirect()->to('login');
        }
        $productid      =    rand();
        $img            =    $this->request->getFile('image');
        $imgName        =    $img->getName();
        $name           =    $this->request->getVar('name');
        $price          =    $this->request->getVar('price');
        $description    =    $this->request->getVar('description');
        $total          =    $this->request->getVar('total');
        $slug           =    str_replace(' ','-',$name);
        $create_at      =    Time::now('Asia/Jakarta');
        $update_at      =    Time::now('Asia/Jakarta');

        $query = [
            'productid'     =>  htmlspecialchars($productid),
            'img'           =>  htmlspecialchars($imgName),
            'name'          =>  htmlspecialchars($name),
            'price'         =>  htmlspecialchars($price),
            'description'   =>  htmlspecialchars($description),
            'total'         =>  htmlspecialchars($total),
            'slug'          =>  htmlspecialchars($slug),
            'create_at'     =>  htmlspecialchars($create_at),
            'update_at'     =>  htmlspecialchars($update_at)
        ];
        $img->move('upload/product',$imgName);
        if($this->ProductsModel->insert($query)){
            return redirect()->back()->with("status","<div id='status' class='text-success shadow text-center' style='background:white; position: fixed; height: auto; padding: 2em; width: auto; top: 50%; left: 50%; transform: translate(-50%, -50%)'><i class='fal fa-check-circle fa-4x mb-4'></i><p class='fs-5'>successfully added user</p><button class='btn btn-outline-success' onclick='document.querySelector(`#status`).classList.add(`d-none`)'>OKE</button></div>");
        } else {
            return redirect()->back()->with("status","<div id='status' class='text-danger shadow text-center' style='background:white; position: fixed; height: auto; padding: 2em; width: auto; top: 50%; left: 50%; transform: translate(-50%, -50%)'><i class='fal fa-times fa-4x mb-4'></i><p class='fs-5'>successfully added user</p><button class='btn btn-outline-success' onclick='document.querySelector(`#status`).classList.add(`d-none`)'>OKE</button></div>");
        }

    }



    public function deleteUser($userid){
        if ($dataSesi = session()->get('userid')) {
            $user = $this->UsersModel->where('userid', $dataSesi)->first();
            if ($user['role'] != "admin"){
                return redirect()->to(base_url());
            }
        } else {
            return redirect()->to('login');
        }
        $del = $this->UsersModel->where('userid',$userid)->delete();
        if ($del) {
            return redirect()->back()->with("status","<div id='status' class='text-success shadow text-center' style='background:white; position: fixed; height: auto; padding: 2em; width: auto; top: 50%; left: 50%; transform: translate(-50%, -50%)'><i class='fal fa-check-circle fa-4x mb-4'></i><p class='fs-5'>successfully deleted user</p><button class='btn btn-outline-success' onclick='document.querySelector(`#status`).classList.add(`d-none`)'>OKE</button></div>");
        }
    }
    public function deleteProduct($productid){
        if ($dataSesi = session()->get('userid')) {
            $user = $this->UsersModel->where('userid', $dataSesi)->first();
            if ($user['role'] != "admin"){
                return redirect()->to(base_url());
            }
        } else {
            return redirect()->to('login');
        }
        if ($product = $this->ProductsModel->where('productid',$productid)->first()){
            unlink('upload/product/'.$product['img']);
            $del = $this->ProductsModel->where('productid',$productid)->delete();
            if ($del) {
                return redirect()->back()->with("status","<div id='status' class='text-success shadow text-center' style='background:white; position: fixed; height: auto; padding: 2em; width: auto; top: 50%; left: 50%; transform: translate(-50%, -50%)'><i class='fal fa-check-circle fa-4x mb-4'></i><p class='fs-5'>successfully deleted user</p><button class='btn btn-outline-success' onclick='document.querySelector(`#status`).classList.add(`d-none`)'>OKE</button></div>");
            }
        }
    }
}
