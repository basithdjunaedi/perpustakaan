<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
  protected $table = 'rentals';
  protected $fillable = ['rental_date', 'return_date','member_id','book_id','status','created_at', 'updated_at'];

  public function book()
  {
    return $this->belongsTo('App\Book');
  }

  public function member()
  {
    return $this->belongsTo('App\Member');
  }
}
