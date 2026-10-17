<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $category->name }} · Fan Hub Plus</title>
    @include('visitor._styles')
</head>
<body>
    @php
        $assetUrl = fn ($url) => $url ? str_replace('/storage/', '/media/', $url) : asset('assets/images/hero section/hero-anime.jfif');
        $detailUrl = fn ($item) => $item->item_type === 'character'
            ? url('/character/'.$item->item_id)
            : url('/content/'.$item->item_type.'/'.$item->item_id);
    @endphp
    <nav class="page-nav">
        <a class="brand" href="/"><span class="brand-mark">F+</span><span>Fan Hub Plus</span></a>
        <div class="nav-links">
            <a href="/">Home</a>
            <a class="is-active" href="{{ url('/category/'.$category->slug) }}">Category</a>
            <a href="/characters">Characters</a>
            <a href="/sitemap">Sitemap</a>
            <a href="/user/login">Join</a>
        </div>
    </nav>

    <main class="shell">
        <nav class="crumbs" aria-label="Breadcrumb">
            <a href="/">Home</a><span>›</span><span>{{ $category->name }}</span>
        </nav>

        <section class="hero-card with-media">
            <div>
                <p class="kicker">Category Page</p>
                <h1>{{ $category->name }}</h1>
                <p class="lead">{{ $category->description ?: 'Explore content, articles, characters, trailers, merchandise and fan updates in this fandom category.' }}</p>
            </div>
            <div class="hero-icon">
                <img src="{{ $assetUrl($category->icon_url) }}" alt="{{ $category->name }} category icon">
            </div>
        </section>

        <form class="filter-bar" method="get">
            <div class="field">
                <label for="genre">Genre</label>
                <select id="genre" name="genre">
                    <option value="">All genres</option>
                    @foreach($genres as $genre)
                        <option value="{{ $genre }}" @selected(request('genre') === $genre)>{{ $genre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="field">
                <label for="content_type">Type</label>
                <select id="content_type" name="content_type">
                    <option value="">All types</option>
                    @foreach(['article' => 'Articles', 'video' => 'Videos', 'trailer' => 'Trailers', 'character' => 'Characters', 'merchandise' => 'Merchandise'] as $value => $label)
                        <option value="{{ $value }}" @selected(request('content_type') === $value)>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
            <div class="field">
                <label for="min_popularity">Popularity</label>
                <input id="min_popularity" name="min_popularity" value="{{ request('min_popularity') }}" placeholder="Min score">
            </div>
            <div class="field">
                <label for="sort">Sort</label>
                <select id="sort" name="sort">
                    <option value="latest" @selected(request('sort', 'latest') === 'latest')>Latest</option>
                    <option value="popular" @selected(request('sort') === 'popular')>Popular</option>
                    <option value="alphabetical" @selected(request('sort') === 'alphabetical')>A-Z</option>
                    <option value="release_date" @selected(request('sort') === 'release_date')>Release date</option>
                </select>
            </div>
            <button class="btn" type="submit">Apply</button>
        </form>

        <section class="grid" aria-label="{{ $category->name }} content grid">
            @forelse($items as $item)
                <a class="content-card" href="{{ $detailUrl($item) }}">
                    <article>
                        <div class="card-media"><img src="{{ $assetUrl($item->thumbnail_url) }}" alt="{{ $item->title }}"></div>
                        <div class="card-body">
                            <span class="pill">{{ str_replace('_', ' ', $item->content_type ?: $item->item_type) }}</span>
                            <h2>{{ $item->title }}</h2>
                            <p class="muted">{{ \Illuminate\Support\Str::limit(strip_tags($item->description ?: 'Open this Fan Hub Plus item for details.'), 120) }}</p>
                            <div class="meta"><span>{{ $item->fandom_name ?: $category->name }}</span><span>{{ $item->popularity_score ?: 0 }} pts</span></div>
                        </div>
                    </article>
                </a>
            @empty
                <article class="article-panel"><h2>No content yet</h2><p class="muted">This category is ready. Add content from admin and it will appear here.</p></article>
            @endforelse
        </section>

        <div class="pagination">{{ $items->links() }}</div>
    </main>
    @include('visitor._footer')
</body>
</html>
