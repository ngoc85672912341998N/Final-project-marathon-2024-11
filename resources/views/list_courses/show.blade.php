@extends('layouts.app')

@section('content')

<div class="card text-bg-theme">

     <div class="card-header d-flex justify-content-between align-items-center p-3">
        <h4 class="m-0">{{ isset($listCourses->name) ? $listCourses->name : 'List Courses' }}</h4>
        <div>
            <form method="POST" action="{!! route('list_courses.list_courses.destroy', $listCourses->id) !!}" accept-charset="UTF-8">
                <input name="_method" value="DELETE" type="hidden">
                {{ csrf_field() }}

                <a href="{{ route('list_courses.list_courses.edit', $listCourses->id ) }}" class="btn btn-primary" title="Edit List Courses">
                    <span class="fa-regular fa-pen-to-square" aria-hidden="true"></span>
                </a>

                <button type="submit" class="btn btn-danger" title="Delete List Courses" onclick="return confirm(&quot;Click Ok to delete List Courses.?&quot;)">
                    <span class="fa-regular fa-trash-can" aria-hidden="true"></span>
                </button>

                <a href="{{ route('list_courses.list_courses.index') }}" class="btn btn-primary" title="Show All List Courses">
                    <span class="fa-solid fa-table-list" aria-hidden="true"></span>
                </a>

                <a href="{{ route('list_courses.list_courses.create') }}" class="btn btn-secondary" title="Create New List Courses">
                    <span class="fa-solid fa-plus" aria-hidden="true"></span>
                </a>

            </form>
        </div>
    </div>

    <div class="card-body">
        <dl class="row">
            <dt class="text-lg-end col-lg-2 col-xl-3">Created At</dt>
            <dd class="col-lg-10 col-xl-9">{{ $listCourses->created_at }}</dd>
            <dt class="text-lg-end col-lg-2 col-xl-3">End Date</dt>
            <dd class="col-lg-10 col-xl-9">{{ $listCourses->end_date }}</dd>
            <dt class="text-lg-end col-lg-2 col-xl-3">Id Course</dt>
            <dd class="col-lg-10 col-xl-9">{{ optional($listCourses->Course)->name }}</dd>
            <dt class="text-lg-end col-lg-2 col-xl-3">Name</dt>
            <dd class="col-lg-10 col-xl-9">{{ $listCourses->name }}</dd>
            <dt class="text-lg-end col-lg-2 col-xl-3">Start Date</dt>
            <dd class="col-lg-10 col-xl-9">{{ $listCourses->start_date }}</dd>
            <dt class="text-lg-end col-lg-2 col-xl-3">Updated At</dt>
            <dd class="col-lg-10 col-xl-9">{{ $listCourses->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection