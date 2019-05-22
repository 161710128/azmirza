<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    protected $table = 'careers';
    protected $fillable = ['nama','email','no_tel','cv','subyek','deskripsi'];
    public $timestamps = true;
}
