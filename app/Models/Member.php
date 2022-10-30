<?php

namespace App\Models;

use App\Models\Meal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Member extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function meal(){
        return $this->hasMany(Meal::class, 'id');
    }
}
