<?php

namespace App\Services;


use App\Models\Brand;
use App\Models\Product;

class BrandService
{
    function getBrands()
    {
      return  Brand::select('id','name')->orderByDesc('id')->SimplePaginate(24);
    }

    function findBrand($brand_id)
    {
        return  Brand::select('id','name')->find($brand_id);
    }


    function getBrandProducts($brand_id)
    {
        return Product::where('brand_id',$brand_id)->select('id','title','price')->SimplePaginate(24);
    }


}
