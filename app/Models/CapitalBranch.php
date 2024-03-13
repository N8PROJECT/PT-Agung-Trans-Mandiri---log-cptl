<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CapitalBranch extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'code',
    ];

    public function delivery(){
        return $this->hasMany(Delivery::class);
    }

    public function getNamesAttribute()
    {
        return $this->pluck('name')->toArray();
    }
}
