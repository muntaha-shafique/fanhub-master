<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Events · Fan Hub Plus</title>@include('visitor._styles')</head>
<body>
@php
    $base = $events->first()?->event_date ?? now();
    $start = $base->copy()->startOfMonth(); $end = $base->copy()->endOfMonth();
    $byDay = $events->getCollection()->groupBy(fn($e) => $e->event_date?->day);
@endphp
<nav class="page-nav"><a class="brand" href="/"><span class="brand-mark">F+</span><span>Fan Hub Plus</span></a><div class="nav-links"><a href="/">Home</a><a class="is-active" href="/events">Events</a><a href="/explore">Explore</a><a href="/login">Login</a></div></nav>
<main class="shell">
<nav class="crumbs"><a href="/">Home</a><span>›</span><span>Events</span></nav>
<section class="hero-card"><p class="kicker">Calendar</p><h1>Upcoming fandom events</h1><p class="lead">Real calendar layout with city/type filters, upcoming list, ticket links and GPS map preview when coordinates exist.</p></section>
<form class="filter-bar" method="get"><div class="field"><label>City</label><select name="city"><option value="">All cities</option>@foreach($cities as $city)<option value="{{ $city }}" @selected(request('city')===$city)>{{ $city }}</option>@endforeach</select></div><div class="field"><label>Type</label><select name="event_type"><option value="">All event types</option>@foreach($types as $type)<option value="{{ $type }}" @selected(request('event_type')===$type)>{{ $type }}</option>@endforeach</select></div><button class="btn">Filter</button></form>
<section class="calendar-layout">
    <div class="calendar-card"><div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:18px"><h2>{{ $base->format('F Y') }}</h2><span class="pill">{{ $events->total() }} events</span></div><div class="calendar-grid">
        @foreach(['SUN','MON','TUE','WED','THU','FRI','SAT'] as $d)<div class="cal-head">{{ $d }}</div>@endforeach
        @for($i=0;$i<$start->dayOfWeek;$i++)<div class="cal-day is-empty"></div>@endfor
        @for($day=1;$day<=$end->day;$day++)<div class="cal-day">{{ $day }}@foreach(($byDay[$day] ?? collect())->take(2) as $event)<span class="cal-event">{{ $event->title }}</span>@endforeach</div>@endfor
    </div></div>
    <aside class="side-panel"><p class="kicker">Upcoming List</p>@foreach($events as $event)<article class="mini-card" style="margin-bottom:12px"><h3>{{ $event->title }}</h3><p class="muted">{{ $event->event_type }} · {{ $event->city }} · {{ $event->event_date?->format('M d, Y h:i A') }}</p>@if($event->ticket_link)<a class="btn alt" href="{{ $event->ticket_link }}">Ticket link</a>@endif @if($event->latitude && $event->longitude)<div class="map-preview" style="margin-top:10px">Map preview<br>{{ $event->latitude }}, {{ $event->longitude }}</div>@endif</article>@endforeach</aside>
</section><div class="pagination">{{ $events->links() }}</div>
</main>@include('visitor._footer')</body></html>
