<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjeDosya extends Model
{
    use HasFactory;
    protected $table="projedosya"; 
    protected $fillable=["pDosyaUrl","pDosyaEklenmeTarihi","pDosyaGuncellemeTarihi"]
}
