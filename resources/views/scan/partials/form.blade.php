<!-- Naam Form Input -->
<div class="form-group">
    <label for="title">Naam</label>
    <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title', request('title') ?? $scan->title ?? null) }}" autofocus>

	@if ($errors->has('title'))
        <span class="invalid-feedback">
	        <strong>{{ $errors->first('title') }}</strong>
	    </span>
	@endif
</div>

<!-- Instantie Form Input -->
<div class="form-group">
    <label for="instantie">Instantie</label> <br>
    <select class="form-control" name="instantie">
		    <option disabled selected value style="display:none;"> -- selecteer een optie -- </option>
		@foreach($instanties as $instantie)
		    <option value="{{ old('instantie', request('instantie') ?? $instantie->id ?? null) }}">  {{ $instantie->title }}  </option>
		@endforeach
    </select>

	@if ($errors->has('instantie'))
        <span class="invalid-feedback">
	        <strong>{{ $errors->first('instantie') }}</strong>
	    </span>
	@endif
</div>

<label for="filter">Gemeente</label>
<div class="row">
	<div class="col-sm-4">
		<!--  Form Input -->
		<div class="form-group">
		    <input id="filter" type="text" class="form-control" v-model="filter" placeholder="Filter hier je gemeente" focus>
		</div>
		<!-- District Form Input -->
		<div class="form-group checkboxgroup">
		@foreach($districts as $district)
			<div class="" :class=" { hidden: ! String('{{ $district->title }}').toLowerCase().includes(filter.toLowerCase()) || isSelected( {{ $district }} ) } ">
				<input type="checkbox" class="custom-control-input checkboxinput {{ $errors->has('district') ? ' is-invalid' : '' }}" name="district[]" id="district{{ $district->id }}" value="{{ $district->id }}">
				<label class="checkboxlabel btn btn-sm btn-secondary" for="district{{ $district->id }}" @click=" toggleSelected( {{ $district }} ) ">
					{{ $district->title }}
				</label>

				@if ($errors->has('district'))
			        <div class="invalid-feedback">
						{{ $errors->first('district') }}
				    </div>
				@endif
			</div>
		@endforeach
		</div>
	</div>
	<div class="col-sm-8">
		<div class="mb-2" v-for="item in selected">
			<div class="btn btn-sm btn-secondary">
				@{{ item.title }}
			</div>
		</div>
	</div>
</div>


<!-- Add Submit Field -->
<div class="form-group">
    <input type="submit" value=" {{ $submittext }} " class="btn btn-primary form-control" />
</div>

