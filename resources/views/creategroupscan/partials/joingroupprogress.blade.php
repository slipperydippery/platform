<div class="row">
    <div class="col-sm-12">
        <div class="progressbar--container progressbar--container__secondary">
            <div class="col-sm-12">
                <div class="progressbar  d-flex justify-content-between">
                    <div class="progress-element">
                        @if ( true )
                            <span class="imgcontainer" data-toggle="tooltip" data-placement="top" title="Sluit aan bij groep: Instantie">
                                <img src="/img/simplecircle_secondary_full.svg" alt="">
                            </span>
                        @else
                            <a href="#" class="" data-toggle="tooltip" data-placement="top" title="Sluit aan bij groep: Instantie">
                                <img src="/img/simplecircle_secondary.svg" alt="">
                            </a>
                        @endif
                    </div>
                    <div class="progress-element">
                        @if ( url()->current() == route('creategroupscan.datetime') )
                            <span class="imgcontainer" data-toggle="tooltip" data-placement="top" title="Klaar">
                                <img src="/img/simplecircle_secondary_full.svg" alt="">
                            </span>
                        @else
                            <a href="#" class="" data-toggle="tooltip" data-placement="top" title="Klaar">
                                <img src="/img/simplecircle_secondary.svg" alt="">
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>