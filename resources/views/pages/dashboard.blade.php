@extends('layouts.app', ['title' => 'Dashboard'])

@section('content')

    <div class="hero">
        @if(Auth::check() && auth()->user()->scans->count())
            @include('pages.partials.heroscan')
        @else
            @include('pages.partials.herointro')
        @endif
    </div>

    <div class="container container--page">
        <div class="row">
            <div class="col-md-8">
                @if(Auth::check() && auth()->user()->scans->count())
                    @include('pages.partials.mainscansoverview')
                @else
                    @include('pages.partials.mainempty')
                @endif
            </div>
            <div class="col-md-4 main--sidebar ">
                <interesting-sidebar
                    :scanmodel = " {{ json_encode( $scanmodel ) }} "
                >
                </interesting-sidebar>
            </div>
        </div>
    </div>


@include('partials.videos');

@endsection

@section('additional-scripts')
    <script>
        $('.popover-dismiss').popover({
          trigger: 'focus'
        })
        $(document).ready( () => {
            $('#singlescan').popover('show')
        } )
        $(document).click( () => {
            $('#singlescan').popover('hide');
            $('#singlescan').popover('disable');
        } )
    </script>
@endsection