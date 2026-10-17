<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sitemap · Fan Hub Plus</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css">
    <style>
        :root {
            --paper: #f7f7f2;
            --ink: #090b09;
            --muted: #63665d;
            --accent: #d8f33d;
            --line: rgba(9, 11, 9, .12);
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            min-height: 100vh;
            background: var(--paper);
            color: var(--ink);
            font-family: "Instrument Sans", ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .wrap {
            width: min(1040px, calc(100% - 36px));
            margin: 0 auto;
            padding: 38px 0 64px;
        }

        .brand {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            font-weight: 700;
        }

        .brand-mark {
            display: grid;
            width: 38px;
            height: 38px;
            place-items: center;
            border-radius: 12px;
            background: var(--accent);
        }

        .hero {
            margin-top: 58px;
        }

        .hero p {
            max-width: 640px;
            color: var(--muted);
            line-height: 1.6;
        }

        h1 {
            margin: 0;
            font-size: clamp(2.6rem, 6vw, 5.6rem);
            letter-spacing: -.06em;
            line-height: .96;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 16px;
            margin-top: 34px;
        }

        .card {
            min-height: 180px;
            padding: 22px;
            border: 2px solid var(--line);
            border-radius: 28px;
            background: #fff;
        }

        .card:nth-child(1) { background: #d9f5f8; }
        .card:nth-child(2) { background: #eff6b8; }
        .card:nth-child(3) { background: #ffe5b2; }
        .card:nth-child(4) { background: #ead8ff; }
        .card:nth-child(5) { background: #f5d6e6; }
        .card:nth-child(6) { background: #d8f6cf; }

        .card h2 {
            margin: 0 0 14px;
            font-size: 1.35rem;
        }

        .card a {
            display: block;
            margin-top: 9px;
            color: rgba(9, 11, 9, .72);
            font-weight: 700;
        }

        @media (max-width: 780px) {
            .grid {
                grid-template-columns: 1fr;
            }
        }

        .site-footer {
            margin-top: 56px;
            padding: 44px 22px 34px;
            background: #0a0d0b;
            color: #fff;
        }

        .footer-inner {
            display: grid;
            grid-template-columns: minmax(0, 1fr) minmax(260px, .6fr);
            gap: 30px;
            width: min(1040px, 100%);
            margin: 0 auto;
        }

        .footer-links,
        .social-links {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .footer-links a,
        .social-links a {
            display: inline-flex;
            min-height: 40px;
            align-items: center;
            border: 1px solid rgba(255, 255, 255, .16);
            border-radius: 999px;
            padding: 0 14px;
            color: rgba(255, 255, 255, .88);
            font-weight: 800;
            font-size: 13px;
        }

        .social-links {
            margin-top: 14px;
        }

        .social-links a {
            width: 42px;
            justify-content: center;
            padding: 0;
        }
    </style>
</head>
<body>
    <main class="wrap">
        <a class="brand" href="/">
            <span class="brand-mark">F+</span>
            <span>Fan Hub Plus</span>
        </a>

        <section class="hero">
            <h1>Sitemap</h1>
            <p>Quick navigation for the Fan Hub Plus visitor, member and admin areas.</p>
        </section>

        <section class="grid" aria-label="Sitemap links">
            <article class="card">
                <h2>Visitor</h2>
                <a href="/">Homepage</a>
                <a href="/#explore">Categories</a>
                <a href="/explore">Explore search</a>
                <a href="/events">Events calendar</a>
            </article>
            <article class="card">
                <h2>Categories</h2>
                <a href="/visitor/categories/anime">Anime</a>
                <a href="/visitor/categories/gaming">Gaming</a>
                <a href="/visitor/categories/movies">Movies</a>
            </article>
            <article class="card">
                <h2>More fandoms</h2>
                <a href="/visitor/categories/tv-shows">TV Shows</a>
                <a href="/visitor/categories/k-pop">K-Pop</a>
                <a href="/visitor/categories/comics">Comics</a>
            </article>
            <article class="card">
                <h2>Community</h2>
                <a href="/visitor/categories/manga">Manga</a>
                <a href="/visitor/categories/cosplay">Cosplay</a>
                <a href="/articles">Articles hub</a>
            </article>
            <article class="card">
                <h2>Account</h2>
                <a href="/login">Log in</a>
                <a href="/register">Register</a>
                <a href="/forgot-password">Forgot password</a>
                <a href="/admin/login">Admin login</a>
            </article>
            <article class="card">
                <h2>Showcases</h2>
                <a href="/characters">Characters</a>
                <a href="/merchandise">Merchandise</a>
                <a href="/sitemap">Sitemap</a>
            </article>
        </section>
    </main>
    @include('visitor._footer')
</body>
</html>
