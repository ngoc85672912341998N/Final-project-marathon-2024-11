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
            <h4 class="m-0">Courses</h4>
            <div>
                <a href="{{ route('courses.courses.create') }}" class="btn btn-secondary" title="Create New Courses">
                    <span class="fa-solid fa-plus" aria-hidden="true"></span>
                </a>
            </div>
        </div>
        
        @if(count($coursesObjects) == 0)
            <div class="card-body text-center">
                <h4>No Courses Available.</h4>
            </div>
        @else
        <div class="card-body p-0">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Path Image</th>
                            <th>Role</th>
                            <th>Price</th>
                            <th>Course Description</th>
                            <th>Course Time</th>
                            <th>Users Limit</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($coursesObjects as $courses)
                        <tr>
                            <td class="align-middle">{{ $courses->name }}</td>
                            <td class="align-middle">{{ $courses->path_image }}</td>
                            <td class="align-middle">{{ optional($courses->RolesCourse)->id }}</td>
                            <td class="align-middle">{{ $courses->price }}</td>
                            <td class="align-middle">{{ $courses->course_description }}</td>
                            <td class="align-middle">{{ $courses->course_time }}</td>
                            <td class="align-middle">{{ $courses->users_limit }}</td>

                            <td class="text-end">

                                <form method="POST" action="{!! route('courses.courses.destroy', $courses->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="{{ route('courses.courses.show', $courses->id ) }}" class="btn btn-info" title="Show Courses">
                                            <span class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('courses.courses.edit', $courses->id ) }}" class="btn btn-primary" title="Edit Courses">
                                            <span class="fa-regular fa-pen-to-square" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Courses" onclick="return confirm(&quot;Click Ok to delete Courses.&quot;)">
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

            {!! $coursesObjects->links('pagination') !!}
        </div>
        
        @endif
    
    </div>
@endsection