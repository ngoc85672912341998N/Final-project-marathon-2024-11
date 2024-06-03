@extends('layouts.app')

@section('content')

    <div class="card text-bg-theme">

        <div class="card-header d-flex justify-content-between align-items-center p-3">
            <h4 class="m-0">Create New Classes</h4>
            <div>
                <a href="{{ route('classes.classes.index') }}" class="btn btn-primary" title="Show All Classes">
                    <span class="fa-solid fa-table-list" aria-hidden="true"></span>
                </a>
            </div>
        </div>


        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul class="list-unstyled mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" class="needs-validation" novalidate action="{{ route('classes.classes.store') }}"
                accept-charset="UTF-8" id="create_classes_form" name="create_classes_form">
                {{ csrf_field() }}
                @include ('classes.form', [
                    'classes' => null,
                ])

                <div style="display:none;" class="col-lg-10 col-xl-9 offset-lg-2 offset-xl-3">
                    <input id="submit_button" class="btn btn-primary" type="submit" value="Add">
                </div>
                <div class="col-lg-10 col-xl-9 offset-lg-2 offset-xl-3">
                    <button id="clickme" class="btn btn-primary">Add</button>
                </div>


            </form>
            <script>
                   $("#clickme").click(function (e) { 
                    e.preventDefault();
                    console.log($("#day_course").val());
                    $("#Timeweek").val($("#day_course").val());
                    document.getElementById("submit_button").click();
                   }); 
                
            </script>
        </div>
    </div>

@endsection
