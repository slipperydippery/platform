<label for="filter">Gemeente</label>

<select-districts
		:session = " {{ json_encode($session) }} "
		:group = 2
		:scan_id = " {{ $scan->id }} "
>
</select-districts>

