
<div class="mb-3 row">
    <label for="name" class="col-form-label text-lg-end col-lg-2 col-xl-3">Name</label>
    <div class="col-lg-10 col-xl-9">
        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" type="text" id="name" value="{{ old('name', optional($courses)->name) }}" minlength="1" maxlength="255" required="true" placeholder="Enter name here...">
        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

<div class="mb-3 row">
    <label for="path_image" class="col-form-label text-lg-end col-lg-2 col-xl-3">Path Image</label>
    <div class="col-lg-10 col-xl-9">
        <input class="form-control{{ $errors->has('path_image') ? ' is-invalid' : '' }}" name="path_image" type="text" id="path_image" value="{{ old('path_image', optional($courses)->path_image) }}" min="1" max="255" required="true" placeholder="Enter path image here...">
        {!! $errors->first('path_image', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

<div class="mb-3 row">
    <label for="role_id_course" class="col-form-label text-lg-end col-lg-2 col-xl-3">Role</label>
    <div class="col-lg-10 col-xl-9">
        <select class="form-select{{ $errors->has('role_id_course') ? ' is-invalid' : '' }}" id="role_id_course" name="role_id_course" required="true">
        	    <option value="" style="display: none;" {{ old('role_id_course', optional($courses)->role_id_course ?: '') == '' ? 'selected' : '' }} disabled selected>Enter role here...</option>
        	@foreach ($RolesCourses as $key => $RolesCourse)
			    <option value="{{ $key }}" {{ old('role_id_course', optional($courses)->role_id_course) == $key ? 'selected' : '' }}>
			    	{{ $RolesCourse }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('role_id_course', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

<div class="mb-3 row">
    <label for="price" class="col-form-label text-lg-end col-lg-2 col-xl-3">Price</label>
    <div class="col-lg-10 col-xl-9">
        <input class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" type="number" id="price" value="{{ old('price', optional($courses)->price) }}" min="-2147483648" max="2147483647" required="true" placeholder="Enter price here...">
        {!! $errors->first('price', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

<div class="mb-3 row">
    <label for="course_description" class="col-form-label text-lg-end col-lg-2 col-xl-3">Course Description</label>
    <div class="col-lg-10 col-xl-9">
        <input class="form-control{{ $errors->has('course_description') ? ' is-invalid' : '' }}" name="course_description" type="text" id="course_description" value="{{ old('course_description', optional($courses)->course_description) }}" minlength="1" maxlength="255" required="true" placeholder="Enter course description here...">
        {!! $errors->first('course_description', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

<div class="mb-3 row">
    <label for="course_time" class="col-form-label text-lg-end col-lg-2 col-xl-3">Course Time</label>
    <div class="col-lg-10 col-xl-9">
        <input class="form-control{{ $errors->has('course_time') ? ' is-invalid' : '' }}" name="course_time" type="number" id="course_time" value="{{ old('course_time', optional($courses)->course_time) }}" min="-2147483648" max="2147483647" required="true" placeholder="Enter course time here...">
        {!! $errors->first('course_time', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

<div class="mb-3 row">
    <label for="users_limit" class="col-form-label text-lg-end col-lg-2 col-xl-3">Users Limit</label>
    <div class="col-lg-10 col-xl-9">
        <input class="form-control{{ $errors->has('users_limit') ? ' is-invalid' : '' }}" name="users_limit" type="number" id="users_limit" value="{{ old('users_limit', optional($courses)->users_limit) }}" min="-2147483648" max="2147483647" required="true" placeholder="Enter users limit here...">
        {!! $errors->first('users_limit', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

