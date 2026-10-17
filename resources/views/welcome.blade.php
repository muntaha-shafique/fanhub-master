<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fan Hub Plus</title>
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

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
            overflow-x: hidden;
        }

        body {
            margin: 0;
            min-height: 100vh;
            overflow-x: hidden;
            background: var(--paper);
            color: var(--ink);
            font-family: "Instrument Sans", ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .site-nav {
            position: sticky;
            top: 12px;
            z-index: 3;
            display: grid;
            grid-template-columns: 220px minmax(0, 1fr) 220px;
            align-items: center;
            gap: 18px;
            width: min(1180px, calc(100% - 36px));
            margin: 12px auto 0;
            padding: 10px 14px;
            border: 1px solid rgba(9, 11, 9, .08);
            border-radius: 999px;
            background: rgba(247, 247, 242, .86);
            box-shadow: 0 16px 40px rgba(9, 11, 9, .08);
            backdrop-filter: blur(18px);
        }

        .brand {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            font-weight: 700;
            letter-spacing: 0;
        }

        .brand-mark {
            display: grid;
            width: 38px;
            height: 38px;
            place-items: center;
            border-radius: 12px;
            background: var(--accent);
            color: var(--ink);
            font-weight: 700;
        }

        .nav-links {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: clamp(14px, 2.5vw, 34px);
            font-size: 14px;
            font-weight: 600;
        }

        .nav-links a {
            padding: 9px 13px;
            border-radius: 999px;
            color: rgba(9, 11, 9, .68);
            transition: background .18s ease, color .18s ease;
        }

        .nav-links a.is-active,
        .nav-links a:hover,
        .nav-links a:focus-visible {
            background: var(--ink);
            color: #fff;
            outline: none;
        }

        .nav-actions {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 10px;
            font-size: 13px;
            font-weight: 600;
        }

        .nav-login {
            padding: 10px 12px;
        }

        .nav-signup {
            padding: 11px 18px;
            border-radius: 999px;
            background: var(--ink);
            color: #fff;
        }

        .visitor-hero {
            position: relative;
            isolation: isolate;
            padding: clamp(22px, 3.2vw, 42px) 0 clamp(30px, 4vw, 58px);
            background: var(--paper);
        }

        .hero-inner {
            width: min(1220px, 100%);
            margin: 0 auto;
            text-align: center;
        }

        .hero-pill {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 32px;
            padding: 7px 16px;
            border: 1px solid rgba(9, 11, 9, .08);
            border-radius: 999px;
            background: color-mix(in srgb, var(--accent) 42%, white);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: .08em;
            color: var(--ink);
        }

        .hero-title {
            max-width: 980px;
            margin: clamp(30px, 3vw, 38px) auto 0;
            font-size: clamp(58px, 5.3vw, 82px);
            line-height: 1;
            font-weight: 700;
            letter-spacing: 0;
        }

        .hero-copy {
            max-width: 720px;
            margin: clamp(20px, 2vw, 26px) auto 0;
            color: var(--muted);
            font-size: clamp(1rem, 1.28vw, 1.12rem);
            line-height: 1.5;
            font-weight: 500;
        }

        .hero-carousel {
            position: relative;
            width: min(1320px, calc(100% - 28px));
            margin: clamp(14px, 2vw, 24px) auto 0;
            text-align: left;
        }

        .hero-slide {
            display: none;
            min-height: clamp(440px, 48vw, 610px);
            overflow: hidden;
            border: 2px solid rgba(9, 11, 9, .12);
            border-radius: 42px;
            background: #111;
            box-shadow: 0 22px 70px rgba(9, 11, 9, .16);
        }

        .hero-slide.is-active {
            display: grid;
            grid-template-columns: minmax(0, .92fr) minmax(340px, .58fr);
        }

        .hero-slide-media {
            position: relative;
            min-height: inherit;
        }

        .hero-slide-media::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(90deg, rgba(9, 11, 9, .04), rgba(9, 11, 9, .76));
        }

        .hero-slide-media img {
            display: block;
            width: 100%;
            height: 100%;
            min-height: inherit;
            object-fit: cover;
        }

        .hero-slide-panel {
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 20px;
            padding: clamp(28px, 4vw, 52px);
            background: #0a0d0b;
            color: #fff;
        }

        .hero-slide-panel .hero-pill {
            width: max-content;
            background: var(--accent);
            color: var(--ink);
        }

        .hero-slide-panel h2 {
            margin: 0;
            font-size: clamp(2.15rem, 4vw, 4.4rem);
            line-height: .98;
            letter-spacing: -.04em;
        }

        .hero-slide-panel p {
            margin: 0;
            color: rgba(255, 255, 255, .76);
            line-height: 1.65;
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 6px;
        }

        .hero-action {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-height: 48px;
            padding: 0 20px;
            border-radius: 999px;
            font-size: 14px;
            font-weight: 700;
        }

        .hero-action.primary {
            background: var(--accent);
            color: var(--ink);
        }

        .hero-action.secondary {
            border: 1px solid rgba(255, 255, 255, .24);
            color: #fff;
        }

        .hero-dots {
            position: absolute;
            left: clamp(20px, 3vw, 36px);
            bottom: clamp(18px, 3vw, 30px);
            display: flex;
            gap: 8px;
            z-index: 2;
        }

        .hero-dot {
            width: 36px;
            height: 9px;
            border: 0;
            border-radius: 999px;
            background: rgba(255, 255, 255, .48);
            cursor: pointer;
        }

        .hero-dot.is-active {
            background: var(--accent);
        }

        .hero-strip-wrap {
            width: 100vw;
            margin-left: 50%;
            transform: translateX(-50%);
            overflow: hidden;
        }

        .hero-strip {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: clamp(10px, 1vw, 18px);
            width: calc(100vw + clamp(44px, 8vw, 132px));
            margin: clamp(30px, 2.8vw, 42px) 0 0 50%;
            padding: 0;
            transform: translateX(-50%);
        }

        .hero-card {
            position: relative;
            flex: 0 0 auto;
            height: clamp(210px, 17vw, 285px);
            overflow: hidden;
            border-radius: 24px;
            background: #e8e8df;
        }

        .hero-card:nth-child(1) { width: clamp(150px, 14vw, 205px); transform: translateY(-2px); }
        .hero-card:nth-child(2) { width: clamp(160px, 15vw, 218px); transform: translateY(8px); }
        .hero-card:nth-child(3) { width: clamp(140px, 13vw, 190px); transform: translateY(3px); }
        .hero-card:nth-child(4) { width: clamp(150px, 14vw, 205px); transform: translateY(10px); }
        .hero-card:nth-child(5) { width: clamp(140px, 13vw, 190px); transform: translateY(1px); }
        .hero-card:nth-child(6) { width: clamp(160px, 15vw, 218px); transform: translateY(8px); }
        .hero-card:nth-child(7) { width: clamp(150px, 14vw, 205px); transform: translateY(-1px); }

        .hero-card img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            transition: transform .28s ease;
        }

        .hero-card span {
            position: absolute;
            left: 14px;
            bottom: 14px;
            border-radius: 999px;
            padding: 7px 10px;
            background: rgba(247, 247, 242, .88);
            color: var(--ink);
            font-size: 11px;
            font-weight: 700;
            opacity: 0;
            transform: translateY(6px);
            transition: opacity .22s ease, transform .22s ease;
        }

        .hero-card:hover img {
            transform: scale(1.035);
        }

        .hero-card:hover span {
            opacity: 1;
            transform: translateY(0);
        }

        .hero-cta {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-top: clamp(32px, 3vw, 44px);
            min-height: 54px;
            padding: 0 24px;
            border-radius: 999px;
            background: var(--ink);
            color: #fff;
            font-size: 14px;
            font-weight: 700;
            gap: 8px;
            transition: background .2s ease, color .2s ease, transform .2s ease;
        }

        .hero-cta .fi {
            display: inline-flex;
            align-items: center;
            font-size: 14px;
            line-height: 1;
        }

        .hero-cta:hover,
        .hero-cta:focus-visible {
            background: var(--accent);
            color: var(--ink);
            transform: translateY(-1px);
            outline: none;
        }

        .category-section {
            padding: 54px 22px 82px;
            border-top: 1px solid var(--line);
        }

        .content-section {
            padding: 0 22px 76px;
        }

        .content-section.is-tinted {
            padding-top: 48px;
            margin-bottom: 76px;
            border-top: 1px solid rgba(9, 11, 9, .08);
            border-bottom: 1px solid rgba(9, 11, 9, .08);
        }

        .content-section.trending-band {
            background:
                radial-gradient(circle at 14% 16%, rgba(255, 255, 255, .58), transparent 28%),
                var(--cream);
        }

        .content-section.latest-band {
            background:
                radial-gradient(circle at 88% 12%, rgba(255, 255, 255, .62), transparent 28%),
                var(--sky);
        }

        .category-shell {
            width: min(1180px, 100%);
            margin: 0 auto;
        }

        .category-head,
        .content-head {
            display: flex;
            align-items: end;
            justify-content: space-between;
            gap: 18px;
            margin-bottom: 24px;
        }

        .category-kicker,
        .content-kicker {
            margin: 0 0 9px;
            color: var(--muted);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: .12em;
            text-transform: uppercase;
        }

        .section-accent-lime .content-kicker { color: #7b8d00; }
        .section-accent-blue .content-kicker { color: #2858b8; }
        .section-accent-rose .content-kicker { color: #b34f7d; }
        .section-accent-mint .content-kicker { color: #377f4b; }
        .section-accent-gold .content-kicker { color: #9c6a00; }
        .section-accent-lav .content-kicker { color: #7452b7; }

        .category-head h2,
        .content-head h2 {
            margin: 0;
            font-size: clamp(1.7rem, 3vw, 2.5rem);
            line-height: 1.08;
            font-weight: 700;
        }

        .category-head p,
        .content-head p {
            max-width: 620px;
            margin: 10px 0 0;
            color: var(--muted);
            line-height: 1.6;
        }

        .category-grid,
        .content-row {
            display: flex;
            gap: 16px;
            overflow-x: auto;
            overflow-y: hidden;
            padding: 4px 4px 18px;
            scroll-snap-type: x mandatory;
            scroll-padding-inline: 4px;
            -webkit-overflow-scrolling: touch;
            cursor: grab;
            user-select: none;
        }

        .category-grid.is-dragging,
        .content-row.is-dragging {
            cursor: grabbing;
            scroll-snap-type: none;
        }

        .category-grid::-webkit-scrollbar,
        .content-row::-webkit-scrollbar {
            display: none;
        }

        .category-card {
            --card-color: var(--sky);
            position: relative;
            flex: 0 0 clamp(260px, 27vw, 330px);
            min-height: 310px;
            overflow: hidden;
            border: 2px solid rgba(9, 11, 9, .18);
            border-radius: 26px;
            background: var(--card-color);
            color: var(--ink);
            box-shadow: 0 10px 0 rgba(9, 11, 9, .14);
            scroll-snap-align: start;
            transform: translateY(0);
            transition: transform .2s ease, box-shadow .2s ease;
        }

        .category-card:hover,
        .category-card:focus-visible {
            transform: translateY(-4px);
            box-shadow: 0 14px 0 rgba(9, 11, 9, .14);
            outline: none;
        }

        .category-card-inner {
            display: flex;
            height: 100%;
            min-height: inherit;
            flex-direction: column;
            padding: 13px;
        }

        .category-image {
            position: relative;
            height: 190px;
            overflow: hidden;
            border: 2px solid rgba(9, 11, 9, .2);
            border-radius: 20px;
            background: #fff;
        }

        .category-image img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .category-pill {
            position: absolute;
            left: 12px;
            top: 12px;
            display: inline-flex;
            align-items: center;
            gap: 7px;
            max-width: calc(100% - 24px);
            padding: 8px 12px;
            border-radius: 999px;
            background: rgba(247, 247, 242, .92);
            font-size: 12px;
            font-weight: 700;
        }

        .category-pill .fi {
            font-size: 14px;
        }

        .category-body {
            display: flex;
            flex: 1;
            flex-direction: column;
            justify-content: space-between;
            padding: 18px 8px 4px;
        }

        .category-body h3 {
            margin: 0;
            font-size: clamp(1.55rem, 2vw, 2rem);
            line-height: 1.05;
            font-weight: 700;
        }

        .category-body p {
            margin: 10px 0 16px;
            color: rgba(9, 11, 9, .68);
            font-size: 13px;
            line-height: 1.45;
        }

        .category-meta {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            font-size: 12px;
            font-weight: 700;
        }

        .category-meta span {
            display: inline-flex;
            align-items: center;
            gap: 7px;
        }

        .content-card {
            --card-color: var(--sky);
            flex: 0 0 clamp(260px, 26vw, 335px);
            min-height: 310px;
            overflow: hidden;
            border: 2px solid rgba(9, 11, 9, .14);
            border-radius: 24px;
            background: #fff;
            color: var(--ink);
            scroll-snap-align: start;
            transition: transform .2s ease, box-shadow .2s ease;
        }

        .content-card:hover,
        .content-card:focus-visible {
            transform: translateY(-4px);
            box-shadow: 0 16px 32px rgba(9, 11, 9, .1);
            outline: none;
        }

        .content-image {
            height: 175px;
            background: var(--card-color);
        }

        .content-image img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .content-body {
            padding: 17px;
        }

        .content-type {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            border-radius: 999px;
            padding: 7px 10px;
            background: var(--card-color);
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
        }

        .content-card h3 {
            margin: 14px 0 8px;
            font-size: 19px;
            line-height: 1.12;
        }

        .content-card p {
            margin: 0;
            color: var(--muted);
            font-size: 13px;
            line-height: 1.5;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .content-meta {
            display: flex;
            justify-content: space-between;
            gap: 12px;
            margin-top: 16px;
            color: rgba(9, 11, 9, .68);
            font-size: 12px;
            font-weight: 700;
        }

        .story-card {
            flex-basis: clamp(310px, 34vw, 460px);
            min-height: 365px;
            border-color: rgba(9, 11, 9, .2);
            background: var(--card-color);
            box-shadow: 0 10px 0 rgba(9, 11, 9, .14);
        }

        .story-card .content-image {
            height: 210px;
            margin: 13px 13px 0;
            overflow: hidden;
            border: 2px solid rgba(9, 11, 9, .18);
            border-radius: 18px;
            background: rgba(255, 255, 255, .55);
        }

        .story-card .content-body {
            padding: 18px 21px 21px;
        }

        .story-card .content-type {
            background: rgba(247, 247, 242, .8);
        }

        .character-card {
            flex-basis: clamp(230px, 22vw, 286px);
            min-height: 355px;
            border-radius: 999px 999px 28px 28px;
            background: var(--card-color);
            box-shadow: 0 10px 0 rgba(9, 11, 9, .12);
        }

        .character-card .content-image {
            height: 235px;
            margin: 12px;
            overflow: hidden;
            border: 2px solid rgba(9, 11, 9, .16);
            border-radius: 999px 999px 24px 24px;
            background: rgba(255, 255, 255, .55);
        }

        .media-card {
            position: relative;
            flex-basis: clamp(300px, 36vw, 500px);
            min-height: 290px;
            border-color: rgba(9, 11, 9, .2);
            background: #0b0d0c;
            color: #fff;
        }

        .media-card .content-image {
            height: 205px;
            background: #101210;
        }

        .media-card .content-body {
            color: #fff;
        }

        .media-card p,
        .media-card .content-meta {
            color: rgba(255, 255, 255, .7);
        }

        .play-badge {
            position: absolute;
            top: 88px;
            left: 50%;
            display: grid;
            width: 64px;
            height: 64px;
            place-items: center;
            border-radius: 50%;
            background: rgba(216, 243, 61, .92);
            color: var(--ink);
            transform: translateX(-50%);
            box-shadow: 0 12px 30px rgba(0, 0, 0, .28);
        }

        .merch-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 16px;
        }

        .merch-card {
            overflow: hidden;
            border: 2px solid rgba(9, 11, 9, .14);
            border-radius: 28px;
            background: #fff;
        }

        .merch-card:nth-child(3n + 1) { background: var(--cream); }
        .merch-card:nth-child(3n + 2) { background: var(--sky); }
        .merch-card:nth-child(3n + 3) { background: var(--rose); }

        .merch-card img {
            display: block;
            width: 100%;
            height: 240px;
            object-fit: cover;
        }

        .merch-card-body {
            padding: 18px;
        }

        .merch-card-body h3 {
            margin: 0 0 8px;
            font-size: 20px;
        }

        .merch-card-body p {
            margin: 0;
            color: var(--muted);
            line-height: 1.5;
        }

        .event-chip {
            position: relative;
            flex: 0 0 calc(50% - 8px);
            min-width: 440px;
            min-height: 210px;
            overflow: hidden;
            padding: 30px;
            border: 0;
            border-radius: 28px;
            background: #0a0d0b;
            color: #fff;
            scroll-snap-align: start;
        }

        .event-chip::before,
        .event-chip::after {
            content: "";
            position: absolute;
            inset: 0;
        }

        .event-chip::before {
            background: var(--event-image) center / cover no-repeat;
            transform: scale(1.02);
            transition: transform .22s ease;
        }

        .event-chip::after {
            background: linear-gradient(90deg, rgba(4, 6, 6, .86), rgba(4, 6, 6, .42));
        }

        .event-chip:hover::before {
            transform: scale(1.07);
        }

        .event-chip > * {
            position: relative;
            z-index: 1;
        }

        .event-chip h3 {
            max-width: 480px;
            margin: 0 0 10px;
            font-size: clamp(1.4rem, 2.2vw, 2rem);
            line-height: 1.04;
            color: #fff;
        }

        .event-chip p {
            max-width: 560px;
            margin: 12px 0 0;
            color: rgba(255, 255, 255, .86);
            font-size: 15px;
            line-height: 1.45;
        }

        .event-tag {
            position: absolute;
            z-index: 2;
            top: 24px;
            right: 24px;
            border-radius: 999px;
            padding: 11px 16px;
            background: #d8f6cf;
            color: #1c6b2f;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: .04em;
            text-transform: uppercase;
        }

        .event-meta {
            display: block;
            color: rgba(255, 255, 255, .94);
            font-weight: 700;
        }

        .site-footer {
            margin-top: 18px;
            padding: 44px 22px 34px;
            background: #0a0d0b;
            color: #fff;
        }

        .footer-inner {
            display: grid;
            grid-template-columns: minmax(0, 1fr) auto;
            gap: 24px;
            width: min(1180px, 100%);
            margin: 0 auto;
            align-items: end;
        }

        .footer-inner p {
            max-width: 560px;
            margin: 10px 0 0;
            color: rgba(255, 255, 255, .66);
            line-height: 1.6;
        }

        .footer-links,
        .social-links {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: flex-end;
        }

        .footer-links a,
        .social-links a {
            display: inline-flex;
            min-height: 42px;
            align-items: center;
            border: 1px solid rgba(255, 255, 255, .16);
            border-radius: 999px;
            padding: 0 15px;
            color: rgba(255, 255, 255, .86);
            font-weight: 700;
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

        @media (max-width: 1024px) {
            .site-nav {
                grid-template-columns: 190px 1fr 190px;
            }

            .hero-slide.is-active {
                grid-template-columns: 1fr;
            }

            .hero-slide-media,
            .hero-slide-media img {
                min-height: 300px;
            }

            .hero-strip {
                gap: 12px;
            }

            .category-card { flex-basis: clamp(250px, 40vw, 320px); }

            .content-card { flex-basis: clamp(250px, 40vw, 330px); }
            .story-card { flex-basis: clamp(310px, 56vw, 440px); }

            .merch-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .event-chip { flex-basis: 74vw; }
        }

        @media (max-width: 768px) {
            .site-nav {
                grid-template-columns: 1fr auto;
                width: min(100% - 28px, 720px);
            }

            .nav-links {
                display: none;
            }

            .nav-actions {
                gap: 4px;
            }

            .nav-login {
                display: none;
            }

            .visitor-hero {
                min-height: auto;
                padding-top: 34px;
            }

            .hero-title {
                max-width: 640px;
                padding: 0 18px;
            }

            .hero-copy {
                padding: 0 22px;
            }

            .hero-strip-wrap {
                overflow: visible;
            }

            .hero-strip {
                display: flex;
                width: 100%;
                margin-top: 32px;
                padding: 6px 18px 16px;
                transform: none;
                justify-content: flex-start;
                overflow-x: auto;
                overflow-y: hidden;
                scroll-snap-type: x mandatory;
                scroll-padding-inline: 18px;
                -webkit-overflow-scrolling: touch;
            }

            .hero-strip::-webkit-scrollbar {
                display: none;
            }

            .hero-card {
                flex: 0 0 44vw;
                width: auto;
                min-width: 148px;
                height: clamp(190px, 58vw, 245px);
                scroll-snap-align: start;
                border-radius: 24px;
            }

            .hero-card:nth-child(n) {
                width: auto;
                transform: translateY(0);
            }

            .hero-card:nth-child(2n) {
                transform: translateY(8px);
            }

            .hero-card span {
                opacity: 1;
                transform: none;
                font-size: 10px;
                left: 10px;
                bottom: 10px;
            }

            .category-head,
            .content-head {
                align-items: flex-start;
                flex-direction: column;
            }

            .category-grid {
                gap: 14px;
            }

            .category-card {
                min-height: 280px;
            }

            .content-card {
                flex-basis: 76vw;
                min-height: 300px;
            }

            .story-card {
                flex-basis: 82vw;
                min-height: 350px;
            }

            .category-image {
                height: 165px;
            }

            .hero-carousel {
                width: min(100% - 28px, 720px);
            }

            .hero-slide-panel {
                padding: 26px;
            }

            .hero-dots {
                left: 26px;
                bottom: auto;
                top: 268px;
            }

            .merch-grid,
            .footer-inner {
                grid-template-columns: 1fr;
            }

            .event-chip {
                flex-basis: 86vw;
                min-width: 280px;
            }

            .footer-links {
                justify-content: flex-start;
            }
        }

        @media (max-width: 430px) {
            .site-nav {
                padding-top: 18px;
            }

            .brand span:last-child {
                display: none;
            }

            .hero-pill {
                max-width: calc(100% - 36px);
                font-size: 10px;
            }

            .hero-title {
                font-size: clamp(38px, 11vw, 48px);
            }

            .hero-card {
                flex-basis: 46vw;
            }

            .hero-cta {
                margin-top: 32px;
            }

            .category-card { flex-basis: 78vw; }
        }

        @media (prefers-reduced-motion: reduce) {
            html {
                scroll-behavior: auto;
            }

            .hero-card,
            .hero-card img,
            .hero-card span,
            .hero-cta {
                transition: none;
            }
        }
    </style>
</head>
<body>
    <nav class="site-nav" aria-label="Main navigation">
        <a class="brand" href="/">
            <span class="brand-mark">F+</span>
            <span>Fan Hub Plus</span>
        </a>
        <div class="nav-links" aria-label="Visitor sections">
            <a href="#hero" class="is-active">Home</a>
            <a href="/explore">Explore</a>
            <a href="#trending">Trending</a>
            <a href="/articles">Articles</a>
            <a href="#latest">Latest</a>
            <a href="/characters">Characters</a>
            <a href="/events">Events</a>
        </div>
        <div class="nav-actions">
            <a class="nav-login" href="/user/login">Log in</a>
            <a class="nav-signup" href="/register">Join now</a>
        </div>
    </nav>

    <main>
        <section id="hero" class="visitor-hero" aria-label="Featured Fan Hub Plus carousel">
            <div class="hero-inner">
                <div id="heroCarousel" class="hero-carousel" aria-live="polite"></div>
            </div>
        </section>

        <section id="explore" class="category-section" aria-labelledby="explore-title">
            <div class="category-shell">
                <div class="category-head">
                    <div>
                        <p class="category-kicker">Category Grid</p>
                        <h2 id="explore-title">Choose your fandom lane</h2>
                        <p>Start with a category, then keep building this into a dedicated category page when the next route is ready.</p>
                    </div>
                </div>
                <div id="categoryGrid" class="category-grid" aria-live="polite"></div>
            </div>
        </section>

        <section id="trending" class="content-section section-accent-lime is-tinted trending-band" aria-labelledby="trending-title">
            <div class="category-shell">
                <div class="content-head">
                    <div>
                        <p class="content-kicker">Trending Content</p>
                        <h2 id="trending-title">Popular articles fans keep opening</h2>
                        <p>Sorted by popularity so the most-read stories rise first.</p>
                    </div>
                </div>
                <div id="trendingRow" class="content-row" aria-live="polite"></div>
            </div>
        </section>

        <section id="featured" class="content-section section-accent-rose" aria-labelledby="featured-title">
            <div class="category-shell">
                <div class="content-head">
                    <div>
                        <p class="content-kicker">Featured Articles</p>
                        <h2 id="featured-title">Storytelling picks from Fan Hub Plus</h2>
                        <p>Featured article cards with richer editorial framing.</p>
                    </div>
                </div>
                <div id="featuredRow" class="content-row" aria-live="polite"></div>
            </div>
        </section>

        <section id="latest" class="content-section section-accent-blue is-tinted latest-band" aria-labelledby="latest-title">
            <div class="category-shell">
                <div class="content-head">
                    <div>
                        <p class="content-kicker">Latest News / New Releases</p>
                        <h2 id="latest-title">Fresh from the fandom feed</h2>
                        <p>Newest articles, news and release updates from the connected database.</p>
                    </div>
                </div>
                <div id="latestRow" class="content-row" aria-live="polite"></div>
            </div>
        </section>

        <section class="content-section section-accent-mint" aria-labelledby="characters-title">
            <div class="category-shell">
                <div class="content-head">
                    <div>
                        <p class="content-kicker">Character Spotlight</p>
                        <h2 id="characters-title">Faces fans remember first</h2>
                        <p>A draggable spotlight carousel for character profiles and fandom icons.</p>
                    </div>
                </div>
                <div id="characterRow" class="content-row" aria-live="polite"></div>
            </div>
        </section>

        <section class="content-section section-accent-gold" aria-labelledby="media-title">
            <div class="category-shell">
                <div class="content-head">
                    <div>
                        <p class="content-kicker">Multimedia Preview</p>
                        <h2 id="media-title">Trailers, teasers and watch-now moments</h2>
                        <p>Video-style cards for trailers and multimedia previews from the catalog.</p>
                    </div>
                </div>
                <div id="mediaRow" class="content-row" aria-live="polite"></div>
            </div>
        </section>

        <section class="content-section section-accent-lav" aria-labelledby="merch-title">
            <div class="category-shell">
                <div class="content-head">
                    <div>
                        <p class="content-kicker">Merchandise Showcase</p>
                        <h2 id="merch-title">Collectibles and fan gear</h2>
                        <p>Display-only merchandise grid for figures, hoodies, lightsticks and fan goods.</p>
                    </div>
                </div>
                <div id="merchGrid" class="merch-grid" aria-live="polite"></div>
            </div>
        </section>

        <section id="events" class="content-section section-accent-lime" aria-labelledby="events-title">
            <div class="category-shell">
                <div class="content-head">
                    <div>
                        <p class="content-kicker">Upcoming Events</p>
                        <h2 id="events-title">What fans can join next</h2>
                        <p>A quick strip of upcoming conventions, screenings, watch parties and meetups.</p>
                    </div>
                    <a class="hero-cta" href="/events">View events <i class="fi fi-rr-arrow-right" aria-hidden="true"></i></a>
                </div>
                <div id="eventsStrip" class="content-row" aria-live="polite"></div>
            </div>
        </section>
    </main>

    <footer class="site-footer">
        <div class="footer-inner">
            <div>
                <a class="brand" href="/">
                    <span class="brand-mark">F+</span>
                    <span>Fan Hub Plus</span>
                </a>
                <p>About Fan Hub Plus: a fandom discovery hub for categories, articles, characters, merchandise, events and searchable fan content.</p>
                <p>© {{ date('Y') }} Fan Hub Plus. Visitors can browse; Bookmark, Rate, Submit and Feedback require login.</p>
            </div>
            <div>
                <nav class="footer-links" aria-label="Footer navigation">
                    <a href="/sitemap">Sitemap</a>
                    <a href="/category/anime">Anime</a>
                    <a href="/category/gaming">Gaming</a>
                    <a href="/category/movies">Movies</a>
                    <a href="/category/k-pop">K-Pop</a>
                    <a href="/category/cosplay">Cosplay</a>
                    <a href="/feedback">Feedback</a>
                </nav>
                <nav class="social-links" aria-label="Social links">
                    <a href="#" aria-label="Instagram"><i class="fi fi-rr-camera"></i></a>
                    <a href="#" aria-label="Twitter"><i class="fi fi-rr-comment-alt"></i></a>
                    <a href="#" aria-label="YouTube"><i class="fi fi-rr-play-alt"></i></a>
                </nav>
            </div>
        </div>
    </footer>
    <script>
        (() => {
            const fallbackCategories = [
                { name: 'Anime', slug: 'anime', icon_url: '/assets/images/hero section/hero-anime.jfif', description: 'Characters, trailers and story worlds.' },
                { name: 'Gaming', slug: 'gaming', icon_url: '/assets/images/hero section/hero-gaming.jfif', description: 'Guides, reveals and playable universes.' },
                { name: 'Movies', slug: 'movies', icon_url: '/assets/images/hero section/hero-movies.jfif', description: 'Premieres, reviews and cinematic fandoms.' },
                { name: 'TV Shows', slug: 'tv-shows', icon_url: '/assets/images/hero section/hero-tv.jfif', description: 'Episodes, recaps and fan theories.' },
                { name: 'K-Pop', slug: 'k-pop', icon_url: '/assets/images/hero section/hero-kpop.jfif', description: 'Comebacks, artists and watch parties.' },
                { name: 'Comics', slug: 'comics', icon_url: '/assets/images/hero section/hero-comics.jfif', description: 'Heroes, arcs and collectible drops.' },
                { name: 'Manga', slug: 'manga', icon_url: '/assets/images/hero section/hero-anime.jfif', description: 'Chapters, panels and long-running sagas.' },
                { name: 'Cosplay', slug: 'cosplay', icon_url: '/assets/images/hero section/hero-cosplay.jfif', description: 'Looks, conventions and creative builds.' },
            ];
            const fallbackContent = [
                { item_type: 'article', item_id: 1, title: 'Demon Slayer Season 4 Trailer', fandom_name: 'Anime', description: 'A fan-first breakdown of the new trailer, character beats and release clues.', thumbnail_url: '/assets/images/Content/Demon Slayer Season 4 Trailer.jfif', popularity_score: 98 },
                { item_type: 'article', item_id: 2, title: 'BLACKPINK Comeback Teaser', fandom_name: 'K-Pop', description: 'The visuals, styling and fan theories behind the latest comeback teaser.', thumbnail_url: '/assets/images/Content/BLACKPINK Comeback Teaser.jfif', popularity_score: 94 },
                { item_type: 'article', item_id: 3, title: 'Dune Part 3 First Look', fandom_name: 'Movies', description: 'A cinematic first look at the next chapter and what fans are watching closely.', thumbnail_url: '/assets/images/Content/Dune Part 3 First Look.jfif', popularity_score: 90 },
                { item_type: 'article', item_id: 4, title: 'One Piece Chapter 1120 Review', fandom_name: 'Manga', description: 'Key chapter moments, character turns and the theories gaining traction.', thumbnail_url: '/assets/images/Content/One Piece Chapter 1120 Review.jfif', popularity_score: 88 },
                { item_type: 'article', item_id: 5, title: 'Best Cosplays from Comic-Con 2026', fandom_name: 'Cosplay', description: 'A colorful roundup of standout cosplay looks and fandom craft.', thumbnail_url: '/assets/images/Content/Best Cosplays from Comic-Con 2026.jfif', popularity_score: 86 },
                { item_type: 'article', item_id: 6, title: 'Spider-Man New Villain Arc', fandom_name: 'Comics', description: 'What the newest villain arc means for the wider Spider-Man universe.', thumbnail_url: '/assets/images/Content/Spider-Man New Villain Arc.jfif', popularity_score: 84 },
            ];
            const fallbackCharacters = [
                { item_type: 'character', item_id: 1, name: 'Tanjiro Kamado', fandom_name: 'Anime', description: 'A brave demon slayer with a soft heart and sharp instincts.', image_url: '/assets/images/Character profiles/Tanjiro Kamado.jfif', popularity_score: 97 },
                { item_type: 'character', item_id: 2, name: 'Jisoo Park', fandom_name: 'K-Pop', description: 'Stage presence, style notes and fandom moments in one profile.', image_url: '/assets/images/Character profiles/Jisoo Park.jfif', popularity_score: 93 },
                { item_type: 'character', item_id: 3, name: 'Ellie Williams', fandom_name: 'Gaming', description: 'A survivor story with emotional weight and iconic scenes.', image_url: '/assets/images/Character profiles/Ellie Williams.jfif', popularity_score: 91 },
                { item_type: 'character', item_id: 4, name: 'Miles Morales', fandom_name: 'Comics', description: 'The Spider-Verse hero fans keep returning to.', image_url: '/assets/images/Character profiles/Miles Morales.jfif', popularity_score: 89 },
                { item_type: 'character', item_id: 5, name: 'Aloy', fandom_name: 'Gaming', description: 'Machine hunter, explorer and sci-fi fantasy icon.', image_url: '/assets/images/Character profiles/Aloy.jfif', popularity_score: 86 },
            ];
            const fallbackMedia = [
                { item_type: 'media', item_id: 1, title: 'Demon Slayer Trailer Video', fandom_name: 'Anime', description: 'Watch the newest battle shots and emotional setup.', thumbnail_url: '/assets/images/Content/Demon Slayer Season 4 Trailer.jfif', media_url: '/assets/images/Content/Demon slayer trailer Video.mp4' },
                { item_type: 'media', item_id: 2, title: 'BLACKPINK Comeback Teaser Video', fandom_name: 'K-Pop', description: 'A quick look at styling, rhythm and comeback energy.', thumbnail_url: '/assets/images/Content/BLACKPINK Comeback Teaser.jfif', media_url: '/assets/images/Content/Black Pink comeback Teaser video.mp4' },
                { item_type: 'media', item_id: 3, title: 'Dune Trailer Preview', fandom_name: 'Movies', description: 'Cinematic scale, sand worlds and new story clues.', thumbnail_url: '/assets/images/Content/Dune Part 3 First Look.jfif', media_url: '/assets/images/Content/Dune trailer Video.mp4' },
            ];
            const fallbackMerch = [
                { item_type: 'merchandise', item_id: 1, name: 'Spider-Man Hoodie', fandom_name: 'Comics', description: 'Cozy streetwear for web-slinger fans.', image_url: '/assets/images/Merchandise/Spider-Man Hoodie.jfif' },
                { item_type: 'merchandise', item_id: 2, name: 'Nezuko Figure', fandom_name: 'Anime', description: 'Display figure for Demon Slayer collectors.', image_url: '/assets/images/Merchandise/Nezuko Figure.jfif' },
                { item_type: 'merchandise', item_id: 3, name: 'BLACKPINK Lightstick', fandom_name: 'K-Pop', description: 'Concert-ready fan gear for BLINKs.', image_url: '/assets/images/Merchandise/BLACKPINK Lightstick.jfif' },
            ];
            const fallbackEvents = [
                { title: 'Fan Hub Convention 2026', event_type: 'convention', location: 'Lahore', fandom_name: 'Anime', starts_at: '2026-10-10T11:00:00Z', poster_url: '/assets/images/hero section/hero-kpop.jfif' },
                { title: 'Dune Part 3 Premiere Night', event_type: 'premiere', location: 'Karachi', fandom_name: 'Movies', starts_at: '2026-10-11T11:00:00Z', poster_url: '/assets/images/hero section/hero-cosplay.jfif' },
                { title: 'BLACKPINK Release Watch Party', event_type: 'release', location: 'Islamabad', fandom_name: 'K-Pop', starts_at: '2026-10-12T18:00:00Z', poster_url: '/assets/images/hero section/hero-anime.jfif' },
                { title: 'Comic-Con Cosplay Meetup', event_type: 'meetup', location: 'Lahore', fandom_name: 'Cosplay', starts_at: '2026-10-13T15:00:00Z', poster_url: '/assets/images/hero section/hero-movies.jfif' },
                { title: 'One Piece Screening Day', event_type: 'screening', location: 'Karachi', fandom_name: 'Manga', starts_at: '2026-10-14T18:00:00Z', poster_url: '/assets/images/hero section/hero-gaming.jfif' },
            ];
            const wanted = ['anime', 'gaming', 'movies', 'tv-shows', 'tv', 'k-pop', 'kpop', 'comics', 'manga', 'cosplay'];
            const colors = ['var(--sky)', 'var(--mint)', 'var(--peach)', 'var(--lav)', 'var(--rose)', 'var(--cream)', 'var(--blue)', 'var(--gold)'];
            const icons = {
                anime: 'sparkles',
                gaming: 'gamepad',
                movies: 'play-alt',
                'tv-shows': 'screen',
                tv: 'screen',
                'k-pop': 'music-alt',
                kpop: 'music-alt',
                comics: 'book-alt',
                manga: 'book-open-cover',
                cosplay: 'mask-carnival',
            };
            const fallbackByName = new Map(fallbackCategories.map(item => [item.name.toLowerCase(), item]));
            const slugify = value => String(value || '').toLowerCase().trim().replace(/&/g, 'and').replace(/[^a-z0-9]+/g, '-').replace(/^-|-$/g, '');
            const publicUrl = value => String(value || '').replace('/storage/', '/media/');
            const escapeHtml = value => String(value ?? '').replace(/[&<>'"]/g, character => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', "'": '&#39;', '"': '&quot;' }[character]));
            const itemTitle = row => row.title || row.name || row.content_title || 'Untitled story';
            const itemImage = row => publicUrl(row.thumbnail_url || row.cover_image_url || row.image_url || row.media_thumbnail || '/assets/images/hero section/hero-anime.jfif');
            const itemType = row => String(row.item_type || row.content_type || 'article').replaceAll('_', ' ');
            const itemHref = row => {
                const type = row.item_type || 'article';
                const id = row.item_id || row.id || 0;
                if (type === 'character') return `/character/${encodeURIComponent(id)}`;
                if (type === 'article') return `/article/${encodeURIComponent(id)}`;
                if (type === 'merchandise') return `/merchandise/${encodeURIComponent(id)}`;
                return `/content/${encodeURIComponent(id)}`;
            };
            const getDataRows = (json, fallback) => Array.isArray(json.data?.data) ? json.data.data : Array.isArray(json.data) ? json.data : Array.isArray(json.events) ? json.events : fallback;
            const shortDate = value => {
                if (!value) return 'Coming soon';
                const date = new Date(value);
                if (Number.isNaN(date.getTime())) return String(value).slice(0, 16);
                return date.toLocaleDateString(undefined, { month: 'short', day: 'numeric', year: 'numeric' });
            };
            const loadJson = (url, fallback, renderFn) => {
                fetch(url, { headers: { Accept: 'application/json' } })
                    .then(response => response.ok ? response.json() : Promise.reject())
                    .then(json => renderFn(getDataRows(json, fallback)))
                    .catch(() => renderFn(fallback));
            };
            const normalize = row => {
                const name = row.name || 'Category';
                const slug = row.slug || slugify(name);
                const fallback = fallbackByName.get(name.toLowerCase()) || fallbackCategories.find(item => item.slug === slug) || {};
                return {
                    id: row.category_id || row.id || slug,
                    name,
                    slug,
                    description: row.description || fallback.description || 'Explore fandom stories, media and collectibles.',
                    icon_url: publicUrl(row.icon_url || fallback.icon_url || '/assets/images/hero section/hero-anime.jfif'),
                };
            };
            const pickCategories = rows => {
                const normalized = rows.map(normalize);
                const bySlug = new Map(normalized.map(item => [slugify(item.slug || item.name), item]));
                const selected = [];
                wanted.forEach(slug => {
                    if (selected.length >= 8) return;
                    const item = bySlug.get(slug);
                    if (item && !selected.some(existing => existing.id === item.id || slugify(existing.name) === slugify(item.name))) selected.push(item);
                });
                normalized.forEach(item => {
                    if (selected.length < 8 && !selected.some(existing => existing.id === item.id || slugify(existing.name) === slugify(item.name))) selected.push(item);
                });
                fallbackCategories.forEach(item => {
                    if (selected.length < 8 && !selected.some(existing => slugify(existing.name) === slugify(item.name))) selected.push(normalize(item));
                });
                return selected.slice(0, 8);
            };
            const render = rows => {
                const host = document.querySelector('#categoryGrid');
                if (!host) return;
                host.innerHTML = pickCategories(rows).map((item, index) => {
                    const slug = slugify(item.slug || item.name);
                    const href = `/category/${encodeURIComponent(slug)}`;
                    const icon = icons[slug] || 'folder';
                    return `<a class="category-card" href="${escapeHtml(href)}" style="--card-color:${colors[index % colors.length]}"><article class="category-card-inner"><div class="category-image"><img src="${escapeHtml(item.icon_url)}" alt="${escapeHtml(item.name)} category image" loading="lazy"><span class="category-pill"><i class="fi fi-rr-${icon}" aria-hidden="true"></i>${escapeHtml(item.name)}</span></div><div class="category-body"><div><h3>${escapeHtml(item.name)}</h3><p>${escapeHtml(item.description)}</p></div><div class="category-meta"><span><i class="fi fi-rr-star" aria-hidden="true"></i>Explore</span><i class="fi fi-rr-arrow-right" aria-hidden="true"></i></div></div></article></a>`;
                }).join('');
                enableDragSlider(host);
            };
            const renderContentRow = (selector, rows, options = {}) => {
                const host = document.querySelector(selector);
                if (!host) return;
                const list = (Array.isArray(rows) && rows.length ? rows : fallbackContent).slice(0, options.limit || 10);
                host.innerHTML = list.map((item, index) => {
                    const title = itemTitle(item);
                    const description = item.description || item.excerpt || item.body_html || 'Explore this Fan Hub Plus story from the connected content library.';
                    const color = colors[index % colors.length];
                    const cls = options.character ? 'content-card character-card' : options.story ? 'content-card story-card' : 'content-card';
                    return `<a class="${cls}" href="${escapeHtml(itemHref(item))}" style="--card-color:${color}"><article><div class="content-image"><img src="${escapeHtml(itemImage(item))}" alt="${escapeHtml(title)} image" loading="lazy"></div><div class="content-body"><span class="content-type"><i class="fi fi-rr-document" aria-hidden="true"></i>${escapeHtml(itemType(item))}</span><h3>${escapeHtml(title)}</h3><p>${escapeHtml(String(description).replace(/<[^>]*>/g, '').slice(0, 180))}</p><div class="content-meta"><span>${escapeHtml(item.fandom_name || item.genre || 'Fan Hub Plus')}</span><span>${escapeHtml(item.popularity_score ? `${item.popularity_score} pts` : 'Read more')} <i class="fi fi-rr-arrow-right" aria-hidden="true"></i></span></div></div></article></a>`;
                }).join('');
                enableDragSlider(host);
            };
            const renderHeroCarousel = rows => {
                const host = document.querySelector('#heroCarousel');
                if (!host) return;
                const list = (Array.isArray(rows) && rows.length ? rows : fallbackContent).slice(0, 3);
                host.innerHTML = `${list.map((item, index) => {
                    const title = itemTitle(item);
                    const description = item.description || item.excerpt || 'A featured Fan Hub Plus pick from today’s fandom feed.';
                    return `<article class="hero-slide ${index === 0 ? 'is-active' : ''}" data-slide="${index}"><div class="hero-slide-media"><img src="${escapeHtml(itemImage(item))}" alt="${escapeHtml(title)} featured image"></div><div class="hero-slide-panel"><span class="hero-pill">${escapeHtml(item.fandom_name || itemType(item))}</span><h2>${escapeHtml(title)}</h2><p>${escapeHtml(String(description).replace(/<[^>]*>/g, '').slice(0, 190))}</p><div class="hero-actions"><a class="hero-action primary" href="#explore">Explore <i class="fi fi-rr-arrow-right" aria-hidden="true"></i></a><a class="hero-action secondary" href="/register">Sign Up</a></div></div></article>`;
                }).join('')}<div class="hero-dots">${list.map((_, index) => `<button class="hero-dot ${index === 0 ? 'is-active' : ''}" type="button" aria-label="Show featured slide ${index + 1}" data-dot="${index}"></button>`).join('')}</div>`;
                const slides = [...host.querySelectorAll('.hero-slide')];
                const dots = [...host.querySelectorAll('.hero-dot')];
                const show = index => {
                    slides.forEach((slide, slideIndex) => slide.classList.toggle('is-active', slideIndex === index));
                    dots.forEach((dot, dotIndex) => dot.classList.toggle('is-active', dotIndex === index));
                };
                dots.forEach(dot => dot.addEventListener('click', () => show(Number(dot.dataset.dot || 0))));
                let active = 0;
                window.setInterval(() => {
                    if (!document.hasFocus()) return;
                    active = (active + 1) % Math.max(slides.length, 1);
                    show(active);
                }, 5200);
            };
            const renderMediaRow = rows => {
                const host = document.querySelector('#mediaRow');
                if (!host) return;
                const list = (Array.isArray(rows) && rows.length ? rows : fallbackMedia).slice(0, 8);
                host.innerHTML = list.map((item, index) => {
                    const title = itemTitle(item);
                    const description = item.description || 'Preview this trailer or video from Fan Hub Plus.';
                    return `<a class="content-card media-card" href="${escapeHtml(publicUrl(item.media_url || itemHref(item)))}" style="--card-color:${colors[index % colors.length]}"><article><div class="content-image"><img src="${escapeHtml(itemImage(item))}" alt="${escapeHtml(title)} thumbnail" loading="lazy"></div><span class="play-badge"><i class="fi fi-rr-play" aria-hidden="true"></i></span><div class="content-body"><span class="content-type"><i class="fi fi-rr-play-alt" aria-hidden="true"></i>Trailer</span><h3>${escapeHtml(title)}</h3><p>${escapeHtml(String(description).replace(/<[^>]*>/g, '').slice(0, 150))}</p></div></article></a>`;
                }).join('');
                enableDragSlider(host);
            };
            const renderMerchGrid = rows => {
                const host = document.querySelector('#merchGrid');
                if (!host) return;
                const list = (Array.isArray(rows) && rows.length ? rows : fallbackMerch).slice(0, 6);
                host.innerHTML = list.map(item => {
                    const title = itemTitle(item);
                    const description = item.description || 'Display-only fandom merchandise from the Fan Hub Plus catalog.';
                    return `<article class="merch-card"><img src="${escapeHtml(itemImage(item))}" alt="${escapeHtml(title)} image" loading="lazy"><div class="merch-card-body"><span class="content-type"><i class="fi fi-rr-shopping-bag" aria-hidden="true"></i>${escapeHtml(item.fandom_name || 'Merch')}</span><h3>${escapeHtml(title)}</h3><p>${escapeHtml(String(description).replace(/<[^>]*>/g, '').slice(0, 130))}</p></div></article>`;
                }).join('');
            };
            const renderEventsStrip = rows => {
                const host = document.querySelector('#eventsStrip');
                if (!host) return;
                const list = (Array.isArray(rows) && rows.length ? rows : fallbackEvents).slice(0, 5);
                host.innerHTML = list.map((event, index) => {
                    const title = event.title || event.name || 'Fan Hub Plus Event';
                    const type = event.event_type || event.type || 'event';
                    const city = event.location || event.city || 'Online';
                    const image = publicUrl(event.poster_url || event.image_url || event.thumbnail_url || fallbackEvents[index % fallbackEvents.length]?.poster_url || '/assets/images/hero section/hero-anime.jfif').replace(/["\\]/g, '');
                    const fandom = event.fandom_name || event.category_name || 'Fan Hub Plus';
                    return `<article class="event-chip" style="--event-image:url('${escapeHtml(image)}')"><span class="event-tag">Upcoming</span><h3>${escapeHtml(title)}</h3><span class="event-meta">${escapeHtml(type)} · ${escapeHtml(city)}</span><p>A Fan Hub Plus community event for fans to discover, discuss and celebrate ${escapeHtml(fandom)}.</p><p>${escapeHtml(shortDate(event.starts_at || event.event_date || event.date))}, 11:00 AM</p></article>`;
                }).join('');
                enableDragSlider(host);
            };
            const loadExploreRow = (selector, query, fallback, options = {}) => {
                fetch(`/visitor/api/explore?${query}`, { headers: { Accept: 'application/json' } })
                    .then(response => response.ok ? response.json() : Promise.reject())
                    .then(json => renderContentRow(selector, getDataRows(json, fallback), options))
                    .catch(() => renderContentRow(selector, fallback, options));
            };
            const enableDragSlider = slider => {
                if (slider.dataset.sliderReady) return;
                slider.dataset.sliderReady = '1';
                let isDown = false;
                let startX = 0;
                let startY = 0;
                let startScroll = 0;
                let startTime = 0;
                let moved = false;
                slider.addEventListener('pointerdown', event => {
                    isDown = true;
                    moved = false;
                    startX = event.clientX;
                    startY = event.clientY;
                    startScroll = slider.scrollLeft;
                    startTime = performance.now();
                    slider.classList.add('is-dragging');
                    slider.setPointerCapture?.(event.pointerId);
                });
                slider.addEventListener('pointermove', event => {
                    if (!isDown) return;
                    const distanceX = event.clientX - startX;
                    const distanceY = event.clientY - startY;
                    if (Math.abs(distanceX) > 14 && Math.abs(distanceX) > Math.abs(distanceY)) moved = true;
                    if (moved) slider.scrollLeft = startScroll - distanceX;
                });
                const stop = event => {
                    if (!isDown) return;
                    if (performance.now() - startTime < 200) moved = false;
                    isDown = false;
                    slider.classList.remove('is-dragging');
                    slider.releasePointerCapture?.(event.pointerId);
                };
                slider.addEventListener('pointerup', stop);
                slider.addEventListener('pointercancel', stop);
                slider.addEventListener('mouseleave', stop);
                slider.addEventListener('click', event => {
                    if (!moved) return;
                    event.preventDefault();
                    event.stopPropagation();
                    moved = false;
                }, true);
            };
            fetch('/visitor/api/categories', { headers: { Accept: 'application/json' } })
                .then(response => response.ok ? response.json() : Promise.reject())
                .then(json => render(Array.isArray(json.data) ? json.data : fallbackCategories))
                .catch(() => render(fallbackCategories));
            loadExploreRow('#trendingRow', 'item_type=article&sort=popular&per_page=12', fallbackContent);
            loadExploreRow('#latestRow', 'sort=latest&per_page=12', fallbackContent.slice().reverse());
            loadExploreRow('#featuredRow', 'item_type=article&is_featured=1&sort=latest&per_page=8', fallbackContent.slice(0, 4), { story: true, limit: 8 });
            loadJson('/visitor/api/explore?is_featured=1&sort=popular&per_page=3', fallbackContent.slice(0, 3), renderHeroCarousel);
            loadExploreRow('#characterRow', 'item_type=character&sort=popular&per_page=10', fallbackCharacters, { limit: 10, character: true });
            loadJson('/visitor/api/explore?item_type=media&sort=latest&per_page=8', fallbackMedia, renderMediaRow);
            loadJson('/visitor/api/explore?item_type=merchandise&sort=latest&per_page=6', fallbackMerch, renderMerchGrid);
            loadJson('/visitor/api/events?per_page=5', fallbackEvents, renderEventsStrip);
            const navLinks = [...document.querySelectorAll('.nav-links a[href^="#"]')];
            const navSections = navLinks.map(link => document.querySelector(link.getAttribute('href'))).filter(Boolean);
            const setActiveNav = () => {
                const current = navSections.reduce((active, section) => {
                    const rect = section.getBoundingClientRect();
                    return rect.top <= 160 ? section.id : active;
                }, navSections[0]?.id || '');
                navLinks.forEach(link => link.classList.toggle('is-active', link.getAttribute('href') === `#${current}`));
            };
            window.addEventListener('scroll', setActiveNav, { passive: true });
            setActiveNav();
        })();
    </script>
</body>
</html>
