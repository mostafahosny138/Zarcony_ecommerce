<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {


        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'title' => 'required',
                    'brand_id' => 'required|exists:brands,id',
                    'sku' => 'required|unique:products',
                    'price' => 'required|integer',
                    'details' => 'required'

                ];
            }
            case 'PUT':
            case 'PATCH':
            {

                return [
                    'title' => 'required',
                    'brand_id' => 'required|exists:brands,id',
                    'sku' => [
                        'required',
                        Rule::unique('products')->ignore($this->product->id),
                    ],
                    'price' => 'required|integer',
                    'details' => 'required'

                ];
            }
            default:break;
        }
    }
}
