<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['first_name','last_name', 'email', 'gender',  'membership_id', 'coach_id', 'workout_id'];

   public function coaches()
{
    return $this->belongsTo(Coach::class);
}

public function workouts()
{
    return $this->belongsTo(Workout::class);
}

public function memberships()
{
    return $this->belongsTo(Membership::class); 
}
}