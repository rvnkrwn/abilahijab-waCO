<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\I18n\Time;
use Config\Services;

class Users extends BaseController
{

    public function index()
    {
        //
        return http_response_code(404);
    }

    /**
     * @throws \ReflectionException
     */
    public function saveData()
    {
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
        $create_at  =   Time::now('Asia/Jakarta');
        $update_at  =   Time::now('Asia/Jakarta');

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
            return redirect()->to(base_url().'/login',)->withInput();
        }
    }
    public function checkData()
    {
        $email      =   $this->request->getVar('email');
        $password   =   $this->request->getVar('password');
        if ($data = $this->UsersModel->where(['email' => $email])->first()){
            if (password_verify($password, $data['password'])){
                session()->start();
                $sesi = [
                    'userid'    => $data['userid'],
                ];
                session()->set($sesi);
                if ($data['role'] == "admin") {
                    return redirect()->to('admin');
                } else {
                    return redirect()->to(base_url());
                }
            } else {
                return redirect()->back()->with("wrongPassword","<small id='error' class='text-danger'>Your password is wrong</small>");
            }
        } else {
            return redirect()->back()->with("wrongEmail","<small id='error' class='text-danger'>Your email is not registered</small>");
        }
    }


    public function updateData()
    {
        $avatar     =   $this->request->getVar('avatar');
        $name       =   $this->request->getVar('name');
        $email      =   $this->request->getVar('email');
        $password   =   $this->request->getVar('password');
        $hash       =   password_hash($password, PASSWORD_DEFAULT);
        $phone      =   $this->request->getVar('password');;
        $address1   =   $this->request->getVar('password');;
        $address2   =   $this->request->getVar('password');;
        $city       =   $this->request->getVar('password');;
        $province   =   $this->request->getVar('password');;
        $postcode   =   $this->request->getVar('password');;
        $country    =   $this->request->getVar('password');;
        $update_at  =   Time::now();

        $data   =   [
            'avatar'    =>  $avatar,
            'name'      =>  $name,
            'email'     =>  $email,
            'password'  =>  $hash,
            'phone'     =>  $phone,
            'address1'  =>  $address1,
            'address2'  =>  $address2,
            'city'      =>  $city,
            'province'  =>  $province,
            'postcode'  =>  $postcode,
            'country'   =>  $country,
            'update_at' =>  $update_at,
        ];
        $this->UsersModel->update($data);
    }
    public function logout()
    {
        session()->start();
        session()->destroy();
        return redirect()->to(base_url());
    }
}
