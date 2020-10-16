<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;

class Status extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }
}
