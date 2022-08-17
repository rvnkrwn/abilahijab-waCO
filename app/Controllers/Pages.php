<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Config\Services;

class Pages extends BaseController
{
    public function index()
    {
        $user = [];
        if ($dataSesi = session()->get('userid')) {
            $user = $this->UsersModel->where('userid', $dataSesi)->first();
        }
        $data = [
            'name'        =>  'AbilaHijab',
            'title'       =>  'Distributor Hijab, Grosir Murah dan Berkualitas,',
            'description' =>  'ABILAHIJAB menyediakan produk-produk hijab dengan harga yang terjangkau, bahan berkualitas, desain yang menarik dan nyaman dipakai',
            'user'        =>   $user,

        ];
        return view('index', $data);
    }
    public function shop()
    {
        $user = [];
        if ($dataSesi = session()->get('userid')) {
            $user = $this->UsersModel->where('userid', $dataSesi)->first();
        }
        $data = [
            'name'          => 'AbilaHijab - Home',
            'title'         =>  'All Product',
            'description'   =>  'ABILAHIJAB menyediakan produk-produk hijab dengan harga yang terjangkau, bahan berkualitas, desain yang menarik dan nyaman dipakai',
            'user'          =>   $user,

        ];
        return view('shop', $data);
    }
    public function about()
    {
        $user = [];
        if ($dataSesi = session()->get('userid')) {
            $user = $this->UsersModel->where('userid', $dataSesi)->first();
        }
        $data = [
            'name'          => 'AbilaHijab',
            'title'         =>  'About US',
            'description'   =>  'Tentang Kami.merupakan distributor hijab yang hadir sejak tahun 2019. Komitmen tulus kami untuk menjadikan para muslimah bergaya fresh dan fashionable',
            'user'          =>   $user,
        ];
        return view('about', $data);
    }
    public function login()
    {
        $user = [];
        if ($dataSesi = session()->get('userid')) {
            if ($user = $this->UsersModel->where('userid',$dataSesi)->first()){
                if($user['role'] === "member"){
                    return redirect()->to(base_url());
                } else if($user['role'] === "admin"){
                    return redirect()->to(base_url().'/admin');
                }
            }
        }
        $data = [
            'name'          =>  'AbilaHijab',
            'title'         =>  'Login - Member Area',
            'description'   =>  'Member Area.Masuk dengan akun anda untuk transaksi lebih aman',
            'user'          =>  $user,
        ];
        return view('login', $data);
    }
    public function register()
    {
        if (session()->get('userid')) {
            return redirect()->to(base_url());
        }
        $data = [
            'name'          => 'AbilaHijab',
            'title'         =>  'Register - Member Area',
            'description'   =>  'Member Area.Daftar dan Dapatkan informasi Promo di Toko Kami.',
            'validation'    =>  \Config\Services::validation(),
            'user'          =>   $user,
        ];
        return view('register', $data);
    }
}
