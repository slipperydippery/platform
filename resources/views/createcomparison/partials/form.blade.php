<select-compare-scans
	:session=" {{ json_encode($session) }} "
>
</select-compare-scans>

<!-- Add Submit Field -->
<div class="form-group">
    <input type="submit" value=" {{ $submittext }} " class="btn btn-primary form-control" />
</div>