<?php

namespace App\Http\Controllers;

use App\Models\Makanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    // 
    public function index(){
        if(Auth::id()){
            return redirect('home');
        }
        else{
            $makanan = Makanan::all();
            return view('users.home',compact('makanan'));
        }
        return view('users.home');
        
    }

    //Fungsi ketika ada yang login
    public function redirect(){
        // pake if else
        if (Auth::id()) {
            // jika usertype = 0 ,maka akan diarahkan ke user dashboard
            if (Auth::user()->usertype =='0')
            {
                $makanan = Makanan::all();
                return view('users.home',compact('makanan'));
            
            }
            // jika usertype = 1 ,maka akan diarahkan ke admin dashboard
            else{
                return view('admin.home');
            }
        }
        // // jika usertype bukan 0 atau 1 ,maka akan diarahkan ke /
        else{
            return redirect()->back();
        }
        
    }

    public function pesanansaya()  {
        $makanan = Makanan::all();
        return view('users.pesanansaya',compact('makanan'));
        
    }
}
