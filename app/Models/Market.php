<?php

namespace App\Models;

use App\Models\Meal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Market extends Model
{
    use HasFactory;
    public function relatioToMeal()
    {
        return $this->belongsTo(Meal::class, 'name', 'id');
    }
}
