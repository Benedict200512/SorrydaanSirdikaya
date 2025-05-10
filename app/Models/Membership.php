<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'membership_status',
        'start_date',
        'end_date',
        'price',
    ];

   
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}