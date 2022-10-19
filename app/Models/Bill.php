<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{

    protected $fillable = [ 'total_payable',
        'status',
        'total_commission',
        'total_bill',

    ];
    public function invoices()
    {
        return $this->hasMany('App\Models\Invoice');
    }

}
