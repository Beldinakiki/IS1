<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
class Booking extends Model
{
    use HasFactory;
    protected $fillable = ['quantity', 'stand_id', 'user_id','date','down_payment']; // Add other fillable fields as needed

    public function stand()
    {
        return $this->belongsTo(Stand::class);
    }

    // If you have a User model, you can define the relationship here
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
