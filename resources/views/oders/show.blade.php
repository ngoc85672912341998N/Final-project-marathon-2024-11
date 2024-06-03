@extends('layouts.app')

@section('content')

<div class="card text-bg-theme">

     <div class="card-header d-flex justify-content-between align-items-center p-3">
        <h4 class="m-0">{{ isset($title) ? $title : 'Oders' }}</h4>
        <div>
            <form method="POST" action="{!! route('oders.oders.destroy', $oders->id) !!}" accept-charset="UTF-8">
                <input name="_method" value="DELETE" type="hidden">
                {{ csrf_field() }}

                <a href="{{ route('oders.oders.edit', $oders->id ) }}" class="btn btn-primary" title="Edit Oders">
                    <span class="fa-regular fa-pen-to-square" aria-hidden="true"></span>
                </a>

                <button type="submit" class="btn btn-danger" title="Delete Oders" onclick="return confirm(&quot;Click Ok to delete Oders.?&quot;)">
                    <span class="fa-regular fa-trash-can" aria-hidden="true"></span>
                </button>

                <a href="{{ route('oders.oders.index') }}" class="btn btn-primary" title="Show All Oders">
                    <span class="fa-solid fa-table-list" aria-hidden="true"></span>
                </a>

                <a href="{{ route('oders.oders.create') }}" class="btn btn-secondary" title="Create New Oders">
                    <span class="fa-solid fa-plus" aria-hidden="true"></span>
                </a>

            </form>
        </div>
    </div>

    <div class="card-body">
        <dl class="row">
            <dt class="text-lg-end col-lg-2 col-xl-3">Id Course</dt>
            <dd class="col-lg-10 col-xl-9">{{ optional($oders->Course)->name }}</dd>
            <dt class="text-lg-end col-lg-2 col-xl-3">Status</dt>
            <dd class="col-lg-10 col-xl-9">{{ ($oders->status) ? 'Yes' : 'No' }}</dd>
            <dt class="text-lg-end col-lg-2 col-xl-3">Price</dt>
            <dd class="col-lg-10 col-xl-9">{{ $oders->price }}</dd>
            <dt class="text-lg-end col-lg-2 col-xl-3">Payment Method</dt>
            <dd class="col-lg-10 col-xl-9">{{ $oders->payment_method }}</dd>
            <dt class="text-lg-end col-lg-2 col-xl-3">Total</dt>
            <dd class="col-lg-10 col-xl-9">{{ $oders->total }}</dd>
            <dt class="text-lg-end col-lg-2 col-xl-3">Code</dt>
            <dd class="col-lg-10 col-xl-9">{{ $oders->code }}</dd>
            <dt class="text-lg-end col-lg-2 col-xl-3">Note</dt>
            <dd class="col-lg-10 col-xl-9">{{ $oders->note }}</dd>
            <dt class="text-lg-end col-lg-2 col-xl-3">Created At</dt>
            <dd class="col-lg-10 col-xl-9">{{ $oders->created_at }}</dd>
            <dt class="text-lg-end col-lg-2 col-xl-3">Updated At</dt>
            <dd class="col-lg-10 col-xl-9">{{ $oders->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection