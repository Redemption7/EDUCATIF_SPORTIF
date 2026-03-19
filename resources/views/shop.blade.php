<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jerseys Shop - NK EDUCATIF SPORTIF</title>
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-orange: #FF7A59;
            --primary-green: #1D5944;
            --accent-yellow: #FFD93D;
            --dark-navy: #0F1419;
            --light-gray: #F5F7FA;
            --text-dark: #1a1a1a;
            --text-light: #666;
        }

        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
            background: #fff;
            overflow-x: hidden;
        }

        h1, h2, h3 {
            font-family: 'Playfair Display', serif;
            color: var(--text-dark);
        }

        /* Navigation */
        nav {
            background: white;
            padding: 1.2rem 2rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            position: sticky;
            top: 0;
            z-index: 1000;
            transition: all 0.3s;
        }

        nav .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1400px;
            margin: 0 auto;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .logo a {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            text-decoration: none;
        }

        .logo h1 {
            font-size: 1.3rem;
            font-weight: 700;
            background: linear-gradient(135deg, var(--primary-green), var(--primary-orange));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: -0.5px;
        }

        nav ul {
            display: flex;
            list-style: none;
            gap: 2.5rem;
            align-items: center;
        }

        nav a {
            text-decoration: none;
            color: var(--text-dark);
            font-weight: 500;
            font-size: 0.95rem;
            transition: color 0.3s;
            position: relative;
        }

        nav a:hover {
            color: var(--primary-orange);
        }

        /* Language dropdown */
        .lang-dropdown-wrapper { position: relative; }
        .lang-dropdown { position: relative; }
        .lang-dropdown-toggle {
            display: flex; align-items: center; gap: 0.4rem;
            padding: 6px 12px; background: var(--light-gray); border: 1px solid #e0e0e0;
            border-radius: 8px; cursor: pointer; font-size: 0.9rem; font-weight: 500;
            color: var(--text-dark); font-family: inherit;
        }
        .lang-dropdown-toggle:hover { background: #eee; border-color: var(--primary-green); }
        .lang-icon { font-size: 1.1rem; }
        .lang-arrow { font-size: 0.65rem; opacity: 0.8; }
        .lang-dropdown-menu {
            display: none; position: absolute; top: 100%; right: 0; margin-top: 4px;
            min-width: 160px; background: white; border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.12); list-style: none; padding: 6px 0; z-index: 1100;
        }
        .lang-dropdown:hover .lang-dropdown-menu { display: block; }
        .lang-dropdown-menu a { display: block; padding: 10px 16px; color: var(--text-dark); text-decoration: none; font-size: 0.9rem; }
        .lang-dropdown-menu a:hover, .lang-dropdown-menu a.active { background: var(--light-gray); color: var(--primary-orange); }

        nav a.active {
            color: var(--primary-orange);
        }

        nav a.active::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 100%;
            height: 2px;
            background: var(--primary-orange);
            border-radius: 1px;
        }

        .menu-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 1.8rem;
            cursor: pointer;
            color: var(--primary-green);
        }

        /* Shop Hero */
        .shop-hero {
            background: linear-gradient(135deg, var(--primary-green), var(--dark-navy));
            color: white;
            padding: 4rem 2rem;
            text-align: center;
        }

        .shop-hero h1 {
            font-size: 3rem;
            color: white;
            margin-bottom: 0.5rem;
        }

        .shop-hero p {
            font-size: 1.1rem;
            opacity: 0.85;
            max-width: 600px;
            margin: 0 auto;
        }

        /* Category Section */
        .category-section {
            padding: 3rem 2rem;
            max-width: 1400px;
            margin: 0 auto;
        }

        .category-section:nth-child(even) {
            background: var(--light-gray);
        }

        .category-section:nth-child(even) .category-wrapper {
            max-width: 1400px;
            margin: 0 auto;
        }

        .category-title {
            font-size: 2rem;
            margin-bottom: 2rem;
            padding-bottom: 0.75rem;
            border-bottom: 3px solid var(--primary-orange);
            display: inline-block;
        }

        /* Jersey Grid */
        .jersey-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.5rem;
        }

        .jersey-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            transition: transform 0.3s, box-shadow 0.3s;
            cursor: pointer;
        }

        .jersey-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .jersey-card .img-wrapper {
            width: 100%;
            height: 250px;
            background: #f8f8f8;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .jersey-card .img-wrapper.loading::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: linear-gradient(90deg, #f0f0f0 25%, #fafafa 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: jersey-shimmer 1.5s infinite;
            z-index: 1;
        }

        @keyframes jersey-shimmer {
            0% { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }

        .jersey-card .img-wrapper .placeholder-icon {
            display: none;
            width: 60px;
            height: 60px;
            opacity: 0.3;
        }

        .jersey-card .img-wrapper.error .placeholder-icon {
            display: block;
        }

        .jersey-card .img-wrapper.error img {
            display: none;
        }

        .jersey-card img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            display: block;
            padding: 10px;
        }

        .jersey-card .card-body {
            padding: 1rem 1.2rem;
            text-align: center;
        }

        .jersey-card .card-body h3 {
            font-family: 'Poppins', sans-serif;
            font-size: 0.95rem;
            font-weight: 600;
            color: var(--text-dark);
        }

        /* Footer */
        footer {
            background: var(--dark-navy);
            color: white;
            text-align: center;
            padding: 2rem;
            margin-top: 3rem;
        }

        footer p {
            opacity: 0.7;
            font-size: 0.9rem;
        }

        footer a {
            color: var(--primary-orange);
            text-decoration: none;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .jersey-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 768px) {
            .menu-toggle {
                display: block;
            }

            nav ul {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: white;
                flex-direction: column;
                padding: 1rem 2rem;
                gap: 1rem;
                box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            }

            nav ul.active {
                display: flex;
            }

            .jersey-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .shop-hero h1 {
                font-size: 2rem;
            }

            .category-title {
                font-size: 1.5rem;
            }
        }

        @media (max-width: 480px) {
            .jersey-card .img-wrapper {
                height: 200px;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav>
        <div class="container">
            <div class="logo">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="NKES logo" style="height:40px;" />
                    <h1>NK EDUCATIF SPORTIF</h1>
                </a>
            </div>
            <button class="menu-toggle" onclick="toggleMenu()">☰</button>
            <ul>
                <li><a href="{{ route('home') }}">{{ __('messages.nav_home') }}</a></li>
                <li><a href="{{ route('shop') }}" class="active">{{ __('messages.nav_shop') }}</a></li>
                @include('partials.language-switcher')
                @auth
                    <li><a href="{{ route('admin.dashboard') }}" style="background: var(--primary-orange); padding: 8px 16px; border-radius: 25px; color: white !important;">{{ __('messages.nav_dashboard') }}</a></li>
                @else
                    <li><a href="{{ route('login') }}" style="background: var(--primary-green); padding: 8px 16px; border-radius: 25px; color: white !important;">{{ __('messages.nav_login') }}</a></li>
                @endauth
            </ul>
        </div>
    </nav>

    <!-- Shop Hero -->
    <section class="shop-hero">
        <h1>{{ __('messages.shop_title') }}</h1>
        <p>{{ __('messages.shop_subtitle') }}</p>
    </section>

    <!-- School Jerseys -->
    <section class="category-section">
        <h2 class="category-title">{{ __('messages.school_jerseys') }}</h2>
        <div class="jersey-grid">
            @foreach($jerseys['school'] as $jersey)
                <div class="jersey-card">
                    <div class="img-wrapper loading">
                        <img src="{{ asset($jersey['image']) }}" alt="{{ $jersey['name'] }}"
                             onload="this.parentElement.classList.remove('loading')"
                             onerror="this.parentElement.classList.remove('loading'); this.parentElement.classList.add('error')">
                        <svg class="placeholder-icon" viewBox="0 0 24 24" fill="#999">
                            <path d="M19.5 6h-3l-1.5-1.5h-6L7.5 6h-3C3.7 6 3 6.7 3 7.5v10.5c0 .8.7 1.5 1.5 1.5h15c.8 0 1.5-.7 1.5-1.5V7.5c0-.8-.7-1.5-1.5-1.5zM12 16.5c-2.5 0-4.5-2-4.5-4.5s2-4.5 4.5-4.5 4.5 2 4.5 4.5-2 4.5-4.5 4.5z"/>
                        </svg>
                    </div>
                    <div class="card-body">
                        <h3>{{ $jersey['name'] }}</h3>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Province Jerseys -->
    <section class="category-section" style="background: var(--light-gray);">
        <div class="category-wrapper" style="max-width: 1400px; margin: 0 auto;">
            <h2 class="category-title">{{ __('messages.province_jerseys') }}</h2>
            <div class="jersey-grid">
                @foreach($jerseys['province'] as $jersey)
                    <div class="jersey-card">
                        <div class="img-wrapper loading">
                        <img src="{{ asset($jersey['image']) }}" alt="{{ $jersey['name'] }}"
                             onload="this.parentElement.classList.remove('loading')"
                             onerror="this.parentElement.classList.remove('loading'); this.parentElement.classList.add('error')">
                        <svg class="placeholder-icon" viewBox="0 0 24 24" fill="#999">
                            <path d="M19.5 6h-3l-1.5-1.5h-6L7.5 6h-3C3.7 6 3 6.7 3 7.5v10.5c0 .8.7 1.5 1.5 1.5h15c.8 0 1.5-.7 1.5-1.5V7.5c0-.8-.7-1.5-1.5-1.5zM12 16.5c-2.5 0-4.5-2-4.5-4.5s2-4.5 4.5-4.5 4.5 2 4.5 4.5-2 4.5-4.5 4.5z"/>
                        </svg>
                    </div>
                        <div class="card-body">
                            <h3>{{ $jersey['name'] }}</h3>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- International Jerseys -->
    <section class="category-section">
        <h2 class="category-title">{{ __('messages.international_jerseys') }}</h2>
        <div class="jersey-grid">
            @foreach($jerseys['international'] as $jersey)
                <div class="jersey-card">
                    <div class="img-wrapper loading">
                        <img src="{{ asset($jersey['image']) }}" alt="{{ $jersey['name'] }}"
                             onload="this.parentElement.classList.remove('loading')"
                             onerror="this.parentElement.classList.remove('loading'); this.parentElement.classList.add('error')">
                        <svg class="placeholder-icon" viewBox="0 0 24 24" fill="#999">
                            <path d="M19.5 6h-3l-1.5-1.5h-6L7.5 6h-3C3.7 6 3 6.7 3 7.5v10.5c0 .8.7 1.5 1.5 1.5h15c.8 0 1.5-.7 1.5-1.5V7.5c0-.8-.7-1.5-1.5-1.5zM12 16.5c-2.5 0-4.5-2-4.5-4.5s2-4.5 4.5-4.5 4.5 2 4.5 4.5-2 4.5-4.5 4.5z"/>
                        </svg>
                    </div>
                    <div class="card-body">
                        <h3>{{ $jersey['name'] }}</h3>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Other Jerseys -->
    <section class="category-section" style="background: var(--light-gray);">
        <div class="category-wrapper" style="max-width: 1400px; margin: 0 auto;">
            <h2 class="category-title">{{ __('messages.other_jerseys') }}</h2>
            <div class="jersey-grid">
                @foreach($jerseys['other'] as $jersey)
                    <div class="jersey-card">
                        <div class="img-wrapper loading">
                        <img src="{{ asset($jersey['image']) }}" alt="{{ $jersey['name'] }}"
                             onload="this.parentElement.classList.remove('loading')"
                             onerror="this.parentElement.classList.remove('loading'); this.parentElement.classList.add('error')">
                        <svg class="placeholder-icon" viewBox="0 0 24 24" fill="#999">
                            <path d="M19.5 6h-3l-1.5-1.5h-6L7.5 6h-3C3.7 6 3 6.7 3 7.5v10.5c0 .8.7 1.5 1.5 1.5h15c.8 0 1.5-.7 1.5-1.5V7.5c0-.8-.7-1.5-1.5-1.5zM12 16.5c-2.5 0-4.5-2-4.5-4.5s2-4.5 4.5-4.5 4.5 2 4.5 4.5-2 4.5-4.5 4.5z"/>
                        </svg>
                    </div>
                        <div class="card-body">
                            <h3>{{ $jersey['name'] }}</h3>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; {{ date('Y') }} NK EDUCATIF SPORTIF. All rights reserved. | <a href="{{ route('home') }}">Back to Home</a></p>
    </footer>

    <script>
        function toggleMenu() {
            const nav = document.querySelector('nav ul');
            nav.classList.toggle('active');
        }
    </script>
</body>
</html>
