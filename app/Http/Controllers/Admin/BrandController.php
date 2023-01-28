<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BrandRequest;
use App\Http\Resources\BrandSelect2Resource;
use App\Models\Brand;
use App\Models\Product;
use App\Services\Admin\BrandService;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function __construct(BrandService $brandService)
    {
        $this->brandService=$brandService;
    }

    public function index()
    {
        $brands=$this->brandService->getBrands();

       return $this->setCode(200)->setData($brands)->send();
    }

    public function store(BrandRequest $request)
    {
        $this->brandService->create($request->validated());
        return $this->setCode(200)->setMessage('Brand created successfully')->send();
    }

    public function update(BrandRequest $request, Brand $brand)
    {
        $this->brandService->update($brand,$request->validated());
        return $this->setCode(200)->setMessage('Brand updates successfully')->send();
    }

    public function destroy(Brand $brand)
    {

        if (Product::where('brand_id',$brand->id)->first())
        return    $this->setCode(400)->setError("Brand Can't be deleted because it's related to products")->send();

        $brand->delete();
        return $this->setCode(200)->setMessage("brand deleted successfully")->send();
    }

}
