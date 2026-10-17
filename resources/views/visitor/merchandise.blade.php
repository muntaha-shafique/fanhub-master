<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Merchandise · Fan Hub Plus</title>@include('visitor._styles')</head>
<body>
@php $img = fn($u) => $u ? str_replace('/storage/', '/media/', $u) : asset('assets/images/Merchandise/Spider-Man Hoodie.jfif'); @endphp
<nav class="page-nav"><a class="brand" href="/"><span class="brand-mark">F+</span><span>Fan Hub Plus</span></a><div class="nav-links"><a href="/">Home</a><a class="is-active" href="/merchandise">Merchandise</a><a href="/explore">Explore</a></div></nav>
<main class="shell"><nav class="crumbs"><a href="/">Home</a><span>›</span><span>Merchandise</span></nav><section class="hero-card"><p class="kicker">Display-only Showcase</p><h1>Fan gear and collectibles</h1><p class="lead">No buy button — this SRS display page only showcases merchandise records from admin.</p></section>
<form class="filter-bar" method="get"><div class="field"><label>Tag</label><select name="tag"><option value="">All tags</option>@foreach(['Limited Edition','Pre-Order','Collectible','Standard'] as $tag)<option value="{{ $tag }}" @selected(request('tag')===$tag)>{{ $tag }}</option>@endforeach</select></div><button class="btn">Filter</button></form>
<section class="grid">@foreach($items as $item)<a class="content-card" href="/merchandise/{{ $item->item_id }}"><article><div class="card-media"><img src="{{ $img($item->image_url) }}" alt="{{ $item->name }}"></div><div class="card-body"><span class="pill">{{ $item->tag ?: 'Merch' }}</span><h2>{{ $item->name }}</h2><p class="muted">{{ $item->fandom_name ?: $item->category?->name }}</p></div></article></a>@endforeach</section><div class="pagination">{{ $items->links() }}</div></main>
@include('visitor._footer')
</body></html>
