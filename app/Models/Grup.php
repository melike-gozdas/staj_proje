<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grup extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $timestamps=true;
    protected $table="grup";

    public function sayfalar()
    {
        return $this->hasMany(Sayfa::class,'Grup_id', 'id');
    }
}
