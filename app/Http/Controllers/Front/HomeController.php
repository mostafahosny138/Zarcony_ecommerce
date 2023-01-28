<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\BrandService;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __construct(BrandService $brandService,ProductService $productService)
    {
        $this->brandService=$brandService;
        $this->productService=$productService;
    }

    function index()
    {
        if (request()->ajax())
        {
            $products=$this->productService->getLatestProducts();
            $view=view('front.catalog.components.products',compact('products'))->render();
            return $this->setCode(200)->setData(['html'=>$view])->send();
        }

        $brands=$this->brandService->getBrands();
        $products=$this->productService->getLatestProducts();


        return view('front.index',compact('brands','products'));
    }

    function productDetails($product_id)
    {
        $product=$this->productService->getProductDetails($product_id);
        return view('front.catalog.product-details',compact('product'));
    }

    function brands()
    {
        $brands=$this->brandService->getBrands();

        if (request()->ajax())
        {
            $view=view('front.catalog.components.brand-component',compact('brands'))->render();
            return $this->setCode(200)->setData(['html'=>$view])->send();
        }

        return view('front.catalog.brands',compact('brands'));
    }

    function brandProducts($brand_id)
    {

        $products=$this->brandService->getBrandProducts($brand_id);

        if (request()->ajax())
        {
            $view=view('front.catalog.components.products',compact('products'))->render();
            return $this->setCode(200)->setData(['html'=>$view])->send();
        }

        $brand=$this->brandService->findBrand($brand_id);

        return view('front.catalog.brand-products',compact('products','brand'));

    }
}
