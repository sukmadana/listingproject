<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Listing;

class ListingController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $listing = Listing::where("listing_title","LIKE","%$search%")->paginate(20);

        return response()->json([
            'listing' => $listing
        ]);
    }

    /**
     * Melakukan pencarian dengan variabel listing status, mengelompokkan data sesuai status listing.
     */
    public function showInStatus($listing_status)
    {
        $listing = Listing::where("listing_status",$listing_status)->paginate(20);

        return response()->json([
            'listing' => $listing
        ]);
    }

    /**
     * Melakukan penambahan data listing, 
     * NOTE : Perhatikan foreign Key pada masing-masing tabel yang berelasi
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_sales' => 'numeric|min:6|max:6',
            'listing_title' => 'required|max:180',
            'listing_tagline' => 'required|max:180',
            'city' => 'required|max:50',
            'full_address' => 'required',
            'phone' => 'numeric|max:14',
            'good_for' => 'max:300',
            'price_range' => 'max:50',
            'facebook_link' => 'max:350',
            'instagram_link' => 'max:350',
            'linked_in_link' => 'max:350',
            'google_plus_link' => 'max:350',
            'youtube_link' => 'max:350',
            'tags' => 'max:500',
            'video_url' => 'max:350',
            'image_feature' => 'max:350',
        ]);

        $listing = Listing::create([
            'id_listing_category'   => $request->input('id_listing_category'),
            'id_sales'              => $request->input('id_sales'),
            'id_merchant'           => $request->input('id_merchant'),
            'listing_slug'          => str_slug($request->input('listing_title')),
            'listing_title'         => $request->input('listing_title'),
            'listing_tagline'       => $request->input('listing_tagline'),
            'city'                  => $request->input('city'),
            'full_address'          => $request->input('full_address'),
            'phone'                 => $request->input('phone'),
            'website'               => $request->input('website'),
            'accept_booking'        => $request->input('accept_booking'),
            'accept_payment'        => $request->input('accept_payment'),
            'good_for'              => $request->input('good_for'),
            'price_range'           => $request->input('price_range'),
            'price_from'            => $request->input('price_from'),
            'price_to'              => $request->input('price_to'),
            'best_price'            => $request->input('best_price'),
            'listing_description'   => $request->input('listing_description'),
            'facebook_link'         => $request->input('facebook_link'),
            'instagram_link'        => $request->input('instagram_link'),
            'linked_in_link'        => $request->input('linked_in_link'),
            'google_plus_link'      => $request->input('google_plus_link'),
            'youtube_link'          => $request->input('youtube_link'),
            'tags'                  => $request->input('tags'),
            'video_url'             => $request->input('video_url'),
            'image_feature'         => $request->input('image_fitur'),
            'allow_gallery'         => $request->input('allow_gallery'),
            'listing_status'        => 'new',
        ]);

        return response()->json([
            'message' => 'Data Listing created successfully',
            'listing' => $listing,
        ]);
    }

    /**
     * Menampilkan data sesuai dengan slug pada halaman single.
     * Property : @ $slug
     */
    public function show($slug)
    {
        $listing = Listing::where('listing_slug',$slug);

        return response()->json([
            'listing' => $listing
        ]);
    }

    /**
     * Menampilkan data yang akan diupdate
     * Property : @ $id
     */
    public function edit($id)
    {
        $listing = Listing::find($id);
        return response()->json([
            'listing' => $listing
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'id_sales' => 'numeric|min:6|max:6',
            'listing_title' => 'required|max:180',
            'listing_tagline' => 'required|max:180',
            'city' => 'required|max:50',
            'full_address' => 'required',
            'phone' => 'numeric|max:14',
            'good_for' => 'max:300',
            'price_range' => 'max:50',
            'facebook_link' => 'max:350',
            'instagram_link' => 'max:350',
            'linked_in_link' => 'max:350',
            'google_plus_link' => 'max:350',
            'youtube_link' => 'max:350',
            'tags' => 'max:500',
            'video_url' => 'max:350',
            'image_feature' => 'max:350',
        ]);

        $listing = Listing::find($id);
        $listing->update($request->all());
        return response()->json([
            'message' => 'Data listing updated successfully',
            'listing' => $listing,
        ]);
    }

    public function destroy($id)
    {
        Listing::find($id)->delete();
        return response()->json([
            'message' => 'Data listing deleted successfully'
        ]);
    }

    /**
     * Melakukan perubahan pada listing_status
     * Property : Request Input, dan @ $id
     * Jenis Status : new, accept, reject
     */
    public function updateStatus(Request $request, $id)
    {
        $listing = Listing::find($id);
        $listing->listing_status = $request->get('listing_status');
        $listing->save();

        return response()->json([
            'message' => 'Listing Status will be updated'
        ]);
    }
}
