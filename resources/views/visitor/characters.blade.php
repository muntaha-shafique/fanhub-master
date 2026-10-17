<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Characters · Fan Hub Plus</title>
    @include('visitor._styles')
</head>
<body>
    @php $assetUrl = fn ($url) => $url ? str_replace('/storage/', '/media/', $url) : asset('assets/images/Character profiles/Tanjiro Kamado.jfif'); @endphp
    <nav class="page-nav">
        <a class="brand" href="/"><span class="brand-mark">F+</span><span>Fan Hub Plus</span></a>
        <div class="nav-links">
            <a href="/">Home</a>
            <a class="is-active" href="/characters">Characters</a>
            <a href="/sitemap">Sitemap</a>
            <a href="/user/login">Join</a>
        </div>
    </nav>

    <main class="shell">
        <nav class="crumbs" aria-label="Breadcrumb"><a href="/">Home</a><span>›</span><span>Characters</span></nav>

        <section class="hero-card">
            <p class="kicker">Character Profiles</p>
            <h1>Characters fans keep talking about</h1>
            <p class="lead">Browse character profiles by fandom category, search a fandom name and open a dedicated profile page with related content.</p>
        </section>

        <form class="filter-bar" method="get">
            <div class="field">
                <label for="category_id">Category</label>
                <select id="category_id" name="category_id">
                    <option value="">All categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->category_id }}" @selected((string) request('category_id') === (string) $category->category_id)>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="field">
                <label for="fandom_name">Fandom</label>
                <input id="fandom_name" name="fandom_name" value="{{ request('fandom_name') }}" placeholder="e.g. Demon Slayer">
            </div>
            <div class="field">
                <label for="sort">Sort</label>
                <select id="sort" name="sort">
                    <option value="popular" @selected(request('sort', 'popular') === 'popular')>Popular</option>
                    <option value="latest" @selected(request('sort') === 'latest')>Latest</option>
                    <option value="alphabetical" @selected(request('sort') === 'alphabetical')>A-Z</option>
                </select>
            </div>
            <button class="btn" type="submit">Filter</button>
        </form>

        <section class="grid" aria-label="Character grid">
            @forelse($characters as $character)
                <a class="content-card" href="{{ url('/character/'.$character->character_id) }}">
                    <article>
                        <div class="card-media character-photo"><img src="{{ $assetUrl($character->image_url) }}" alt="{{ $character->name }}"></div>
                        <div class="card-body">
                            <span class="pill">{{ $character->category?->name ?? 'Character' }}</span>
                            <h2>{{ $character->name }}</h2>
                            <p class="muted">{{ \Illuminate\Support\Str::limit($character->bio ?: 'Open this character profile for the full fandom bio.', 120) }}</p>
                            <div class="meta"><span>{{ $character->fandom_name ?: 'Fan Hub Plus' }}</span><span>{{ $character->popularity_score ?: 0 }} pts</span></div>
                        </div>
                    </article>
                </a>
            @empty
                <article class="article-panel"><h2>No characters yet</h2><p class="muted">Add character profiles in admin and they will appear here.</p></article>
            @endforelse
        </section>

        <div class="pagination">{{ $characters->links() }}</div>
    </main>
    @include('visitor._footer')
</body>
</html>
