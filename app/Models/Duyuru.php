<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Duyuru extends Model
{
	use SoftDeletes;
    use HasFactory;
    protected $table="duyuru";
    protected $fillable=["baslamaTarihi", "bitisTarihi", "baslik", "resim", "icerik", "durumu","url"];
}
