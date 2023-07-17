<?php

namespace App\Models;
use App\Models\Event;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stand extends Model
{
    use HasFactory;
    protected $table = "stands";
    protected $fillable = ['eventId', 'type', 'size', 'available_quantity', 'price'];

    public function event()
{
    return $this->belongsTo(Events::class);
}

}
