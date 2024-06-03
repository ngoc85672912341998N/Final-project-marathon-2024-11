<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\list_courses;
use Illuminate\Http\Request;
use Exception;

class ListCoursesController extends Controller
{

    /**
     * Display a listing of the list courses.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $listCoursesObjects = list_courses::paginate(25);

        return view('list_courses.index', compact('listCoursesObjects'));
    }

    /**
     * Show the form for creating a new list courses.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $Courses = Course::pluck('name','id')->all();
        
        return view('list_courses.create', compact('Courses'));
    }

    /**
     * Store a new list courses in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $data = $this->getData($request);
        
        list_courses::create($data);

        return redirect()->route('list_courses.list_courses.index')
            ->with('success_message', 'List Courses was successfully added.');
    }

    /**
     * Display the specified list courses.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $listCourses = list_courses::with('course')->findOrFail($id);

        return view('list_courses.show', compact('listCourses'));
    }

    /**
     * Show the form for editing the specified list courses.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $listCourses = list_courses::findOrFail($id);
        $Courses = Course::pluck('name','id')->all();

        return view('list_courses.edit', compact('listCourses','Courses'));
    }

    /**
     * Update the specified list courses in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        
        $data = $this->getData($request);
        
        $listCourses = list_courses::findOrFail($id);
        $listCourses->update($data);

        return redirect()->route('list_courses.list_courses.index')
            ->with('success_message', 'List Courses was successfully updated.');  
    }

    /**
     * Remove the specified list courses from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $listCourses = list_courses::findOrFail($id);
            $listCourses->delete();

            return redirect()->route('list_courses.list_courses.index')
                ->with('success_message', 'List Courses was successfully deleted.');
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
                'end_date' => 'required',
            'id_course' => 'required|string|min:1',
            'name' => 'required|string|min:1|max:255',
            'start_date' => 'required', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
