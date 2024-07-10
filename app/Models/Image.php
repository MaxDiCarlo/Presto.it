<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['img', 'advertise_id'];

    public function advertise()
    {
        return $this->belongsTo(Advertise::class);
    }
}
