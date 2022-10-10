<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iletisim_bilgileri extends Model
{
    use HasFactory;
    protected $table="iletisim_bilgileri";
    protected $fillable=["adi","soyAdi","email","adres"];
}
