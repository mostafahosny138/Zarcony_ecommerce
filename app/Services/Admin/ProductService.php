<?php

namespace App\Services\Admin;


use App\Models\Product;

class ProductService
{

    function getAllProducts()
    {
        return Product::select('id','title','price','brand_id')->orderByDesc('id')->simplePaginate(24);
    }

    function getProductDetails($product_id)
    {
        return Product::select('id','title','price')->find($product_id);
    }

    function create($data)
    {
        return  Product::create($data);
    }
}
