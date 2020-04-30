<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected  $table="visit";
    protected   $primaryKey="vis_id";
    public   $timestamps=false;
}
