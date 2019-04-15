<div class="modal fade" id="confirmpromote{{ $thisscan->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmpromoteLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmpromoteLabel">Weet je zeker dat je {{ $thisscan->user->name }} tot eigenaar wilt promoten? </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Je staat op het punt om de {{ $thisscan->user->name }} tot eigenaar van dese groepssessie te promoten. Dat kan handig zijn als je het beheer graag wilt overdragen. Let er wel op dat je deze actie zelf niet ongedaan moet maken (alleen {{ $thisscan->user->name }} kan jou hierna weer tot eigenaar promoten) </p>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Sluit</button>
                    <form action="{{ route('managegroupscan.promoteuser', $thisscan->group) }}" method="post" accept-charset="utf-8" id="promootform{{ $thisscan->id }}">
                        {{ csrf_field() }}
                        <!-- Hidden group_id Type Form Input -->
                        <input type="hidden" id="group_id" name="group_id" value=" {{ $thisscan->group->id }} ">
                        <!-- Hidden scan_id Type Form Input -->
                        <input type="hidden" id="scan_id" name="scan_id" value=" {{ $thisscan->id }} ">
                        <button type="submit" class="btn btn-danger">Promoot tot eigenaar</button>
                            
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>