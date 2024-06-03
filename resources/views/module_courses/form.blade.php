
<div class="mb-3 row">
    <label for="name_module" class="col-form-label text-lg-end col-lg-2 col-xl-3">Name Module</label>
    <div class="col-lg-10 col-xl-9">
        <input class="form-control{{ $errors->has('name_module') ? ' is-invalid' : '' }}" name="name_module" type="text" id="name_module" value="{{ old('name_module', optional($moduleCourses)->name_module) }}" minlength="1" maxlength="255" required="true" placeholder="Enter name module here...">
        {!! $errors->first('name_module', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

<div class="mb-3 row">
    <label for="description" class="col-form-label text-lg-end col-lg-2 col-xl-3">Description</label>
    <div class="col-lg-10 col-xl-9">
        <input class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" type="text" id="description" value="{{ old('description', optional($moduleCourses)->description) }}" minlength="1" maxlength="255" required="true">
        {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

<div class="mb-3 row">
    <label for="id_course" class="col-form-label text-lg-end col-lg-2 col-xl-3">Id Course</label>
    <div class="col-lg-10 col-xl-9">
        <select class="form-select{{ $errors->has('id_course') ? ' is-invalid' : '' }}" id="id_course" name="id_course" required="true">
        	    <option value="" style="display: none;" {{ old('id_course', optional($moduleCourses)->id_course ?: '') == '' ? 'selected' : '' }} disabled selected>Enter id course here...</option>
        	@foreach ($Courses as $key => $Course)
			    <option value="{{ $key }}" {{ old('id_course', optional($moduleCourses)->id_course) == $key ? 'selected' : '' }}>
			    	{{ $Course }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('id_course', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

