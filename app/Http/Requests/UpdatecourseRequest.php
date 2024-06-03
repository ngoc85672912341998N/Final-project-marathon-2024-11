<?php

namespace App\Http\Requests;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;

class UpdatecourseRequest extends FormRequest
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
                'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'name' => 'required|exists:course,name',
                'role_id_course' => 'required|exists:roles_course,id',
                'price' => 'required',
                'course_description' => 'required',
                'course_time' => 'required',
                'users_limit' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'file.required' => 'Chưa có file ảnh của khóa học',
            'file.image' => 'Phải là file ảnh',
            'file.png' => 'Vui lòng điền đúng định dạng file',
            'name.required' => 'Vui lòng điền tên khóa học',
            'name.exists' => 'Tên khóa học không có trong hệ thống',
            'role_id_course.required' => 'Loại khóa học phải có tồn tại trong hệ thống',
            'role_id_course.exists' => 'Loại khóa học phải có tồn tại trong hệ thống',
            'price.required' => 'Phải ghi giá thành sản phẩm',
            'course_description.required' => 'Phải ghi mô tả khóa học của sản phẩm',
            'course_time.required' => 'Phải ghi thời gian diễn ra khóa học',
            'users_limit.required' => 'Phải ghi giới hạn người học của mỗi lớp',
        ];
    }
}
