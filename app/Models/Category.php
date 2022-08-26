<?php

namespace App\Models;

use App\Models\TravelPackage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function travel_packages(){
        return $this->hasMany(TravelPackage::class);
    }
}
