<?php

namespace App\Models;

use App\Models\Business;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $dates = ['invoice_date'];

    public function getFormatAmountAttribute()
    {
        return number_format($this->amount / 100, 2);
    }

    public function setAmountAttribute($value)
    {

        if (is_numeric($value)) {

            $this->attributes['amount'] = (int)($value * 100);
        }

        return 0;
    }

    public function business()
    {
        return $this->hasOneThrough(Business::class, Customer::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
