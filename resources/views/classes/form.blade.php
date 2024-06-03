
<div class="mb-3 row">
    <label for="id_course" class="col-form-label text-lg-end col-lg-2 col-xl-3">Id Course</label>
    <div class="col-lg-10 col-xl-9">
        <select class="form-select{{ $errors->has('id_course') ? ' is-invalid' : '' }}" id="id_course" name="id_course" required="true">
        	    <option value="" style="display: none;" {{ old('id_course', optional($classes)->id_course ?: '') == '' ? 'selected' : '' }} disabled selected>Enter id course here...</option>
        	@foreach ($Courses as $key => $Course)
			    <option value="{{ $key }}" {{ old('id_course', optional($classes)->id_course) == $key ? 'selected' : '' }}>
			    	{{ $Course }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('id_course', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

<div class="mb-3 row">
    <label for="id_user" class="col-form-label text-lg-end col-lg-2 col-xl-3">Id User</label>
    <div class="col-lg-10 col-xl-9">
        <select class="form-select{{ $errors->has('id_user') ? ' is-invalid' : '' }}" id="id_user" name="id_user" required="true">
        	    <option value="" style="display: none;" {{ old('id_user', optional($classes)->id_user ?: '') == '' ? 'selected' : '' }} disabled selected>Enter id user here...</option>
        	@foreach ($Users as $key => $User)
			    <option value="{{ $key }}" {{ old('id_user', optional($classes)->id_user) == $key ? 'selected' : '' }}>
			    	{{ $User }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('id_user', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

<div style="display:none;" class="mb-3 row">
    <label for="Timeweek" class="col-form-label text-lg-end col-lg-2 col-xl-3">Timeweek</label>
    <div class="col-lg-10 col-xl-9">
        <input class="form-control{{ $errors->has('Timeweek') ? ' is-invalid' : '' }}" name="Timeweek" type="text" id="Timeweek" value="{{ old('Timeweek', optional($classes)->Timeweek) }}" minlength="1" maxlength="255" required="true" placeholder="Enter timeweek here...">
        {!! $errors->first('Timeweek', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

<div class="mb-3 row">
    <label for="Timeweek" class="col-form-label text-lg-end col-lg-2 col-xl-3">Timeweek</label>
    <div class="col-lg-10 col-xl-9">
        <select id="day_course" multiple>
                <option value="monday">Thứ Hai</option>
                <option value="tuesday">Thứ Ba</option>
                <option value="wednesday">Thứ Tư</option>
                <option value="thursday">Thứ Năm</option>
                <option value="friday">Thứ Sáu</option>
                <option value="saturday">Thứ Bảy</option>
                <option value="sunday">Chủ Nhật</option>
        </select>

    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
            var mySelect = new Choices('#day_course', {
                removeItemButton: true,
                placeholder: true,
                placeholderValue: 'Select options',
                searchPlaceholderValue: 'Search',
            });
        });
</script>
<script>
    $("#clickme").click(function (e) { 
     e.preventDefault();
     console.log($("#day_course").val());
     $("#Timeweek").val($("#day_course").val());
     document.getElementById("submit_button").click();
    }); 
 
</script>
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>




