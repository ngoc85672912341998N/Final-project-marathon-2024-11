@extends('layouts.app')

@section('content')

<div class="card text-bg-theme">

     <div class="card-header d-flex justify-content-between align-items-center p-3">
        <h4 class="m-0">{{ isset($title) ? $title : 'Classes' }}</h4>
        <div>
            <form method="POST" action="{!! route('classes.classes.destroy', $classes->id) !!}" accept-charset="UTF-8">
                <input name="_method" value="DELETE" type="hidden">
                {{ csrf_field() }}

                <a href="{{ route('classes.classes.edit', $classes->id ) }}" class="btn btn-primary" title="Edit Classes">
                    <span class="fa-regular fa-pen-to-square" aria-hidden="true"></span>
                </a>

                <button type="submit" class="btn btn-danger" title="Delete Classes" onclick="return confirm(&quot;Click Ok to delete Classes.?&quot;)">
                    <span class="fa-regular fa-trash-can" aria-hidden="true"></span>
                </button>

                <a href="{{ route('classes.classes.index') }}" class="btn btn-primary" title="Show All Classes">
                    <span class="fa-solid fa-table-list" aria-hidden="true"></span>
                </a>

                <a href="{{ route('classes.classes.create') }}" class="btn btn-secondary" title="Create New Classes">
                    <span class="fa-solid fa-plus" aria-hidden="true"></span>
                </a>

            </form>
        </div>
    </div>

    <div class="card-body">
        <dl class="row">
            <dt class="text-lg-end col-lg-2 col-xl-3">Id Course</dt>
            <dd class="col-lg-10 col-xl-9">{{ optional($classes->Course)->name }}</dd>
            <dt class="text-lg-end col-lg-2 col-xl-3">Id User</dt>
            <dd class="col-lg-10 col-xl-9">{{ optional($classes->User)->name }}</dd>
            <dt class="text-lg-end col-lg-2 col-xl-3">Timeweek</dt>
            <dd class="col-lg-10 col-xl-9">{{ $classes->Timeweek }}</dd>
            <dt class="text-lg-end col-lg-2 col-xl-3">Created At</dt>
            <dd class="col-lg-10 col-xl-9">{{ $classes->created_at }}</dd>
            <dt class="text-lg-end col-lg-2 col-xl-3">Updated At</dt>
            <dd class="col-lg-10 col-xl-9">{{ $classes->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection