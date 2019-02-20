<!-- Instantie Form Input -->
<div class="form-group">
    <label for="instantie">Instantie</label> <br>
    <select class="form-control{{ $errors->has('instantie_id') ? ' is-invalid' : '' }}" name="instantie_id">
		    <option disabled selected value style="display:none;">  </option>
		@foreach($instanties as $instantie)
		    <option value="{{ $instantie->id  }}" {{ session('createsinglescan.instantie_id') == $instantie->id ? 'selected' : ''}} >  {{ $instantie->title }}  </option>
		@endforeach
    </select>

	@if ($errors->has('instantie_id'))
        <span class="invalid-feedback">
	        <strong>{{ $errors->first('instantie_id') }}</strong>
	    </span>
	@endif
</div>

<!-- Add Submit Field -->
<div class="form-group">
    <input type="submit" value=" {{ $submittext }} " class="btn btn-primary form-control" />
</div>