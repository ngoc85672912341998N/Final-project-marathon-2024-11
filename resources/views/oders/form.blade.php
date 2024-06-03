
<div class="mb-3 row">
    <label for="id_course" class="col-form-label text-lg-end col-lg-2 col-xl-3">Id Course</label>
    <div class="col-lg-10 col-xl-9">
        <select class="form-select{{ $errors->has('id_course') ? ' is-invalid' : '' }}" id="id_course" name="id_course" required="true">
        	    <option value="" style="display: none;" {{ old('id_course', optional($oders)->id_course ?: '') == '' ? 'selected' : '' }} disabled selected>Enter id course here...</option>
        	@foreach ($Courses as $key => $Course)
			    <option value="{{ $key }}" {{ old('id_course', optional($oders)->id_course) == $key ? 'selected' : '' }}>
			    	{{ $Course }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('id_course', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

<div class="mb-3 row">
    <label for="status" class="col-form-label text-lg-end col-lg-2 col-xl-3">Status</label>
    <div class="col-lg-10 col-xl-9">
        <div class="form-check checkbox">
            <input id="status_1" class="form-check-input" name="status" type="checkbox" value="1" {{ old('status', optional($oders)->status) == '1' ? 'checked' : '' }}>
            <label class="form-check-label" for="status_1">
                Yes
            </label>
        </div>


        {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

<div class="mb-3 row">
    <label for="price" class="col-form-label text-lg-end col-lg-2 col-xl-3">Price</label>
    <div class="col-lg-10 col-xl-9">
        <input class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" type="number" id="price" value="{{ old('price', optional($oders)->price) }}" min="-2147483648" max="2147483647" required="true" placeholder="Enter price here...">
        {!! $errors->first('price', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

<div class="mb-3 row">
    <label for="payment_method" class="col-form-label text-lg-end col-lg-2 col-xl-3">Payment Method</label>
    <div class="col-lg-10 col-xl-9">
        <input class="form-control{{ $errors->has('payment_method') ? ' is-invalid' : '' }}" name="payment_method" type="text" id="payment_method" value="{{ old('payment_method', optional($oders)->payment_method) }}" minlength="1" maxlength="255" required="true" placeholder="Enter payment method here...">
        {!! $errors->first('payment_method', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

<div class="mb-3 row">
    <label for="total" class="col-form-label text-lg-end col-lg-2 col-xl-3">Total</label>
    <div class="col-lg-10 col-xl-9">
        <input class="form-control{{ $errors->has('total') ? ' is-invalid' : '' }}" name="total" type="number" id="total" value="{{ old('total', optional($oders)->total) }}" min="-2147483648" max="2147483647" required="true" placeholder="Enter total here...">
        {!! $errors->first('total', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

<div class="mb-3 row">
    <label for="code" class="col-form-label text-lg-end col-lg-2 col-xl-3">Code</label>
    <div class="col-lg-10 col-xl-9">
        <input class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" name="code" type="text" id="code" value="{{ old('code', optional($oders)->code) }}" minlength="1" maxlength="255" required="true" placeholder="Enter code here...">
        {!! $errors->first('code', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

<div class="mb-3 row">
    <label for="note" class="col-form-label text-lg-end col-lg-2 col-xl-3">Note</label>
    <div class="col-lg-10 col-xl-9">
        <input class="form-control{{ $errors->has('note') ? ' is-invalid' : '' }}" name="note" type="text" id="note" value="{{ old('note', optional($oders)->note) }}" minlength="1" maxlength="255" required="true">
        {!! $errors->first('note', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

