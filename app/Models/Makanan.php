<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Makanan extends Model
{
    use HasFactory;
    // jangan lupa harus di kasih protected $fillable
    // Selain protected $fillable masih ada banyak lagi
    protected $fillable = [
    // yang harus diisi
    // intinya klo biar yang di inputkan di kontroller dan view masuk ke database,Harus di isi Unsur2 yang di model
    //Contoh nya misal nama nya di matiin.Ya maka inputan nama tidak akan masuk ke database 
    'nama',
    'deskripsi',
    'harga',
    'foto',
    ];
}
