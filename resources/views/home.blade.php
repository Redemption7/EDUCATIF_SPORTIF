<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $tagline }} {{ __('messages.meta_description') }}">
    <title>{{ __('messages.meta_title') }}</title>
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
        }

        nav a {
            color: var(--text-dark);
            text-decoration: none;
            transition: color 0.3s;
            font-weight: 500;
            font-size: 0.95rem;
        }

        nav a:hover {
            color: var(--primary-orange);
        }

        /* Language dropdown */
        .lang-dropdown-wrapper {
            position: relative;
        }
        .lang-dropdown {
            position: relative;
        }
        .lang-dropdown-toggle {
            display: flex;
            align-items: center;
            gap: 0.4rem;
            padding: 6px 12px;
            background: var(--light-gray);
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            cursor: pointer;
            font-size: 0.9rem;
            font-weight: 500;
            color: var(--text-dark);
            font-family: inherit;
        }
        .lang-dropdown-toggle:hover {
            background: #eee;
            border-color: var(--primary-green);
        }
        .lang-icon {
            font-size: 1.1rem;
        }
        .lang-arrow {
            font-size: 0.65rem;
            opacity: 0.8;
        }
        .lang-dropdown-menu {
            display: none;
            position: absolute;
            top: 100%;
            right: 0;
            margin-top: 4px;
            min-width: 160px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.12);
            list-style: none;
            padding: 6px 0;
            z-index: 1100;
        }
        .lang-dropdown:hover .lang-dropdown-menu {
            display: block;
        }
        .lang-dropdown-menu a {
            display: block;
            padding: 10px 16px;
            color: var(--text-dark);
            text-decoration: none;
            font-size: 0.9rem;
        }
        .lang-dropdown-menu a:hover,
        .lang-dropdown-menu a.active {
            background: var(--light-gray);
            color: var(--primary-orange);
        }

        /* mobile menu toggle */
        .menu-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 1.8rem;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .menu-toggle { display: block; }
            nav ul {
                display: none;
                flex-direction: column;
                gap: 1rem;
                background: white;
                position: absolute;
                top: 100%;
                left: 0;
                width: 100%;
                padding: 1rem 2rem;
                box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            }
            nav ul.show { display: flex; }
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, var(--dark-navy) 0%, var(--primary-green) 100%);
            color: white;
            padding: 100px 2rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 600px;
            height: 600px;
            background: rgba(255, 122, 89, 0.08);
            border-radius: 50%;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 900px;
            margin: 0 auto;
        }

        .hero h1 {
            font-size: 3.5rem;
            margin-bottom: 1.5rem;
            font-weight: 700;
            color: white;
            line-height: 1.2;
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 2.5rem;
            opacity: 0.95;
            font-weight: 300;
        }

        .cta-button {
            display: inline-block;
            background: var(--primary-orange);
            color: white;
            padding: 16px 45px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
            border: 2px solid var(--primary-orange);
            cursor: pointer;
            margin: 0 10px;
        }

        .cta-button:hover {
            background: transparent;
            color: white;
            transform: translateY(-2px);
        }

        .cta-button-secondary {
            background: transparent;
            color: white;
            border: 2px solid white;
        }

        .cta-button-secondary:hover {
            background: white;
            color: var(--primary-orange);
        }

        /* Hero Stats */
        .hero-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            margin-top: 4rem;
            padding-top: 3rem;
            border-top: 1px solid rgba(255,255,255,0.2);
        }

        /* about section */
        .about {
            padding: 80px 2rem;
            background: var(--light-gray);
            color: var(--text-dark);
        }
        .about h3 {
            color: var(--primary-green);
            font-weight: 600;
        }
        .about ul {
            margin-top: 0.5rem;
        }
        .about ul li {
            margin-bottom: 0.5rem;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--accent-yellow);
        }

        .stat-label {
            font-size: 0.95rem;
            opacity: 0.85;
            margin-top: 0.5rem;
        }

        /* Section Titles */
        .section-title {
            text-align: center;
            font-size: 2.8rem;
            margin-bottom: 1rem;
            color: var(--text-dark);
            font-weight: 700;
        }

        .section-subtitle {
            text-align: center;
            font-size: 1.1rem;
            color: var(--text-light);
            margin-bottom: 3rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .section-title::after {
            content: '';
            display: block;
            width: 80px;
            height: 4px;
            background: var(--primary-orange);
            margin: 1rem auto 0;
        }

        /* Features Section */
        .features {
            padding: 100px 2rem;
            background: var(--light-gray);
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2.5rem;
            margin-top: 3rem;
        }

        .feature-card {
            background: white;
            padding: 2.5rem;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            transition: all 0.3s;
            text-align: center;
        }

        /* sports list section */
        .sports-list {
            padding: 80px 2rem;
            background: white;
        }
        .sports-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 1rem;
            margin-top: 2rem;
        }
        .sport-item {
            background: var(--light-gray);
            padding: 1rem;
            border-radius: 8px;
            text-align: center;
            font-weight: 500;
            color: var(--primary-green);
            border: 1px solid var(--primary-green);
            transition: background 0.2s, transform 0.2s;
        }
        .sport-item:hover {
            background: var(--primary-green);
            color: white;
            transform: translateY(-3px);
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }

        .feature-icon {
            font-size: 3rem;
            margin-bottom: 1.5rem;
        }

        .feature-card h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: var(--primary-green);
        }

        .feature-card p {
            color: var(--text-light);
            font-size: 0.95rem;
            line-height: 1.7;
        }

        /* Team Section */
        .team {
            padding: 100px 2rem;
            background: white;
        }

        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2.5rem;
            margin-top: 3rem;
        }

        .team-member {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            transition: all 0.3s;
            text-align: center;
        }

        .team-member:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }

        .team-member-image {
            width: 100%;
            height: 300px;
            background: #e8e8e8;
            overflow: hidden;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .team-member-image.loading::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: linear-gradient(90deg, #e8e8e8 25%, #f5f5f5 50%, #e8e8e8 75%);
            background-size: 200% 100%;
            animation: shimmer 1.5s infinite;
            z-index: 1;
        }

        @keyframes shimmer {
            0% { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }

        .team-member-image .placeholder-icon {
            display: none;
            width: 80px;
            height: 80px;
            opacity: 0.4;
        }

        .team-member-image.error {
            background: linear-gradient(135deg, #f0f0f0, #e0e0e0);
        }

        .team-member-image.error .placeholder-icon {
            display: block;
        }

        .team-member-image.error img {
            display: none;
        }

        .team-member img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center top;
        }

        .team-member-info {
            padding: 2rem 1.5rem;
        }

        .team-member-name {
            font-size: 1.3rem;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
            font-weight: 700;
        }

        .team-member-role {
            color: var(--primary-orange);
            font-size: 0.95rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .team-member-bio {
            color: var(--text-light);
            font-size: 0.9rem;
            line-height: 1.6;
        }

        /* Programs Section */
        .programs {
            padding: 100px 2rem;
            background: var(--light-gray);
        }

        .programs-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 2.5rem;
            margin-top: 3rem;
        }

        .program-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            transition: all 0.3s;
            border-top: 4px solid var(--primary-orange);
        }

        .program-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }

        .program-header {
            background: linear-gradient(135deg, var(--primary-orange), #FF9E7F);
            padding: 2rem;
            color: white;
        }

        .program-header h3 {
            color: white;
            font-size: 1.6rem;
            margin-bottom: 0.5rem;
        }

        .program-body {
            padding: 2rem;
        }

        .program-body ul {
            list-style: none;
            margin-bottom: 1.5rem;
        }

        .program-body li {
            padding: 0.7rem 0;
            color: var(--text-light);
            border-bottom: 1px solid #eee;
            display: flex;
            align-items: center;
        }

        .program-body li:before {
            content: '✓';
            color: var(--primary-orange);
            font-weight: bold;
            margin-right: 1rem;
            font-size: 1.2rem;
        }

        .program-body li:last-child {
            border-bottom: none;
        }

        /* Testimonials Section */
        .testimonials {
            padding: 100px 2rem;
            background: white;
        }

        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2.5rem;
            margin-top: 3rem;
            position: relative;
        }
        .testimonial-card {
            display: none;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
        }

        .testimonial-card {
            background: var(--light-gray);
            padding: 2.5rem;
            border-radius: 12px;
            border-left: 4px solid var(--primary-orange);
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        }

        .testimonial-text {
            color: var(--text-dark);
            font-size: 0.95rem;
            line-height: 1.8;
            margin-bottom: 1.5rem;
            font-style: italic;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .testimonial-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--primary-orange);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            color: white;
        }

        .testimonial-info h4 {
            color: var(--text-dark);
            font-weight: 700;
            margin-bottom: 0.2rem;
        }

        .testimonial-info p {
            color: var(--text-light);
            font-size: 0.85rem;
        }

        /* FAQ Section */
        .faq {
            padding: 100px 2rem;
            background: var(--light-gray);
        }

        .faq-container {
            max-width: 800px;
            margin: 3rem auto 0;
        }

        .faq-item {
            background: white;
            margin-bottom: 1.5rem;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        .faq-question {
            padding: 1.8rem;
            background: white;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 600;
            color: var(--text-dark);
            transition: all 0.3s;
            border-bottom: 2px solid transparent;
        }

        .faq-question:hover {
            background: var(--light-gray);
            color: var(--primary-orange);
        }

        .faq-toggle {
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            transition: transform 0.3s;
        }

        .faq-item.active .faq-toggle {
            transform: rotate(45deg);
        }

        .faq-answer {
            padding: 0 1.8rem;
            max-height: 0;
            overflow: hidden;
            transition: all 0.3s;
            color: var(--text-light);
        }

        .faq-item.active .faq-answer {
            padding: 1.8rem;
            max-height: 500px;
        }

        /* Call to Action */
        .cta-section {
            background: linear-gradient(135deg, var(--primary-green), var(--dark-navy));
            color: white;
            padding: 80px 2rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .cta-section::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -10%;
            width: 400px;
            height: 400px;
            background: rgba(255, 122, 89, 0.08);
            border-radius: 50%;
        }

        .cta-section h2 {
            font-size: 2.5rem;
            color: white;
            margin-bottom: 1.5rem;
            position: relative;
            z-index: 2;
        }

        .cta-section p {
            font-size: 1.1rem;
            margin-bottom: 2.5rem;
            opacity: 0.9;
            position: relative;
            z-index: 2;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Footer */
        footer {
            background: var(--dark-navy);
            color: white;
            padding: 60px 2rem 20px;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
            margin-bottom: 3rem;
            max-width: 1400px;
            margin-left: auto;
            margin-right: auto;
        }

        .footer-section h3 {
            color: var(--accent-yellow);
            margin-bottom: 1.5rem;
            font-size: 1.2rem;
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section ul li {
            margin-bottom: 0.8rem;
        }

        .footer-section a {
            color: #ccc;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-section a:hover {
            color: var(--accent-yellow);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 2rem;
            text-align: center;
            color: #aaa;
            max-width: 1400px;
            margin: 0 auto;
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            animation: fadeInUp 0.6s ease-out;
        }

        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.2rem;
            }

            .section-title {
                font-size: 2rem;
            }

            nav ul {
                gap: 1.5rem;
            }

            .team-member-image {
                height: 250px;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav>
        <div class="container">
            <div class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="NKES logo" style="height:40px;" />
                <h1>NK EDUCATIF SPORTIF</h1>
            </div>
            <button class="menu-toggle" onclick="toggleMenu()">☰</button>
            <ul>
                <li><a href="#home">{{ __('messages.nav_home') }}</a></li>
                <li><a href="#about">{{ __('messages.nav_about') }}</a></li>
                <li><a href="#sports">{{ __('messages.nav_sports') }}</a></li>
                <li><a href="#programs">{{ __('messages.nav_programs') }}</a></li>
                <li><a href="#team">{{ __('messages.nav_team') }}</a></li>
                <li><a href="#contact">{{ __('messages.nav_contact') }}</a></li>
                @include('partials.language-switcher')
                <li><a href="{{ route('shop') }}" style="background: var(--accent-yellow); padding: 8px 16px; border-radius: 25px; color: var(--text-dark) !important; font-weight: 600;">{{ __('messages.nav_shop') }}</a></li>
                @auth
                    <li><a href="{{ route('admin.dashboard') }}" style="background: var(--primary-orange); padding: 8px 16px; border-radius: 25px; color: white !important;">{{ __('messages.nav_dashboard') }}</a></li>
                @else
                    <li><a href="{{ route('login') }}" style="background: var(--primary-green); padding: 8px 16px; border-radius: 25px; color: white !important;">{{ __('messages.nav_login') }}</a></li>
                @endauth
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="container">
            <div class="hero-content">
                <p id="hero-greeting" style="margin-bottom:0.5rem;font-size:1rem;opacity:0.9;"></p>
                <h1>{{ $tagline }}</h1>
                <p>{{ $subtagline }}</p>
                <p>{{ __('messages.hero_excellence') }}</p>
                <div>
                    <button onclick="openRegistrationModal()" class="cta-button">{{ __('messages.register_sports') }}</button>
                    <a href="#programs" class="cta-button cta-button-secondary">{{ __('messages.explore_programs') }}</a>
                </div>
                <div class="hero-stats">
                    <div class="stat-item">
                        <div class="stat-number" data-target="{{ $activeAthletes }}">0</div>
                        <div class="stat-label">{{ __('messages.active_athletes') }}</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number" data-target="{{ $expertCoaches }}">0</div>
                        <div class="stat-label">{{ __('messages.expert_coaches') }}</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number" data-target="{{ $programsCount }}">0</div>
                        <div class="stat-label">{{ __('messages.sports_programs') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About / Mission & Vision -->
    <section class="about" id="about">
        <div class="container">
            <h2 class="section-title">{{ __('messages.about_title') }}</h2>
            <p class="section-subtitle" style="max-width:800px; margin:0 auto;">{{ $about }}</p>

            <h3 class="section-title" style="font-size:2rem; margin-top:3rem;">{{ __('messages.our_mission') }}</h3>
            <p style="max-width:800px; margin:0 auto;">{{ $mission }}</p>

            <h3 class="section-title" style="font-size:2rem; margin-top:2.5rem;">{{ __('messages.continental_goal') }}</h3>
            <p style="max-width:800px; margin:0 auto;">{{ $unifyMission }}</p>

            <h3 class="section-title" style="font-size:2rem; margin-top:2.5rem;">{{ __('messages.vision') }}</h3>
            <p style="max-width:800px; margin:0 auto;">{{ $vision }}</p>
            <ul style="max-width:800px; margin:1rem auto 0; list-style: disc inside;">
                @foreach($visionPoints as $point)
                    <li>{{ $point }}</li>
                @endforeach
            </ul>

            <h3 class="section-title" style="font-size:2rem; margin-top:2.5rem;">{{ __('messages.objectives') }}</h3>
            <ul style="max-width:800px; margin:1rem auto 0; list-style: disc inside;">
                @foreach($objectives as $obj)
                    <li>{{ $obj }}</li>
                @endforeach
            </ul>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="container">
            <h2 class="section-title">{{ __('messages.why_choose') }}</h2>
            <p class="section-subtitle">{{ __('messages.why_choose_sub') }}</p>
            
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">🏆</div>
                    <h3>{{ __('messages.expert_coaching') }}</h3>
                    <p>{{ __('messages.expert_coaching_desc') }}</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🏛️</div>
                    <h3>{{ __('messages.modern_facilities') }}</h3>
                    <p>{{ __('messages.modern_facilities_desc') }}</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">📈</div>
                    <h3>{{ __('messages.structured_programs') }}</h3>
                    <p>{{ __('messages.structured_programs_desc') }}</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🤝</div>
                    <h3>{{ __('messages.team_building') }}</h3>
                    <p>{{ __('messages.team_building_desc') }}</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🌍</div>
                    <h3>{{ __('messages.community_focus') }}</h3>
                    <p>{{ __('messages.community_focus_desc') }}</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">⭐</div>
                    <h3>{{ __('messages.competitive_edge') }}</h3>
                    <p>{{ __('messages.competitive_edge_desc') }}</p>
                </div>
            </div>
        </div>
    </section>

    
    <!-- Sports We Offer -->
    <section class="sports-list" id="sports">
        <div class="container">
            <h2 class="section-title">{{ __('messages.sports_focus') }}</h2>
            <p class="section-subtitle">{{ __('messages.sports_focus_sub') }}</p>
            <div class="sports-grid">
                @foreach($sports as $sport)
                    <div class="sport-item">{{ $sport }}</div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team" id="team">
        <div class="container">
            <h2 class="section-title">{{ __('messages.our_team') }}</h2>
            <p class="section-subtitle">{{ __('messages.our_team_sub') }}</p>
            
            <div class="team-grid">
                @foreach($teamMembers as $member)
                    <div class="team-member">
                        <div class="team-member-image loading">
                            <img src="{{ asset($member['image']) }}" alt="{{ $member['name'] }}"
                                 onload="this.parentElement.classList.remove('loading')"
                                 onerror="this.parentElement.classList.remove('loading'); this.parentElement.classList.add('error')">
                            <svg class="placeholder-icon" viewBox="0 0 24 24" fill="#999">
                                <path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/>
                            </svg>
                        </div>
                        <div class="team-member-info">
                            <div class="team-member-name">{{ $member['name'] }}</div>
                            @if(!empty($member['role']))
                                <div class="team-member-role">{{ $member['role'] }}</div>
                            @endif
                            <div class="team-member-bio">{{ $member['bio'] }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Programs Section -->
    <section class="programs" id="programs">
        <div class="container">
            <h2 class="section-title">{{ __('messages.our_programs') }}</h2>
            <p class="section-subtitle">{{ __('messages.programs_sub') }}</p>
            
            <div class="programs-grid">
                <div class="program-card">
                    <div class="program-header">
                        <h3>⚽ {{ __('messages.soccer_academy') }}</h3>
                    </div>
                    <div class="program-body">
                        <ul>
                            <li>{{ __('messages.age_6_18') }}</li>
                            <li>{{ __('messages.technical_skill') }}</li>
                            <li>{{ __('messages.tactical_team') }}</li>
                            <li>{{ __('messages.competitive_league') }}</li>
                            <li>{{ __('messages.weekend_tournaments') }}</li>
                        </ul>
                        <a href="#contact" class="cta-button" style="width: 100%; display: block;">{{ __('messages.learn_more') }}</a>
                    </div>
                </div>

                <div class="program-card">
                    <div class="program-header">
                        <h3>🏀 {{ __('messages.basketball_elite') }}</h3>
                    </div>
                    <div class="program-body">
                        <ul>
                            <li>{{ __('messages.beginner_advanced') }}</li>
                            <li>{{ __('messages.ball_handling') }}</li>
                            <li>{{ __('messages.game_strategy') }}</li>
                            <li>{{ __('messages.strength_training') }}</li>
                            <li>{{ __('messages.tournament_prep') }}</li>
                        </ul>
                        <a href="#contact" class="cta-button" style="width: 100%; display: block;">{{ __('messages.learn_more') }}</a>
                    </div>
                </div>

                <div class="program-card">
                    <div class="program-header">
                        <h3>🏐 {{ __('messages.volleyball_training') }}</h3>
                    </div>
                    <div class="program-body">
                        <ul>
                            <li>{{ __('messages.all_skill_levels') }}</li>
                            <li>{{ __('messages.serving_receiving') }}</li>
                            <li>{{ __('messages.team_formations') }}</li>
                            <li>{{ __('messages.agility_training') }}</li>
                            <li>{{ __('messages.club_tournaments') }}</li>
                        </ul>
                        <a href="#contact" class="cta-button" style="width: 100%; display: block;">{{ __('messages.learn_more') }}</a>
                    </div>
                </div>

                <div class="program-card">
                    <div class="program-header">
                        <h3>🏃 {{ __('messages.athletics_program') }}</h3>
                    </div>
                    <div class="program-body">
                        <ul>
                            <li>{{ __('messages.sprint_distance') }}</li>
                            <li>{{ __('messages.jump_training') }}</li>
                            <li>{{ __('messages.endurance_building') }}</li>
                            <li>{{ __('messages.form_correction') }}</li>
                            <li>{{ __('messages.regional_competitions') }}</li>
                        </ul>
                        <a href="#contact" class="cta-button" style="width: 100%; display: block;">{{ __('messages.learn_more') }}</a>
                    </div>
                </div>

                <div class="program-card">
                    <div class="program-header">
                        <h3>🏈 {{ __('messages.football_academy') }}</h3>
                    </div>
                    <div class="program-body">
                        <ul>
                            <li>{{ __('messages.offensive_strategies') }}</li>
                            <li>{{ __('messages.defensive_techniques') }}</li>
                            <li>{{ __('messages.position_specialty') }}</li>
                            <li>{{ __('messages.strength_speed') }}</li>
                            <li>{{ __('messages.league_competitions') }}</li>
                        </ul>
                        <a href="#contact" class="cta-button" style="width: 100%; display: block;">{{ __('messages.learn_more') }}</a>
                    </div>
                </div>

                <div class="program-card">
                    <div class="program-header">
                        <h3>🏊 {{ __('messages.swimming_water') }}</h3>
                    </div>
                    <div class="program-body">
                        <ul>
                            <li>{{ __('messages.swimming_techniques') }}</li>
                            <li>{{ __('messages.water_safety') }}</li>
                            <li>{{ __('messages.competitive_swimming') }}</li>
                            <li>{{ __('messages.diving_basics') }}</li>
                            <li>{{ __('messages.summer_camps') }}</li>
                        </ul>
                        <a href="#contact" class="cta-button" style="width: 100%; display: block;">{{ __('messages.learn_more') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials">
        <div class="container">
            <h2 class="section-title">{{ __('messages.success_stories') }}</h2>
            <p class="section-subtitle">{{ __('messages.success_stories_sub') }}</p>
            
            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <div class="testimonial-text">"{{ __('messages.testimonial_1') }}"</div>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar">👨‍👧</div>
                        <div class="testimonial-info">
                            <h4>Robert Thompson</h4>
                            <p>{{ __('messages.parent_soccer') }}</p>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card">
                    <div class="testimonial-text">"{{ __('messages.testimonial_2') }}"</div>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar">👩‍🎓</div>
                        <div class="testimonial-info">
                            <h4>Maya Patel</h4>
                            <p>{{ __('messages.basketball_athlete') }}</p>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card">
                    <div class="testimonial-text">"{{ __('messages.testimonial_3') }}"</div>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar">👨‍💼</div>
                        <div class="testimonial-info">
                            <h4>Ahmed Hassan</h4>
                            <p>{{ __('messages.parent_football') }}</p>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card">
                    <div class="testimonial-text">"{{ __('messages.testimonial_4') }}"</div>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar">👩‍🏫</div>
                        <div class="testimonial-info">
                            <h4>Jessica Martinez</h4>
                            <p>{{ __('messages.volleyball_athlete') }}</p>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card">
                    <div class="testimonial-text">"{{ __('messages.testimonial_5') }}"</div>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar">👩‍👧‍👦</div>
                        <div class="testimonial-info">
                            <h4>Patricia Lopez</h4>
                            <p>{{ __('messages.parent_multiple') }}</p>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card">
                    <div class="testimonial-text">"{{ __('messages.testimonial_6') }}"</div>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar">👨‍👨‍👧</div>
                        <div class="testimonial-info">
                            <h4>Kevin Wilson</h4>
                            <p>{{ __('messages.parent_athletics') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq">
        <div class="container">
            <h2 class="section-title">{{ __('messages.faq_title') }}</h2>
            
            <div class="faq-container">
                <div class="faq-item active">
                    <div class="faq-question">
                        <span>{{ __('messages.faq_age') }}</span>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        {{ __('messages.faq_age_answer') }}
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <span>{{ __('messages.faq_experience') }}</span>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        {{ __('messages.faq_experience_answer') }}
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <span>{{ __('messages.faq_ratio') }}</span>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        {{ __('messages.faq_ratio_answer') }}
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <span>{{ __('messages.faq_sessions') }}</span>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        {{ __('messages.faq_sessions_answer') }}
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <span>{{ __('messages.faq_safety') }}</span>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        {{ __('messages.faq_safety_answer') }}
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <span>{{ __('messages.faq_register') }}</span>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        {{ __('messages.faq_register_answer') }}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="cta-section" id="contact">
        <div class="container">
            <h2>{{ __('messages.cta_title') }}</h2>
            <p>{{ __('messages.cta_subtitle') }}</p>
            <p style="margin-top:0.5rem; font-size:0.9rem; opacity:0.9;">{{ $address }}</p>
            <div>
                <a href="mailto:{{ $email }}" class="cta-button">{{ __('messages.send_email') }}</a>
                <a href="tel:{{ $phone }}" class="cta-button cta-button-secondary">{{ __('messages.call_us') }}</a>
            </div>
            <p style="margin-top:1rem; font-size:0.95rem; color:#eee;">{{ $address }}</p>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>{{ __('messages.app_name') }}</h3>
                <p style="color: #ccc; margin-bottom: 1rem;">{{ __('messages.footer_tagline') }}</p>
            </div>
            <div class="footer-section">
                <h3>{{ __('messages.footer_programs') }}</h3>
                <ul>
                    <li><a href="#programs">{{ __('messages.soccer_academy') }}</a></li>
                    <li><a href="#programs">{{ __('messages.basketball_elite') }}</a></li>
                    <li><a href="#programs">{{ __('messages.volleyball_training') }}</a></li>
                    <li><a href="#programs">{{ __('messages.athletics_program') }}</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>{{ __('messages.footer_about') }}</h3>
                <ul>
                    <li><a href="#team">{{ __('messages.footer_our_team') }}</a></li>
                    <li><a href="#home">{{ __('messages.nav_home') }}</a></li>
                    <li><a href="#contact">{{ __('messages.nav_contact') }}</a></li>
                    <li><a href="#">{{ __('messages.footer_privacy') }}</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>{{ __('messages.footer_contact') }}</h3>
                <ul>
                    <li><a href="mailto:{{ $email }}">📧 {{ $email }}</a></li>
                    <li><a href="tel:{{ $phone }}">📞 {{ $phone }}</a></li>
                    <li><a href="#">📍 {{ $address }}</a></li>
                    <li><a href="#">{{ __('messages.footer_hours') }}</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} {{ __('messages.app_name') }}. {{ __('messages.footer_rights') }}</p>
        </div>
    </footer>

    <!-- Registration Section Modal -->
    <div id="registrationModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.7); z-index: 2000; align-items: center; justify-content: center; overflow-y: auto; padding: 20px;">
        <div style="background: white; border-radius: 15px; max-width: 600px; width: 100%; margin: auto; padding: 0; box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3); position: relative; margin: 20px auto;">
            <button onclick="closeRegistrationModal()" style="position: absolute; top: 20px; right: 20px; background: #e74c3c; color: white; border: none; width: 35px; height: 35px; border-radius: 50%; cursor: pointer; font-size: 20px; display: flex; align-items: center; justify-content: center; z-index: 10;">✕</button>
            
            <div style="padding: 40px;">
                <div style="text-align: center; margin-bottom: 30px;">
                    <h2 style="color: var(--text-dark); font-size: 28px; margin-bottom: 10px;">🏆 {{ __('messages.sports_registration') }}</h2>
                    <p style="color: #666; font-size: 14px;">{{ __('messages.registration_sub') }}</p>
                </div>

                <form id="registrationForm">
                    @csrf
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 20px;">
                        <div>
                            <label style="display: block; margin-bottom: 8px; color: #333; font-weight: 600; font-size: 14px;">{{ __('messages.full_name') }} *</label>
                            <input type="text" id="full_name" name="full_name" placeholder="{{ __('messages.full_name_placeholder') }}" required style="width: 100%; padding: 12px 15px; border: 2px solid #e0e0e0; border-radius: 8px; font-size: 14px; font-family: inherit; transition: all 0.3s ease;">
                        </div>

                        <div>
                            <label style="display: block; margin-bottom: 8px; color: #333; font-weight: 600; font-size: 14px;">{{ __('messages.email') }} *</label>
                            <input type="email" id="email" name="email" placeholder="{{ __('messages.email_placeholder') }}" required style="width: 100%; padding: 12px 15px; border: 2px solid #e0e0e0; border-radius: 8px; font-size: 14px; font-family: inherit; transition: all 0.3s ease;">
                        </div>
                    </div>

                    <div style="margin-bottom: 20px;">
                        <label style="display: block; margin-bottom: 8px; color: #333; font-weight: 600; font-size: 14px;">{{ __('messages.select_sport') }} *</label>
                        <select id="sport_name" name="sport_name" required style="width: 100%; padding: 12px 15px; border: 2px solid #e0e0e0; border-radius: 8px; font-size: 14px; font-family: inherit; transition: all 0.3s ease;">
                            <option value="">{{ __('messages.choose_sport') }}</option>
                            @foreach($sports as $sport)
                                <option value="{{ $sport }}">{{ $sport }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 20px;">
                        <div>
                            <label style="display: block; margin-bottom: 8px; color: #333; font-weight: 600; font-size: 14px;">{{ __('messages.age_group') }} *</label>
                            <select id="age_group" name="age_group" required style="width: 100%; padding: 12px 15px; border: 2px solid #e0e0e0; border-radius: 8px; font-size: 14px; font-family: inherit; transition: all 0.3s ease;">
                                <option value="">{{ __('messages.select_age_group') }}</option>
                                <option value="U18">{{ __('messages.u18') }}</option>
                                <option value="U20">{{ __('messages.u20') }}</option>
                                <option value="U25">{{ __('messages.u25') }}</option>
                                <option value="Senior">{{ __('messages.senior') }}</option>
                            </select>
                        </div>

                        <div>
                            <label style="display: block; margin-bottom: 8px; color: #333; font-weight: 600; font-size: 14px;">{{ __('messages.gender') }} *</label>
                            <select id="gender" name="gender" required style="width: 100%; padding: 12px 15px; border: 2px solid #e0e0e0; border-radius: 8px; font-size: 14px; font-family: inherit; transition: all 0.3s ease;">
                                <option value="">{{ __('messages.select_gender') }}</option>
                                <option value="Male">{{ __('messages.male') }}</option>
                                <option value="Female">{{ __('messages.female') }}</option>
                                <option value="Other">{{ __('messages.other') }}</option>
                            </select>
                        </div>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 20px;">
                        <div>
                            <label style="display: block; margin-bottom: 8px; color: #333; font-weight: 600; font-size: 14px;">{{ __('messages.position') }}</label>
                            <input type="text" id="position" name="position" placeholder="{{ __('messages.position_placeholder') }}" style="width: 100%; padding: 12px 15px; border: 2px solid #e0e0e0; border-radius: 8px; font-size: 14px; font-family: inherit; transition: all 0.3s ease;">
                        </div>

                        <div>
                            <label style="display: block; margin-bottom: 8px; color: #333; font-weight: 600; font-size: 14px;">{{ __('messages.jersey_number') }}</label>
                            <input type="text" id="jersey_number" name="jersey_number" placeholder="{{ __('messages.jersey_placeholder') }}" style="width: 100%; padding: 12px 15px; border: 2px solid #e0e0e0; border-radius: 8px; font-size: 14px; font-family: inherit; transition: all 0.3s ease;">
                        </div>
                    </div>

                    <div style="margin-bottom: 20px;">
                        <label style="display: block; margin-bottom: 8px; color: #333; font-weight: 600; font-size: 14px;">{{ __('messages.phone') }}</label>
                        <input type="tel" id="phone" name="phone" placeholder="{{ __('messages.phone_placeholder') }}" style="width: 100%; padding: 12px 15px; border: 2px solid #e0e0e0; border-radius: 8px; font-size: 14px; font-family: inherit; transition: all 0.3s ease;">
                    </div>

                    <div style="margin-bottom: 20px;">
                        <label style="display: block; margin-bottom: 8px; color: #333; font-weight: 600; font-size: 14px;">{{ __('messages.additional_notes') }}</label>
                        <textarea id="notes" name="notes" placeholder="{{ __('messages.notes_placeholder') }}" style="width: 100%; padding: 12px 15px; border: 2px solid #e0e0e0; border-radius: 8px; font-size: 14px; font-family: inherit; resize: vertical; min-height: 100px; transition: all 0.3s ease;"></textarea>
                    </div>

                    <button type="submit" style="width: 100%; padding: 14px; background: linear-gradient(135deg, var(--primary-green), var(--primary-orange)); color: white; border: none; border-radius: 8px; font-size: 16px; font-weight: 600; cursor: pointer; transition: all 0.3s ease; margin-top: 20px;">
                        <span class="submit-text">{{ __('messages.register_now') }}</span>
                        <span class="loading" id="loading" style="display: none;">{{ __('messages.registering') }}</span>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Success Popup Modal -->
    <div id="successModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); align-items: center; justify-content: center; z-index: 2001;">
        <div style="background: white; padding: 40px; border-radius: 15px; text-align: center; max-width: 400px; box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);">
            <div style="font-size: 50px; margin-bottom: 20px;">✅</div>
            <h2 style="color: #27ae60; margin-bottom: 15px; font-size: 24px;">{{ __('messages.registration_success') }}</h2>
            <p style="color: #666; margin-bottom: 25px; line-height: 1.6;">
                {{ __('messages.registration_success_msg') }}
            </p>
            <button onclick="closeSuccessModal()" style="background: linear-gradient(135deg, var(--primary-green), var(--primary-orange)); color: white; border: none; padding: 12px 30px; border-radius: 8px; font-size: 16px; font-weight: 600; cursor: pointer; width: 100%;">
                {{ __('messages.close') }}
            </button>
        </div>
    </div>

    <script>
        // Registration Modal Functions
        function openRegistrationModal() {
            document.getElementById('registrationModal').style.display = 'flex';
        }

        function closeRegistrationModal() {
            document.getElementById('registrationModal').style.display = 'none';
        }

        function closeSuccessModal() {
            document.getElementById('successModal').style.display = 'none';
            closeRegistrationModal();
        }

        // Close modals when clicking outside
        document.getElementById('registrationModal').addEventListener('click', (e) => {
            if (e.target.id === 'registrationModal') {
                closeRegistrationModal();
            }
        });

        document.getElementById('successModal').addEventListener('click', (e) => {
            if (e.target.id === 'successModal') {
                closeSuccessModal();
            }
        });

        // Registration Form Submission
        document.getElementById('registrationForm').addEventListener('submit', async (e) => {
            e.preventDefault();

            const submitBtn = e.target.querySelector('button[type="submit"]');
            submitBtn.disabled = true;
            document.querySelector('.submit-text').style.display = 'none';
            document.getElementById('loading').style.display = 'inline';

            const formData = new FormData(document.getElementById('registrationForm'));

            try {
                const response = await fetch('{{ route("register.store") }}', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });

                const data = await response.json();

                if (data.success) {
                    document.getElementById('successModal').style.display = 'flex';
                    document.getElementById('registrationForm').reset();
                } else {
                    alert('Registration failed: ' + (data.message || 'Unknown error'));
                }
            } catch (error) {
                console.error('Error:', error);
                alert('An error occurred. Please try again.');
            } finally {
                submitBtn.disabled = false;
                document.querySelector('.submit-text').style.display = 'inline';
                document.getElementById('loading').style.display = 'none';
            }
        });

        // dynamic greeting in hero
        function updateGreeting() {
            const now = new Date();
            const days = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
            const options = { month:'long', day:'numeric' };
            const text = `Good ${now.getHours() < 12 ? 'morning' : now.getHours() < 18 ? 'afternoon' : 'evening'}, today is ${days[now.getDay()]}, ${now.toLocaleDateString(undefined, options)}.`;
            const el = document.getElementById('hero-greeting');
            if(el) el.textContent = text;
        }
        updateGreeting();

        // mobile menu toggle handler
        function toggleMenu() {
            const ul = document.querySelector('nav ul');
            ul.classList.toggle('show');
        }
        // close menu when a nav link is clicked (useful for mobile)
        document.querySelectorAll('nav ul a').forEach(link => {
            link.addEventListener('click', () => {
                const ul = document.querySelector('nav ul');
                if (ul.classList.contains('show')) ul.classList.remove('show');
            });
        });

        // FAQ Toggle
        document.querySelectorAll('.faq-question').forEach(question => {
            question.addEventListener('click', function() {
                const faqItem = this.parentElement;
                faqItem.classList.toggle('active');
            });
        });

        // Smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });

        // Add fade-in animation to elements on scroll
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('fade-in');
                }
            });
        });

        document.querySelectorAll('.feature-card, .team-member, .program-card, .testimonial-card').forEach(el => {
            observer.observe(el);
        });

        // animate numbers when stats appear
        const statsObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.querySelectorAll('.stat-number').forEach(el => {
                        const target = parseInt(el.getAttribute('data-target')) || 0;
                        let count = 0;
                        const step = Math.ceil(target / 100);
                        const interval = setInterval(() => {
                            count += step;
                            if (count >= target) {
                                el.textContent = target + '+';
                                clearInterval(interval);
                            } else {
                                el.textContent = count + '+';
                            }
                        }, 20);
                    });
                    statsObserver.unobserve(entry.target);
                }
            });
        }, {threshold: 0.3});
        statsObserver.observe(document.querySelector('.hero-stats'));

        // testimonial carousel
        const testimonials = document.querySelectorAll('.testimonial-card');
        let currentTestimonial = 0;
        function showTestimonial(i) {
            testimonials.forEach((t, idx) => {
                t.style.display = idx === i ? 'block' : 'none';
            });
            // ensure container keeps height of current card
            const container = document.querySelector('.testimonials-grid');
            if(container && testimonials[i]) {
                container.style.height = testimonials[i].offsetHeight + 'px';
            }
        }
        if(testimonials.length){
            showTestimonial(0);
            setInterval(() => {
                currentTestimonial = (currentTestimonial + 1) % testimonials.length;
                showTestimonial(currentTestimonial);
            }, 5000);
        }
    </script>
</body>
</html>
