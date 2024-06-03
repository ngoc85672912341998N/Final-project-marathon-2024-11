<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;
class OdersupdateRequest extends FormRequest
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
                'id'=> 'required|exists:oders,id',
                'id_course' => 'required|exists:course,id',
                'status' => 'required',
                'price' => 'required',
                'payment_method' => 'required',
                'total' => 'required',
                'create_by_id' => 'required|exists:users,id',
                'code' => 'required',
                'note' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'id_course.required' => 'Vui lòng điền id của khóa học',
            'id_course.exists' => 'ID khóa học không có trong hệ thống',
            'price.required' => 'Vui lòng điền giá của khóa học',
            'payment_method.required' => 'Vui lòng điền phương thức thanh toán khóa học',
            'total.required' => 'Vui lòng điền tổng số tiền thanh toán khóa học',
            'create_by_id.required' => 'Vui lòng điền id tài khoản thanh toán',
            'create_by_id.exists' => 'User không có trong hệ thống',
            'code.required' => 'Vui lòng điền mã hóa đơn',
            'note.required' => 'Vui lòng điền ghi chú hóa đơn',
        ];
    }
}
