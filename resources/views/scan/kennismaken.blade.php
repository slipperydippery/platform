@extends('layouts.scan', ['title' => 'Nieuwe Scan'])

@section('content')
		<div class="row">
	        <div class="col-md-12">
	            <div class="page--title">
	                <h1 class="pagetitle">Kennismaken</h1>
	                <p>Waarschijnlijk kent niet iedereen elkaar. We starten met een voorstelrondje waarbij iedereen het volgende over zichzelf vertelt:</p>
	                <ul>
	                    <li>Wat is je naam?</li>
	                    <li>Namens welke organisatie zit je hier?</li>
	                    <li>Wat doet deze organisatie?</li>
	                    <li>Wat is je rol/functie binnen deze organisatie?</li>
	                    <li>Wat hoop je dat er uit deze sessie komt (wens of droom)?</li>
	                </ul>
	            </div>
	        </div>
		</div>
		<div class="row">
			<div class="col-md-12">
				@if ($scan->group_id)
					<div class="row">
					    <div class="col-sm-2">
					        <div class="card card__2 card--partner owner {{ $scan->group->user->isOnline() ? '' : 'inactive' }} ">
					            <div class="card-icons card-header p-0 text-right">
					                <i class="material-icons clickable"  data-toggle="tooltip" data-placement="top" title="Beheerder"> star </i>
					                @if($scan->group->user->isOnline())
					                    <i class="material-icons clickable" data-toggle="tooltip" data-placement="top" title="online"> wifi </i>
					                @else
					                    <i class="material-icons clickable" data-toggle="tooltip" data-placement="top" title="offline"> wifi_off </i>
					                @endif
					            </div>
					            <img src="/img/user.svg" alt="">
					            <div class="card-body">
					                <h5>{{ $scan->group->user->name }}</h5>
					            </div>

								<div class="card-footer py-1">
									<strong class="align-bottom">Beheerder</strong>
								</div>
					        </div>
					    </div>

					    @foreach ($scan->scanmodel->instanties as $instantie)
					    @foreach($scan->group->scans as $thisscan)
					        @if($thisscan->instantie->id == $instantie->id)
					        @if($thisscan->user->id != $scan->group->user->id)
					             <div class="col-sm-2 d-flex align-items-stretch mb-5">
					                 <div class="card w-100 card__2 card--partner instantie-{{ $thisscan->instantie->id }} {{ $thisscan->user->isOnline() ? '' : 'inactive' }} ">
					                     <div class="card-icons card-header py-0 px-2 text-right">
					                         @if($thisscan->user->isOnline())
					                             <i class="material-icons" data-toggle="tooltip" data-placement="top" title="online"> wifi </i>
					                         @else
					                             <i class="material-icons"> wifi_off </i>
					                         @endif
					                         @if ($scan->group->user->id == $scan->id)
					                             <span class="card-closeicon">
					                                 <i class="material-icons clickable" data-toggle="modal" data-target="#deleteUserModal-{{ $thisscan->id }}"> close </i>
					                             </span>
					                         @endif
					                     </div>
					                     <img src="/img/user.svg" alt="">
					                     <div class="card-body align-bottom">
						                         <h5>{{ $thisscan->user->name }}</h5>
					                     </div>
					                         <div class="card-footer py-1">
						                        {{ $thisscan->instantie->title }}
				                         </div>
					                 </div>
					             </div>

					             @if ($scan->group->user->id == $scan->id)
					                 <!-- Modal -->
					                 <div class="modal fade" id="deleteUserModal-{{ $thisscan->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
					                     <div class="modal-dialog" role="document">
					                         <div class="modal-content">
					                             <div class="modal-header">
					                                 <h5 class="modal-title" id="deleteUserModalLabel">Verwijder {{ $thisscan->user->name }}</h5>
					                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					                                 <span aria-hidden="true">&times;</span>
					                                 </button>
					                             </div>
					                             <div class="modal-body">
					                                 <p>Weet je zeker dat je <strong>{{ $thisscan->user->name }}</strong> van <strong>{{ $thisscan->instantie->name }}</strong> uit de sessie wilt verwijderen?</p>
					                             </div>
					                             <div class="modal-footer">
					                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuleer</button>
					                                     <form action="{{ route('scan.destroy', $thisscan) }}" method="post" accept-charset="utf-8">
					                                         <input type="hidden" name="_method" value="DELETE">
					                                         {{ csrf_field() }}
					                                        <!-- Add Submit Field -->
					                                        <input type="submit" value="Verwijder deelnemer" class="btn btn-primary" />
					                                     </form>
					                             </div>
					                         </div>
					                     </div>
					                 </div>
					             @endif
					        @endif
					        @endif
					    @endforeach
					    @endforeach
					    
					</div>
				@else	
					<div class="row">
					    <div class="col-sm-2">
					        <div class="card card__2 card--partner owner {{ $scan->user->isOnline() ? '' : 'inactive' }} ">
					            <div class="card-icons">
					                @if($scan->user->isOnline())
					                    <i class="material-icons clickable" data-toggle="tooltip" data-placement="top" title="online"> wifi </i>
					                @else
					                    <i class="material-icons clickable" data-toggle="tooltip" data-placement="top" title="offline"> wifi_off </i>
					                @endif
					            </div>
					            <img src="/img/user.svg" alt="">
					            <div class="card-footer">
					                {{ $scan->user->name }} <br>
			                         {{ $scan->instantie->title }}
					            </div>
					        </div>
					    </div>
					</div>
				@endif
			</div>
		</div>
@stop

@section('prevnext')
    <div class="row row__prevnext justify-content-between">
        <div class="col-md-4">
            <a href=" {{ route('scan.introductiefilm', $scan) }} " class="btn btn-secondary btn-block btn__prevnext"><i class="material-icons"> navigate_before </i> vorige</a>
        </div>
        <div class="col-md-4">
            <a href=" {{ route('scan.regioincijfers', $scan) }} " class="btn btn-secondary btn-block btn__prevnext">volgende <i class="material-icons"> navigate_next </i></a>
        </div>
    </div>
@stop

@section('additional-scripts')
@endsection