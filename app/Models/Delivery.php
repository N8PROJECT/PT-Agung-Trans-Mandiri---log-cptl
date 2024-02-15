<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Delivery extends Model
{
    use HasFactory;

    public function capital_branch(){
        return $this->belongsTo(CapitalBranch::class);
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
