<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;
class BillupdatesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return True;
    }

    protected function failedValidation(Validator $validator) 
     {
         $errors = (new ValidationException($validator))->errors();
         throw new HttpResponseException(response()->json([
             'check'=>false,
             'msg' => $errors
         ], 200));
     }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
                'id_bills' => 'required|exists:bill,id',
                'id_oders' => 'required|exists:oders,id',
                'code' => 'required|unique:bill,code',
                'status' => 'required',
                'price' => 'required',
                'payment_method' => 'required',
                'total' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'id_bills.required' => 'vui lòng điền id bill',
            'id_bills.exists' => 'ID bill không có trong hệ thống',
            'id_oders.required' => 'vui lòng điền id oders',
            'id_oders.exists' => 'id oders không có trong hệ thống',
            'code.required' => 'Vui lòng điền mã code của bill',
            'code.unique' => 'Mã code bill đã tồn tại trong hệ thống',
            'status.required' => 'Vui lòng điền trạng thái của bill',
            'price.required' => 'Vui lòng điền thông tin giá vào',
            'payment_method.required' => 'Vui lòng điền phương thức thanh toán',
            'total.required' => 'Vui lòng điền tổng số tiền bill'
        ];
    }
}
