@extends('layouts.app')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {!! session('success_message') !!}

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card text-bg-theme">

        <div class="card-header d-flex justify-content-between align-items-center p-3">
            <h4 class="m-0">Bills</h4>
            <div>
                <a href="{{ route('bills.bills.create') }}" class="btn btn-secondary" title="Create New Bills">
                    <span class="fa-solid fa-plus" aria-hidden="true"></span>
                </a>
            </div>
        </div>
        
        @if(count($billsObjects) == 0)
            <div class="card-body text-center">
                <h4>No Bills Available.</h4>
            </div>
        @else
        <div class="card-body p-0">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Id Oders</th>
                            <th>Code</th>
                            <th>Status</th>
                            <th>Price</th>
                            <th>Payment Method</th>
                            <th>Total</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($billsObjects as $bills)
                        <tr>
                            <td class="align-middle">{{ optional($bills->Oder)->id_course }}</td>
                            <td class="align-middle">{{ $bills->code }}</td>
                            <td class="align-middle">{{ $bills->status }}</td>
                            <td class="align-middle">{{ $bills->price }}</td>
                            <td class="align-middle">{{ $bills->payment_method }}</td>
                            <td class="align-middle">{{ $bills->total }}</td>

                            <td class="text-end">

                                <form method="POST" action="{!! route('bills.bills.destroy', $bills->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="{{ route('bills.bills.show', $bills->id ) }}" class="btn btn-info" title="Show Bills">
                                            <span class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('bills.bills.edit', $bills->id ) }}" class="btn btn-primary" title="Edit Bills">
                                            <span class="fa-regular fa-pen-to-square" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Bills" onclick="return confirm(&quot;Click Ok to delete Bills.&quot;)">
                                            <span class="fa-regular fa-trash-can" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>

            {!! $billsObjects->links('pagination') !!}
        </div>
        
        @endif
    
    </div>
@endsection