<!-- Code Form Input -->
<div class="form-group">
    <label for="code">Code</label>
    <input id="code" type="text" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" name="code" value="{{ old('code', request('code') ?? $group->code ?? null) }}" style="text-transform:uppercase" autofocus>

	@if ($errors->has('code'))
        <span class="invalid-feedback">
	        <strong>{{ $errors->first('code') }}</strong>
	    </span>
	@endif
</div>

<!-- Add Submit Field -->
<div class="form-group">
    <input type="submit" value=" {{ $submittext }} " class="btn btn-primary form-control" />
</div>