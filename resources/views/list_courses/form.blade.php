
<div class="mb-3 row">
    <label for="end_date" class="col-form-label text-lg-end col-lg-2 col-xl-3">End Date</label>
    <div class="col-lg-10 col-xl-9">
        <textarea class="form-control{{ $errors->has('end_date') ? ' is-invalid' : '' }}" name="end_date" id="end_date" required="true" placeholder="Enter end date here...">{{ old('end_date', optional($listCourses)->end_date) }}</textarea>
        {!! $errors->first('end_date', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

<div class="mb-3 row">
    <label for="id_course" class="col-form-label text-lg-end col-lg-2 col-xl-3">Id Course</label>
    <div class="col-lg-10 col-xl-9">
        <select class="form-select{{ $errors->has('id_course') ? ' is-invalid' : '' }}" id="id_course" name="id_course" required="true">
        	    <option value="" style="display: none;" {{ old('id_course', optional($listCourses)->id_course ?: '') == '' ? 'selected' : '' }} disabled selected>Enter id course here...</option>
        	@foreach ($Courses as $key => $Course)
			    <option value="{{ $key }}" {{ old('id_course', optional($listCourses)->id_course) == $key ? 'selected' : '' }}>
			    	{{ $Course }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('id_course', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

<div class="mb-3 row">
    <label for="name" class="col-form-label text-lg-end col-lg-2 col-xl-3">Name</label>
    <div class="col-lg-10 col-xl-9">
        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" type="text" id="name" value="{{ old('name', optional($listCourses)->name) }}" minlength="1" maxlength="255" required="true" placeholder="Enter name here...">
        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

<div class="mb-3 row">
    <label for="start_date" class="col-form-label text-lg-end col-lg-2 col-xl-3">Start Date</label>
    <div class="col-lg-10 col-xl-9">
        <textarea class="form-control{{ $errors->has('start_date') ? ' is-invalid' : '' }}" name="start_date" id="start_date" required="true" placeholder="Enter start date here...">{{ old('start_date', optional($listCourses)->start_date) }}</textarea>
        {!! $errors->first('start_date', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

