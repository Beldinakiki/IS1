<?php

namespace App\Models;
use App\Models\Events;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stand extends Model
{
    use HasFactory;
    protected $table = "stands";
    protected $fillable = ['event_id', 'type', 'size', 'quantity', 'price'];

    public function event()
{
    return $this->belongsTo(Events::class);
}

}
