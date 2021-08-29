<?php

namespace App\Http\Controllers;
use Auth; //untuk auth
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
	//fungsi proses login post ambil request
    public function prosesLogin(Request $request){
        //remember
        $ingat = $request->remember ? true : false; //jika di ceklik true jika tidak gfalse
        //akan ingat selama 5 tahun jika tidak logout
    	 
    	//auth()->attempt buat proses login  request input username dan password,  request input  sama kayak $request->password dan usernamenya, ditambah $ingat jika pengen ingat
    	if(auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $ingat)){
    		//auth->user() untuk memanggil data user yang sudah login
    		 if(auth()->user()->role == "admin"){
                return redirect()->route('dashboard-admin');//route itu isinya name dari route di web.php
             }else if(auth()->user()->role == "kader"){
                return redirect()->route('dashboard-kader');//route itu isinya name dari route di web.php
             }
    	}else{

            return redirect()->route('login'); //route itu isinya name dari route di web.php

        }


    }

    //proses logout
    public function logout(){
        
        auth()->logout(); //logout
        
        return redirect()->route('login');
        

    }

    //register
    public function register(Request $request){
            //pesan nya
        $messages = [
        'required' => ':attribute wajib diisi cuy!!!',
        'min' => ':attribute harus diisi minimal :min karakter ya cuy!!!',
        'max' => ':attribute harus diisi maksimal :max karakter ya cuy!!!',
        'same' => ':attribute harus sama cuy.... dengan re password',
        ];
 
            //validasi
        $this->validate($request, [
            //pasword validasinya repassword
            'password' => 'min:8|required_with:repassword|same:repassword',
            'repassword' => 'min:8'
        ], $messages);


        //disini soskod untuk create nya
        //....
    }
}
