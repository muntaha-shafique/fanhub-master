<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Articles · Fan Hub Plus</title>@include('visitor._styles')</head>
<body>
@php $img = fn($u) => $u ? str_replace('/storage/', '/media/', $u) : asset('assets/images/Content/Demon Slayer Season 4 Trailer.jfif'); @endphp
<nav class="page-nav"><a class="brand" href="/"><span class="brand-mark">F+</span><span>Fan Hub Plus</span></a><div class="nav-links"><a href="/">Home</a><a class="is-active" href="/articles">Articles</a><a href="/explore">Explore</a><a href="/login">Login</a></div></nav>
<main class="shell">
    <nav class="crumbs"><a href="/">Home</a><span>›</span><span>Articles</span></nav>
    <section class="hero-card"><p class="kicker">Articles Hub</p><h1>Featured stories first</h1><p class="lead">Read editorial fandom stories, reviews, timelines and galleries from the Fan Hub Plus database.</p></section>
    <form class="filter-bar" method="get"><div class="field"><label>Category</label><select name="category_id"><option value="">All categories</option>@foreach($categories as $c)<option value="{{ $c->category_id }}" @selected((string)request('category_id')===(string)$c->category_id)>{{ $c->name }}</option>@endforeach</select></div><button class="btn">Filter</button></form>
    @if($featured->count())
    <section class="feature-grid">@foreach($featured as $article)<a class="content-card" href="/article/{{ $article->article_id }}"><article><div class="card-media"><img src="{{ $img($article->cover_image_url) }}" alt="{{ $article->title }}"></div><div class="card-body"><span class="pill">Featured</span><h2>{{ $article->title }}</h2><p class="muted">{{ $article->fandom_name ?: $article->category?->name }}</p></div></article></a>@endforeach</section>
    @endif
    <section class="grid">@foreach($articles as $article)<a class="content-card" href="/article/{{ $article->article_id }}"><article><div class="card-media"><img src="{{ $img($article->cover_image_url) }}" alt="{{ $article->title }}"></div><div class="card-body"><span class="pill">{{ $article->category?->name ?? 'Article' }}</span><h2>{{ $article->title }}</h2><p class="muted">{{ $article->published_at?->format('M d, Y') ?? 'Published story' }}</p></div></article></a>@endforeach</section>
    <div class="pagination">{{ $articles->links() }}</div>
</main>
@include('visitor._footer')
</body></html>
