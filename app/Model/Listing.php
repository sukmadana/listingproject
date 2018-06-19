<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_listing_category',
        'id_sales',
        'id_merchant',
        'listing_slug',
        'listing_title',
        'listing_tagline',
        'city',
        'full_address',
        'phone',
        'website',
        'good_for',
        'price',
        'listing_description',
        'facebook_link',
        'instagram_link',
        'linked_in_link',
        'google_plus_link',
        'youtube_link',
        'video_url',
        'image_feature',
        'allow_gallery',
        'listing_status',
        'lat',
        'lng',
        'range',
    ];

    public function sales()
    {
        return $this->belongsTo('App\Model\Sales','id_sales','id_sales');
    }
}
