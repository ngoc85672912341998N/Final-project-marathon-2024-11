<?php

namespace App\Http\Controllers;
use App\Models\role_education;
use App\Http\Requests\createdRoleeducationRequest;
use App\Http\Requests\deleteRoleeducationRequest;
use App\Http\Requests\updateRoleeducationRequest;
class RoleeducationController extends Controller
{
    public function role_education()
    {
        $education = role_education::all();
        return view('roleeducation')
        ->with('education', $education);
    }

    public function addRoleeducation(createdRoleeducationRequest $request)
    {
        role_education::create(['name' => $request->rolename]);
        return response()->json(['check' => true, 'msg' => 'Thêm thành công']);
    }

    public function deleteRoleeducation(deleteRoleeducationRequest $request)
    {
        role_education::where('id',  $request->id)
            ->delete();
        return response()->json(['check' => true, 'msg' => 'Xóa loại hình giáo dục thành công']);
    }

    public function UpdateRoleeducation(updateRoleeducationRequest $request)
    {
        role_education::where('id',  $request->id)
            ->update(['name' => $request->rolename]);
        return response()->json(['check' => true, 'msg' => 'Update loại hình giáo dục thành công']);
    }

    public function select_role_education()
    {
        $education = role_education::all();
        return response()->json(['check' => true, 'data' => $education]);
    }

}
