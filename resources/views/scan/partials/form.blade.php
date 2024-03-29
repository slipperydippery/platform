<!-- Hidden Form Input -->
<input type="hidden" id="scanmodel_id" name="scanmodel_id" value="1">


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
    <select class="form-control{{ $errors->has('instantie_id') ? ' is-invalid' : '' }}" name="instantie_id">
		    <option disabled selected value style="display:none;">  </option>
		@foreach($instanties as $instantie)
		    <option value="{{ old('instantie', request('instantie') ?? $instantie->id ?? null) }}">  {{ $instantie->title }}  </option>
		@endforeach
    </select>

	@if ($errors->has('instantie_id'))
        <span class="invalid-feedback">
	        <strong>{{ $errors->first('instantie_id') }}</strong>
	    </span>
	@endif
</div>


<label for="filter">Gemeente</label>
<district-decoration inline-template>
<div class="row">
		<div class="col-sm-4 checkboxgroup--container">
			<!--  Form Input -->
			<div class="form-group vueelement">
			    <input id="filter" type="text" class="form-control" v-model="filter" placeholder="Zoek je gemeente" focus>
			</div>
			<!-- District Form Input -->
			<div class="form-control{{ $errors->has('districts') ? ' is-invalid' : '' }} checkboxgroup ">
			@foreach($districts as $district)
				<div class="" :class=" { hidden: ! String('{{ $district->name }}').toLowerCase().includes(filter.toLowerCase()) || isSelected( {{ $district }} ) } ">
					<input type="checkbox" class="custom-control-input checkboxinput {{ $errors->has('district') ? ' is-invalid' : '' }}" name="districts[]" id="district{{ $district->id }}" value="{{ $district->id }}">
					<label class="checkboxlabel btn btn-sm btn-secondary" for="district{{ $district->id }}" @click=" toggleSelected( {{ $district }} ) ">
						{{ $district->name }}
					</label>

					@if ($errors->has('district'))
				        <div class="invalid-feedback">
							{{ $errors->first('district') }}
					    </div>
					@endif
				</div>
			@endforeach
			</div>
			@if ($errors->has('districts'))
		        <span class="invalid-feedback">
			        <strong>{{ $errors->first('districts') }}</strong>
			    </span>
			@endif
		</div>
		<div class="col-sm-8 vueelement">
			<div class="form-group">
			    <span v-if="! selected.length">Je hebt nog geen gemeente geselecteerd</span>
			    <span v-else>Je geselecteerde gemeentes:</span>
			</div>
			<div class="checkboxgroup">
				<div class="mb-2" v-for="item in selected">
					<div class="btn btn-sm btn-primary" @click=" removeChecked( item.id ) ">
						@{{ item.name }}
					</div>
					
				</div>
			    <em v-if="selected.length == 1">Je kan meer dan 1 gemeente selecteren</em>
			</div>
		</div>
</div>
</district-decoration>

<!-- Add Submit Field -->
<div class="form-group">
    <input type="submit" value=" {{ $submittext }} " class="btn btn-primary form-control" />
</div>

