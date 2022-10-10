<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Haber extends Model
{
	use SoftDeletes;
    use HasFactory;
    protected $table = "haber";
    protected $fillable=["baslik", "icerik", "resim", "yayinTarihi", "durum","url"];
}
