<?php

namespace App\Http\Controllers;

use App\Models\Makanan;
use App\Models\Pesanansaya;
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
        if (Auth::id()) {
            # code...
            $userid=Auth::user()->id;
            $makanan=pesanansaya::where('user_id',$userid)->get();
            return view('users.pesanansaya',compact('makanan'));
        }else{
            return redirect()->back();
        };
        
    }

    // fungsi untuk memproses ketika mau pesan menu
    // kaya fungsi store dan update
    public function berhasilpesanmenu(Request $request){
        $data = new Pesanansaya();
        $data->nama=$request->nama;
        $data->email=$request->email;
        $data->namamakanan=$request->namamakanan;
        $data->qty=$request->qty;
        $data->catatan=$request->catatan;
        $data->date=$request->date;
        $data->status='In Progres';
        // cara bacanya adalah jika sudah login
        if (Auth::id()) {
            # code...
            // maka user_id pada row di pesanan saya=id users yang login
            $data->user_id=Auth::user()->id;
        }
        $data->save();
        return redirect()->back()->with('pesan','Sukses Melakukan Pemesanan !!!');
        
    }

    public function cancelpesanansaya($id) {
        $data=pesanansaya::find($id);
        $data->delete();
        return redirect()->back()->with('pesan','Orderan anda Dibatalkan!!');


        
    }
}
