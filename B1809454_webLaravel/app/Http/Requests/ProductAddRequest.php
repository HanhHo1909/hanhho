<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'bail|required|unique:products|max:255|min:5',
            'price' => 'required',
            'quantity_product' => 'required',
            'category_id' => 'required',
            'contents' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm không được để trống',
            'name.unique' => 'Tên sản phẩm đã tồn tại',
            'name.max' => 'Tên sản phẩm không được vướt quá 255 ký tự',
            'name.min' => 'Tên sản phẩm không được ít hơn 5 ký tự',
            'price.required' => 'Giá sản phẩm không được để trống',
            'quantity_product.required' => 'Số lượng sản phẩm không được để trống',
            'category_id.required' => 'Danh mục sản phẩm không được để trống',
            'contents.required' => 'Nội dung sản phẩm không được để trống'

        ];
    }
}
