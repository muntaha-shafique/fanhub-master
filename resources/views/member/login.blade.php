@php
    $mode = $mode ?? 'login';
    $token = $token ?? null;
    $titles = [
        'login' => ['Welcome back', 'Sign in to continue your fandom journey.'],
        'register' => ['Create your fan account', 'Join Fan Hub Plus to bookmark, rate, submit and personalize your fandom feed.'],
        'forgot' => ['Reset access', 'Enter your email and we will send a password reset link.'],
        'reset' => ['Choose a new password', 'Create a fresh password for your Fan Hub Plus member account.'],
    ];
@endphp
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Fan Hub Plus — Member {{ ucfirst($mode) }}</title>
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css">
    <link rel="stylesheet" href="/member/assets/css/member.css">
</head>
<body class="member-login">
    <main class="member-login-shell">
        <section class="member-login-visual" aria-label="Fan Hub Plus member preview">
            <a class="member-brand" href="/"><span class="brand-mark">F+</span><span>Fan Hub Plus</span></a>
            <p class="login-kicker">Member universe</p>
            <h1>Browse as visitor. Unlock everything as member.</h1>
            <p>Bookmarks, ratings, feedback and fan submissions stay protected behind registered member access.</p>
            <div class="login-mini-grid">
                <span><i class="fi fi-rr-bookmark"></i> Bookmarks</span>
                <span><i class="fi fi-rr-star"></i> Ratings</span>
                <span><i class="fi fi-rr-edit"></i> Submissions</span>
                <span><i class="fi fi-rr-comment"></i> Feedback</span>
            </div>
        </section>

        <form id="memberLoginForm" class="member-login-card" data-mode="{{ $mode }}" data-token="{{ $token }}">
            <div class="auth-switch" aria-label="Member auth options">
                <a class="{{ $mode === 'login' ? 'active' : '' }}" href="/user/login"><i class="fi fi-rr-sign-in-alt"></i> Login</a>
                <a class="{{ $mode === 'register' ? 'active' : '' }}" href="/register"><i class="fi fi-rr-user-add"></i> Register</a>
            </div>
            <p class="eyebrow">{{ $mode === 'register' ? 'New member' : 'Registered member' }}</p>
            <h2>{{ $titles[$mode][0] ?? $titles['login'][0] }}</h2>
            <p>{{ $titles[$mode][1] ?? $titles['login'][1] }}</p>
            @if(session('message'))<p class="login-notice">{{ session('message') }}</p>@endif
            @if($mode === 'register')
                <label>Name<input type="text" name="name" required autocomplete="name" placeholder="Your name"></label>
            @endif
            @if($mode !== 'reset')
                <label>Email<input type="email" name="email" value="{{ $mode === 'login' ? 'sara.member@fanhubplus.test' : '' }}" required autocomplete="username" placeholder="member@example.com"></label>
            @endif
            @if(in_array($mode, ['login', 'register', 'reset'], true))
                <label>Password<input type="password" name="password" value="{{ $mode === 'login' ? 'password' : '' }}" required autocomplete="{{ $mode === 'register' ? 'new-password' : 'current-password' }}" placeholder="••••••••"></label>
            @endif
            @if($mode === 'reset')
                <label>Confirm password<input type="password" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••"></label>
            @endif
            <p id="memberLoginError" class="login-error" role="alert"></p>
            <button class="member-primary" type="submit">
                <i class="fi {{ $mode === 'register' ? 'fi-rr-user-add' : 'fi-rr-sign-in-alt' }}"></i>
                {{ $mode === 'register' ? 'Create account' : ($mode === 'forgot' ? 'Send reset link' : ($mode === 'reset' ? 'Reset password' : 'Sign in')) }}
            </button>
            <p class="auth-helper">
                @if($mode === 'login')
                    <a href="/forgot-password">Forgot password?</a> · <a href="/register">Need an account?</a>
                @elseif($mode === 'register')
                    <a href="/user/login">Already registered?</a>
                @else
                    <a href="/user/login">Back to member login</a>
                @endif
            </p>
        </form>
    </main>
    <script src="/member/assets/js/member-login.js"></script>
</body>
</html>
