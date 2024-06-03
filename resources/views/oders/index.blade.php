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
            <h4 class="m-0">Oders</h4>
            <div>
                <a href="{{ route('oders.oders.create') }}" class="btn btn-secondary" title="Create New Oders">
                    <span class="fa-solid fa-plus" aria-hidden="true"></span>
                </a>
            </div>
        </div>
        
        @if(count($odersObjects) == 0)
            <div class="card-body text-center">
                <h4>No Oders Available.</h4>
            </div>
        @else
        <div class="card-body p-0">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Id Course</th>
                            <th>Status</th>
                            <th>Price</th>
                            <th>Payment Method</th>
                            <th>Total</th>
                            <th>Code</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($odersObjects as $oders)
                        <tr>
                            <td class="align-middle">{{ optional($oders->Course)->name }}</td>
                            <td class="align-middle">{{ ($oders->status) ? 'Yes' : 'No' }}</td>
                            <td class="align-middle">{{ $oders->price }}</td>
                            <td class="align-middle">{{ $oders->payment_method }}</td>
                            <td class="align-middle">{{ $oders->total }}</td>
                            <td class="align-middle">{{ $oders->code }}</td>

                            <td class="text-end">

                                <form method="POST" action="{!! route('oders.oders.destroy', $oders->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="{{ route('oders.oders.show', $oders->id ) }}" class="btn btn-info" title="Show Oders">
                                            <span class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('oders.oders.edit', $oders->id ) }}" class="btn btn-primary" title="Edit Oders">
                                            <span class="fa-regular fa-pen-to-square" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Oders" onclick="return confirm(&quot;Click Ok to delete Oders.&quot;)">
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

            {!! $odersObjects->links('pagination') !!}
        </div>
        
        @endif
    
    </div>
@endsection