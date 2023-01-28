<?php

namespace App\Services;


use App\Models\Product;

class ProductService
{

    function getLatestProducts()
    {
        return Product::select('id','title','price')->orderByDesc('id')->simplePaginate(24);
    }

    function getProductDetails($product_id)
    {
        return Product::select('id','title','price')->find($product_id);
    }


}
