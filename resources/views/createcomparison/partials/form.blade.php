<select-compare-scans
	:scan=" {{ json_encode($scan) }} "
	:districts=" {{ json_encode($districts) }} "
	:instanties=" {{ json_encode($instanties) }} "
	:session=" {{ json_encode($session) }} "
>
</select-compare-scans>

<!-- Add Submit Field -->
<div class="form-group">
    <input type="submit" value=" {{ $submittext }} " class="btn btn-primary form-control" />
</div>