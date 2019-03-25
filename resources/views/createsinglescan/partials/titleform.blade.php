<!-- Naam Form Input -->
<div class="form-group">
    <label for="title">Naam</label>
    <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title', request('title') ?? session('createsinglescan.title') ?? null) }}" autofocus>

	@if ($errors->has('title'))
        <span class="invalid-feedback">
	        <strong>{{ $errors->first('title') }}</strong>
	    </span>
	@endif
</div>

<!-- Add Submit Field -->
<div class="form-group">
    <input type="submit" value=" {{ $submittext }} " class="btn btn-primary form-control" />
</div>