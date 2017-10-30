<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';
    protected $fillable = ['no_ktp', 'nama_lengkap', 'alamat','no_hp','created_at', 'updated_at'];

}
