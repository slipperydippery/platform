<!-- Naam Form Input -->
<div class="form-group">
    <label for="name">Naam</label>

    <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title', request('title') ?? session('creategroupscan.title') ?? null) }}" autofocus>

	@if ($errors->has('title'))
        <span class="invalid-feedback">
	        <strong>{{ $errors->first('title') }}</strong>
	    </span>
	@endif
</div>

<!-- Add Submit Field -->
<div class="form-group text-right">
    <input type="submit" value=" {{ $submittext }} " class="btn btn-secondary btn-lg" />
</div>