<?php

namespace App\Http\Controllers;

use App\Model\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    public function index()
    {
        $feature = Feature::all();
        return response()->json([
            'feature' => $feature
        ]);
    }

    public function fromCategory(Request $request)
    {
        $id_listing_category = $request->id_listing_category;
        $feature = Feature::where("id_listing_category",$id_listing_category);
        return response()->json([
            'feature' => $feature
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'id_listing_category' => 'required',
            'features_name' => 'required|max:50',
            'features_icon' => 'max:80'
        ]);

        $feature = Feature::create([
            'id_listing_category'  => $request->input('id_listing_category'),
            'features_name'        => $request->input('features_name'),
            'features_icon'        => $request->input('features_icon') 
        ]);

        return response()->json([
            'message' => 'Features created successfully.',
            'feature' => $feature
        ]);
    }

    public function edit($id)
    {
        $feature = Feature::find($id);
        return response()->json([
            'feature' => $feature
        ]);
    }

    public function update(Request $request, $id)
    {
        $feature = Feature::find($id);
        $feature->update($request->all());
        return response()->json([
            'message' => 'Feature updated successfully.',
            'feature' => $feature
        ]);
    }

    public function destroy($id)
    {
        Feature::find($id)->delete();
        return response()->json([
            'message' => 'Feature deleted successfully.'
        ]);
    }
}
