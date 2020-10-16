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

    public function getInvoiceDateAttribute($value)
    {
        return date('d/m/Y', strtotime($value));
    }

    public function getAmountAttribute($value)
    {
        return number_format($value / 100, 2);
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
