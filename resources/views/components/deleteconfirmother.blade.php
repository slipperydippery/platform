<div class="modal fade" id="confirmdeleteother{{ $thisscan->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmdeleteotherLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmdeleteotherLabel">Weet je zeker dat je deze sessie wilt verwijderen? </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Je staat op het punt om de sessie {{ $thisscan->title }} te verwijderen. Weet je zeker dat je dit wilt doen? </p>

                
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Sluit</button>
                    <form action="{{ route('scan.destroy' , $thisscan)}}" method="POST">
                        <input name="_method" type="hidden" value="DELETE">
                        {{ csrf_field() }}

                        <button type="submit" class="btn btn-danger">Verwijder deze scan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>