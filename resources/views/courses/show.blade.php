@extends('layouts.app')

@section('content')

<div class="card text-bg-theme">

     <div class="card-header d-flex justify-content-between align-items-center p-3">
        <h4 class="m-0">{{ isset($courses->name) ? $courses->name : 'Courses' }}</h4>
        <div>
            <form method="POST" action="{!! route('courses.courses.destroy', $courses->id) !!}" accept-charset="UTF-8">
                <input name="_method" value="DELETE" type="hidden">
                {{ csrf_field() }}

                <a href="{{ route('courses.courses.edit', $courses->id ) }}" class="btn btn-primary" title="Edit Courses">
                    <span class="fa-regular fa-pen-to-square" aria-hidden="true"></span>
                </a>

                <button type="submit" class="btn btn-danger" title="Delete Courses" onclick="return confirm(&quot;Click Ok to delete Courses.?&quot;)">
                    <span class="fa-regular fa-trash-can" aria-hidden="true"></span>
                </button>

                <a href="{{ route('courses.courses.index') }}" class="btn btn-primary" title="Show All Courses">
                    <span class="fa-solid fa-table-list" aria-hidden="true"></span>
                </a>

                <a href="{{ route('courses.courses.create') }}" class="btn btn-secondary" title="Create New Courses">
                    <span class="fa-solid fa-plus" aria-hidden="true"></span>
                </a>

            </form>
        </div>
    </div>

    <div class="card-body">
        <dl class="row">
            <dt class="text-lg-end col-lg-2 col-xl-3">Name</dt>
            <dd class="col-lg-10 col-xl-9">{{ $courses->name }}</dd>
            <dt class="text-lg-end col-lg-2 col-xl-3">Path Image</dt>
            <dd class="col-lg-10 col-xl-9">{{ $courses->path_image }}</dd>
            <dt class="text-lg-end col-lg-2 col-xl-3">Role</dt>
            <dd class="col-lg-10 col-xl-9">{{ optional($courses->RolesCourse)->id }}</dd>
            <dt class="text-lg-end col-lg-2 col-xl-3">Price</dt>
            <dd class="col-lg-10 col-xl-9">{{ $courses->price }}</dd>
            <dt class="text-lg-end col-lg-2 col-xl-3">Course Description</dt>
            <dd class="col-lg-10 col-xl-9">{{ $courses->course_description }}</dd>
            <dt class="text-lg-end col-lg-2 col-xl-3">Course Time</dt>
            <dd class="col-lg-10 col-xl-9">{{ $courses->course_time }}</dd>
            <dt class="text-lg-end col-lg-2 col-xl-3">Users Limit</dt>
            <dd class="col-lg-10 col-xl-9">{{ $courses->users_limit }}</dd>
            

        </dl>

    </div>
</div>

@endsection