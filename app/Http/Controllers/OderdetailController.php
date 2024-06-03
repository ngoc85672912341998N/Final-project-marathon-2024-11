<?php

namespace App\Http\Controllers;
use App\Http\Requests\OderscreatedRequest;
use App\Http\Requests\OdersupdateRequest;
use App\Http\Requests\OderssingleselectRequest;
use App\Models\oders;
class OderdetailController extends Controller
{
    public function oders_view()
    {
        return view('oders');
    }

    public function insert_oders(OderscreatedRequest $request)
    {
        oders::create([
            'id_course' => $request->id_course,
            'price' => $request->price,
            'payment_method' => $request->payment_method,
            'total' => $request->total,
            'create_by_id' => $request->create_by_id,
            'code' => $request->code,
            'note' => $request->note,
        ]);
        return response()->json(['check' => true, 'msg' => 'Bạn đã thêm bill thành công']);
    }

    public function updates_oders(OdersupdateRequest $request)
    {
        oders::where('id',  $request->id)
        ->update(['id_course' => $request->id_course,
        'price' => $request->price,
        'payment_method' => $request->payment_method,
        'total' => $request->total,
        'create_by_id' => $request->create_by_id,
        'code' => $request->code,
        'note' => $request->note
    ]);
        return response()->json(['check' => true, 'msg' => 'Bạn đã thêm bill thành công']);
    }

    public function delete_oders(OdersupdateRequest $request)
    {
        oders::where('id',  $request->id)
        ->delete();
        return response()->json(['check' => true, 'msg' => 'Bạn đã thêm bill thành công']);
    }

    public function select_oders()
    {
        $data = oders::all();
        return response()->json(['check' => true, 'data' => $data]);
    }


    public function select_single_oders(OderssingleselectRequest $request)
    {
        $data = oders::where('id',  $request->id)
        ->get();
        return response()->json(['check' => true, 'data' => $data]);
    }
}
