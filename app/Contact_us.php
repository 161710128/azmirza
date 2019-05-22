<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact_us extends Model
{
    protected $table = 'contact_uses';
    protected $fillable =['alamat','no_tel','email'];
    public $timentamps = true;
}
