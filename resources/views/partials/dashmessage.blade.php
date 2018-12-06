<div class="alert alert-{{ $dashmessage->type }}" role="alert">
	<div class="container">
		{{ $dashmessage->message }}
		<closebutton-input
			model="dashmessage"
			:model_id=" {{ $dashmessage->id }} "
		>
		</closebutton-input>
	</div>
</div>