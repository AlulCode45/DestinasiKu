<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DestinationCompany extends Model
{
    use HasFactory;
    protected $table = 'destination_companies';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function destinations()
    {
        return $this->belongsTo(Destinations::class, 'id', 'destination_company_id');
    }
}