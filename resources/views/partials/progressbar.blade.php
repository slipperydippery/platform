<div class="row mt-3">
    <div class="col-sm-12">
        <div class="progressbar--container shadow-sm">
            <div class="col-sm-12">
                <div class="progressbar d-flex justify-content-between">
                    <div class="progress-element">
                        @if ( url()->current() == route('scan.introductiefilm', $scan) )
                            <span class="imgcontainer" data-toggle="tooltip" data-placement="top" title="Introductiefilm">
                                <img src="/img/simplecircle_secondary_full.svg" alt="">
                            </span>
                        @else
                            <a href=" {{ route('scan.introductiefilm', $scan) }} " class="" data-toggle="tooltip" data-placement="top" title="Introductiefilm">
                                <img src="/img/simplecircle_secondary.svg" alt="">
                            </a>
                        @endif
                    </div>
                    @if ($scan->group)
                        <div class="progress-element">
                            @if ( url()->current() == route('scan.kennismaken', $scan) )
                                <span class="imgcontainer" data-toggle="tooltip" data-placement="top" title="Kennismaken">
                                    <img src="/img/simplecircle_secondary_full.svg" alt="">
                                </span>
                            @else
                                <a href=" {{ route('scan.kennismaken', $scan) }} " class="" data-toggle="tooltip" data-placement="top" title="Kennismaken">
                                    <img src="/img/simplecircle_secondary.svg" alt="">
                                </a>
                            @endif
                        </div>
                    @endif
                    <div class="progress-element">
                        @if ( url()->current() == route('scan.regioincijfers', $scan) )
                            <span class="imgcontainer" data-toggle="tooltip" data-placement="top" title="Kennismaken">
                                <img src="/img/simplecircle_secondary_full.svg" alt="">
                            </span>
                        @else
                            <a href=" {{ route('scan.regioincijfers', $scan) }} " class="" data-toggle="tooltip" data-placement="top" title="Regio in cijfers">
                                <img src="/img/simplecircle_secondary.svg" alt="">
                            </a>
                        @endif
                    </div>
                    <div class="progress-element">
                        @if ( url()->current() == route('scan.algemeenbeeld', $scan) )
                            <span class="imgcontainer" data-toggle="tooltip" data-placement="top" title="Beoordeel de huidige gezamenlijke aanpak">
                                <img src="/img/simplecircle_secondary_full.svg" alt="">
                            </span>
                        @else
                            <a href=" {{ route('scan.algemeenbeeld', $scan) }} " class="" data-toggle="tooltip" data-placement="top" title="Beoordeel de huidige gezamenlijke aanpak">
                                <img src="/img/simplecircle_secondary.svg" alt="">
                            </a>
                        @endif
                    </div>
                    @if ($scan->group)
                        <div class="progress-element">
                            @if ( url()->current() == route('scan.algemeenbeeldresultaten', $scan) )
                                <span class="imgcontainer" data-toggle="tooltip" data-placement="top" title="Resultaten beoordeling huidige aanpak">
                                    <img src="/img/simplecircle_secondary_full.svg" alt="">
                                </span>
                            @else
                                <a href=" {{ route('scan.algemeenbeeldresultaten', $scan) }} " class="" data-toggle="tooltip" data-placement="top" title="Resultaten beoordeling huidige aanpak">
                                    <img src="/img/simplecircle_secondary.svg" alt="">
                                </a>
                            @endif
                        </div>
                    @endif
                    @foreach ($scan->scanmodel->themes as $theme)
                        <div class="progress-element themeintro">
                            @if ( url()->current() == route('scanquestions.intro', [$scan, $theme]) )
                                <span class="imgcontainer" data-toggle="tooltip" data-placement="top" title="Introductie thema {{ $theme->id }}">
                                    <img src="/img/simplecircle_secondary_full.svg" alt="">
                                </span>
                            @else
                                <a href=" {{ route('scanquestions.intro', [$scan, $theme]) }} " class="" data-toggle="tooltip" data-placement="top" title="Introductie thema {{ $theme->id }}">
                                    <img src="/img/simplecircle_secondary.svg" alt="">
                                </a>
                            @endif
                            <img src="/img/layer2intro_secondary.svg" alt="" class="layer2intro">
                        </div>
                        @foreach ($theme->questions as $question)
                            <div class="progress-element progress-element__layer2">
                                @if ( url()->current() == route('scanquestions.show', [$scan, $theme, $question]) )
                                    <span class="imgcontainer" data-toggle="tooltip" data-placement="top" title="Vraag {{ $question->id }}">
                                        <img src="/img/simplecircle_secondary_full.svg" alt="">
                                    </span>
                                @else
                                    <a href=" {{ route('scanquestions.show', [$scan, $theme, $question]) }} " class="" data-toggle="tooltip" data-placement="top" title="Vraag {{ $question->id }}">
                                        <img src="/img/simplecircle_secondary.svg" alt="">
                                    </a>
                                @endif
                            </div>
                        @endforeach
                        @if ($scan->group)
                            <div class="progress-element progress-element__layer2">
                                @if ( url()->current() == route('scanquestions.results', [$scan, $theme]) )
                                    <span class="imgcontainer" data-toggle="tooltip" data-placement="top" title="Thema {{ $theme->id }} resultaten">
                                        <img src="/img/simplecircle_secondary_full.svg" alt="">
                                    </span>
                                @else
                                    <a href=" {{ route('scanquestions.results', [$scan, $theme]) }} " data-toggle="tooltip" data-placement="top" title="Thema {{ $theme->id }} resultaten">
                                        <img src="/img/simplecircle_secondary.svg" alt="">
                                    </a>
                                @endif
                            </div>
                        @endif
                        <div class="progress-element progress-element__layer2 progress-element__last">
                            @if ( url()->current() == route('scanquestions.measures', [$scan, $theme]) )
                                <span class="imgcontainer" data-toggle="tooltip" data-placement="top" title="Thema {{ $theme->id }} acties">
                                    <img src="/img/simplecircle_secondary_full.svg" alt="">
                                </span>
                            @else
                                <a href=" {{ route('scanquestions.measures', [$scan, $theme]) }} " data-toggle="tooltip" data-placement="top" title="Thema {{ $theme->id }} acties">
                                    <img src="/img/simplecircle_secondary.svg" alt="">
                                </a>
                            @endif
                        </div>
                    @endforeach
                    @foreach ($scan->scanmodel->themes as $theme)
                        <div class="progress-element">
                            @if ( url()->current() == route('scanquestions.bigmeasures', [$scan, $theme]) )
                                <span class="imgcontainer" data-toggle="tooltip" data-placement="top" title="Thema {{ $theme->id }} acties">
                                    <img src="/img/simplecircle_secondary_full.svg" alt="">
                                </span>
                            @else
                                <a href=" {{ route('scanquestions.bigmeasures', [$scan, $theme]) }} " data-toggle="tooltip" data-placement="top" title="Acties uitwerken thema {{ $theme->id }}">
                                    <img src="/img/simplecircle_secondary.svg" alt="">
                                </a>
                            @endif
                        </div>
                    @endforeach
                    <div class="progress-element">
                        @if ( url()->current() == route('scanquestions.followup', $scan) )
                            <span class="imgcontainer" data-toggle="tooltip" data-placement="top" title="Vervolgafspraak plannen">
                                <img src="/img/simplecircle_secondary_full.svg" alt="">
                            </span>
                        @else
                            <a href=" {{ route('scanquestions.followup', $scan) }} " data-toggle="tooltip" data-placement="top" title="Vervolgafspraak plannen">
                                <img src="/img/simplecircle_secondary.svg" alt="">
                            </a>
                        @endif
                    </div>
                    <div class="progress-element">
                        <a href=" {{ route('scanquestions.complete', $scan) }} " data-toggle="tooltip" data-placement="top" title="Afgerond">
                            <img src="/img/simplecircle_secondary.svg" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>