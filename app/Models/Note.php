<?php

namespace App\Models;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
