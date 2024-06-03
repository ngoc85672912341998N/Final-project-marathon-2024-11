@extends('layouts.app')

@section('content')

<div class="card text-bg-theme">

     <div class="card-header d-flex justify-content-between align-items-center p-3">
        <h4 class="m-0">{{ isset($title) ? $title : 'Module Courses' }}</h4>
        <div>
            <form method="POST" action="{!! route('module_courses.module_courses.destroy', $moduleCourses->id) !!}" accept-charset="UTF-8">
                <input name="_method" value="DELETE" type="hidden">
                {{ csrf_field() }}

                <a href="{{ route('module_courses.module_courses.edit', $moduleCourses->id ) }}" class="btn btn-primary" title="Edit Module Courses">
                    <span class="fa-regular fa-pen-to-square" aria-hidden="true"></span>
                </a>

                <button type="submit" class="btn btn-danger" title="Delete Module Courses" onclick="return confirm(&quot;Click Ok to delete Module Courses.?&quot;)">
                    <span class="fa-regular fa-trash-can" aria-hidden="true"></span>
                </button>

                <a href="{{ route('module_courses.module_courses.index') }}" class="btn btn-primary" title="Show All Module Courses">
                    <span class="fa-solid fa-table-list" aria-hidden="true"></span>
                </a>

                <a href="{{ route('module_courses.module_courses.create') }}" class="btn btn-secondary" title="Create New Module Courses">
                    <span class="fa-solid fa-plus" aria-hidden="true"></span>
                </a>

            </form>
        </div>
    </div>

    <div class="card-body">
        <dl class="row">
            <dt class="text-lg-end col-lg-2 col-xl-3">Name Module</dt>
            <dd class="col-lg-10 col-xl-9">{{ $moduleCourses->name_module }}</dd>
            <dt class="text-lg-end col-lg-2 col-xl-3">Description</dt>
            <dd class="col-lg-10 col-xl-9">{{ $moduleCourses->description }}</dd>
            <dt class="text-lg-end col-lg-2 col-xl-3">Id Course</dt>
            <dd class="col-lg-10 col-xl-9">{{ optional($moduleCourses->Course)->name }}</dd>
            <dt class="text-lg-end col-lg-2 col-xl-3">Created At</dt>
            <dd class="col-lg-10 col-xl-9">{{ $moduleCourses->created_at }}</dd>
            <dt class="text-lg-end col-lg-2 col-xl-3">Updated At</dt>
            <dd class="col-lg-10 col-xl-9">{{ $moduleCourses->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection