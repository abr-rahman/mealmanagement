<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Details extends Model
{
    use HasFactory;

    public function relatioToMeal(){
        return $this->belongsTo(Meal::class, 'name', 'id');
    }
}
