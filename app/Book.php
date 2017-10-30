<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    protected $fillable = ['isbn', 'nama_buku', 'penerbit','pengarang','tahun','created_at', 'updated_at'];
    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
