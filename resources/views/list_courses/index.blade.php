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
            <h4 class="m-0">Timer Courses</h4>
            <div>
                <a href="{{ route('list_courses.list_courses.create') }}" class="btn btn-secondary" title="Create New List Courses">
                    <span class="fa-solid fa-plus" aria-hidden="true"></span>
                </a>
            </div>
        </div>
        
        @if(count($listCoursesObjects) == 0)
            <div class="card-body text-center">
                <h4>No List Courses Available.</h4>
            </div>
        @else
        <div class="card-body p-0">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Id Course</th>
                            <th>Start Date</th>
                            <th>End Date</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($listCoursesObjects as $listCourses)
                        <tr>
                            <td class="align-middle">{{ $listCourses->name }}</td>
                            <td class="align-middle">{{ optional($listCourses->Course)->name }}</td>
                            <td class="align-middle">{{ $listCourses->start_date }}</td>
                            <td class="align-middle">{{ $listCourses->end_date }}</td>

                            <td class="text-end">

                                <form method="POST" action="{!! route('list_courses.list_courses.destroy', $listCourses->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="{{ route('list_courses.list_courses.show', $listCourses->id ) }}" class="btn btn-info" title="Show List Courses">
                                            <span class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('list_courses.list_courses.edit', $listCourses->id ) }}" class="btn btn-primary" title="Edit List Courses">
                                            <span class="fa-regular fa-pen-to-square" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete List Courses" onclick="return confirm(&quot;Click Ok to delete List Courses.&quot;)">
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

            {!! $listCoursesObjects->links('pagination') !!}
        </div>
        
        @endif
    
    </div>
@endsection