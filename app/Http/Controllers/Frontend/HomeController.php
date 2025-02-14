<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FlashSale;
use App\Models\FlashSaleItem;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Vendor;
use App\Models\Brand;
class HomeController extends Controller
{
    public function  index() {
        
        $sliders=Slider::where('status',1)->orderBy('serial','asc')->get();
        $brands = Brand::where('status', 1)->where('is_featured', 1)->get();
       
        $flashSaleDate = FlashSale::first();

        $flashSaleItems = FlashSaleItem::where('show_at_home', 1)->where('status', 1)->pluck('product_id')->toArray();

        $typeBaseProducts = $this->getTypeBaseProduct();


        return view('frontend.home.home',
        compact(
            'sliders',
            'flashSaleDate',
            'flashSaleItems',
            'brands',
            'typeBaseProducts'
        )
    );
    }
    public function getTypeBaseProduct()
    {
        $typeBaseProducts = [];

       

        return $typeBaseProducts;
    }
    public function vendorPage()
    {
       $vendors = Vendor::where('status',1)->paginate(20);
       return view('frontend.pages.vendor', compact('vendors'));
    }
}
