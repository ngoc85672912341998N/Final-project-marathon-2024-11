@extends('layouts.app')

@section('content')

<div class="card text-bg-theme">

     <div class="card-header d-flex justify-content-between align-items-center p-3">
        <h4 class="m-0">{{ isset($title) ? $title : 'Bills' }}</h4>
        <div>
            <form method="POST" action="{!! route('bills.bills.destroy', $bills->id) !!}" accept-charset="UTF-8">
                <input name="_method" value="DELETE" type="hidden">
                {{ csrf_field() }}

                <a href="{{ route('bills.bills.edit', $bills->id ) }}" class="btn btn-primary" title="Edit Bills">
                    <span class="fa-regular fa-pen-to-square" aria-hidden="true"></span>
                </a>

                <button type="submit" class="btn btn-danger" title="Delete Bills" onclick="return confirm(&quot;Click Ok to delete Bills.?&quot;)">
                    <span class="fa-regular fa-trash-can" aria-hidden="true"></span>
                </button>

                <a href="{{ route('bills.bills.index') }}" class="btn btn-primary" title="Show All Bills">
                    <span class="fa-solid fa-table-list" aria-hidden="true"></span>
                </a>

                <a href="{{ route('bills.bills.create') }}" class="btn btn-secondary" title="Create New Bills">
                    <span class="fa-solid fa-plus" aria-hidden="true"></span>
                </a>

            </form>
        </div>
    </div>

    <div class="card-body">
        <dl class="row">
            <dt class="text-lg-end col-lg-2 col-xl-3">Id Oders</dt>
            <dd class="col-lg-10 col-xl-9">{{ optional($bills->Oder)->id_course }}</dd>
            <dt class="text-lg-end col-lg-2 col-xl-3">Code</dt>
            <dd class="col-lg-10 col-xl-9">{{ $bills->code }}</dd>
            <dt class="text-lg-end col-lg-2 col-xl-3">Status</dt>
            <dd class="col-lg-10 col-xl-9">{{ $bills->status }}</dd>
            <dt class="text-lg-end col-lg-2 col-xl-3">Price</dt>
            <dd class="col-lg-10 col-xl-9">{{ $bills->price }}</dd>
            <dt class="text-lg-end col-lg-2 col-xl-3">Payment Method</dt>
            <dd class="col-lg-10 col-xl-9">{{ $bills->payment_method }}</dd>
            <dt class="text-lg-end col-lg-2 col-xl-3">Total</dt>
            <dd class="col-lg-10 col-xl-9">{{ $bills->total }}</dd>
            <dt class="text-lg-end col-lg-2 col-xl-3">Created At</dt>
            <dd class="col-lg-10 col-xl-9">{{ $bills->created_at }}</dd>
            <dt class="text-lg-end col-lg-2 col-xl-3">Updated At</dt>
            <dd class="col-lg-10 col-xl-9">{{ $bills->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection