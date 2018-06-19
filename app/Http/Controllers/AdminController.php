<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    public function showSalesCategory()
    {
        return view('admin.sales.category');
    }

    public function showListingCategory()
    {
        return view('admin.listing.category');
    }

    public function showFeature()
    {
        return view('admin.listing.feature');
    }

    public function showSales()
    {
        return view('admin.sales.list');
    }

    public function showNewListing()
    {
        return view('admin.listing.new');
    }

    public function showListing()
    {
        return view('admin.listing.list');
    }
}
