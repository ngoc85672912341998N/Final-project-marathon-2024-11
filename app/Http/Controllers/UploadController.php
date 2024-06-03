<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        $validatedData = $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Xác thực tệp tin là ảnh, có định dạng jpeg, png, jpg, gif, dung lượng tối đa là 2MB
        ]);
        
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $fileName);

            return response()->json(['message' => 'Tải lên tệp tin thành công', 'fileName' => $fileName]);
        } else {
            return response()->json(['message' => 'Không tìm thấy tệp tin'], 400);
        }
    }
}
