<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = ['place','host','main_category','confort','season','hname','address1','latitude','longitude','original_price','price','image'];
}
