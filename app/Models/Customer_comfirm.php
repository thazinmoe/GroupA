<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

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
        'completed',
        'package_id',
    ];
    public function TravelPackage()
    {
        return $this->belongsTo(TravelPackage::class,'package_id','id');
    }   
}
