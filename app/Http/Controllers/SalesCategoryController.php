<?php

namespace App\Http\Controllers;

use App\Model\SalesCategory;
use Illuminate\Http\Request;

class SalesCategoryController extends Controller
{


    

    public function index(){
        $sales_category = SalesCategory::all();
        return response()->json([
            'sales_category' => $sales_category
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'sales_category_name' => 'required|max:190',
            'commition' => 'required|numeric',
            'salary' => 'required|numeric'
        ]);

        $sales_category = SalesCategory::create([
            'sales_category_name'   => $request->input('sales_category_name'),
            'commition'             => $request->input('commition'),
            'salary'                => $request->input('salary'),
        ]);

        return response()->json([
            'message' => 'Sales Category created succesfully.',
            'sales_category' => $sales_category
        ]);
    }

    public function edit($id)
    {
        $sales_category = SalesCategory::find($id);
        return response()->json($sales_category);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'sales_category_name' => 'required|max:190',
            'commition' => 'required|numeric',
            'salary' => 'required|numeric'
        ]);

        $sales_category = SalesCategory::find($id);
        $sales_category->update($request->all());
        return response()->json([
            'message' => 'Sales Category updated successfully.',
            'sales_category' => $sales_category,
        ]);
    }

    public function destroy($id)
    {
        SalesCategory::find($id)->delete();
        return response()->json([
            'message' => 'Sales Category deleted successfully.'
        ]);
    }
}
