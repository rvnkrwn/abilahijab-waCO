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
        $product = $this->ProductsModel->findAll();
        $data = [
            'name'        =>  'AbilaHijab',
            'title'       =>  'Distributor Hijab, Grosir Murah dan Berkualitas,',
            'description' =>  'ABILAHIJAB menyediakan produk-produk hijab dengan harga yang terjangkau, bahan berkualitas, desain yang menarik dan nyaman dipakai',
            'keyword'     =>  'abila, abila hijab, abilahijab, grosir hijab, hijab murah, toko hijab, toko abila, hijab abila, Abila Hijab',
            'user'        =>   $user,
            'product'     =>   $product,

        ];
        return view('index', $data);
    }
    public function shop()
    {
        $user = [];
        if ($dataSesi = session()->get('userid')) {
            $user = $this->UsersModel->where('userid', $dataSesi)->first();
        }
        $product = $this->ProductsModel->findAll();
        $data = [
            'name'          => 'AbilaHijab - Home',
            'title'         =>  'All Product',
            'description'   =>  'ABILAHIJAB menyediakan produk-produk hijab dengan harga yang terjangkau, bahan berkualitas, desain yang menarik dan nyaman dipakai',
            'keyword'       =>  'abila shop, abila hijab store, abilahijab shop, grosir hijab, hijab murah, toko hijab, toko abila, hijab abila, Abila Hijab',
            'user'          =>   $user,
            'product'       =>   $product,

        ];
        return view('shop', $data);
    }
    public function detail($slug) {
        $user = [];
        if ($dataSesi = session()->get('userid')) {
            $user = $this->UsersModel->where('userid', $dataSesi)->first();
        }
        $product = $this->ProductsModel->where(['slug'  => $slug])->first();
        $data = [
            'name'          => 'AbilaHijab - Home',
            'title'         =>  'All Product',
            'description'   =>  'ABILAHIJAB menyediakan produk-produk hijab dengan harga yang terjangkau, bahan berkualitas, desain yang menarik dan nyaman dipakai',
            'keyword'       =>  'abila, abila hijab, abilahijab, grosir hijab, hijab murah, toko hijab, toko abila, hijab abila, Abila Hijab',
            'user'          =>   $user,
            'product'       =>   $product,

        ];
        return view('detail',$data);
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
            'keyword'       =>  'abila about, tentang abila, abila hijab, abilahijab, grosir hijab, hijab murah, toko hijab, toko abila, hijab abila, Abila Hijab',
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
            'keyword'       =>  'Login abila, Masuk abila hijab, Member abilahijab, grosir hijab, hijab murah, toko hijab, toko abila, hijab abila, Abila Hijab',
            'user'          =>  $user,
        ];
        return view('login', $data);
    }
    public function register()
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
            'name'          => 'AbilaHijab',
            'title'         =>  'Register - Member Area',
            'description'   =>  'Member Area.Daftar dan Dapatkan informasi Promo di Toko Kami.',
            'keyword'       =>  'abila register, daftar abila hijab, member abilahijab, grosir hijab, hijab murah, toko hijab, toko abila, hijab abila, Abila Hijab',
            'validation'    =>  \Config\Services::validation(),
            'user'          =>   $user,
        ];
        return view('register', $data);
    }


    public function checkout()
    {
        $productid = $this->request->getVar('productid');
        $picture = $this->request->getVar('picture');
        $name = $this->request->getVar('name');
        $address = $this->request->getVar('address1');
        $city = $this->request->getVar('city');
        $province = $this->request->getVar('province');
        $postcode = $this->request->getVar('postcode');
        $country = $this->request->getVar('country');
        $total = $this->request->getVar('total');
        $totalPay = $this->request->getVar('totalPay');

        $nohp = "6285228011356";
        $msg = "Assalamualaikum,saya ingin membeli product dengan [id => ".$productid."], [gambar => ".$picture. "], [name => ".$name. "], [alamat => ".$address. "], [kota => ".$city. "], [provinsi => ".$province. "], [kode post => ".$postcode. "], [Negara => ".$country. "], [Total Item => ".$total. "], [Total Bayar => ".$totalPay."]";
        $link = "https://wa.me/".$nohp."?text=".$msg;

        return redirect()->to($link);

    }

}
