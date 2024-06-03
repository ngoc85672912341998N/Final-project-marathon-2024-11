<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\oders;
use Illuminate\Http\Request;
use Exception;

class OdersController extends Controller
{

    /**
     * Display a listing of the oders.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $odersObjects = oders::with('course')->paginate(25);

        return view('oders.index', compact('odersObjects'));
    }

    /**
     * Show the form for creating a new oders.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $Courses = Course::pluck('name','id')->all();
        
        return view('oders.create', compact('Courses'));
    }

    /**
     * Store a new oders in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $data = $this->getData($request);
        
        oders::create($data);

        return redirect()->route('oders.oders.index')
            ->with('success_message', 'Oders was successfully added.');
    }

    /**
     * Display the specified oders.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $oders = oders::with('course')->findOrFail($id);

        return view('oders.show', compact('oders'));
    }

    /**
     * Show the form for editing the specified oders.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $oders = oders::findOrFail($id);
        $Courses = Course::pluck('name','id')->all();

        return view('oders.edit', compact('oders','Courses'));
    }

    /**
     * Update the specified oders in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        
        $data = $this->getData($request);
        
        $oders = oders::findOrFail($id);
        $oders->update($data);

        return redirect()->route('oders.oders.index')
            ->with('success_message', 'Oders was successfully updated.');  
    }

    /**
     * Remove the specified oders from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $oders = oders::findOrFail($id);
            $oders->delete();

            return redirect()->route('oders.oders.index')
                ->with('success_message', 'Oders was successfully deleted.');
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
            'status' => 'boolean',
            'price' => 'required|numeric|min:-2147483648|max:2147483647',
            'payment_method' => 'required|string|min:1|max:255',
            'total' => 'required|numeric|min:-2147483648|max:2147483647',
            'code' => 'required|string|min:1|max:255',
            'note' => 'required|string|min:1|max:255', 
        ];

        
        $data = $request->validate($rules);


        $data['status'] = $request->has('status');


        return $data;
    }

}
