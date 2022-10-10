<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sayfa extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table='sayfa';
    protected $fillable=["sayfaBaslik","Grup_id", "sayfaIcerik"];

    public function sayfalar()
    {
        return $this->hasMany(Sayfa::class,'sayfaBaslik');
    }
}
