<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $data['title'] ?? $data['name'] ?? 'Content' }} · Fan Hub Plus</title>
    @include('visitor._styles')
</head>
<body>
    @php
        $title = $data['title'] ?? $data['name'] ?? 'Fan Hub Plus Content';
        $image = str_replace('/storage/', '/media/', $data['thumbnail_url'] ?? $data['cover_image_url'] ?? $data['image_url'] ?? $data['content']['thumbnail_url'] ?? asset('assets/images/hero section/hero-anime.jfif'));
        $body = $data['body_html'] ?? nl2br(e($data['description'] ?? $data['bio'] ?? 'Explore this Fan Hub Plus detail page.'));
        $tags = collect($data['tags'] ?? [])->map(fn ($tag) => $tag['tag_name'] ?? $tag['name'] ?? null)->filter();
        $relatedUrl = fn ($item) => $item->item_type === 'character' ? url('/character/'.$item->item_id) : url('/content/'.$item->item_type.'/'.$item->item_id);
        $relatedImage = fn ($item) => str_replace('/storage/', '/media/', $item->thumbnail_url ?: asset('assets/images/hero section/hero-anime.jfif'));
    @endphp
    <nav class="page-nav">
        <a class="brand" href="/"><span class="brand-mark">F+</span><span>Fan Hub Plus</span></a>
        <div class="nav-links">
            <a href="/">Home</a>
            @if($category)<a href="{{ url('/category/'.$category->slug) }}">{{ $category->name }}</a>@endif
            <a class="is-active" href="#">Detail</a>
            <a href="/characters">Characters</a>
            <a href="/user/login">Join</a>
        </div>
    </nav>

    <main class="shell">
        <nav class="crumbs" aria-label="Breadcrumb">
            <a href="/">Home</a><span>›</span>
            @if($category)<a href="{{ url('/category/'.$category->slug) }}">{{ $category->name }}</a><span>›</span>@endif
            <span>{{ $title }}</span>
        </nav>

        <section class="detail-layout">
            <article class="article-panel">
                <div class="media-cover">
                    @if(($data['media_type'] ?? '') === 'video' || str_contains($data['media_url'] ?? '', '.mp4'))
                        <video controls poster="{{ $image }}" style="width:100%;height:100%;object-fit:cover">
                            <source src="{{ str_replace('/storage/', '/media/', $data['media_url']) }}" type="video/mp4">
                        </video>
                    @else
                        <img src="{{ $image }}" alt="{{ $title }} cover">
                    @endif
                </div>
                <p class="kicker">{{ $data['fandom_name'] ?? $category?->name ?? 'Fan Hub Plus' }}</p>
                <h1>{{ $title }}</h1>
                <div class="body-copy">{!! $body !!}</div>
                <div class="tags">
                    @forelse($tags as $tag)
                        <span class="pill">#{{ $tag }}</span>
                    @empty
                        <span class="pill">{{ str_replace('_', ' ', $data['item_type'] ?? 'content') }}</span>
                        @if(! empty($data['genre']))<span class="pill">{{ $data['genre'] }}</span>@endif
                    @endforelse
                </div>
            </article>

            <aside class="side-panel">
                <p class="kicker">Member Actions</p>
                <h2>Save and rate this</h2>
                <p class="muted">Bookmarking and ratings are member features.</p>
                <a class="btn alt" href="/user/login">Sign up to unlock</a>
                <a class="btn" style="margin-top:10px" href="/user/login">Log in</a>
                <hr style="border:0;border-top:1px solid var(--line);margin:24px 0">
                <p class="muted"><strong>Type:</strong> {{ str_replace('_', ' ', $data['item_type'] ?? 'content') }}</p>
                @if(! empty($data['popularity_score']))<p class="muted"><strong>Popularity:</strong> {{ $data['popularity_score'] }} pts</p>@endif
                @if(! empty($data['release_date']))<p class="muted"><strong>Release:</strong> {{ $data['release_date'] }}</p>@endif
            </aside>
        </section>

        <section>
            <p class="kicker">Related Content</p>
            <h2>More from {{ $category?->name ?? 'this fandom' }}</h2>
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
