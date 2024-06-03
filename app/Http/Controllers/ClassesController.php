<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use App\Models\classes;
use Illuminate\Http\Request;
use Exception;

class ClassesController extends Controller
{

    /**
     * Display a listing of the classes.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $classesObjects = classes::with('course','user')->paginate(25);

        return view('classes.index', compact('classesObjects'));
    }

    /**
     * Show the form for creating a new classes.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $Courses = Course::pluck('name','id')->all();
$Users = User::pluck('name','id')->all();
        
        return view('classes.create', compact('Courses','Users'));
    }

    /**
     * Store a new classes in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $data = $this->getData($request);
        
        classes::create($data);

        return redirect()->route('classes.classes.index')
            ->with('success_message', 'Classes was successfully added.');
    }

    /**
     * Display the specified classes.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $classes = classes::with('course','user')->findOrFail($id);

        return view('classes.show', compact('classes'));
    }

    /**
     * Show the form for editing the specified classes.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $classes = classes::findOrFail($id);
        $Courses = Course::pluck('name','id')->all();
$Users = User::pluck('name','id')->all();

        return view('classes.edit', compact('classes','Courses','Users'));
    }

    /**
     * Update the specified classes in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        
        $data = $this->getData($request);
        
        $classes = classes::findOrFail($id);
        $classes->update($data);

        return redirect()->route('classes.classes.index')
            ->with('success_message', 'Classes was successfully updated.');  
    }

    /**
     * Remove the specified classes from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $classes = classes::findOrFail($id);
            $classes->delete();

            return redirect()->route('classes.classes.index')
                ->with('success_message', 'Classes was successfully deleted.');
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
                'id_course' => 'required|string|min:1',
            'id_user' => 'required|string|min:1',
            'Timeweek' => 'required|string|min:1|max:255', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
