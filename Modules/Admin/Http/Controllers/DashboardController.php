<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Product;

class DashboardController extends Controller
{
    public function dashBoard()                                                                                      //LIST                                                 
    {
        try {
            $productCount = Product::count();
            return view('admin::dashboard',compact('productCount'));            
        } catch (\Exception $e) {
            return view('admin::error.404')->with('error', 'Error occurred while adding the data.');
        }     
    }
}
