<?php

namespace App\Http\Controllers;

use App\Models\Makanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    //fungsi untuk menampilkan bagian tambah menu
    public function tambahmenu()
    {
    return view('admin.tambahmenu');    
    }

    //fungsi untuk menampilkan bagian details menu
    public function detailmenu()
    {
        $data=Makanan::all();
    return view('admin.detailmenu',compact('data'));    
    }

    //fungsi untuk menampilkan bagian  menu pesanan
    public function menupesanan()
    {
    return view('admin.menupesanan');    
    }

    // fungsi untuk memproses ketika mau menambah menu
    // kaya fungsi store dan update
    public function berhasil_upload_menu(Request $request){
        // cara 1
        // pake session flash agar jika ada yang kurang,data yang tadi udah dimasukin tetep tertampil
        Session::flash('nama',$request->nama);
        Session::flash('deskripsi',$request->deskripsi);
        Session::flash('harga',$request->harga);
        
        // Proses Validasi
        $request->validate([
            // required = harus diisi
            // numeric = harus angka
            'nama'=> 'required',
            'deskripsi'=> 'required',
            'harga'=> 'required | numeric',
            // mimes = ekstensi foto
            'foto' => 'required | mimes:jpg,bmp,png'
        ],[
            // bikin pesan custom 
            'nama.required' => 'Nama Wajib Di isi !!!',
            'deskripsi.required' => 'Deskripsi Wajib Di isi !!!',
            'harga.required' => 'harga Wajib Di isi !!!',
            'harga.numeric' => 'Harga Wajib Berupa Angka !!!',
            'foto.required' => 'Silahkan Upload Foto !!!',
            'foto.mimes' => 'Foto Harus Berkestensi JPG,BMP,PNG !!!',
        ]);

        // Proses Foto Sedikit berbeda
        //  $minta_foto => $nama_foto
        // variabel $mintafoto = minta (file) dengan atribut name=foto
        $minta_foto = $request->file('foto');
        // proses memfilter file tadi harus berkstensi (jpg,png,bmp)
        $ekstensi_foto = $minta_foto->extension();
        // bikin nama foto sesuai tgl upload
        $nama_foto = date('ymdhis').".".$ekstensi_foto;
        // foto tadi disimpan di suatu folder didalam folder public
        $minta_foto->move(public_path('featured_image'),$nama_foto);

        // Proses mengcreate data
        Makanan::create([
            'nama' => $request->input('nama'),
            'deskripsi' => $request->input('deskripsi'),
            'harga' => $request->input('harga'),
            'foto' => $nama_foto
        ]);
        // pesan = varibel yang nanti dipakai di pesan.blade dan dipakai di blade2 lain
        return redirect('/detailmenu')->with('pesan', 'Berhasil Menambahkan Data');

        // // cara 2
        // $doctor = new Doctor();
        // // berhubungan dengan upload foto
        // $image = $request->file;
        // $imagename = time().'.'.$image->getClientoriginalExtension();
        // $request->file->move('doctorimage',$imagename);
        // $doctor->image=$imagename;

        // // 
        // // nama kolom di database   | name="" di form
        // $doctor->name=$request->name;
        // $doctor->phone=$request->number;
        // $doctor->room=$request->room;
        // $doctor->speciality=$request->speciality;

        // // 
        // $doctor->save();
        // return redirect()->back()->with('pesan','Sukses Menambah Data Dokter !!!');
    }

}
