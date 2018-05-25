<?php

namespace App\Http\Controllers;

use App\Model\ListingCategory;
use Illuminate\Http\Request;

class ListingCategoryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $listing_category = ListingCategory::where("category_name","LIKE","%$search%")->paginate(10);
        return response()->json([
            'listing_category' => $listing_category
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'category_name' => 'required|max:30',
            'category_icon' => 'required|max:80',
        ]);

        $listing_category = ListingCategory::create([
            'category_name'         => $request->input('category_name'),
            'category_icon'         => $request->input('category_icon'),
            'category_description'  => $request->input('category_description'),
        ]);

        return response()->json([
            'message' => 'Listing category created successfully.',
            'listing_category' => $listing_category
        ]);
    }

    public function edit($id)
    {
        $listing_category = ListingCategory::find($id);
        return response()->json([
            'listing_category' => $listing_category
        ]);
    }

    public function update(Request $request, $id)
    {
        $listing_category = ListingCategory::find($id);
        $listing_category->update($request->all());
        return response()->json([
            'message' => 'Listing Category updated successfully.',
            'listing_category' => $listing_category,
        ]);
    }

    public function destroy($id)
    {
        ListingCategory::find($id)->delete();
        return response()->json([
            'message' => 'Listing category are deleted successfully.'
        ]);
    }


}
