<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    protected $fillable = [
        'bill_id','book_id','quantity'
    ];

    public function book(){
        return $this->belongsTo(Book::class);
    }
}
