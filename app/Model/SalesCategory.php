<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SalesCategory extends Model
{
    protected $table = 'sales_category';

    protected $fillable = [
        'sales_category_name', 'commition', 'salary',
    ];
}
