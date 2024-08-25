<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testemonials extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function guests()
    {
        return $this->belongsTo(Guests::class, 'guest_id', 'id');
    }
    function destinations()
    {
        return $this->belongsTo(Destinations::class, 'destination_id', 'id');
    }
}