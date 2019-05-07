@php
$mainscan = $scan;
if ($scan->group){
	$mainscan = $scan->group->scan;
}
@endphp

@component('mail::message')
# Een overzicht van de actiepunten

Hieronder is een overzicht van de actiepunten van de sessie {{ $mainscan->title }}

@foreach ($scan->scanmodel->themes as $theme)

@component('mail::panel')
# {{ $theme->title }}

@foreach ($theme->questions as $question)
@if ($mainscan->measures->where('question_id', $question->id)->first()->active)
---

## {!! $question->title !!}

{{ $mainscan->measures->where('question_id', $question->id)->first()->measure }}

**trekker:**
@if ($mainscan->measures->where('question_id', $question->id)->first()->frontrunner)
{{ $mainscan->measures->where('question_id', $question->id)->first()->frontrunner->user->name }}
@else
Geen
@endif

@endif
@endforeach
@endcomponent

@endforeach

@component('mail::button', ['url' => $url])
Ga naar de sessie
@endcomponent

Bedankt!<br>
{{ config('app.name') }}
@endcomponent
