<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>{{ $item->name }} · Fan Hub Plus</title>@include('visitor._styles')</head>
<body>
@php $img = fn($u) => $u ? str_replace('/storage/', '/media/', $u) : asset('assets/images/Merchandise/Spider-Man Hoodie.jfif'); @endphp
<nav class="page-nav"><a class="brand" href="/"><span class="brand-mark">F+</span><span>Fan Hub Plus</span></a><div class="nav-links"><a href="/">Home</a><a class="is-active" href="/merchandise">Merchandise</a><a href="/explore">Explore</a></div></nav>
<main class="shell"><nav class="crumbs"><a href="/">Home</a><span>›</span><a href="/merchandise">Merchandise</a><span>›</span><span>{{ $item->name }}</span></nav>
<section class="hero-card with-media"><div><p class="kicker">{{ $item->tag ?: 'Display-only item' }}</p><h1>{{ $item->name }}</h1><p class="lead">{{ $item->description ?: 'Fan Hub Plus merchandise showcase item.' }}</p><div class="tags"><span class="pill">No buy button</span>@if($item->category)<span class="pill">{{ $item->category->name }}</span>@endif</div></div><div class="hero-icon"><img src="{{ $img($item->image_url) }}" alt="{{ $item->name }}"></div></section>
@if($item->images->count())<section class="gallery">@foreach($item->images as $image)<img src="{{ $img($image->image_url) }}" alt="{{ $item->name }} gallery image">@endforeach</section>@endif
</main>@include('visitor._footer')</body></html>
