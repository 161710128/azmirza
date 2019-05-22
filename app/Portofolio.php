<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    protected $table = 'portofolios';
    protected $fillable =['judul','gambar','deskripsi'];
    public $timestamps = true;
}
