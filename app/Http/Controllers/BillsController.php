<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\oders;
use App\Models\bills;
use Illuminate\Http\Request;
use Exception;

class BillsController extends Controller
{

    /**
     * Display a listing of the bills.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $billsObjects = bills::with('oders')->paginate(25);

        return view('bills.index', compact('billsObjects'));
    }

    /**
     * Show the form for creating a new bills.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $Oders = oders::pluck('id_course','id')->all();
        
        return view('bills.create', compact('Oders'));
    }

    /**
     * Store a new bills in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $data = $this->getData($request);
        
        bills::create($data);

        return redirect()->route('bills.bills.index')
            ->with('success_message', 'Bills was successfully added.');
    }

    /**
     * Display the specified bills.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $bills = bills::with('oders')->findOrFail($id);

        return view('bills.show', compact('bills'));
    }

    /**
     * Show the form for editing the specified bills.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $bills = bills::findOrFail($id);
        $Oders = oders::pluck('id_course','id')->all();

        return view('bills.edit', compact('bills','Oders'));
    }

    /**
     * Update the specified bills in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        
        $data = $this->getData($request);
        
        $bills = bills::findOrFail($id);
        $bills->update($data);

        return redirect()->route('bills.bills.index')
            ->with('success_message', 'Bills was successfully updated.');  
    }

    /**
     * Remove the specified bills from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $bills = bills::findOrFail($id);
            $bills->delete();

            return redirect()->route('bills.bills.index')
                ->with('success_message', 'Bills was successfully deleted.');
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
                'id_oders' => 'required|string|min:1',
            'code' => 'required|string|min:1|max:255',
            'status' => 'required|numeric|min:-2147483648|max:2147483647',
            'price' => 'required|numeric|min:-2147483648|max:2147483647',
            'payment_method' => 'required|string|min:1|max:255',
            'total' => 'required|numeric|min:-2147483648|max:2147483647', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
