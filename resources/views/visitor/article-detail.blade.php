<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>{{ $article->title }} · Fan Hub Plus</title>@include('visitor._styles')</head>
<body>
@php $img = fn($u) => $u ? str_replace('/storage/', '/media/', $u) : asset('assets/images/Content/Demon Slayer Season 4 Trailer.jfif'); @endphp
<nav class="page-nav"><a class="brand" href="/"><span class="brand-mark">F+</span><span>Fan Hub Plus</span></a><div class="nav-links"><a href="/">Home</a><a class="is-active" href="/articles">Articles</a><a href="/explore">Explore</a><a href="/login">Login</a></div></nav>
<main class="shell">
    <nav class="crumbs"><a href="/">Home</a><span>›</span>@if($article->category)<a href="/category/{{ $article->category->slug }}">{{ $article->category->name }}</a><span>›</span>@endif<span>{{ $article->title }}</span></nav>
    <section class="article-panel"><div class="media-cover"><img src="{{ $img($article->cover_image_url) }}" alt="{{ $article->title }}"></div><p class="kicker">{{ $article->fandom_name ?: $article->category?->name }}</p><h1>{{ $article->title }}</h1><div class="body-copy">{!! $article->body_html !!}</div>
        @if($article->images->count())<div class="gallery">@foreach($article->images as $image)<img src="{{ $img($image->image_url) }}" alt="{{ $image->caption ?: $article->title }}">@endforeach</div>@endif
        @if($article->timeline->count())<div class="timeline">@foreach($article->timeline as $event)<article class="timeline-item"><strong>{{ $event->event_label }}</strong><p class="muted">{{ $event->event_date?->format('M d, Y') }} · {{ $event->description }}</p></article>@endforeach</div>@endif
    </section>
    <section><p class="kicker">Related Articles</p><div class="related-row">@foreach($related as $item)<a class="mini-card" href="/article/{{ $item->article_id }}"><img src="{{ $img($item->cover_image_url) }}" alt="{{ $item->title }}"><h3>{{ $item->title }}</h3></a>@endforeach</div></section>
</main>
@include('visitor._footer')
</body></html>
