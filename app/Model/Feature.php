<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $fillable = [
        'id_listing_category','features_name','features_icon',
    ];
}
