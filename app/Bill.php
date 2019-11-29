<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $fillable=[
        'user_id','borrow_day','refund_day','status'
    ];
    public function details(){
        return $this->hasMany(BillDetail::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    // Accesor
    public function getBorrowDayAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }

    public function getRefundDayAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }
}
