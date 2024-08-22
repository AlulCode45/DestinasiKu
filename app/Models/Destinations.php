<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destinations extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    function company()
    {
        return $this->hasOne(DestinationCompany::class, 'id', 'destination_company_id');
    }
    function images()
    {
        return $this->hasMany(DestinationImages::class, 'destination_id', 'id');
    }
    function province()
    {
        return $this->hasOne(Provinces::class, 'id', 'province_id');
    }
    function regency()
    {
        return $this->hasOne(Regency::class, 'id', 'regency_id');
    }
    function district()
    {
        return $this->hasOne(District::class, 'id', 'district_id');
    }
    function village()
    {
        return $this->hasOne(Village::class, 'id', 'village_id');
    }
}