<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Services\Admin\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function __construct(ProductService $productService)
    {
        $this->productService=$productService;
    }
    public function index()
    {
        $products=$this->productService->getAllProducts();
        return ProductResource::collection($products);
    }


    public function store(ProductRequest $request)
    {
        $this->productService->create($request->validated());
        return $this->setCode(200)->setMessage('Product created successfully')->send();
    }

    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->validated());
        return $this->setCode(200)->setMessage("Product updates successfully")->send();
    }

    public function destroy(Product $product)
    {
        if (OrderDetail::where('product_id',$product->id)->first()){
            return    $this->setCode(400)->setError("Product Can't be deleted because it's related to orders")->send();
        }
        $product->delete();
        return $this->setCode(200)->setMessage("Product deleted successfully")->send();
    }



}
