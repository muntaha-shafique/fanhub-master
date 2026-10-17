<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $character->name }} · Fan Hub Plus</title>
    @include('visitor._styles')
</head>
<body>
    @php
        $image = $character->image_url ? str_replace('/storage/', '/media/', $character->image_url) : asset('assets/images/Character profiles/Tanjiro Kamado.jfif');
        $relatedUrl = fn ($item) => $item->item_type === 'character' ? url('/character/'.$item->item_id) : url('/content/'.$item->item_type.'/'.$item->item_id);
        $relatedImage = fn ($item) => str_replace('/storage/', '/media/', $item->thumbnail_url ?: asset('assets/images/hero section/hero-anime.jfif'));
    @endphp
    <nav class="page-nav">
        <a class="brand" href="/"><span class="brand-mark">F+</span><span>Fan Hub Plus</span></a>
        <div class="nav-links">
            <a href="/">Home</a>
            @if($character->category)<a href="{{ url('/category/'.$character->category->slug) }}">{{ $character->category->name }}</a>@endif
            <a class="is-active" href="/characters">Characters</a>
            <a href="/user/login">Join</a>
        </div>
    </nav>

    <main class="shell">
        <nav class="crumbs" aria-label="Breadcrumb">
            <a href="/">Home</a><span>›</span>
            <a href="/characters">Characters</a><span>›</span>
            <span>{{ $character->name }}</span>
        </nav>

        <section class="hero-card with-media">
            <div>
                <p class="kicker">{{ $character->fandom_name ?: $character->category?->name ?: 'Character' }}</p>
                <h1>{{ $character->name }}</h1>
                <p class="lead">{{ $character->bio ?: 'A Fan Hub Plus character profile with fandom details, category context and related content.' }}</p>
                <div class="tags">
                    @if($character->category)<span class="pill">{{ $character->category->name }}</span>@endif
                    @if($character->genre)<span class="pill">{{ $character->genre }}</span>@endif
                    @if($character->popularity_score)<span class="pill">{{ $character->popularity_score }} pts</span>@endif
                </div>
            </div>
            <div class="character-photo"><img src="{{ $image }}" alt="{{ $character->name }}"></div>
        </section>

        <section style="margin-top:38px">
            <p class="kicker">Related Content</p>
            <h2>More from {{ $character->category?->name ?? 'this fandom' }}</h2>
            <div class="related-row">
                @foreach($related as $item)
                    <a class="mini-card" href="{{ $relatedUrl($item) }}">
                        <img src="{{ $relatedImage($item) }}" alt="{{ $item->title }}">
                        <h3>{{ $item->title }}</h3>
                    </a>
                @endforeach
            </div>
        </section>
    </main>
    @include('visitor._footer')
</body>
</html>
