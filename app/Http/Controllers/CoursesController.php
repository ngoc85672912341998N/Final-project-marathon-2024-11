<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\roles_course;
use App\Models\courses;
use Illuminate\Http\Request;
use Exception;

class CoursesController extends Controller
{

    /**
     * Display a listing of the courses.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $coursesObjects = courses::with('rolescourse')->paginate(25);

        return view('courses.index', compact('coursesObjects'));
    }

    /**
     * Show the form for creating a new courses.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $RolesCourses = roles_course::pluck('name','id')->all();
   
        
        return view('courses.create', compact('RolesCourses'));
    }

    /**
     * Store a new courses in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $data = $this->getData($request);
        
        courses::create($data);

        return redirect()->route('courses.courses.index')
            ->with('success_message', 'Courses was successfully added.');
    }

    /**
     * Display the specified courses.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $courses = courses::with('rolescourse')->findOrFail($id);

        return view('courses.show', compact('courses'));
    }

    /**
     * Show the form for editing the specified courses.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $courses = courses::findOrFail($id);
        $RolesCourses = roles_course::pluck('name','id')->all();

        return view('courses.edit', compact('courses','RolesCourses'));
    }

    /**
     * Update the specified courses in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        
        $data = $this->getData($request);
        
        $courses = courses::findOrFail($id);
        $courses->update($data);

        return redirect()->route('courses.courses.index')
            ->with('success_message', 'Courses was successfully updated.');  
    }

    /**
     * Remove the specified courses from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $courses = courses::findOrFail($id);
            $courses->delete();

            return redirect()->route('courses.courses.index')
                ->with('success_message', 'Courses was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    
    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request 
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
                'name' => 'required|string|min:1|max:255',
            'path_image' => 'required|string|min:1|max:255',
            'role_id_course' => 'required|string|min:1',
            'price' => 'required|numeric|min:-2147483648|max:2147483647',
            'course_description' => 'required|string|min:1|max:255',
            'course_time' => 'required|numeric|min:-2147483648|max:2147483647',
            'users_limit' => 'required|numeric|min:-2147483648|max:2147483647', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
