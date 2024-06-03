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
            <h4 class="m-0">Classes</h4>
            <div>
                <a href="{{ route('classes.classes.create') }}" class="btn btn-secondary" title="Create New Classes">
                    <span class="fa-solid fa-plus" aria-hidden="true"></span>
                </a>
            </div>
        </div>
        
        @if(count($classesObjects) == 0)
            <div class="card-body text-center">
                <h4>No Classes Available.</h4>
            </div>
        @else
        <div class="card-body p-0">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Id Course</th>
                            <th>Id User</th>
                            <th>Timeweek</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($classesObjects as $classes)
                        <tr>
                            <td class="align-middle">{{ optional($classes->Course)->name }}</td>
                            <td class="align-middle">{{ optional($classes->User)->name }}</td>
                            <td class="align-middle">{{ $classes->Timeweek }}</td>

                            <td class="text-end">

                                <form method="POST" action="{!! route('classes.classes.destroy', $classes->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="{{ route('classes.classes.show', $classes->id ) }}" class="btn btn-info" title="Show Classes">
                                            <span class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('classes.classes.edit', $classes->id ) }}" class="btn btn-primary" title="Edit Classes">
                                            <span class="fa-regular fa-pen-to-square" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Classes" onclick="return confirm(&quot;Click Ok to delete Classes.&quot;)">
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

            {!! $classesObjects->links('pagination') !!}
        </div>
        
        @endif
    
    </div>
@endsection