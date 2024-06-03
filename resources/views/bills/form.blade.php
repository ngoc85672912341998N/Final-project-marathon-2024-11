
<div class="mb-3 row">
    <label for="id_oders" class="col-form-label text-lg-end col-lg-2 col-xl-3">Id Oders</label>
    <div class="col-lg-10 col-xl-9">
        <select class="form-select{{ $errors->has('id_oders') ? ' is-invalid' : '' }}" id="id_oders" name="id_oders" required="true">
        	    <option value="" style="display: none;" {{ old('id_oders', optional($bills)->id_oders ?: '') == '' ? 'selected' : '' }} disabled selected>Enter id oders here...</option>
        	@foreach ($Oders as $key => $Oder)
			    <option value="{{ $key }}" {{ old('id_oders', optional($bills)->id_oders) == $key ? 'selected' : '' }}>
			    	{{ $Oder }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('id_oders', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

<div class="mb-3 row">
    <label for="code" class="col-form-label text-lg-end col-lg-2 col-xl-3">Code</label>
    <div class="col-lg-10 col-xl-9">
        <input class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" name="code" type="text" id="code" value="{{ old('code', optional($bills)->code) }}" minlength="1" maxlength="255" required="true" placeholder="Enter code here...">
        {!! $errors->first('code', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

<div class="mb-3 row">
    <label for="status" class="col-form-label text-lg-end col-lg-2 col-xl-3">Status</label>
    <div class="col-lg-10 col-xl-9">
        <input class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" name="status" type="number" id="status" value="{{ old('status', optional($bills)->status) }}" min="-2147483648" max="2147483647" required="true" placeholder="Enter status here...">
        {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

<div class="mb-3 row">
    <label for="price" class="col-form-label text-lg-end col-lg-2 col-xl-3">Price</label>
    <div class="col-lg-10 col-xl-9">
        <input class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" type="number" id="price" value="{{ old('price', optional($bills)->price) }}" min="-2147483648" max="2147483647" required="true" placeholder="Enter price here...">
        {!! $errors->first('price', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

<div class="mb-3 row">
    <label for="payment_method" class="col-form-label text-lg-end col-lg-2 col-xl-3">Payment Method</label>
    <div class="col-lg-10 col-xl-9">
        <input class="form-control{{ $errors->has('payment_method') ? ' is-invalid' : '' }}" name="payment_method" type="text" id="payment_method" value="{{ old('payment_method', optional($bills)->payment_method) }}" minlength="1" maxlength="255" required="true" placeholder="Enter payment method here...">
        {!! $errors->first('payment_method', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

<div class="mb-3 row">
    <label for="total" class="col-form-label text-lg-end col-lg-2 col-xl-3">Total</label>
    <div class="col-lg-10 col-xl-9">
        <input class="form-control{{ $errors->has('total') ? ' is-invalid' : '' }}" name="total" type="number" id="total" value="{{ old('total', optional($bills)->total) }}" min="-2147483648" max="2147483647" required="true" placeholder="Enter total here...">
        {!! $errors->first('total', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

