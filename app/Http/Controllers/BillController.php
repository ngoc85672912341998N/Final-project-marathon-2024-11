<?php

namespace App\Http\Controllers;

use App\Models\bill;
use App\Http\Requests\BillcreatedRequest;
use App\Http\Requests\BillupdatesRequest;
use App\Http\Requests\BilldeleteRequest;
use App\Http\Requests\BillselectsingleRequest;
class BillController extends Controller
{
    public function bill_view()
    {
        return view('bill');
    }

    public function created_bill(BillcreatedRequest $request)
    {
        bill::create([
            'id_oders' => $request->id_oders,
            'code' => $request->code,
            'status' => $request->status,
            'price' => $request->price,
            'total' => $request->total,
        ]);
        return response()->json(['check' => true, 'msg' => 'Bạn đã thêm bill thành công']);
    }


    public function updated_bill(BillupdatesRequest $request)
    {
        bill::where('id',  $request->id_bills)
            ->update([
                'id_oders' => $request->id_oders,
                'code' => $request->code,
                'status' => $request->status,
                'price' => $request->price,
                'total' => $request->total
            ]);
        return response()->json(['check' => true, 'msg' => 'Bạn đã update bill thành công']);
    }

    public function delete_bill(BilldeleteRequest $request)
    {
        bill::where('id',  $request->id_bill)
            ->delete();
        return response()->json(['check' => true, 'msg' => 'Bạn đã xóa bill thành công']);
    }


    public function seletect_bill()
    {
        $data = bill::all();
        return response()->json(['check' => true, 'data' => $data]);
    }

    public function seletect_bill_single(BillselectsingleRequest $request)
    {
        $data = bill::where('id',  $request->id_bill)
        ->get();
        return response()->json(['check' => true, 'data' => $data]);
    }

}
