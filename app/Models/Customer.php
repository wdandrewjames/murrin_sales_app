<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Business;
use App\Models\Order;
use App\Models\Note;
use App\Models\Status;
use App\Models\User;

class Customer extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getLinkAttribute()
    {
        return "/customers/$this->id";
    }

    public function business()
    {
        return $this->belongsTo(Business::class);
    }
    
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    
    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function makeCurrent()
    {
        return $this->status_id = 3;
    }

    public function isCurrent()
    {
        return $this->status_id == 3;
    }
}
