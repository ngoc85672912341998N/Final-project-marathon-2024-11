<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\module_courses;
use Illuminate\Http\Request;
use Exception;

class ModuleCoursesController extends Controller
{

    /**
     * Display a listing of the module courses.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $moduleCoursesObjects = module_courses::with('course')->paginate(25);

        return view('module_courses.index', compact('moduleCoursesObjects'));
    }

    /**
     * Show the form for creating a new module courses.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $Courses = Course::pluck('name','id')->all();
        
        return view('module_courses.create', compact('Courses'));
    }

    /**
     * Store a new module courses in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $data = $this->getData($request);
        
        module_courses::create($data);

        return redirect()->route('module_courses.module_courses.index')
            ->with('success_message', 'Module Courses was successfully added.');
    }

    /**
     * Display the specified module courses.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $moduleCourses = module_courses::with('course')->findOrFail($id);

        return view('module_courses.show', compact('moduleCourses'));
    }

    /**
     * Show the form for editing the specified module courses.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $moduleCourses = module_courses::findOrFail($id);
        $Courses = Course::pluck('name','id')->all();

        return view('module_courses.edit', compact('moduleCourses','Courses'));
    }

    /**
     * Update the specified module courses in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        
        $data = $this->getData($request);
        
        $moduleCourses = module_courses::findOrFail($id);
        $moduleCourses->update($data);

        return redirect()->route('module_courses.module_courses.index')
            ->with('success_message', 'Module Courses was successfully updated.');  
    }

    /**
     * Remove the specified module courses from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $moduleCourses = module_courses::findOrFail($id);
            $moduleCourses->delete();

            return redirect()->route('module_courses.module_courses.index')
                ->with('success_message', 'Module Courses was successfully deleted.');
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
                'name_module' => 'required|string|min:1|max:255',
            'description' => 'required|string|min:1|max:255',
            'id_course' => 'required|string|min:1', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
