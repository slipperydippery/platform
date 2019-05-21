<div class="row">
    <div class="col-sm-12">
        <div class="progressbar--container progressbar--container__secondary">
            <div class="col-sm-12">
                <div class="progressbar  d-flex justify-content-between">
                    <div class="progress-element">
                        @if ( url()->current() == route('creategroupscan.title') )
                            <span class="imgcontainer" data-toggle="tooltip" data-placement="top" title="Nieuwe groep: Naam">
                                <img src="/img/simplecircle_secondary_full.svg" alt="">
                            </span>
                        @else
                            <a href=" {{ route('creategroupscan.title') }} " class="" data-toggle="tooltip" data-placement="top" title="Nieuwe groep: Naam">
                                <img src="/img/simplecircle_secondary.svg" alt="">
                            </a>
                        @endif
                    </div>
                    <div class="progress-element">
                        @if ( url()->current() == route('creategroupscan.districts') )
                            <span class="imgcontainer" data-toggle="tooltip" data-placement="top" title="Nieuwe groep: Gemeenten">
                                <img src="/img/simplecircle_secondary_full.svg" alt="">
                            </span>
                        @else
                            <a href=" {{ route('creategroupscan.districts') }} " class="" data-toggle="tooltip" data-placement="top" title="Nieuwe groep: Gemeenten">
                                <img src="/img/simplecircle_secondary.svg" alt="">
                            </a>
                        @endif
                    </div>
                    <div class="progress-element">
                        @if ( url()->current() == route('creategroupscan.instantie') )
                            <span class="imgcontainer" data-toggle="tooltip" data-placement="top" title="Nieuwe groep: Instantie">
                                <img src="/img/simplecircle_secondary_full.svg" alt="">
                            </span>
                        @else
                            <a href=" {{ route('creategroupscan.instantie') }} " class="" data-toggle="tooltip" data-placement="top" title="Nieuwe groep: Instantie">
                                <img src="/img/simplecircle_secondary.svg" alt="">
                            </a>
                        @endif
                    </div>
                    <div class="progress-element">
                        @if ( url()->current() == route('creategroupscan.datetime') )
                            <span class="imgcontainer" data-toggle="tooltip" data-placement="top" title="Nieuwe groep: Datum">
                                <img src="/img/simplecircle_secondary_full.svg" alt="">
                            </span>
                        @else
                            <a href=" {{ route('creategroupscan.datetime') }} " class="" data-toggle="tooltip" data-placement="top" title="Nieuwe groep: Datum">
                                <img src="/img/simplecircle_secondary.svg" alt="">
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>