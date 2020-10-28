<?php

namespace App\Models;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeComplete($query)
    {
        return $query->where('complete', '=', true);
    }
    
    public function scopeIncomplete($query)
    {
        return $query->where('complete', '=', false);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function getStartAttribute($value)
    {
        return date('d/m/y @ H:i', strtotime($value));
    }

    public function getStartDateAttribute()
    {
        return date('d/m/y', strtotime($this->start));
    }

    public function getStartTimeAttribute()
    {
        return date('H:i', strtotime($this->start));
    }

    public function markComplete()
    {
        $this->complete = true;
        $this->completed_at = now();
    }

    public function toggle()
    {
        $this->complete = !$this->complete;
        $this->completed_at == null ? $this->completed_at = now() : $this->completed_at = null;
    }
}
