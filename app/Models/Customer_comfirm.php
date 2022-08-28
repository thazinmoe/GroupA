<?php

namespace App\Models;

use App\Models\TravelPackage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer_comfirm extends Model
{
    use HasFactory, Notifiable; 

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'customer_name',
        'email',
        'phno',
        'package_price',
        'package_count',
        'completed',
        'package_id',
    ];
    
    public function travel_packages()
    {
        return $this->belongsTo(TravelPackage::class,'package_id','id');
    }   
}
