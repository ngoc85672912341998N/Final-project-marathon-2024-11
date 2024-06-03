<?php

namespace App\Http\Controllers;
use App\Http\Requests\Coursecreatedrequest;
use App\Http\Requests\UpdatecourseRequest;
use App\Http\Requests\deletecourseRequest;
use App\Http\Requests\Coursemodulecreatedrequest;
use App\Http\Requests\DeletemoduleRequest;
use App\Http\Requests\selectmoduleRequest;
use App\Http\Requests\CreatedclassRequest;
use App\Http\Requests\updateclassRequest;
use App\Http\Requests\deleteclassRequest;
use App\Http\Requests\selectsingleclassRequest;
use App\Http\Requests\selectsinglecourseRequest;
use App\Models\list_course;
use App\Models\course;
use App\Models\module_course;
use App\Models\role_course;
use App\Models\role_education;
use Illuminate\Support\Facades\DB;


class CourseController extends Controller
{
    public function course_view()
    {
        return view('course');
    }

    public function upload_course()
    {
       
        $role_course = DB::table('roles_course')
            ->join('roles_education', 'roles_course.role_id_education', '=', 'roles_education.id')
            ->select('roles_course.*', 'roles_education.name as rolename')
            ->get();
        return view('courseupload')
        ->with('role_course', $role_course);
    }

    public function insert_course(Coursecreatedrequest $request)
    {
        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads'), $fileName);
        course::create([
            'path_image' => 'uploads/' . $fileName,
            'name' => $request->name,
            'role_id_course' => $request->role_id_course,
            'price' => $request->price,
            'course_description' => $request->course_description,
            'course_time' => $request->course_time,
            'users_limit' => $request->users_limit
        ]);
        return response()->json(['check' => true, 'msg' => 'Bạn đã thêm khóa học thành công']);
    }

    public function CourseUpload()
    {
        $course = role_course::all();
        return view('courseupload');
    }

    public function updatecourse(UpdatecourseRequest $request)
    {
        if ($request->file('file') == "") {
            course::create([
                'name' => $request->name,
                'role_id_course' => $request->role_id_course,
                'price' => $request->price,
                'course_description' => $request->course_description,
                'course_time' => $request->course_time,
                'users_limit' => $request->users_limit
            ]);
        } else {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $fileName);
            course::where('name',  $request->name)
                ->update([
                    'path_image' => 'uploads/' . $fileName,
                    'name' => $request->rolename,
                    'role_id_course' => $request->role_id_course,
                    'price' => $request->price,
                    'course_description' => $request->course_description,
                    'course_time' => $request->course_time,
                    'users_limit' => $request->users_limit
                ]);
        }
        return response()->json(['check' => true, 'msg' => 'Bạn đã update khóa học thành công']);
    }

    public function Selectcourse()
    {
        $data =course::all();
        return response()->json(['check' => true, 'data' => $data]);
    }

    public function deletecourse(deletecourseRequest $request)
    {
        course::where('id',  $request->id)
            ->delete();
        return response()->json(['check' => true, 'msg' => 'Bạn đã xóa khóa học thành công']);
    }

    public function selectsinglecourse(selectsinglecourseRequest $request)
    {
        $data =course::where('id',  $request->id)
            ->get();
        return response()->json(['check' => true, 'data' => $data]);
    }

    public function insert_module_course(Coursemodulecreatedrequest $request)
    {
        module_course::create(['name_module' => $request->name_module,
        'description'=> $request->description,
        'id_course'=> $request->id_course
    ]);
        return response()->json(['check' => true, 'msg' => 'Đã thêm module khóa học thành công']);
    }

    public function delete_module_course(DeletemoduleRequest $request)
    {
        module_course::where('id',  $request->id)
            ->delete();
        return response()->json(['check' => true, 'msg' => 'Xóa module khóa học thành công']);
    }


    public function Select_module_course_course(selectmoduleRequest $request)
    {
        $data=module_course::where('id',  $request->id)
            ->get();
        return response()->json(['check' => true, 'data' => $data]);
    }


    public function class_course()
    {
        return view('class');
    }



    public function insert_class_course(CreatedclassRequest $request)
    {
        list_course::create(['name' => $request->name,
        'start_date'=> $request->start_date,
        'end_date'=> $request->end_date,
        'id_course'=> $request->id_course
    ]);
        return response()->json(['check' => true, 'msg' => 'Đã thêm lớp học của khóa học thành công']);
    }

    public function update_class_course(updateclassRequest $request)
    {
        list_course::where('id',  $request->id_class)
            ->update(['name' => $request->rolename,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'id_course' => $request->id_course
        ]);
        return response()->json(['check' => true, 'msg' => 'Đã update lớp học của khóa học thành công']);
    }

    public function delete_class_course(deleteclassRequest $request)
    {
        list_course::where('id',  $request->id)
            ->delete();
        return response()->json(['check' => true, 'msg' => 'Xóa loại khóa học thành công']);
    }

    public function select_class_course()
    {
        $data=list_course::all();
        return response()->json(['check' => true, 'data' => $data]);
    }


    public function select_single_class_course(selectsingleclassRequest $request)
    {
        $data=list_course::where('id',  $request->id_class)
        ->get();
        return response()->json(['check' => true, 'data' => $data]);
    }







}
