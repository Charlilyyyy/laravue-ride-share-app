<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    // if dont have will call exception to be thrown and data send to this model cant be accepted
    protected $guarded = [];

    //alternatively can mention each fill one by one
    // protected $fillable = [
    //     'year',
    //     'make',
    //     'model'
    // ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function driver(){
        return $this->belongsTo(Driver::class);
    }
}
