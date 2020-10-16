<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Summary extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function status()
    {
        return $this->belongsTo('status');
    }

    public function getMonthAttribute()
    {
        return $this->date->format('M');
    }
    
    public function getYearAttribute()
    {
        return $this->date->format('Y');
    }
}

// at 11:45pm on the last day of each month, look at the staus for all the customers for each business and record the sum of each status