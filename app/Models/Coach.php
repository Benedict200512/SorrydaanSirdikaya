<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    use HasFactory;

    protected $table = 'coaches';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phonenumber',
        'specialization',
    ];
}
