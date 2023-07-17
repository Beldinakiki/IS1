<?php

namespace App\Models;
use App\Models\Stand;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SoftDeletes;

class Events extends Model
{
    use HasFactory;
    protected $table = "events";
    protected $primarykey = "id";
    protected $fillable = ['name', 'location', 'date', 'description', 'image'];

    public function stands()
{
    return $this->hasMany(Stand::class);
}

}
