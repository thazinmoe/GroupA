<?php

namespace App\Models;

use App\Models\Car;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TravelPackage extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function cars(){
        return $this->belongsTo(Car::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
