<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ListingCategory extends Model
{
    protected $table = "listing_category";

    protected $fillable = [
        'category_name', 'category_icon', 'category_description',
    ];
}
