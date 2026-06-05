<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Portfolio | Finti Sasa Sabila</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --bg-primary: #ffffff;
            --bg-secondary: #f8f9fa;
            --text-primary: #2c3e50;
            --text-secondary: #6c757d;
            --accent: #3498db;
            --accent-hover: #2980b9;
            --card-bg: #ffffff;
            --border: #e0e0e0;
            --shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        body.dark-mode {
            --bg-primary: #1a1a2e;
            --bg-secondary: #16213e;
            --text-primary: #eeeeee;
            --text-secondary: #a0a0a0;
            --accent: #00b4d8;
            --accent-hover: #0096c7;
            --card-bg: #0f3460;
            --border: #2c3e50;
            --shadow: 0 4px 6px rgba(0,0,0,0.3);
        }

        * {
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        body {
            background-color: var(--bg-primary);
            color: var(--text-primary);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
        }

        /* Navbar */
        .navbar {
            background-color: var(--bg-primary);
            box-shadow: var(--shadow);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .navbar-brand {
            font-weight: bold;
            color: var(--accent) !important;
        }

        .nav-link {
            color: var(--text-primary) !important;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: var(--accent) !important;
        }

        /* Dark mode toggle */
        .theme-toggle {
            background: var(--card-bg);
            border: 1px solid var(--border);
            border-radius: 50px;
            cursor: pointer;
            padding: 8px 15px;
            transition: all 0.3s ease;
        }

        .theme-toggle i {
            font-size: 1.2rem;
            margin: 0 5px;
        }

        /* Hero Section */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--bg-primary) 0%, var(--bg-secondary) 100%);
            padding-top: 80px;
        }

        .profile-img {
            width: 250px;
            height: 250px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid var(--accent);
            box-shadow: var(--shadow);
        }

        /* Cards */
        .card {
            background: var(--card-bg);
            border: none;
            border-radius: 15px;
            box-shadow: var(--shadow);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }

        .card-img-top {
            border-radius: 15px 15px 0 0;
            height: 200px;
            object-fit: cover;
        }

        /* Skill badges */
        .skill-badge {
            background: var(--accent);
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            margin: 3px;
            display: inline-block;
        }

        /* Project cards grid */
        .project-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 1.5rem;
        }

        /* Certification timeline */
        .cert-item {
            background: var(--bg-secondary);
            padding: 1rem;
            border-radius: 10px;
            margin-bottom: 1rem;
            border-left: 4px solid var(--accent);
        }

        /* Contact form */
        .form-control {
            background: var(--bg-secondary);
            border: 1px solid var(--border);
            color: var(--text-primary);
        }

        .form-control:focus {
            background: var(--bg-secondary);
            border-color: var(--accent);
            color: var(--text-primary);
            box-shadow: none;
        }

        .btn-primary {
            background: var(--accent);
            border: none;
            padding: 12px 30px;
            border-radius: 50px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: var(--accent-hover);
            transform: translateY(-2px);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero {
                text-align: center;
            }
            
            .profile-img {
                width: 150px;
                height: 150px;
                margin-bottom: 20px;
            }
            
            h1 {
                font-size: 1.8rem;
            }
            
            .project-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (min-width: 769px) and (max-width: 1024px) {
            .project-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        /* Footer */
        footer {
            background: var(--bg-secondary);
            color: var(--text-secondary);
            text-align: center;
            padding: 2rem 0;
            margin-top: 3rem;
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

        .fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }

        section {
            padding: 80px 0;
        }

        .section-title {
            margin-bottom: 3rem;
            position: relative;
            display: inline-block;
        }

        .section-title:after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 60px;
            height: 3px;
            background: var(--accent);
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="#">Finti Sabila</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#skills">Skills</a></li>
                <li class="nav-item"><a class="nav-link" href="#projects">Projects</a></li>
                <li class="nav-item"><a class="nav-link" href="#certifications">Certifications</a></li>
                <li class="nav-item"><a class="nav-link" href="#experience">Experience</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
            </ul>
            <div class="theme-toggle ms-3" onclick="toggleDarkMode()">
                <i class="fas fa-sun"></i>
                <i class="fas fa-moon"></i>
            </div>
        </div>
    </div>
</nav>

<main>
    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-center">
                    <img src="https://via.placeholder.com/250" alt="Profile" class="profile-img">
                </div>
                <div class="col-lg-8">
                    <h1 class="display-4 fw-bold fade-in-up">Finti Sasa Sabila</h1>
                    <h3 class="text-accent mb-3">Android Developer | Web Developer | Full Stack Developer | IT Support</h3>
                    <p class="lead">I'm a passionate and aspiring web developer with a strong desire to create innovative solutions and push the boundaries of technology. With a deep love for coding and problem-solving, I am constantly seeking opportunities to learn and grow in this ever-evolving field.</p>
                    <div class="mt-4">
                        <a href="#contact" class="btn btn-primary me-2">Hire Me</a>
                        <a href="#projects" class="btn btn-outline-primary">View Projects</a>
                    </div>
                    <div class="mt-3">
                        <small><i class="fas fa-map-marker-alt"></i> Jakarta Utara, Indonesia</small><br>
                        <small><i class="fas fa-phone"></i> +62 895-1618-9819</small><br>
                        <small><i class="fas fa-envelope"></i> finti.sasa.sabila@gmail.com</small>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Skills Section -->
    <section id="skills" class="bg-secondary">
        <div class="container">
            <h2 class="section-title">Technical Skills</h2>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <h4>Tools & Platforms</h4>
                    <?php foreach($skills['tools'] as $skill): ?>
                        <span class="skill-badge"><?= $skill ?></span>
                    <?php endforeach; ?>
                </div>
                <div class="col-md-6 mb-4">
                    <h4>Backend & Server</h4>
                    <?php foreach($skills['backend'] as $skill): ?>
                        <span class="skill-badge"><?= $skill ?></span>
                    <?php endforeach; ?>
                </div>
                <div class="col-md-6 mb-4">
                    <h4>Frontend & Mobile</h4>
                    <?php foreach($skills['frontend'] as $skill): ?>
                        <span class="skill-badge"><?= $skill ?></span>
                    <?php endforeach; ?>
                </div>
                <div class="col-md-6 mb-4">
                    <h4>System Admin Skills</h4>
                    <?php foreach($skills['system'] as $skill): ?>
                        <span class="skill-badge"><?= $skill ?></span>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Projects Section -->
    <section id="projects">
        <div class="container">
            <h2 class="section-title">Featured Projects</h2>
            <div class="project-grid">
                <?php foreach($projects as $project): ?>
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-<?= $project['type'] == 'android' ? 'mobile-alt' : 'globe' ?> fa-2x mb-3" style="color: var(--accent)"></i>
                        <h5 class="card-title"><?= $project['name'] ?></h5>
                        <p class="card-text"><small><?= $project['tech'] ?></small></p>
                        <span class="skill-badge"><?= ucfirst($project['type']) ?></span>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Certifications Section -->
    <section id="certifications" class="bg-secondary">
        <div class="container">
            <h2 class="section-title">Certifications</h2>
            <div class="row">
                <?php foreach($certifications as $cert): ?>
                <div class="col-md-6">
                    <div class="cert-item">
                        <i class="fas fa-certificate" style="color: var(--accent)"></i>
                        <h5><?= $cert['name'] ?></h5>
                        <p><?= $cert['provider'] ?> | <?= $cert['date'] ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Experience Section -->
    <section id="experience">
        <div class="container">
            <h2 class="section-title">Work Experience & Education</h2>
            <div class="row">
                <div class="col-md-6">
                    <h4>Work Experience</h4>
                    <?php foreach($experiences as $exp): ?>
                    <div class="cert-item">
                        <h5><?= $exp['title'] ?> - <?= $exp['company'] ?></h5>
                        <p><i class="fas fa-calendar-alt"></i> <?= $exp['duration'] ?></p>
                        <p><?= $exp['description'] ?></p>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="col-md-6">
                    <h4>Education</h4>
                    <?php foreach($education as $edu): ?>
                    <div class="cert-item">
                        <h5><?= $edu['degree'] ?></h5>
                        <p><?= $edu['university'] ?> | <?= $edu['year'] ?></p>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="bg-secondary">
        <div class="container">
            <h2 class="section-title">Interested in Working Together?</h2>
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <?php if(session()->getFlashdata('success')): ?>
                        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                    <?php endif; ?>
                    <form action="/submit-interest" method="POST">
                        <div class="mb-3">
                            <input type="text" name="name" class="form-control" placeholder="Nama Lengkap" required>
                        </div>
                        <div class="mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="mb-3">
                            <input type="tel" name="phone" class="form-control" placeholder="No. Telepon" required>
                        </div>
                        <div class="mb-3">
                            <select name="service" class="form-control" required>
                                <option value="">Pilih Layanan</option>
                                <option value="android">Android Development</option>
                                <option value="web">Web Development</option>
                                <option value="fullstack">Full Stack Development</option>
                                <option value="it_support">IT Support</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <textarea name="message" class="form-control" rows="5" placeholder="Deskripsikan proyek Anda..." required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Kirim Pesan</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>

<footer>
    <div class="container">
        <p>&copy; 2024 Finti Sasa Sabila. All rights reserved.</p>
        <div class="social-links">
            <a href="#" style="color: var(--accent); margin: 0 10px;"><i class="fab fa-github fa-2x"></i></a>
            <a href="#" style="color: var(--accent); margin: 0 10px;"><i class="fab fa-linkedin fa-2x"></i></a>
            <a href="#" style="color: var(--accent); margin: 0 10px;"><i class="fab fa-instagram fa-2x"></i></a>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Dark mode toggle
    function toggleDarkMode() {
        document.body.classList.toggle('dark-mode');
        localStorage.setItem('darkMode', document.body.classList.contains('dark-mode'));
    }
    
    // Load dark mode preference
    if(localStorage.getItem('darkMode') === 'true') {
        document.body.classList.add('dark-mode');
    }
    
    // Smooth scroll
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if(target) {
                target.scrollIntoView({ behavior: 'smooth' });
            }
        });
    });
</script>
</body>
</html>