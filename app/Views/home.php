<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<!-- Hero Section -->
<section id="home" class="hero">
    <div class="hero-container">
        <div class="hero-content">
            <span class="hero-badge">👋 Welcome to my portfolio</span>
            <h1>Finti Sasa Sabila</h1>
            <h2 style="color: var(--accent); margin-bottom: 1rem;">Full Stack & Android Developer</h2>
            <p>I'm a passionate and aspiring web developer with a strong desire to create innovative solutions and push the boundaries of technology. With a deep love for coding and problem-solving, I am constantly seeking opportunities to learn and grow in this ever-evolving field.</p>
            <div style="margin-top: 2rem; display: flex; gap: 1rem;">
                <a href="#contact" class="btn">Hire Me</a>
                <a href="#projects" class="btn" style="background: transparent; border: 2px solid var(--accent);">View Work</a>
            </div>
        </div>
        <div class="hero-image">
            <img src="<?= base_url('uploads/profile.jpg') ?>" alt="Profile" style="width: 100%; border-radius: 50%;">
        </div>
    </div>
</section>

<!-- Technical Skills -->
<section id="skills" class="skills-section">
    <div class="container">
        <h2 class="section-title">Technical Skills</h2>
        <div class="skills-grid">
            <div class="skill-card">
                <h3>📱 Mobile Development</h3>
                <div class="skill-tags">
                    <span class="skill-tag">Kotlin</span>
                    <span class="skill-tag">Java</span>
                    <span class="skill-tag">Android Studio</span>
                    <span class="skill-tag">Retrofit</span>
                    <span class="skill-tag">XML Layout</span>
                </div>
            </div>
            <div class="skill-card">
                <h3>🌐 Web Development</h3>
                <div class="skill-tags">
                    <span class="skill-tag">PHP (CI4, Laravel)</span>
                    <span class="skill-tag">Node.js</span>
                    <span class="skill-tag">React</span>
                    <span class="skill-tag">HTML5/CSS3</span>
                    <span class="skill-tag">JavaScript/jQuery</span>
                </div>
            </div>
            <div class="skill-card">
                <h3>🛢️ Backend & Database</h3>
                <div class="skill-tags">
                    <span class="skill-tag">MySQL</span>
                    <span class="skill-tag">RESTful API</span>
                    <span class="skill-tag">Postman</span>
                    <span class="skill-tag">Git & GitHub</span>
                </div>
            </div>
            <div class="skill-card">
                <h3>💻 IT Support</h3>
                <div class="skill-tags">
                    <span class="skill-tag">Server Configuration</span>
                    <span class="skill-tag">Database Admin</span>
                    <span class="skill-tag">System Troubleshooting</span>
                    <span class="skill-tag">API Integration</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Certifications -->
<section style="padding: 5rem 2rem;">
    <div class="container">
        <h2 class="section-title">Certifications</h2>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1rem;">
            <div class="skill-card">🏆 Back-End Developer – DBS Foundation (Sep 2024)</div>
            <div class="skill-card">🏆 Full Stack Web Development – Harisenin Coding Camp</div>
            <div class="skill-card">🏆 Meta Android Developer – Coursera (Aug 2023)</div>
            <div class="skill-card">🏆 IT Support Google Specialization – Coursera (Aug 2023)</div>
            <div class="skill-card">🏆 Mobile Development and JavaScript – Coursera (Aug 2023)</div>
        </div>
    </div>
</section>

<!-- Featured Projects -->
<section id="projects" class="skills-section">
    <div class="container">
        <h2 class="section-title">Featured Projects</h2>
        <div class="projects-grid">
            <?php foreach($projects as $project): ?>
            <div class="project-card">
                <img src="<?= base_url('uploads/projects/'.$project['image']) ?>" alt="<?= $project['project_name'] ?>">
                <div class="project-info">
                    <h3><?= $project['project_name'] ?></h3>
                    <p><?= $project['description'] ?></p>
                    <a href="<?= $project['project_url'] ?>" target="_blank" class="btn" style="margin-top: 1rem; display: inline-block;">View Project →</a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Experience -->
<section id="experience" style="padding: 5rem 2rem;">
    <div class="container">
        <h2 class="section-title">Work Experience</h2>
        <div class="skills-grid">
            <div class="skill-card">
                <h3>📱 Mobile Developer</h3>
                <h4>PT Wahana Makmur Sejati</h4>
                <p style="color: var(--accent);">1 Year Internship</p>
                <p>Android development using Kotlin, API integration with Retrofit, UI/UX implementation</p>
            </div>
            <div class="skill-card">
                <h3>💻 Full Stack Developer</h3>
                <h4>Contract (6 months)</h4>
                <p>Full stack web development using PHP CodeIgniter 4, MySQL, and frontend technologies</p>
            </div>
            <div class="skill-card">
                <h3>🎓 Education</h3>
                <h4>Bachelor's Degree in Information Technology</h4>
                <p>Universitas Negeri Jakarta</p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form -->
<section id="contact" class="contact-section">
    <div class="container">
        <h2 class="section-title">Interested in Working Together?</h2>
        <form id="contactForm" class="contact-form">
            <div class="form-group">
                <input type="text" name="name" placeholder="Your Name" required>
            </div>
            <div class="form-group">
                <input type="email" name="email" placeholder="Email Address" required>
            </div>
            <div class="form-group">
                <input type="text" name="company" placeholder="Company (Optional)">
            </div>
            <div class="form-group">
                <select name="service_type" required>
                    <option value="">Select Service</option>
                    <option value="android_development">Android Development</option>
                    <option value="web_development">Web Development</option>
                    <option value="fullstack">Full Stack Development</option>
                    <option value="it_support">IT Support</option>
                </select>
            </div>
            <div class="form-group">
                <textarea name="message" rows="5" placeholder="Tell me about your project..." required></textarea>
            </div>
            <button type="submit" class="btn">Send Message</button>
        </form>
        <div style="margin-top: 2rem; text-align: center;">
            <p>📧 finti.sasa.sabila@gmail.com | 📞 +62 895-1618-9819</p>
            <p>📍 Jakarta Utara, Indonesia</p>
        </div>
    </div>
</section>
<?= $this->endSection() ?>