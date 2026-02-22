<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NK EDUCATIF SPORTIF - Excellence in Sports Education</title>
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
            background: linear-gradient(135deg, var(--primary-orange), var(--primary-green));
            overflow: hidden;
            position: relative;
        }

        .team-member img {
            width: 100%;
            height: 100%;
            object-fit: cover;
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
                <h1>NK EDUCATIF</h1>
            </div>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#programs">Programs</a></li>
                <li><a href="#team">Team</a></li>
                <li><a href="#contact">Contact</a></li>
                @auth
                    <li><a href="{{ route('admin.dashboard') }}" style="background: var(--primary-orange); padding: 8px 16px; border-radius: 25px; color: white !important;">Dashboard</a></li>
                @else
                    <li><a href="{{ route('login') }}" style="background: var(--primary-green); padding: 8px 16px; border-radius: 25px; color: white !important;">Login</a></li>
                @endauth
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="container">
            <div class="hero-content">
                <h1>Build Champions. Shape Futures.</h1>
                <p>Excellence in sports education through professional coaching, modern facilities, and proven methods</p>
                <div>
                    <button onclick="openRegistrationModal()" class="cta-button">Register for Sports</button>
                    <a href="#programs" class="cta-button cta-button-secondary">Explore Programs</a>
                </div>
                <div class="hero-stats">
                    <div class="stat-item">
                        <div class="stat-number">500+</div>
                        <div class="stat-label">Active Athletes</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">25+</div>
                        <div class="stat-label">Expert Coaches</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">12+</div>
                        <div class="stat-label">Sports Programs</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="container">
            <h2 class="section-title">Why Choose NK EDUCATIF?</h2>
            <p class="section-subtitle">We provide comprehensive sports education with world-class facilities and experienced coaching</p>
            
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">🏆</div>
                    <h3>Expert Coaching</h3>
                    <p>Learn from certified coaches with international experience and proven track records in developing elite athletes</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🏛️</div>
                    <h3>Modern Facilities</h3>
                    <p>Access state-of-the-art training facilities equipped with the latest sports technology and equipment</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">📈</div>
                    <h3>Structured Programs</h3>
                    <p>Progressive training plans designed to develop fundamental skills and advanced techniques at every level</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🤝</div>
                    <h3>Team Building</h3>
                    <p>Build character, confidence, and teamwork through sports in a supportive and encouraging environment</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🌍</div>
                    <h3>Community Focus</h3>
                    <p>Join a diverse community of athletes and families committed to excellence and personal growth</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">⭐</div>
                    <h3>Competitive Edge</h3>
                    <p>Develop competitive skills and tactical knowledge to succeed at local, regional, and national levels</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team" id="team">
        <div class="container">
            <h2 class="section-title">Our Expert Team</h2>
            <p class="section-subtitle">Meet the dedicated coaches and staff driving excellence in sports education</p>
            
            <div class="team-grid">
                <div class="team-member">
                    <div class="team-member-image">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=500&fit=crop" alt="Coach Michael">
                    </div>
                    <div class="team-member-info">
                        <div class="team-member-name">Michael Johnson</div>
                        <div class="team-member-role">Head Football Coach</div>
                        <div class="team-member-bio">15+ years coaching experience. Specialized in offensive strategy and player development. Former professional player.</div>
                    </div>
                </div>

                <div class="team-member">
                    <div class="team-member-image">
                        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=400&h=500&fit=crop" alt="Coach Sarah">
                    </div>
                    <div class="team-member-info">
                        <div class="team-member-name">Sarah Williams</div>
                        <div class="team-member-role">Basketball Coach</div>
                        <div class="team-member-bio">Certified coach with passion for developing young talent. Specializes in shooting technique and conditioning.</div>
                    </div>
                </div>

                <div class="team-member">
                    <div class="team-member-image">
                        <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=400&h=500&fit=crop" alt="Coach James">
                    </div>
                    <div class="team-member-info">
                        <div class="team-member-name">James Chen</div>
                        <div class="team-member-role">Soccer Coach & Program Director</div>
                        <div class="team-member-bio">International coaching certification. Experienced in youth development and competitive team management.</div>
                    </div>
                </div>

                <div class="team-member">
                    <div class="team-member-image">
                        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=400&h=500&fit=crop" alt="Coach Emma">
                    </div>
                    <div class="team-member-info">
                        <div class="team-member-name">Emma Rodriguez</div>
                        <div class="team-member-role">Volleyball Coach</div>
                        <div class="team-member-bio">Specializes in technical skills and team coordination. Olympic training center experience.</div>
                    </div>
                </div>

                <div class="team-member">
                    <div class="team-member-image">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=500&fit=crop" alt="Coach David">
                    </div>
                    <div class="team-member-info">
                        <div class="team-member-name">David Okafor</div>
                        <div class="team-member-role">Athletics Coach</div>
                        <div class="team-member-bio">Specialized in track and field training. Expert in sprint, jump, and distance training programs.</div>
                    </div>
                </div>

                <div class="team-member">
                    <div class="team-member-image">
                        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=400&h=500&fit=crop" alt="Coach Lisa">
                    </div>
                    <div class="team-member-info">
                        <div class="team-member-name">Lisa Anderson</div>
                        <div class="team-member-role">Fitness & Conditioning Coach</div>
                        <div class="team-member-bio">Certified nutritionist and strength coach. Develops personalized fitness programs for peak performance.</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Programs Section -->
    <section class="programs" id="programs">
        <div class="container">
            <h2 class="section-title">Our Programs</h2>
            <p class="section-subtitle">Comprehensive training programs for all ages and skill levels</p>
            
            <div class="programs-grid">
                <div class="program-card">
                    <div class="program-header">
                        <h3>⚽ Soccer Academy</h3>
                    </div>
                    <div class="program-body">
                        <ul>
                            <li>Age 6-18 programs</li>
                            <li>Technical skill development</li>
                            <li>Tactical team training</li>
                            <li>Competitive league</li>
                            <li>Weekend tournaments</li>
                        </ul>
                        <a href="#contact" class="cta-button" style="width: 100%; display: block;">Learn More</a>
                    </div>
                </div>

                <div class="program-card">
                    <div class="program-header">
                        <h3>🏀 Basketball Elite</h3>
                    </div>
                    <div class="program-body">
                        <ul>
                            <li>Beginner to advanced</li>
                            <li>Ball handling mastery</li>
                            <li>Game strategy</li>
                            <li>Strength training</li>
                            <li>Tournament preparation</li>
                        </ul>
                        <a href="#contact" class="cta-button" style="width: 100%; display: block;">Learn More</a>
                    </div>
                </div>

                <div class="program-card">
                    <div class="program-header">
                        <h3>🏐 Volleyball Training</h3>
                    </div>
                    <div class="program-body">
                        <ul>
                            <li>All skill levels</li>
                            <li>Serving & receiving</li>
                            <li>Team formations</li>
                            <li>Agility training</li>
                            <li>Club tournaments</li>
                        </ul>
                        <a href="#contact" class="cta-button" style="width: 100%; display: block;">Learn More</a>
                    </div>
                </div>

                <div class="program-card">
                    <div class="program-header">
                        <h3>🏃 Athletics Program</h3>
                    </div>
                    <div class="program-body">
                        <ul>
                            <li>Sprint & distance</li>
                            <li>Jump training</li>
                            <li>Endurance building</li>
                            <li>Form correction</li>
                            <li>Regional competitions</li>
                        </ul>
                        <a href="#contact" class="cta-button" style="width: 100%; display: block;">Learn More</a>
                    </div>
                </div>

                <div class="program-card">
                    <div class="program-header">
                        <h3>🏈 Football Academy</h3>
                    </div>
                    <div class="program-body">
                        <ul>
                            <li>Offensive strategies</li>
                            <li>Defensive techniques</li>
                            <li>Position specialty</li>
                            <li>Strength & speed</li>
                            <li>League competitions</li>
                        </ul>
                        <a href="#contact" class="cta-button" style="width: 100%; display: block;">Learn More</a>
                    </div>
                </div>

                <div class="program-card">
                    <div class="program-header">
                        <h3>🏊 Swimming & Water Sports</h3>
                    </div>
                    <div class="program-body">
                        <ul>
                            <li>Swimming techniques</li>
                            <li>Water safety</li>
                            <li>Competitive swimming</li>
                            <li>Diving basics</li>
                            <li>Summer camps</li>
                        </ul>
                        <a href="#contact" class="cta-button" style="width: 100%; display: block;">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials">
        <div class="container">
            <h2 class="section-title">Success Stories</h2>
            <p class="section-subtitle">Hear from parents and athletes who've experienced NK EDUCATIF</p>
            
            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <div class="testimonial-text">"My son's confidence and skills improved dramatically. The coaches are passionate and truly care about every athlete's development."</div>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar">👨‍👧</div>
                        <div class="testimonial-info">
                            <h4>Robert Thompson</h4>
                            <p>Parent, Soccer Academy</p>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card">
                    <div class="testimonial-text">"The training methodology is excellent. I learned so much about technique and strategy. I'm now playing at a competitive level!"</div>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar">👩‍🎓</div>
                        <div class="testimonial-info">
                            <h4>Maya Patel</h4>
                            <p>Basketball Athlete</p>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card">
                    <div class="testimonial-text">"The facilities are world-class and the coaching staff is incredibly supportive. This is where we invest in our children's future."</div>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar">👨‍💼</div>
                        <div class="testimonial-info">
                            <h4>Ahmed Hassan</h4>
                            <p>Parent, Football Academy</p>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card">
                    <div class="testimonial-text">"I went from beginner to competitive player in just one season. The structured progression and expert guidance made all the difference."</div>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar">👩‍🏫</div>
                        <div class="testimonial-info">
                            <h4>Jessica Martinez</h4>
                            <p>Volleyball Athlete</p>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card">
                    <div class="testimonial-text">"The atmosphere is so encouraging and positive. My daughter loves coming to practice every day. The team spirit is amazing!"</div>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar">👩‍👧‍👦</div>
                        <div class="testimonial-info">
                            <h4>Patricia Lopez</h4>
                            <p>Parent, Multiple Programs</p>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card">
                    <div class="testimonial-text">"Best investment we made for our kids. They've grown as athletes and as people. Highly recommended to every family!"</div>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar">👨‍👨‍👧</div>
                        <div class="testimonial-info">
                            <h4>Kevin Wilson</h4>
                            <p>Parent, Athletics & Soccer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq">
        <div class="container">
            <h2 class="section-title">Frequently Asked Questions</h2>
            
            <div class="faq-container">
                <div class="faq-item active">
                    <div class="faq-question">
                        <span>What age groups do you serve?</span>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        We offer programs for children ages 5 through 18, with specialized training programs tailored to different age groups and skill levels. We also offer adult recreational programs for fitness enthusiasts.
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <span>Do I need prior experience to join?</span>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        No prior experience is necessary! We have beginner-friendly programs that teach fundamental skills from scratch. Our coaches are trained to work with athletes at all levels.
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <span>What is the instructor-to-student ratio?</span>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        Our average instructor-to-student ratio is 1:8, ensuring personalized attention and quality coaching for every athlete in our programs.
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <span>How often are the training sessions?</span>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        Most programs run 2-3 times per week, with competitive teams training more frequently. Sessions are typically 90 minutes to 2 hours long, depending on the program.
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <span>What are the program fees?</span>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        Fees vary by program and age group, ranging from $120-$350 per month. We offer scholarship opportunities and flexible payment plans for qualified families. Contact us for specific pricing.
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <span>What safety measures do you have in place?</span>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        All our coaches are certified in First Aid and CPR. We maintain strict safety protocols, proper facility maintenance, and age-appropriate equipment. We also have comprehensive insurance coverage.
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <span>Do you offer scholarships?</span>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        Yes! We believe quality sports education should be accessible to all. We offer need-based scholarships and financial assistance programs. Please contact our office to learn more.
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <span>How do I register for a program?</span>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        You can register online through our website, visit our office in person, or call us. We offer a free trial session so you can experience our programs before committing.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="cta-section" id="contact">
        <div class="container">
            <h2>Ready to Join NK EDUCATIF?</h2>
            <p>Start your journey to athletic excellence. Contact us today for a free trial session!</p>
            <div>
                <a href="mailto:contact@nkeducatif.com" class="cta-button">Send an Email</a>
                <a href="tel:+1234567890" class="cta-button cta-button-secondary">Call Us</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>NK EDUCATIF</h3>
                <p style="color: #ccc; margin-bottom: 1rem;">Excellence in sports education. Building champions through professional coaching and modern facilities.</p>
            </div>
            <div class="footer-section">
                <h3>Programs</h3>
                <ul>
                    <li><a href="#programs">Soccer Academy</a></li>
                    <li><a href="#programs">Basketball Elite</a></li>
                    <li><a href="#programs">Volleyball Training</a></li>
                    <li><a href="#programs">Athletics Program</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>About</h3>
                <ul>
                    <li><a href="#team">Our Team</a></li>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Contact</h3>
                <ul>
                    <li><a href="mailto:contact@nkeducatif.com">📧 contact@nkeducatif.com</a></li>
                    <li><a href="tel:+1234567890">📞 +1 (234) 567-890</a></li>
                    <li><a href="#">📍 123 Sports Avenue, City, Country</a></li>
                    <li><a href="#">Monday - Friday: 9AM - 6PM</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2026 NK EDUCATIF SPORTIF. All rights reserved. | Excellence in Sports Education</p>
        </div>
    </footer>

    <!-- Registration Section Modal -->
    <div id="registrationModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.7); z-index: 2000; align-items: center; justify-content: center; overflow-y: auto; padding: 20px;">
        <div style="background: white; border-radius: 15px; max-width: 600px; width: 100%; margin: auto; padding: 0; box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3); position: relative; margin: 20px auto;">
            <button onclick="closeRegistrationModal()" style="position: absolute; top: 20px; right: 20px; background: #e74c3c; color: white; border: none; width: 35px; height: 35px; border-radius: 50%; cursor: pointer; font-size: 20px; display: flex; align-items: center; justify-content: center; z-index: 10;">✕</button>
            
            <div style="padding: 40px;">
                <div style="text-align: center; margin-bottom: 30px;">
                    <h2 style="color: var(--text-dark); font-size: 28px; margin-bottom: 10px;">🏆 Sports Registration</h2>
                    <p style="color: #666; font-size: 14px;">Join NK EDUCATIF SPORTIF and pursue your passion for sports</p>
                </div>

                <form id="registrationForm">
                    @csrf
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 20px;">
                        <div>
                            <label style="display: block; margin-bottom: 8px; color: #333; font-weight: 600; font-size: 14px;">Full Name *</label>
                            <input type="text" id="full_name" name="full_name" placeholder="Your full name" required style="width: 100%; padding: 12px 15px; border: 2px solid #e0e0e0; border-radius: 8px; font-size: 14px; font-family: inherit; transition: all 0.3s ease;">
                        </div>

                        <div>
                            <label style="display: block; margin-bottom: 8px; color: #333; font-weight: 600; font-size: 14px;">Email *</label>
                            <input type="email" id="email" name="email" placeholder="your@email.com" required style="width: 100%; padding: 12px 15px; border: 2px solid #e0e0e0; border-radius: 8px; font-size: 14px; font-family: inherit; transition: all 0.3s ease;">
                        </div>
                    </div>

                    <div style="margin-bottom: 20px;">
                        <label style="display: block; margin-bottom: 8px; color: #333; font-weight: 600; font-size: 14px;">Select Sport *</label>
                        <select id="sport_name" name="sport_name" required style="width: 100%; padding: 12px 15px; border: 2px solid #e0e0e0; border-radius: 8px; font-size: 14px; font-family: inherit; transition: all 0.3s ease;">
                            <option value="">-- Choose a Sport --</option>
                            @foreach($sports as $sport)
                                <option value="{{ $sport }}">{{ $sport }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 20px;">
                        <div>
                            <label style="display: block; margin-bottom: 8px; color: #333; font-weight: 600; font-size: 14px;">Age Group *</label>
                            <select id="age_group" name="age_group" required style="width: 100%; padding: 12px 15px; border: 2px solid #e0e0e0; border-radius: 8px; font-size: 14px; font-family: inherit; transition: all 0.3s ease;">
                                <option value="">-- Select Age Group --</option>
                                <option value="U18">U18 (Under 18)</option>
                                <option value="U20">U20 (Under 20)</option>
                                <option value="U25">U25 (Under 25)</option>
                                <option value="Senior">Senior (25+)</option>
                            </select>
                        </div>

                        <div>
                            <label style="display: block; margin-bottom: 8px; color: #333; font-weight: 600; font-size: 14px;">Gender *</label>
                            <select id="gender" name="gender" required style="width: 100%; padding: 12px 15px; border: 2px solid #e0e0e0; border-radius: 8px; font-size: 14px; font-family: inherit; transition: all 0.3s ease;">
                                <option value="">-- Select Gender --</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 20px;">
                        <div>
                            <label style="display: block; margin-bottom: 8px; color: #333; font-weight: 600; font-size: 14px;">Position (Optional)</label>
                            <input type="text" id="position" name="position" placeholder="e.g., Goalkeeper, Forward" style="width: 100%; padding: 12px 15px; border: 2px solid #e0e0e0; border-radius: 8px; font-size: 14px; font-family: inherit; transition: all 0.3s ease;">
                        </div>

                        <div>
                            <label style="display: block; margin-bottom: 8px; color: #333; font-weight: 600; font-size: 14px;">Jersey Number (Optional)</label>
                            <input type="text" id="jersey_number" name="jersey_number" placeholder="e.g., 7" style="width: 100%; padding: 12px 15px; border: 2px solid #e0e0e0; border-radius: 8px; font-size: 14px; font-family: inherit; transition: all 0.3s ease;">
                        </div>
                    </div>

                    <div style="margin-bottom: 20px;">
                        <label style="display: block; margin-bottom: 8px; color: #333; font-weight: 600; font-size: 14px;">Phone Number (Optional)</label>
                        <input type="tel" id="phone" name="phone" placeholder="Your phone number" style="width: 100%; padding: 12px 15px; border: 2px solid #e0e0e0; border-radius: 8px; font-size: 14px; font-family: inherit; transition: all 0.3s ease;">
                    </div>

                    <div style="margin-bottom: 20px;">
                        <label style="display: block; margin-bottom: 8px; color: #333; font-weight: 600; font-size: 14px;">Additional Notes (Optional)</label>
                        <textarea id="notes" name="notes" placeholder="Tell us about yourself, your experience, or any special requirements..." style="width: 100%; padding: 12px 15px; border: 2px solid #e0e0e0; border-radius: 8px; font-size: 14px; font-family: inherit; resize: vertical; min-height: 100px; transition: all 0.3s ease;"></textarea>
                    </div>

                    <button type="submit" style="width: 100%; padding: 14px; background: linear-gradient(135deg, var(--primary-green), var(--primary-orange)); color: white; border: none; border-radius: 8px; font-size: 16px; font-weight: 600; cursor: pointer; transition: all 0.3s ease; margin-top: 20px;">
                        <span class="submit-text">Register Now</span>
                        <span class="loading" id="loading" style="display: none;">Registering...</span>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Success Popup Modal -->
    <div id="successModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); align-items: center; justify-content: center; z-index: 2001;">
        <div style="background: white; padding: 40px; border-radius: 15px; text-align: center; max-width: 400px; box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);">
            <div style="font-size: 50px; margin-bottom: 20px;">✅</div>
            <h2 style="color: #27ae60; margin-bottom: 15px; font-size: 24px;">Registration Successful!</h2>
            <p style="color: #666; margin-bottom: 25px; line-height: 1.6;">
                Thank you for registering! Your application has been submitted successfully. Our admin team will review your registration and contact you soon.
            </p>
            <button onclick="closeSuccessModal()" style="background: linear-gradient(135deg, var(--primary-green), var(--primary-orange)); color: white; border: none; padding: 12px 30px; border-radius: 8px; font-size: 16px; font-weight: 600; cursor: pointer; width: 100%;">
                Close
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
    </script>
</body>
</html>
