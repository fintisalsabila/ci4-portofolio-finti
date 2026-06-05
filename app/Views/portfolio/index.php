<!DOCTYPE html>
<html lang="id" data-theme="dark">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Finti Sasa Sabila – Full Stack Developer & Android Engineer</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700;800&family=DM+Mono:wght@300;400;500&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
/* ==================== CSS VARIABLES ==================== */
:root {
  --font-display: 'Syne', sans-serif;
  --font-mono: 'DM Mono', monospace;
  --font-body: 'DM Sans', sans-serif;

  /* Dark Theme */
  --bg-primary: #080c14;
  --bg-secondary: #0d1423;
  --bg-card: #111827;
  --bg-card-hover: #151f32;
  --border: rgba(99,179,237,0.12);
  --border-accent: rgba(99,179,237,0.3);
  --text-primary: #e8f0fe;
  --text-secondary: #8da3c4;
  --text-muted: #4a6080;
  --accent: #4facfe;
  --accent-2: #00f2fe;
  --accent-3: #43e97b;
  --accent-warm: #f093fb;
  --glow: rgba(79,172,254,0.15);
  --glow-strong: rgba(79,172,254,0.3);
  --shadow: 0 20px 60px rgba(0,0,0,0.5);
  --gradient-hero: linear-gradient(135deg, #080c14 0%, #0d1a2d 50%, #080c14 100%);
  --gradient-accent: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
  --gradient-card: linear-gradient(135deg, rgba(79,172,254,0.05) 0%, rgba(0,242,254,0.02) 100%);
}

[data-theme="light"] {
  --bg-primary: #f0f4ff;
  --bg-secondary: #e4ecff;
  --bg-card: #ffffff;
  --bg-card-hover: #f7f9ff;
  --border: rgba(79,172,254,0.15);
  --border-accent: rgba(79,172,254,0.4);
  --text-primary: #0d1a2d;
  --text-secondary: #3a5a8c;
  --text-muted: #7a9abf;
  --accent: #1a7fd4;
  --accent-2: #0099cc;
  --accent-3: #16a34a;
  --accent-warm: #9333ea;
  --glow: rgba(26,127,212,0.08);
  --glow-strong: rgba(26,127,212,0.2);
  --shadow: 0 20px 60px rgba(13,26,45,0.12);
  --gradient-hero: linear-gradient(135deg, #e4ecff 0%, #d0e0ff 50%, #e4ecff 100%);
  --gradient-accent: linear-gradient(135deg, #1a7fd4 0%, #0099cc 100%);
  --gradient-card: linear-gradient(135deg, rgba(26,127,212,0.05) 0%, rgba(0,153,204,0.02) 100%);
}

/* ==================== RESET & BASE ==================== */
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
html { scroll-behavior: smooth; font-size: 16px; }
body {
  font-family: var(--font-body);
  background: var(--bg-primary);
  color: var(--text-primary);
  transition: background 0.4s ease, color 0.4s ease;
  overflow-x: hidden;
  line-height: 1.6;
}
a { color: inherit; text-decoration: none; }
img { max-width: 100%; display: block; }
ul { list-style: none; }

/* ==================== SCROLLBAR ==================== */
::-webkit-scrollbar { width: 6px; }
::-webkit-scrollbar-track { background: var(--bg-primary); }
::-webkit-scrollbar-thumb { background: var(--accent); border-radius: 3px; }

/* ==================== NOISE TEXTURE OVERLAY ==================== */
body::before {
  content: '';
  position: fixed;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.03'/%3E%3C/svg%3E");
  pointer-events: none;
  z-index: 1000;
  opacity: 0.4;
}

/* ==================== NAVBAR ==================== */
nav {
  position: fixed;
  top: 0; left: 0; right: 0;
  z-index: 900;
  padding: 0 2rem;
  height: 64px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  background: rgba(8,12,20,0.85);
  backdrop-filter: blur(20px);
  border-bottom: 1px solid var(--border);
  transition: all 0.3s ease;
}
[data-theme="light"] nav {
  background: rgba(240,244,255,0.9);
}
.nav-logo {
  font-family: var(--font-display);
  font-size: 1.3rem;
  font-weight: 800;
  background: var(--gradient-accent);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  letter-spacing: -0.5px;
}
.nav-links {
  display: flex;
  align-items: center;
  gap: 0.3rem;
}
.nav-links a {
  font-family: var(--font-mono);
  font-size: 0.78rem;
  color: var(--text-secondary);
  padding: 0.4rem 0.8rem;
  border-radius: 6px;
  transition: all 0.2s;
  letter-spacing: 0.5px;
}
.nav-links a:hover {
  color: var(--accent);
  background: var(--glow);
}
.nav-right {
  display: flex;
  align-items: center;
  gap: 0.8rem;
}
.theme-toggle {
  background: var(--bg-card);
  border: 1px solid var(--border);
  color: var(--text-secondary);
  width: 38px; height: 38px;
  border-radius: 10px;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 0.85rem;
  transition: all 0.2s;
}
.theme-toggle:hover {
  border-color: var(--accent);
  color: var(--accent);
  background: var(--glow);
}
.hamburger {
  display: none;
  background: var(--bg-card);
  border: 1px solid var(--border);
  color: var(--text-primary);
  width: 38px; height: 38px;
  border-radius: 10px;
  cursor: pointer;
  align-items: center;
  justify-content: center;
  font-size: 1rem;
  transition: all 0.2s;
}
.mobile-menu {
  display: none;
  position: fixed;
  top: 64px; left: 0; right: 0;
  background: var(--bg-secondary);
  border-bottom: 1px solid var(--border);
  padding: 1rem;
  z-index: 899;
  flex-direction: column;
  gap: 0.3rem;
}
.mobile-menu.open { display: flex; }
.mobile-menu a {
  font-family: var(--font-mono);
  font-size: 0.85rem;
  color: var(--text-secondary);
  padding: 0.7rem 1rem;
  border-radius: 8px;
  transition: all 0.2s;
}
.mobile-menu a:hover { color: var(--accent); background: var(--glow); }

/* ==================== HERO ==================== */
.hero {
  min-height: 100vh;
  display: flex;
  align-items: center;
  background: var(--gradient-hero);
  position: relative;
  overflow: hidden;
  padding: 6rem 2rem 4rem;
}
.hero-grid-bg {
  position: absolute;
  inset: 0;
  background-image:
    linear-gradient(var(--border) 1px, transparent 1px),
    linear-gradient(90deg, var(--border) 1px, transparent 1px);
  background-size: 60px 60px;
  opacity: 0.3;
}
.hero-glow {
  position: absolute;
  width: 600px; height: 600px;
  border-radius: 50%;
  background: radial-gradient(circle, rgba(79,172,254,0.12) 0%, transparent 70%);
  top: -100px; right: -100px;
  animation: floatGlow 8s ease-in-out infinite;
}
.hero-glow-2 {
  position: absolute;
  width: 400px; height: 400px;
  border-radius: 50%;
  background: radial-gradient(circle, rgba(67,233,123,0.08) 0%, transparent 70%);
  bottom: -50px; left: -50px;
  animation: floatGlow 10s ease-in-out infinite reverse;
}
@keyframes floatGlow {
  0%, 100% { transform: translate(0,0); }
  50% { transform: translate(30px, -30px); }
}
.hero-container {
  max-width: 1200px;
  margin: 0 auto;
  width: 100%;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 4rem;
  align-items: center;
  position: relative;
  z-index: 2;
}
.hero-tag {
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  font-family: var(--font-mono);
  font-size: 0.75rem;
  color: var(--accent-3);
  background: rgba(67,233,123,0.1);
  border: 1px solid rgba(67,233,123,0.2);
  padding: 0.35rem 0.8rem;
  border-radius: 50px;
  margin-bottom: 1.5rem;
  letter-spacing: 1px;
  text-transform: uppercase;
}
.hero-tag::before {
  content: '';
  width: 6px; height: 6px;
  border-radius: 50%;
  background: var(--accent-3);
  animation: pulse 2s infinite;
}
@keyframes pulse {
  0%, 100% { opacity: 1; transform: scale(1); }
  50% { opacity: 0.5; transform: scale(0.8); }
}
.hero-title {
  font-family: var(--font-display);
  font-size: clamp(2.2rem, 5vw, 3.8rem);
  font-weight: 800;
  line-height: 1.05;
  letter-spacing: -2px;
  margin-bottom: 1rem;
}
.hero-title .line-2 {
  background: var(--gradient-accent);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}
.hero-subtitle {
  font-family: var(--font-mono);
  font-size: 0.85rem;
  color: var(--accent);
  margin-bottom: 1.2rem;
  letter-spacing: 1px;
}
.hero-desc {
  font-size: 1rem;
  color: var(--text-secondary);
  line-height: 1.75;
  margin-bottom: 2rem;
  max-width: 480px;
}
.hero-actions {
  display: flex;
  gap: 1rem;
  flex-wrap: wrap;
}
.btn-primary {
  font-family: var(--font-mono);
  font-size: 0.8rem;
  font-weight: 500;
  padding: 0.75rem 1.6rem;
  border-radius: 10px;
  background: var(--gradient-accent);
  color: #080c14;
  border: none;
  cursor: pointer;
  letter-spacing: 0.5px;
  transition: all 0.25s;
  text-transform: uppercase;
}
.btn-primary:hover {
  transform: translateY(-2px);
  box-shadow: 0 12px 30px var(--glow-strong);
}
.btn-outline {
  font-family: var(--font-mono);
  font-size: 0.8rem;
  font-weight: 500;
  padding: 0.75rem 1.6rem;
  border-radius: 10px;
  background: transparent;
  color: var(--accent);
  border: 1px solid var(--border-accent);
  cursor: pointer;
  letter-spacing: 0.5px;
  transition: all 0.25s;
  text-transform: uppercase;
}
.btn-outline:hover {
  background: var(--glow);
  transform: translateY(-2px);
}
.hero-socials {
  margin-top: 2rem;
  display: flex;
  gap: 0.8rem;
}
.social-icon {
  width: 38px; height: 38px;
  border-radius: 10px;
  background: var(--bg-card);
  border: 1px solid var(--border);
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--text-secondary);
  font-size: 0.9rem;
  transition: all 0.2s;
}
.social-icon:hover {
  color: var(--accent);
  border-color: var(--accent);
  background: var(--glow);
  transform: translateY(-2px);
}
.hero-visual {
  display: flex;
  flex-direction: column;
  gap: 1rem;
  align-items: flex-end;
}
.profile-card {
  background: var(--bg-card);
  border: 1px solid var(--border);
  border-radius: 20px;
  padding: 1.5rem;
  width: 100%;
  max-width: 320px;
  position: relative;
  overflow: hidden;
  box-shadow: var(--shadow);
}
.profile-card::before {
  content: '';
  position: absolute;
  top: 0; left: 0; right: 0;
  height: 3px;
  background: var(--gradient-accent);
}
.profile-avatar {
  width: 72px; height: 72px;
  border-radius: 16px;
  background: var(--gradient-accent);
  display: flex;
  align-items: center;
  justify-content: center;
  font-family: var(--font-display);
  font-size: 1.5rem;
  font-weight: 800;
  color: #080c14;
  margin-bottom: 1rem;
}
.profile-name {
  font-family: var(--font-display);
  font-size: 1rem;
  font-weight: 700;
  color: var(--text-primary);
  margin-bottom: 0.2rem;
}
.profile-role {
  font-family: var(--font-mono);
  font-size: 0.72rem;
  color: var(--accent);
  letter-spacing: 0.5px;
}
.profile-location {
  font-size: 0.78rem;
  color: var(--text-muted);
  margin-top: 0.8rem;
  display: flex;
  align-items: center;
  gap: 0.4rem;
}
.stats-row {
  display: flex;
  gap: 0.6rem;
  margin-top: 1rem;
}
.stat-item {
  flex: 1;
  text-align: center;
  padding: 0.6rem;
  background: var(--bg-secondary);
  border-radius: 10px;
  border: 1px solid var(--border);
}
.stat-num {
  font-family: var(--font-display);
  font-size: 1.2rem;
  font-weight: 800;
  color: var(--accent);
}
.stat-label {
  font-size: 0.65rem;
  color: var(--text-muted);
  font-family: var(--font-mono);
  letter-spacing: 0.3px;
}
.tech-badges {
  display: flex;
  flex-wrap: wrap;
  gap: 0.4rem;
  max-width: 320px;
}
.tech-badge {
  font-family: var(--font-mono);
  font-size: 0.68rem;
  padding: 0.3rem 0.65rem;
  border-radius: 6px;
  background: var(--bg-card);
  border: 1px solid var(--border);
  color: var(--text-secondary);
  letter-spacing: 0.3px;
  transition: all 0.2s;
}
.tech-badge:hover {
  border-color: var(--accent);
  color: var(--accent);
  background: var(--glow);
}

/* ==================== SECTION ==================== */
section {
  padding: 5rem 2rem;
}
.section-container {
  max-width: 1200px;
  margin: 0 auto;
}
.section-header {
  margin-bottom: 3rem;
  display: flex;
  align-items: flex-end;
  gap: 1rem;
}
.section-number {
  font-family: var(--font-mono);
  font-size: 0.7rem;
  color: var(--accent);
  letter-spacing: 2px;
  text-transform: uppercase;
  opacity: 0.6;
  margin-bottom: 0.5rem;
}
.section-title {
  font-family: var(--font-display);
  font-size: clamp(1.6rem, 3.5vw, 2.4rem);
  font-weight: 800;
  letter-spacing: -1px;
  color: var(--text-primary);
}
.section-line {
  flex: 1;
  height: 1px;
  background: var(--border);
  margin-bottom: 0.4rem;
}

/* ==================== ABOUT ==================== */
.about-section { background: var(--bg-secondary); }
.about-grid {
  display: grid;
  grid-template-columns: 1fr 1.2fr;
  gap: 4rem;
  align-items: start;
}
.about-text p {
  font-size: 0.95rem;
  color: var(--text-secondary);
  line-height: 1.8;
  margin-bottom: 1.2rem;
}
.about-highlights {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}
.highlight-item {
  display: flex;
  align-items: flex-start;
  gap: 1rem;
  padding: 1rem;
  background: var(--bg-card);
  border: 1px solid var(--border);
  border-radius: 12px;
  transition: all 0.2s;
}
.highlight-item:hover {
  border-color: var(--border-accent);
  background: var(--bg-card-hover);
}
.highlight-icon {
  width: 36px; height: 36px;
  border-radius: 8px;
  background: var(--gradient-accent);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 0.85rem;
  color: #080c14;
  flex-shrink: 0;
}
.highlight-text strong {
  display: block;
  font-size: 0.85rem;
  font-weight: 600;
  color: var(--text-primary);
  margin-bottom: 0.2rem;
}
.highlight-text span {
  font-size: 0.78rem;
  color: var(--text-secondary);
}

/* ==================== SKILLS ==================== */
.skills-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 1.5rem;
}
.skill-category {
  background: var(--bg-card);
  border: 1px solid var(--border);
  border-radius: 16px;
  padding: 1.5rem;
  transition: all 0.3s;
  background-image: var(--gradient-card);
}
.skill-category:hover {
  border-color: var(--border-accent);
  transform: translateY(-3px);
  box-shadow: 0 16px 40px var(--glow);
}
.skill-cat-header {
  display: flex;
  align-items: center;
  gap: 0.75rem;
  margin-bottom: 1.2rem;
}
.skill-cat-icon {
  width: 32px; height: 32px;
  border-radius: 8px;
  background: var(--glow);
  border: 1px solid var(--border-accent);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 0.85rem;
  color: var(--accent);
}
.skill-cat-name {
  font-family: var(--font-display);
  font-size: 0.9rem;
  font-weight: 700;
  color: var(--text-primary);
}
.skill-tags {
  display: flex;
  flex-wrap: wrap;
  gap: 0.4rem;
}
.skill-tag {
  font-family: var(--font-mono);
  font-size: 0.68rem;
  padding: 0.28rem 0.6rem;
  border-radius: 5px;
  background: var(--bg-secondary);
  border: 1px solid var(--border);
  color: var(--text-secondary);
  transition: all 0.2s;
}
.skill-tag:hover {
  background: var(--glow);
  border-color: var(--accent);
  color: var(--accent);
}

/* ==================== EXPERIENCE ==================== */
.experience-section { background: var(--bg-secondary); }
.timeline {
  display: flex;
  flex-direction: column;
  gap: 0;
  position: relative;
}
.timeline::before {
  content: '';
  position: absolute;
  left: 20px;
  top: 0; bottom: 0;
  width: 1px;
  background: linear-gradient(180deg, var(--accent) 0%, var(--border) 100%);
}
.timeline-item {
  display: flex;
  gap: 2rem;
  padding-bottom: 2.5rem;
  position: relative;
}
.timeline-dot {
  width: 41px;
  flex-shrink: 0;
  display: flex;
  justify-content: center;
  padding-top: 0.2rem;
}
.timeline-dot-inner {
  width: 12px; height: 12px;
  border-radius: 50%;
  background: var(--accent);
  border: 2px solid var(--bg-secondary);
  box-shadow: 0 0 0 4px var(--glow-strong);
  flex-shrink: 0;
}
.timeline-content {
  background: var(--bg-card);
  border: 1px solid var(--border);
  border-radius: 14px;
  padding: 1.4rem;
  flex: 1;
  transition: all 0.2s;
}
.timeline-content:hover {
  border-color: var(--border-accent);
  box-shadow: 0 8px 30px var(--glow);
}
.timeline-meta {
  display: flex;
  align-items: center;
  justify-content: space-between;
  flex-wrap: wrap;
  gap: 0.5rem;
  margin-bottom: 0.6rem;
}
.timeline-company {
  font-family: var(--font-display);
  font-size: 1rem;
  font-weight: 700;
  color: var(--text-primary);
}
.timeline-period {
  font-family: var(--font-mono);
  font-size: 0.7rem;
  color: var(--accent);
  background: var(--glow);
  border: 1px solid var(--border-accent);
  padding: 0.2rem 0.6rem;
  border-radius: 50px;
  letter-spacing: 0.5px;
}
.timeline-role {
  font-size: 0.82rem;
  color: var(--accent);
  font-weight: 500;
  margin-bottom: 0.8rem;
}
.timeline-desc {
  font-size: 0.85rem;
  color: var(--text-secondary);
  line-height: 1.7;
  padding-left: 0;
  margin: 0;
}
.timeline-desc li {
  margin-bottom: 0.4rem;
  padding-left: 1rem;
  position: relative;
  list-style: none;
}
.timeline-desc li::before {
  content: '→';
  position: absolute;
  left: 0;
  color: var(--accent);
  font-size: 0.7rem;
}

/* ==================== EDUCATION ==================== */
.edu-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: 1.5rem;
}
.edu-card {
  background: var(--bg-card);
  border: 1px solid var(--border);
  border-radius: 16px;
  padding: 1.5rem;
  position: relative;
  overflow: hidden;
  transition: all 0.3s;
  background-image: var(--gradient-card);
}
.edu-card::before {
  content: '';
  position: absolute;
  top: 0; left: 0; right: 0;
  height: 2px;
  background: var(--gradient-accent);
}
.edu-card:hover {
  transform: translateY(-4px);
  border-color: var(--border-accent);
  box-shadow: 0 16px 40px var(--glow);
}
.edu-icon {
  width: 44px; height: 44px;
  border-radius: 12px;
  background: var(--glow);
  border: 1px solid var(--border-accent);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.1rem;
  color: var(--accent);
  margin-bottom: 1rem;
}
.edu-degree {
  font-family: var(--font-display);
  font-size: 0.95rem;
  font-weight: 700;
  color: var(--text-primary);
  margin-bottom: 0.3rem;
}
.edu-school {
  font-size: 0.82rem;
  color: var(--text-secondary);
  margin-bottom: 0.4rem;
}
.edu-period {
  font-family: var(--font-mono);
  font-size: 0.68rem;
  color: var(--accent);
  letter-spacing: 0.5px;
}

/* ==================== CERTIFICATIONS ==================== */
.cert-section { background: var(--bg-secondary); }
.cert-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
  gap: 1.2rem;
}
.cert-card {
  background: var(--bg-card);
  border: 1px solid var(--border);
  border-radius: 14px;
  padding: 1.2rem;
  display: flex;
  align-items: flex-start;
  gap: 1rem;
  transition: all 0.25s;
  cursor: pointer;
}
.cert-card:hover {
  border-color: var(--border-accent);
  background: var(--bg-card-hover);
  transform: translateY(-2px);
  box-shadow: 0 8px 25px var(--glow);
}
.cert-icon {
  width: 40px; height: 40px;
  border-radius: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1rem;
  flex-shrink: 0;
}
.cert-icon.blue { background: rgba(79,172,254,0.15); color: var(--accent); }
.cert-icon.green { background: rgba(67,233,123,0.15); color: var(--accent-3); }
.cert-icon.purple { background: rgba(240,147,251,0.15); color: var(--accent-warm); }
.cert-name {
  font-size: 0.85rem;
  font-weight: 600;
  color: var(--text-primary);
  margin-bottom: 0.2rem;
}
.cert-org {
  font-family: var(--font-mono);
  font-size: 0.7rem;
  color: var(--text-muted);
  letter-spacing: 0.3px;
}

/* ==================== PROJECTS ==================== */
.projects-section { background: var(--bg-primary); }
.projects-filter {
  display: flex;
  flex-wrap: wrap;
  gap: 0.5rem;
  margin-bottom: 2.5rem;
}
.filter-btn {
  font-family: var(--font-mono);
  font-size: 0.72rem;
  padding: 0.4rem 0.9rem;
  border-radius: 6px;
  border: 1px solid var(--border);
  background: var(--bg-card);
  color: var(--text-secondary);
  cursor: pointer;
  transition: all 0.2s;
  letter-spacing: 0.5px;
  text-transform: uppercase;
}
.filter-btn.active, .filter-btn:hover {
  border-color: var(--accent);
  color: var(--accent);
  background: var(--glow);
}
.projects-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
  gap: 1.5rem;
}
.project-card {
  background: var(--bg-card);
  border: 1px solid var(--border);
  border-radius: 18px;
  overflow: hidden;
  transition: all 0.3s;
}
.project-card:hover {
  border-color: var(--border-accent);
  transform: translateY(-5px);
  box-shadow: 0 20px 50px var(--glow);
}
.project-img {
  height: 180px;
  background: var(--bg-secondary);
  position: relative;
  overflow: hidden;
  display: flex;
  align-items: center;
  justify-content: center;
}
.project-img-placeholder {
  font-size: 3rem;
  opacity: 0.3;
}
.project-img-gradient {
  position: absolute;
  inset: 0;
  background: linear-gradient(135deg, var(--accent) 0%, var(--accent-2) 100%);
  opacity: 0.08;
}
.project-type-tag {
  position: absolute;
  top: 0.8rem; right: 0.8rem;
  font-family: var(--font-mono);
  font-size: 0.62rem;
  padding: 0.2rem 0.5rem;
  border-radius: 4px;
  background: var(--bg-card);
  border: 1px solid var(--border);
  color: var(--text-muted);
  letter-spacing: 0.5px;
  text-transform: uppercase;
}
.project-body {
  padding: 1.3rem;
}
.project-title {
  font-family: var(--font-display);
  font-size: 1rem;
  font-weight: 700;
  color: var(--text-primary);
  margin-bottom: 0.5rem;
  letter-spacing: -0.3px;
}
.project-desc {
  font-size: 0.8rem;
  color: var(--text-secondary);
  line-height: 1.65;
  margin-bottom: 1rem;
}
.project-stack {
  display: flex;
  flex-wrap: wrap;
  gap: 0.3rem;
  margin-bottom: 1rem;
}
.stack-tag {
  font-family: var(--font-mono);
  font-size: 0.62rem;
  padding: 0.2rem 0.5rem;
  border-radius: 4px;
  background: var(--bg-secondary);
  border: 1px solid var(--border);
  color: var(--text-muted);
}
.project-links {
  display: flex;
  gap: 0.6rem;
}
.project-link {
  font-family: var(--font-mono);
  font-size: 0.68rem;
  padding: 0.35rem 0.7rem;
  border-radius: 6px;
  border: 1px solid var(--border-accent);
  color: var(--accent);
  transition: all 0.2s;
  display: flex;
  align-items: center;
  gap: 0.3rem;
  text-transform: uppercase;
  letter-spacing: 0.3px;
}
.project-link:hover {
  background: var(--glow);
}

/* ==================== CONTACT ==================== */
.contact-section { background: var(--bg-secondary); }
.contact-grid {
  display: grid;
  grid-template-columns: 1fr 1.5fr;
  gap: 4rem;
  align-items: start;
}
.contact-info h3 {
  font-family: var(--font-display);
  font-size: 1.6rem;
  font-weight: 800;
  color: var(--text-primary);
  margin-bottom: 1rem;
  letter-spacing: -0.5px;
}
.contact-info p {
  font-size: 0.9rem;
  color: var(--text-secondary);
  line-height: 1.75;
  margin-bottom: 2rem;
}
.contact-details {
  display: flex;
  flex-direction: column;
  gap: 0.8rem;
}
.contact-item {
  display: flex;
  align-items: center;
  gap: 0.8rem;
  font-size: 0.85rem;
  color: var(--text-secondary);
}
.contact-item-icon {
  width: 32px; height: 32px;
  border-radius: 8px;
  background: var(--glow);
  border: 1px solid var(--border-accent);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 0.75rem;
  color: var(--accent);
  flex-shrink: 0;
}
.contact-form {
  background: var(--bg-card);
  border: 1px solid var(--border);
  border-radius: 20px;
  padding: 2rem;
}
.form-group {
  margin-bottom: 1.2rem;
}
.form-group label {
  display: block;
  font-family: var(--font-mono);
  font-size: 0.72rem;
  color: var(--text-muted);
  letter-spacing: 1px;
  text-transform: uppercase;
  margin-bottom: 0.5rem;
}
.form-group input,
.form-group textarea,
.form-group select {
  width: 100%;
  padding: 0.8rem 1rem;
  border-radius: 10px;
  border: 1px solid var(--border);
  background: var(--bg-secondary);
  color: var(--text-primary);
  font-family: var(--font-body);
  font-size: 0.88rem;
  transition: all 0.2s;
  outline: none;
  resize: vertical;
}
.form-group input:focus,
.form-group textarea:focus,
.form-group select:focus {
  border-color: var(--accent);
  box-shadow: 0 0 0 3px var(--glow);
}
.form-group textarea { min-height: 120px; }
.form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }
.alert {
  padding: 1rem;
  border-radius: 10px;
  margin-bottom: 1rem;
  font-size: 0.85rem;
}
.alert-success {
  background: rgba(67,233,123,0.1);
  border: 1px solid var(--accent-3);
  color: var(--accent-3);
}
.alert-error {
  background: rgba(240,147,251,0.1);
  border: 1px solid var(--accent-warm);
  color: var(--accent-warm);
}

/* ==================== FOOTER ==================== */
footer {
  padding: 2rem;
  background: var(--bg-primary);
  border-top: 1px solid var(--border);
  text-align: center;
}
.footer-inner {
  max-width: 1200px;
  margin: 0 auto;
  display: flex;
  align-items: center;
  justify-content: space-between;
  flex-wrap: wrap;
  gap: 1rem;
}
.footer-text {
  font-family: var(--font-mono);
  font-size: 0.72rem;
  color: var(--text-muted);
  letter-spacing: 0.5px;
}
.footer-socials {
  display: flex;
  gap: 0.6rem;
}

/* ==================== SCROLL TO TOP ==================== */
#scrollTop {
  position: fixed;
  bottom: 2rem; right: 2rem;
  width: 42px; height: 42px;
  border-radius: 12px;
  background: var(--gradient-accent);
  border: none;
  color: #080c14;
  font-size: 0.9rem;
  cursor: pointer;
  z-index: 800;
  display: none;
  align-items: center;
  justify-content: center;
  transition: all 0.2s;
  box-shadow: 0 8px 25px var(--glow-strong);
}
#scrollTop:hover { transform: translateY(-3px); }
#scrollTop.show { display: flex; }

/* ==================== ANIMATIONS ==================== */
.fade-up {
  opacity: 0;
  transform: translateY(30px);
  transition: opacity 0.6s ease, transform 0.6s ease;
}
.fade-up.visible {
  opacity: 1;
  transform: translateY(0);
}

/* ==================== RESPONSIVE ==================== */
@media (max-width: 1024px) {
  .hero-container { grid-template-columns: 1fr; gap: 3rem; }
  .hero-visual { align-items: flex-start; }
  .about-grid { grid-template-columns: 1fr; gap: 2rem; }
  .contact-grid { grid-template-columns: 1fr; gap: 2rem; }
}
@media (max-width: 768px) {
  nav { padding: 0 1rem; }
  .nav-links { display: none; }
  .hamburger { display: flex; }
  section { padding: 3.5rem 1.2rem; }
  .hero { padding: 5rem 1.2rem 3rem; }
  .projects-grid { grid-template-columns: 1fr; }
  .timeline::before { left: 15px; }
  .timeline-item { gap: 1.2rem; }
  .timeline-dot { width: 31px; }
  .form-row { grid-template-columns: 1fr; }
  .footer-inner { flex-direction: column; text-align: center; }
  .section-header { flex-direction: column; align-items: flex-start; gap: 0.3rem; }
  .section-line { display: none; }
}
@media (max-width: 480px) {
  .hero-title { letter-spacing: -1px; }
  .hero-actions { flex-direction: column; }
  .btn-primary, .btn-outline { text-align: center; }
  .stats-row { gap: 0.4rem; }
  .profile-card { max-width: 100%; }
  .tech-badges { max-width: 100%; }
  .skills-grid { grid-template-columns: 1fr; }
  .cert-grid { grid-template-columns: 1fr; }
  .edu-grid { grid-template-columns: 1fr; }
}
</style>
</head>
<body>

<!-- ==================== NAVBAR ==================== -->
<nav id="navbar">
  <div class="nav-logo">FSS.</div>
  <div class="nav-links">
    <a href="#about">About</a>
    <a href="#skills">Skills</a>
    <a href="#experience">Experience</a>
    <a href="#education">Education</a>
    <a href="#certifications">Certs</a>
    <a href="#projects">Projects</a>
    <a href="#contact">Contact</a>
  </div>
  <div class="nav-right">
    <button class="theme-toggle" id="themeToggle" aria-label="Toggle theme">
      <i class="fas fa-moon" id="themeIcon"></i>
    </button>
    <button class="hamburger" id="hamburger">
      <i class="fas fa-bars"></i>
    </button>
  </div>
</nav>

<div class="mobile-menu" id="mobileMenu">
  <a href="#about" onclick="closeMobile()">About</a>
  <a href="#skills" onclick="closeMobile()">Skills</a>
  <a href="#experience" onclick="closeMobile()">Experience</a>
  <a href="#education" onclick="closeMobile()">Education</a>
  <a href="#certifications" onclick="closeMobile()">Certifications</a>
  <a href="#projects" onclick="closeMobile()">Projects</a>
  <a href="#contact" onclick="closeMobile()">Contact</a>
</div>

<!-- ==================== HERO ==================== -->
<section class="hero" id="home">
  <div class="hero-grid-bg"></div>
  <div class="hero-glow"></div>
  <div class="hero-glow-2"></div>
  <div class="hero-container">
    <div class="hero-content">
      <div class="hero-tag">Available for Projects</div>
      <h1 class="hero-title">
        Finti Sasa<br>
        <span class="line-2">Sabila</span>
      </h1>
      <p class="hero-subtitle">// Full Stack Developer & Android Engineer</p>
      <p class="hero-desc">
        Passionate and aspiring developer with a deep love for creating innovative solutions. Experienced in Android, Web, and Full Stack development — turning ideas into seamless digital experiences.
      </p>
      <div class="hero-actions">
        <a href="#projects" class="btn-primary">View Projects</a>
        <a href="#contact" class="btn-outline">Hire Me</a>
      </div>
      <div class="hero-socials">
        <a href="mailto:finti.sasa.sabila@gmail.com" class="social-icon" title="Email"><i class="fas fa-envelope"></i></a>
        <a href="tel:+6289516189819" class="social-icon" title="Phone"><i class="fas fa-phone"></i></a>
        <a href="#" class="social-icon" title="GitHub"><i class="fab fa-github"></i></a>
        <a href="#" class="social-icon" title="LinkedIn"><i class="fab fa-linkedin"></i></a>
      </div>
    </div>
    <div class="hero-visual">
      <div class="profile-card">
        <div class="profile-avatar">FSS</div>
        <div class="profile-name">Finti Sasa Sabila</div>
        <div class="profile-role">Full Stack • Android • IT Support</div>
        <div class="profile-location"><i class="fas fa-map-marker-alt"></i> Jakarta Utara, Indonesia</div>
        <div class="stats-row">
          <div class="stat-item">
            <div class="stat-num">15+</div>
            <div class="stat-label">Projects</div>
          </div>
          <div class="stat-item">
            <div class="stat-num">3+yr</div>
            <div class="stat-label">Exp.</div>
          </div>
          <div class="stat-item">
            <div class="stat-num">5</div>
            <div class="stat-label">Certs</div>
          </div>
        </div>
      </div>
      <div class="tech-badges">
        <span class="tech-badge">Kotlin</span>
        <span class="tech-badge">Laravel</span>
        <span class="tech-badge">CodeIgniter 4</span>
        <span class="tech-badge">React</span>
        <span class="tech-badge">Node.js</span>
        <span class="tech-badge">MySQL</span>
        <span class="tech-badge">PHP</span>
        <span class="tech-badge">Android</span>
        <span class="tech-badge">REST API</span>
        <span class="tech-badge">Git</span>
      </div>
    </div>
  </div>
</section>

<!-- ==================== ABOUT ==================== -->
<section class="about-section" id="about">
  <div class="section-container">
    <div class="section-header fade-up">
      <div>
        <div class="section-number">01 / about</div>
        <h2 class="section-title">About Me</h2>
      </div>
      <div class="section-line"></div>
    </div>
    <div class="about-grid fade-up">
      <div class="about-text">
        <p>Hi! I'm <strong>Finti Sasa Sabila</strong>, a passionate and aspiring developer based in Jakarta Utara, Indonesia. I have a strong desire to create innovative solutions and push the boundaries of technology.</p>
        <p>With a deep love for coding and problem-solving, I constantly seek opportunities to learn and grow in this ever-evolving field. My experience spans across Android development, full stack web development, and IT support.</p>
        <p>I've worked professionally as a <strong>Mobile Developer</strong> at PT Wahana Makmur Sejati (Maret 2024 - Feb 2025), as a <strong>Freelance Web Developer</strong> since 2021, and as a <strong>Back End Developer</strong> for various academic projects in 2023, building real-world applications that serve actual users.</p>
      </div>
      <div class="about-highlights">
        <div class="highlight-item">
          <div class="highlight-icon"><i class="fas fa-mobile-alt"></i></div>
          <div class="highlight-text">
            <strong>Android Developer</strong>
            <span>Kotlin, Java, Retrofit, XML Layout Design — building native Android apps</span>
          </div>
        </div>
        <div class="highlight-item">
          <div class="highlight-icon"><i class="fas fa-globe"></i></div>
          <div class="highlight-text">
            <strong>Web Developer</strong>
            <span>Laravel, CodeIgniter 4, PHP Native, Bootstrap — building responsive web apps</span>
          </div>
        </div>
        <div class="highlight-item">
          <div class="highlight-icon"><i class="fas fa-layer-group"></i></div>
          <div class="highlight-text">
            <strong>Full Stack Developer</strong>
            <span>End-to-end development from database design to UI implementation</span>
          </div>
        </div>
        <div class="highlight-item">
          <div class="highlight-icon"><i class="fas fa-headset"></i></div>
          <div class="highlight-text">
            <strong>IT Support</strong>
            <span>Server configuration, system troubleshooting, database administration</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ==================== SKILLS ==================== -->
<section id="skills">
  <div class="section-container">
    <div class="section-header fade-up">
      <div>
        <div class="section-number">02 / skills</div>
        <h2 class="section-title">Technical Skills</h2>
      </div>
      <div class="section-line"></div>
    </div>
    <div class="skills-grid fade-up">
      <div class="skill-category">
        <div class="skill-cat-header">
          <div class="skill-cat-icon"><i class="fas fa-mobile-alt"></i></div>
          <span class="skill-cat-name">Mobile Development</span>
        </div>
        <div class="skill-tags">
          <span class="skill-tag">Kotlin</span>
          <span class="skill-tag">Java</span>
          <span class="skill-tag">Android Studio</span>
          <span class="skill-tag">XML Layout</span>
          <span class="skill-tag">Retrofit</span>
          <span class="skill-tag">MVVM</span>
          <span class="skill-tag">Firebase</span>
        </div>
      </div>
      <div class="skill-category">
        <div class="skill-cat-header">
          <div class="skill-cat-icon"><i class="fas fa-server"></i></div>
          <span class="skill-cat-name">Backend & Server</span>
        </div>
        <div class="skill-tags">
          <span class="skill-tag">PHP</span>
          <span class="skill-tag">Laravel</span>
          <span class="skill-tag">CodeIgniter 4</span>
          <span class="skill-tag">Node.js</span>
          <span class="skill-tag">Express.js</span>
          <span class="skill-tag">RESTful API</span>
          <span class="skill-tag">MySQL</span>
          <span class="skill-tag">XAMPP</span>
        </div>
      </div>
      <div class="skill-category">
        <div class="skill-cat-header">
          <div class="skill-cat-icon"><i class="fas fa-palette"></i></div>
          <span class="skill-cat-name">Frontend</span>
        </div>
        <div class="skill-tags">
          <span class="skill-tag">HTML5</span>
          <span class="skill-tag">CSS3</span>
          <span class="skill-tag">Bootstrap</span>
          <span class="skill-tag">JavaScript</span>
          <span class="skill-tag">jQuery</span>
          <span class="skill-tag">AJAX</span>
          <span class="skill-tag">React</span>
        </div>
      </div>
      <div class="skill-category">
        <div class="skill-cat-header">
          <div class="skill-cat-icon"><i class="fas fa-tools"></i></div>
          <span class="skill-cat-name">Tools & Platforms</span>
        </div>
        <div class="skill-tags">
          <span class="skill-tag">Git & GitHub</span>
          <span class="skill-tag">VS Code</span>
          <span class="skill-tag">Postman</span>
          <span class="skill-tag">Android Studio</span>
          <span class="skill-tag">XAMPP</span>
        </div>
      </div>
      <div class="skill-category">
        <div class="skill-cat-header">
          <div class="skill-cat-icon"><i class="fas fa-shield-alt"></i></div>
          <span class="skill-cat-name">System Admin</span>
        </div>
        <div class="skill-tags">
          <span class="skill-tag">Server Config</span>
          <span class="skill-tag">DB Admin</span>
          <span class="skill-tag">API Integration</span>
          <span class="skill-tag">Troubleshooting</span>
        </div>
      </div>
      <div class="skill-category">
        <div class="skill-cat-header">
          <div class="skill-cat-icon"><i class="fas fa-brain"></i></div>
          <span class="skill-cat-name">Soft Skills</span>
        </div>
        <div class="skill-tags">
          <span class="skill-tag">Problem-Solving</span>
          <span class="skill-tag">Teamwork</span>
          <span class="skill-tag">Time Management</span>
          <span class="skill-tag">Communication</span>
          <span class="skill-tag">Adaptability</span>
          <span class="skill-tag">Detail-Oriented</span>
          <span class="skill-tag">Discipline</span>
          <span class="skill-tag">Shift Work</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ==================== EXPERIENCE ==================== -->
<section class="experience-section" id="experience">
  <div class="section-container">
    <div class="section-header fade-up">
      <div>
        <div class="section-number">03 / experience</div>
        <h2 class="section-title">Work Experience</h2>
      </div>
      <div class="section-line"></div>
    </div>
    <div class="timeline fade-up">
      <?php foreach($experiences as $exp): ?>
      <div class="timeline-item">
        <div class="timeline-dot"><div class="timeline-dot-inner"></div></div>
        <div class="timeline-content">
          <div class="timeline-meta">
            <span class="timeline-company"><?= $exp['company'] ?></span>
            <span class="timeline-period"><?= $exp['period'] ?></span>
          </div>
          <div class="timeline-role"><?= $exp['title'] ?> · Jakarta</div>
          <ul class="timeline-desc">
            <?php foreach($exp['description'] as $desc): ?>
            <li><?= $desc ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ==================== FREELANCE PROJECTS ==================== -->
<section id="freelance">
  <div class="section-container">
    <div class="section-header fade-up">
      <div>
        <div class="section-number">04 / freelance</div>
        <h2 class="section-title">Freelance Portfolio</h2>
      </div>
      <div class="section-line"></div>
    </div>
    <div class="projects-grid fade-up">
      <?php foreach($freelance_projects as $project): ?>
      <div class="project-card">
        <div class="project-img">
          <div class="project-img-gradient"></div>
          <div class="project-img-placeholder"><i class="fas fa-briefcase"></i></div>
          <span class="project-type-tag">Freelance</span>
        </div>
        <div class="project-body">
          <div class="project-title"><?= $project['name'] ?></div>
          <p class="project-desc"><?= $project['description'] ?></p>
          <div class="project-stack">
            <?php 
            $techs = explode(', ', $project['tech']);
            foreach($techs as $tech): ?>
            <span class="stack-tag"><?= $tech ?></span>
            <?php endforeach; ?>
          </div>
          <div class="project-links">
            <a href="#" class="project-link"><i class="fas fa-external-link-alt"></i> Demo</a>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ==================== EDUCATION ==================== -->
<section id="education">
  <div class="section-container">
    <div class="section-header fade-up">
      <div>
        <div class="section-number">05 / education</div>
        <h2 class="section-title">Education</h2>
      </div>
      <div class="section-line"></div>
    </div>
    <div class="edu-grid fade-up">
      <?php foreach($education as $edu): ?>
      <div class="edu-card">
        <div class="edu-icon"><i class="fas fa-<?= $edu['icon'] ?>"></i></div>
        <div class="edu-degree"><?= $edu['degree'] ?></div>
        <div class="edu-school"><?= $edu['university'] ?></div>
        <div class="edu-period"><?= $edu['year'] ?></div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ==================== CERTIFICATIONS ==================== -->
<section class="cert-section" id="certifications">
  <div class="section-container">
    <div class="section-header fade-up">
      <div>
        <div class="section-number">06 / certifications</div>
        <h2 class="section-title">Certifications</h2>
      </div>
      <div class="section-line"></div>
    </div>
    <div class="cert-grid fade-up">
      <?php foreach($certifications as $cert): ?>
      <div class="cert-card">
        <div class="cert-icon <?= $cert['icon'] ?>">
          <i class="fas fa-<?= $cert['icon'] == 'blue' ? 'server' : ($cert['icon'] == 'green' ? 'laptop-code' : 'android') ?>"></i>
        </div>
        <div>
          <div class="cert-name"><?= $cert['name'] ?></div>
          <div class="cert-org"><?= $cert['provider'] ?> · <?= $cert['date'] ?></div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ==================== PROJECTS ==================== -->
<section class="projects-section" id="projects">
  <div class="section-container">
    <div class="section-header fade-up">
      <div>
        <div class="section-number">07 / projects</div>
        <h2 class="section-title">Portfolio Projects</h2>
      </div>
      <div class="section-line"></div>
    </div>
    <div class="projects-filter fade-up">
      <button class="filter-btn active" onclick="filterProjects('all', this)">All</button>
      <button class="filter-btn" onclick="filterProjects('web', this)">Web</button>
      <button class="filter-btn" onclick="filterProjects('android', this)">Android</button>
      <button class="filter-btn" onclick="filterProjects('fullstack', this)">Full Stack</button>
    </div>
    <div class="projects-grid fade-up" id="projectsGrid">
      <?php foreach($projects as $project): ?>
      <div class="project-card" data-category="<?= $project['type'] ?>">
        <div class="project-img">
          <div class="project-img-gradient"></div>
          <div class="project-img-placeholder"><i class="fas fa-<?= $project['type'] == 'android' ? 'mobile-alt' : 'globe' ?>"></i></div>
          <span class="project-type-tag"><?= ucfirst($project['type']) ?></span>
        </div>
        <div class="project-body">
          <div class="project-title"><?= $project['name'] ?></div>
          <p class="project-desc"><?= $project['description'] ?></p>
          <div class="project-stack">
            <?php 
            $techs = explode(', ', $project['tech']);
            foreach($techs as $tech): ?>
            <span class="stack-tag"><?= $tech ?></span>
            <?php endforeach; ?>
          </div>
          <div class="project-links">
            <a href="#" class="project-link"><i class="fas fa-external-link-alt"></i> Demo</a>
            <a href="#" class="project-link"><i class="fab fa-github"></i> Code</a>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ==================== CONTACT ==================== -->
<section class="contact-section" id="contact">
  <div class="section-container">
    <div class="section-header fade-up">
      <div>
        <div class="section-number">08 / contact</div>
        <h2 class="section-title">Let's Work Together</h2>
      </div>
      <div class="section-line"></div>
    </div>
    
    <?php if(session()->getFlashdata('success')): ?>
    <div class="alert alert-success fade-up"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>
    
    <?php if(session()->getFlashdata('error')): ?>
    <div class="alert alert-error fade-up"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>
    
    <div class="contact-grid fade-up">
      <div class="contact-info">
        <h3>Got a project in mind?</h3>
        <p>I'm always open to discussing new projects, creative ideas, or opportunities to be part of your vision. Drop me a message and let's talk!</p>
        <div class="contact-details">
          <div class="contact-item">
            <div class="contact-item-icon"><i class="fas fa-envelope"></i></div>
            <span><?= $contact_info['email'] ?></span>
          </div>
          <div class="contact-item">
            <div class="contact-item-icon"><i class="fas fa-phone"></i></div>
            <span><?= $contact_info['phone'] ?></span>
          </div>
          <div class="contact-item">
            <div class="contact-item-icon"><i class="fas fa-map-marker-alt"></i></div>
            <span><?= $contact_info['address'] ?></span>
          </div>
          <div class="contact-item">
            <div class="contact-item-icon"><i class="fas fa-clock"></i></div>
            <span>WIB (UTC+7) · Available for shifts</span>
          </div>
        </div>
      </div>
      <div class="contact-form">
        <form action="/submit-interest" method="POST">
          <div class="form-row">
            <div class="form-group">
              <label>Name</label>
              <input type="text" name="name" placeholder="Your name" required>
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" name="email" placeholder="your@email.com" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label>Phone</label>
              <input type="tel" name="phone" placeholder="+62 xxx" required>
            </div>
            <div class="form-group">
              <label>Service</label>
              <select name="service" required>
                <option value="">— Select Service —</option>
                <option value="android">Android App Development</option>
                <option value="web">Web Development</option>
                <option value="fullstack">Full Stack Development</option>
                <option value="it_support">IT Support</option>
                <option value="api">API Development</option>
                <option value="other">Other</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label>Message</label>
            <textarea name="message" placeholder="Tell me about your project..." required></textarea>
          </div>
          <button type="submit" class="btn-primary" style="width:100%;justify-content:center;display:flex;gap:0.5rem;align-items:center;">
            <i class="fas fa-paper-plane"></i> Send Message
          </button>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- ==================== FOOTER ==================== -->
<footer>
  <div class="footer-inner">
    <div class="footer-text">© 2024 Finti Sasa Sabila · Built with ❤️ using CodeIgniter 4</div>
    <div class="footer-socials">
      <a href="mailto:finti.sasa.sabila@gmail.com" class="social-icon" title="Email"><i class="fas fa-envelope"></i></a>
      <a href="#" class="social-icon" title="GitHub"><i class="fab fa-github"></i></a>
      <a href="#" class="social-icon" title="LinkedIn"><i class="fab fa-linkedin"></i></a>
    </div>
  </div>
</footer>

<button id="scrollTop" onclick="window.scrollTo({top:0,behavior:'smooth'})">
  <i class="fas fa-chevron-up"></i>
</button>

<script>
// ==================== THEME TOGGLE ====================
const html = document.documentElement;
const themeToggle = document.getElementById('themeToggle');
const themeIcon = document.getElementById('themeIcon');
let isDark = true;

function setTheme(dark) {
  isDark = dark;
  html.setAttribute('data-theme', dark ? 'dark' : 'light');
  themeIcon.className = dark ? 'fas fa-moon' : 'fas fa-sun';
  localStorage.setItem('theme', dark ? 'dark' : 'light');
}
const saved = localStorage.getItem('theme');
if (saved) setTheme(saved === 'dark');
else if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) setTheme(true);
themeToggle.addEventListener('click', () => setTheme(!isDark));

// ==================== HAMBURGER ====================
const hamburger = document.getElementById('hamburger');
const mobileMenu = document.getElementById('mobileMenu');
hamburger.addEventListener('click', () => mobileMenu.classList.toggle('open'));
function closeMobile() { mobileMenu.classList.remove('open'); }

// ==================== SCROLL ====================
const scrollBtn = document.getElementById('scrollTop');
window.addEventListener('scroll', () => {
  scrollBtn.classList.toggle('show', window.scrollY > 400);
});

// ==================== FADE-UP ANIMATION ====================
const observer = new IntersectionObserver((entries) => {
  entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('visible'); } });
}, { threshold: 0.1 });
document.querySelectorAll('.fade-up').forEach(el => observer.observe(el));

// ==================== PROJECT FILTER ====================
function filterProjects(cat, btn) {
  document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
  btn.classList.add('active');
  document.querySelectorAll('.project-card').forEach(card => {
    const categories = card.dataset.category || '';
    if (cat === 'all' || categories.includes(cat) || categories === cat) {
      card.style.display = '';
    } else {
      card.style.display = 'none';
    }
  });
}

// ==================== ACTIVE NAV ====================
const sections = document.querySelectorAll('section[id], .hero');
const navLinks = document.querySelectorAll('.nav-links a');
window.addEventListener('scroll', () => {
  let current = '';
  sections.forEach(s => {
    if (window.scrollY >= s.offsetTop - 100) current = s.id || 'home';
  });
  navLinks.forEach(a => {
    if (a.getAttribute('href') === '#' + current) {
      a.style.color = 'var(--accent)';
    } else {
      a.style.color = '';
    }
  });
});
</script>
</body>
</html>