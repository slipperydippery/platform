<div class="modal fade" id="confirmdeleteaccount" tabindex="-1" role="dialog" aria-labelledby="confirmdeleteaccountLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmdeleteaccountLabel">Weet je zeker dat je je account wilt verwijderen? </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Je staat op het punt om jouw account te verwijderen. Hiermee worden ook al je individuele scans en groepscans verwijderd. Ben je eigenaar van een groepssessie? Dan wordt de sessie inclusief alle scans van deelnemers ook verwijderd. </p>

                @foreach (Auth::user()->scans->where('group_id') as $scan)
                    @if ($scan->group->scan->id == $scan->id)
                        <div class="alert alert-danger" role="alert">
                            Je bent eigenaar van groepssessie <strong>{{ $scan->group->title }}</strong>. Als je niet eerst een deelnemer tot eigenaar van dese sessie promoot zullen alle gegevens van deze groepssessie worden verwijderd! <br>
                            Alle deelnemers krijgen hiervan per e-mail een bericht. 

                        </div>
                    @endif
                @endforeach

                
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Sluit</button>
                    <form action="{{ route('user.destroy' , Auth::user())}}" method="POST">
                        <input name="_method" type="hidden" value="DELETE">
                        {{ csrf_field() }}

                        <button type="submit" class="btn btn-danger">Verwijder mijn account</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>