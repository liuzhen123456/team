<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Custom extends Model
{
    protected $table = 'custom';
    protected $primaryKey = 'cust_id';

    public $timestamps = false;

    protected $guarded = [];
}
