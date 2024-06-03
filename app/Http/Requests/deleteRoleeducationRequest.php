<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;
class deleteRoleeducationRequest extends FormRequest
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
                'id' => 'required|exists:roles_education,id'    
        ];
    }
    public function messages()
    {
        return [
            'id.required' => 'chưa có id loại hình giáo dục',
            'id.exists' => 'id loại hình giáo dục không có trong bảng'
        ];
    }
}
