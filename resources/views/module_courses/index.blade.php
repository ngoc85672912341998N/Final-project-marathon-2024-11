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
            <h4 class="m-0">Module Courses</h4>
            <div>
                <a href="{{ route('module_courses.module_courses.create') }}" class="btn btn-secondary" title="Create New Module Courses">
                    <span class="fa-solid fa-plus" aria-hidden="true"></span>
                </a>
            </div>
        </div>
        
        @if(count($moduleCoursesObjects) == 0)
            <div class="card-body text-center">
                <h4>No Module Courses Available.</h4>
            </div>
        @else
        <div class="card-body p-0">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Name Module</th>
                            <th>Id Course</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($moduleCoursesObjects as $moduleCourses)
                        <tr>
                            <td class="align-middle">{{ $moduleCourses->name_module }}</td>
                            <td class="align-middle">{{ optional($moduleCourses->Course)->name }}</td>

                            <td class="text-end">

                                <form method="POST" action="{!! route('module_courses.module_courses.destroy', $moduleCourses->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="{{ route('module_courses.module_courses.show', $moduleCourses->id ) }}" class="btn btn-info" title="Show Module Courses">
                                            <span class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('module_courses.module_courses.edit', $moduleCourses->id ) }}" class="btn btn-primary" title="Edit Module Courses">
                                            <span class="fa-regular fa-pen-to-square" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Module Courses" onclick="return confirm(&quot;Click Ok to delete Module Courses.&quot;)">
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

            {!! $moduleCoursesObjects->links('pagination') !!}
        </div>
        
        @endif
    
    </div>
@endsection