<?php

namespace App\Http\Requests;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;

class updateclassRequest extends FormRequest
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
                'id_class' => 'required|exists:list_course,id',
                'name' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'id_course' => 'required|exists:course,id',
        ];
    }
    public function messages()

    {
        return [
            'id_class.required' => 'Vui lòng điền id lớp học mà bạn muốn update',
            'id_class.exists' => 'ID lớp học không tồn tại trong hệ thống',
            'name.required' => 'Vui lòng điền tên lớp học mà bạn muốn update',
            'start_date.required' => 'Vui lòng điền vào thời gian bắt đầu khóa học',
            'end_date.required' => 'Vui lòng điền vào thời gian kết thúc khóa học',
            'id_course.required' => 'Vui lòng điền thông tin đầy đủ id của khóa học',
            'id_course.exists' => 'Id khóa học không tồn tại trong hệ thống',
        ];
    }
}
