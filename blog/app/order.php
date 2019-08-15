<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $fillable = [
        'user_id', 'billing_email', 'billing_name', 'billing_address', 'billing_city','billing_province',
         'billing_postalcode', 'billing_phone', 'billing_name_on_card', 'billing_discount', 'billing_discount_code', 'billing_subtotal', 'billing_tax', 'billing_total', 'payment_gateway', 'error',
    ];

    public function User(){

        return $this->BelongTo('App\User');
    }

    public function post(){

        return $this->belongsToMany('App\post')->withPivot('quantity');
    }
}
