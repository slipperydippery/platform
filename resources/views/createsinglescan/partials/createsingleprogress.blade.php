<div class="row">
    <div class="col-sm-12">
        <div class="progressbar--container progressbar--container__secondary">
            <div class="col-sm-12">
                <div class="progressbar  d-flex justify-content-between">
                    <div class="progress-element">
                        @if ( url()->current() == route('createsinglescan.title') )
                            <span class="imgcontainer" data-toggle="tooltip" data-placement="top" title="Nieuwe sessie: Naam">
                                <img src="/img/simplecircle_secondary_full.svg" alt="">
                            </span>
                        @else
                            <a href="#" class="" data-toggle="tooltip" data-placement="top" title="Nieuwe sessie: Naam">
                                <img src="/img/simplecircle_secondary.svg" alt="">
                            </a>
                        @endif
                    </div>
                    <div class="progress-element">
                        @if ( url()->current() == route('createsinglescan.districts') )
                            <span class="imgcontainer" data-toggle="tooltip" data-placement="top" title="Nieuwe sessie: Gemeenten">
                                <img src="/img/simplecircle_secondary_full.svg" alt="">
                            </span>
                        @else
                            <a href="#" class="" data-toggle="tooltip" data-placement="top" title="Nieuwe sessie: Gemeenten">
                                <img src="/img/simplecircle_secondary.svg" alt="">
                            </a>
                        @endif
                    </div>
                    <div class="progress-element">
                        @if ( url()->current() == route('createsinglescan.instantie') )
                            <span class="imgcontainer" data-toggle="tooltip" data-placement="top" title="Nieuwe sessie: Instantie">
                                <img src="/img/simplecircle_secondary_full.svg" alt="">
                            </span>
                        @else
                            <a href="#" class="" data-toggle="tooltip" data-placement="top" title="Nieuwe sessie: Instantie">
                                <img src="/img/simplecircle_secondary.svg" alt="">
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>