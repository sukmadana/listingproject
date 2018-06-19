<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $table = 'sales';
    protected $fillable = [
        'id_sales_category',
        'id_sales',
        'nik',
        'no_kk',
        'nama',
        'tempat_lahir',
        'tgl_lahir',
        'genre',
        'alamat',
        'alamat_tinggal',
        'rt_rw',
        'kel_desa',
        'kecamatan',
        'kabupaten',
        'propinsi',
        'negara',
        'agama',
        'pekerjaan',
        'phone',
        'alt_phone',
        'file_ktp',
        'status',
    ];

    public function sales_category()
    {
        return $this->belongsTo('App\Model\SalesCategory','id_sales_category','id');
    }

    public function listing()
    {
        return $this->hasMany('App\Model\Listing');
    }
}
