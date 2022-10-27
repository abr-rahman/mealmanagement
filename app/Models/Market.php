<?php

namespace App\Models;

use App\Models\Meal;
use App\Models\Member;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Market extends Model
{
    use HasFactory;
    public function relatioToMeal()
    {
        return $this->belongsTo(Member::class, 'name', 'id');
    }
}
