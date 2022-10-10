<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjeKategori extends Model
{
    use HasFactory;
    protected $table="projekategori"; 
    protected $fillable=["pAciklama","pId"];
}
