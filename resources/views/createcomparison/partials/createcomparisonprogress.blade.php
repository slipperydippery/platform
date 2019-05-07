<div class="row">
    <div class="col-sm-12">
        <div class="progressbar--container progressbar--container__secondary">
            <div class="col-sm-12">
                <div class="progressbar  d-flex justify-content-between">
                    <div class="progress-element">
                        @if ( url()->current() == route('createcomparison.districts', $scan) )
                            <span class="imgcontainer" data-toggle="tooltip" data-placement="top" title="Nieuwe vergelijking: Gemeenten">
                                <img src="/img/simplecircle_secondary_full.svg" alt="">
                            </span>
                        @else
                            <a href=" {{ route('createcomparison.districts', $scan) }} " class="" data-toggle="tooltip" data-placement="top" title="Nieuwe vergelijking: Gemeenten">
                                <img src="/img/simplecircle_secondary.svg" alt="">
                            </a>
                        @endif
                    </div>
                    <div class="progress-element">
                        @if ( url()->current() == route('createcomparison.instantie', $scan) )
                            <span class="imgcontainer" data-toggle="tooltip" data-placement="top" title="Nieuwe vergelijking: Instanties">
                                <img src="/img/simplecircle_secondary_full.svg" alt="">
                            </span>
                        @else
                            <a href=" {{ route('createcomparison.instantie', $scan) }} " class="" data-toggle="tooltip" data-placement="top" title="Nieuwe vergelijking: Instanties">
                                <img src="/img/simplecircle_secondary.svg" alt="">
                            </a>
                        @endif
                    </div>
                    <div class="progress-element">
                        @if ( url()->current() == route('createcomparison.scans', $scan) )
                            <span class="imgcontainer" data-toggle="tooltip" data-placement="top" title="Nieuwe vergelijking: Selecteer sessies">
                                <img src="/img/simplecircle_secondary_full.svg" alt="">
                            </span>
                        @else
                            <a href=" {{ route('createcomparison.scans', $scan) }} " class="" data-toggle="tooltip" data-placement="top" title="Nieuwe vergelijking: Selecteer sessies">
                                <img src="/img/simplecircle_secondary.svg" alt="">
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>