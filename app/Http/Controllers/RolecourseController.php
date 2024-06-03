<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\roles_course;
use App\Http\Requests\createdRolecourseRequest;
use App\Http\Requests\updateRolecourseRequest;
use App\Http\Requests\deleteRolecourseRequest;
use App\Models\role_education;
class RolecourseController extends Controller
{
    public function role_course_view()
    {
        $role_education=role_education::all();
        $roles_course = DB::table('roles_course')
            ->join('roles_education', 'roles_course.role_id_education', '=', 'roles_education.id')
            ->select('roles_course.*', 'roles_education.name as rolename')
            ->get();
        
        return view('rolecource')
        ->with('roles_course', $roles_course)->with('role_education', $role_education);
    }

    public function insert_role_course(createdRolecourseRequest $request)
    {
       
        roles_course::create(['name' => $request->rolename,'role_id_education'=> $request->id_education]);
        return response()->json(['check' => true, 'msg' => 'Đã thêm loại khóa học thành công']);
    }

    public function Update_role_course(updateRolecourseRequest $request)
    {
        
        roles_course::where('id',  $request->idrolename)
            ->update(['name' => $request->rolename,'role_id_education'=> $request->id_education]);
      
        return response()->json(['check' => true, 'msg' => 'Update loại khóa học thành công']);
    }

    public function delete_role_course(deleteRolecourseRequest $request)
    {

        roles_course::where('id',  $request->id)
            ->delete();
        return response()->json(['check' => true, 'msg' => 'Xóa loại khóa học thành công']);
    }

    public function select_role_course()
    {
        $education = roles_course::all();
        return response()->json(['check' => true, 'data' => $education]);
    }
}
