<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Books_Categories extends Model
{
  protected $fillable = [
    'books_id','categories_id',
  ];
}
