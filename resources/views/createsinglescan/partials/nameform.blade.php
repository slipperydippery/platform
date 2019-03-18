<!-- Naam Form Input -->
<div class="form-group">
    <label for="name">Naam</label>
    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', request('name') ?? session('createsinglescan.name') ?? null) }}" autofocus>

	@if ($errors->has('name'))
        <span class="invalid-feedback">
	        <strong>{{ $errors->first('name') }}</strong>
	    </span>
	@endif
</div>

<!-- Add Submit Field -->
<div class="form-group">
    <input type="submit" value=" {{ $submittext }} " class="btn btn-primary form-control" />
</div>