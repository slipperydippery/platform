<div class="modal fade" id="editgroup{{ $thisgroup->id }}" tabindex="-1" role="dialog" aria-labelledby="editgroup{{ $thisgroup->id }}Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editgroup{{ $thisgroup->id }}Label">Bewerk group</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ $thisgroup->title }}
                <edit-group
                    :group = " {{ json_encode($thisgroup) }} "
                ></edit-group>
            </div>
        </div>
    </div>
</div>