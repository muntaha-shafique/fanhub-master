<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet">
<link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css">
<style>
    :root {
        --paper: #f7f7f2;
        --ink: #090b09;
        --muted: #63665d;
        --accent: #d8f33d;
        --line: rgba(9, 11, 9, .1);
        --sky: #d9f5f8;
        --mint: #d8f6cf;
        --peach: #ffe5b2;
        --lav: #ead8ff;
        --rose: #f5d6e6;
        --cream: #eff6b8;
        --blue: #dbe7ff;
        --gold: #ffd56f;
    }
    * { box-sizing: border-box; }
    body {
        margin: 0;
        background: var(--paper);
        color: var(--ink);
        font-family: "Instrument Sans", ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
    }
    a { color: inherit; text-decoration: none; }
    .page-nav {
        position: sticky;
        top: 12px;
        z-index: 5;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 18px;
        width: min(1180px, calc(100% - 36px));
        margin: 12px auto 0;
        padding: 10px 14px;
        border: 1px solid rgba(9, 11, 9, .08);
        border-radius: 999px;
        background: rgba(247, 247, 242, .88);
        box-shadow: 0 16px 40px rgba(9, 11, 9, .08);
        backdrop-filter: blur(18px);
    }
    .brand { display: inline-flex; align-items: center; gap: 10px; font-weight: 700; }
    .brand-mark {
        display: grid;
        width: 38px;
        height: 38px;
        place-items: center;
        border-radius: 12px;
        background: var(--accent);
    }
    .nav-links { display: flex; gap: 8px; align-items: center; flex-wrap: wrap; justify-content: flex-end; }
    .nav-links a {
        padding: 9px 13px;
        border-radius: 999px;
        color: rgba(9, 11, 9, .68);
        font-size: 14px;
        font-weight: 700;
    }
    .nav-links a.is-active, .nav-links a:hover { background: var(--ink); color: #fff; }
    .shell { width: min(1180px, calc(100% - 36px)); margin: 0 auto; }
    .crumbs {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin: 34px 0 18px;
        color: var(--muted);
        font-size: 13px;
        font-weight: 700;
    }
    .crumbs span { color: var(--ink); }
    .hero-card {
        position: relative;
        overflow: hidden;
        border: 2px solid var(--line);
        border-radius: 36px;
        background: linear-gradient(135deg, var(--cream), var(--sky));
        padding: clamp(28px, 5vw, 58px);
        box-shadow: 0 18px 70px rgba(9, 11, 9, .08);
    }
    .hero-card.with-media { display: grid; grid-template-columns: minmax(0, 1fr) minmax(300px, .48fr); gap: 28px; align-items: center; }
    .kicker {
        margin: 0 0 10px;
        color: #7b8d00;
        font-size: 12px;
        font-weight: 800;
        letter-spacing: .14em;
        text-transform: uppercase;
    }
    h1 { margin: 0; font-size: clamp(2.5rem, 5.6vw, 5.4rem); letter-spacing: -.06em; line-height: .95; }
    .lead { max-width: 720px; margin: 18px 0 0; color: var(--muted); font-size: 1.08rem; line-height: 1.65; }
    .hero-icon {
        overflow: hidden;
        border: 2px solid rgba(9, 11, 9, .16);
        border-radius: 28px;
        background: #fff;
        aspect-ratio: 1 / 1;
    }
    .hero-icon img, .media-cover img, .card-media img, .character-photo img { width: 100%; height: 100%; object-fit: cover; display: block; }
    .filter-bar {
        display: grid;
        grid-template-columns: repeat(4, minmax(160px, 1fr)) auto;
        gap: 12px;
        margin: 24px 0;
        padding: 14px;
        border: 1px solid var(--line);
        border-radius: 26px;
        background: #fff;
    }
    .field { display: grid; gap: 7px; }
    .field label { color: var(--muted); font-size: 12px; font-weight: 800; text-transform: uppercase; letter-spacing: .08em; }
    select, input {
        width: 100%;
        min-height: 48px;
        border: 1px solid var(--line);
        border-radius: 16px;
        background: var(--paper);
        padding: 0 14px;
        font: inherit;
        font-weight: 600;
    }
    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        min-height: 48px;
        border: 0;
        border-radius: 999px;
        padding: 0 18px;
        background: var(--ink);
        color: #fff;
        font: inherit;
        font-weight: 800;
        cursor: pointer;
    }
    .btn.alt { background: var(--accent); color: var(--ink); }
    .grid { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 16px; margin: 22px 0 34px; }
    .content-card {
        overflow: hidden;
        border: 2px solid rgba(9, 11, 9, .12);
        border-radius: 28px;
        background: #fff;
        transition: transform .18s ease, box-shadow .18s ease;
    }
    .content-card:nth-child(6n + 1) { background: var(--sky); }
    .content-card:nth-child(6n + 2) { background: var(--cream); }
    .content-card:nth-child(6n + 3) { background: var(--rose); }
    .content-card:nth-child(6n + 4) { background: var(--mint); }
    .content-card:nth-child(6n + 5) { background: var(--peach); }
    .content-card:nth-child(6n) { background: var(--lav); }
    .content-card:hover { transform: translateY(-4px); box-shadow: 0 16px 34px rgba(9, 11, 9, .12); }
    .card-media { height: 210px; margin: 12px; overflow: hidden; border-radius: 22px; background: rgba(255, 255, 255, .62); }
    .card-body { padding: 6px 18px 20px; }
    .pill {
        display: inline-flex;
        width: max-content;
        align-items: center;
        gap: 7px;
        border-radius: 999px;
        padding: 8px 11px;
        background: rgba(247, 247, 242, .82);
        font-size: 11px;
        font-weight: 800;
        text-transform: uppercase;
    }
    .content-card h2, .content-card h3 { margin: 14px 0 8px; font-size: 1.35rem; line-height: 1.1; }
    .muted { color: var(--muted); line-height: 1.55; }
    .meta { display: flex; justify-content: space-between; gap: 12px; margin-top: 16px; color: rgba(9, 11, 9, .68); font-size: 12px; font-weight: 800; }
    .detail-layout { display: grid; grid-template-columns: minmax(0, 1fr) 330px; gap: 22px; margin: 22px 0 54px; }
    .article-panel, .side-panel {
        border: 2px solid var(--line);
        border-radius: 32px;
        background: #fff;
        padding: clamp(22px, 3vw, 34px);
    }
    .media-cover { overflow: hidden; border-radius: 28px; background: var(--sky); aspect-ratio: 16 / 8.5; margin-bottom: 24px; }
    .body-copy { color: #222; line-height: 1.8; font-size: 1.04rem; }
    .tags { display: flex; flex-wrap: wrap; gap: 8px; margin-top: 22px; }
    .related-row { display: grid; grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 14px; margin: 18px 0 60px; }
    .mini-card { border: 1px solid var(--line); border-radius: 20px; background: #fff; padding: 12px; }
    .mini-card img { width: 100%; height: 120px; object-fit: cover; border-radius: 14px; }
    .mini-card h3 { margin: 10px 0 0; font-size: 15px; line-height: 1.2; }
    .character-photo { overflow: hidden; border-radius: 999px 999px 34px 34px; background: var(--mint); aspect-ratio: .82 / 1; border: 2px solid rgba(9, 11, 9, .12); }
    .pagination { display: flex; gap: 8px; flex-wrap: wrap; margin: 18px 0 58px; }
    .pagination a, .pagination span { padding: 10px 13px; border-radius: 999px; background: #fff; border: 1px solid var(--line); font-weight: 800; }
    .pagination .active span, .pagination span[aria-current] { background: var(--ink); color: #fff; }
    .feature-grid { display: grid; grid-template-columns: 1.2fr .8fr; gap: 16px; margin: 22px 0; }
    .gallery { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 12px; margin-top: 20px; }
    .gallery img { width: 100%; height: 180px; object-fit: cover; border-radius: 20px; background: var(--sky); }
    .timeline { display: grid; gap: 14px; margin-top: 20px; }
    .timeline-item { position: relative; padding: 16px 16px 16px 44px; border-radius: 20px; background: var(--cream); }
    .timeline-item::before { content: ""; position: absolute; left: 18px; top: 20px; width: 12px; height: 12px; border-radius: 50%; background: var(--ink); }
    .calendar-layout { display: grid; grid-template-columns: minmax(0, 1fr) 360px; gap: 18px; margin: 24px 0 60px; }
    .calendar-card { border: 2px solid var(--line); border-radius: 32px; background: #fff; padding: 22px; overflow: hidden; }
    .calendar-grid { display: grid; grid-template-columns: repeat(7, minmax(0, 1fr)); gap: 10px; }
    .cal-head { color: var(--muted); font-size: 12px; font-weight: 800; text-align: center; }
    .cal-day { min-height: 104px; border: 1px solid var(--line); border-radius: 18px; padding: 10px; background: var(--paper); font-weight: 800; }
    .cal-day.is-empty { opacity: .35; }
    .cal-event { display: block; margin-top: 8px; border-radius: 10px; padding: 6px; background: var(--mint); color: #184f23; font-size: 11px; line-height: 1.15; }
    .map-preview { min-height: 190px; border-radius: 24px; background: linear-gradient(135deg, var(--sky), var(--lav)); display: grid; place-items: center; text-align: center; padding: 18px; font-weight: 800; }
    .auth-wrap { min-height: calc(100vh - 74px); display: grid; place-items: center; padding: 44px 18px; }
    .auth-card { width: min(520px, 100%); border: 2px solid var(--line); border-radius: 34px; background: #fff; padding: 30px; box-shadow: 0 18px 60px rgba(9,11,9,.1); }
    .auth-card form { display: grid; gap: 14px; margin-top: 22px; }
    .auth-note { margin-top: 14px; color: var(--muted); line-height: 1.55; }
    .site-footer { margin-top: 56px; padding: 44px 22px 34px; background: #0a0d0b; color: #fff; }
    .footer-inner { display: grid; grid-template-columns: minmax(0, 1fr) minmax(260px, .6fr); gap: 30px; width: min(1180px, 100%); margin: 0 auto; }
    .site-footer p { max-width: 620px; color: rgba(255,255,255,.68); line-height: 1.6; }
    .site-footer .brand { color: #fff; }
    .site-footer .brand-mark { color: var(--ink); }
    .copyright { font-size: 13px; }
    .footer-title { margin: 0 0 12px; color: #fff !important; font-weight: 800; }
    .footer-links, .social-links { display: flex; flex-wrap: wrap; gap: 10px; }
    .footer-links a, .social-links a { display: inline-flex; min-height: 40px; align-items: center; border: 1px solid rgba(255,255,255,.16); border-radius: 999px; padding: 0 14px; color: rgba(255,255,255,.88); font-weight: 800; font-size: 13px; }
    .social-links { margin-top: 14px; }
    .social-links a { width: 42px; justify-content: center; padding: 0; }
    @media (max-width: 900px) {
        .hero-card.with-media, .detail-layout { grid-template-columns: 1fr; }
        .filter-bar { grid-template-columns: 1fr 1fr; }
        .grid, .related-row { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        .calendar-layout, .feature-grid, .footer-inner { grid-template-columns: 1fr; }
    }
    @media (max-width: 620px) {
        .page-nav { align-items: flex-start; border-radius: 26px; flex-direction: column; }
        .grid, .related-row, .filter-bar { grid-template-columns: 1fr; }
        .gallery { grid-template-columns: 1fr; }
        .calendar-grid { gap: 6px; }
        .cal-day { min-height: 76px; border-radius: 14px; font-size: 12px; }
    }
</style>
