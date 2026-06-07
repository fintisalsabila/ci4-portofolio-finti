<!DOCTYPE html>
<html lang="id" data-theme="dark">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Forgot Password | Admin Panel</title>
<link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Mono:wght@300;400;500&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
:root {
  --font-display: 'Syne', sans-serif;
  --font-mono: 'DM Mono', monospace;
  --font-body: 'DM Sans', sans-serif;
  --bg-primary: #080c14;
  --bg-secondary: #0d1423;
  --bg-card: #111827;
  --border: rgba(99,179,237,0.12);
  --accent: #4facfe;
  --accent-3: #43e97b;
  --accent-red: #f87171;
  --glow: rgba(79,172,254,0.15);
  --gradient-accent: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
}
[data-theme="light"] {
  --bg-primary: #f0f4ff;
  --bg-secondary: #e4ecff;
  --bg-card: #ffffff;
  --text-primary: #0d1a2d;
  --accent: #1a7fd4;
}
* { margin: 0; padding: 0; box-sizing: border-box; }
body {
  font-family: var(--font-body);
  background: var(--bg-primary);
  color: var(--text-primary);
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
}
.forgot-container {
  width: 100%;
  max-width: 440px;
  padding: 1.5rem;
}
.forgot-card {
  background: var(--bg-card);
  border: 1px solid var(--border);
  border-radius: 24px;
  padding: 2rem;
}
.logo {
  text-align: center;
  margin-bottom: 1.5rem;
}
.logo-icon {
  width: 56px;
  height: 56px;
  background: var(--gradient-accent);
  border-radius: 16px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-family: var(--font-display);
  font-size: 1.3rem;
  font-weight: 800;
  margin: 0 auto 1rem;
  color: #080c14;
}
.logo h1 {
  font-family: var(--font-display);
  font-size: 1.2rem;
  font-weight: 700;
}
.form-group {
  margin-bottom: 1.2rem;
}
.form-group label {
  display: block;
  font-family: var(--font-mono);
  font-size: 0.68rem;
  color: var(--text-muted);
  letter-spacing: 1px;
  text-transform: uppercase;
  margin-bottom: 0.4rem;
}
.form-group input {
  width: 100%;
  padding: 0.8rem 1rem;
  border-radius: 10px;
  border: 1px solid var(--border);
  background: var(--bg-secondary);
  color: var(--text-primary);
  font-size: 0.88rem;
  outline: none;
}
.form-group input:focus {
  border-color: var(--accent);
  box-shadow: 0 0 0 3px var(--glow);
}
.btn-submit {
  width: 100%;
  padding: 0.8rem;
  border-radius: 10px;
  background: var(--gradient-accent);
  color: #080c14;
  font-family: var(--font-mono);
  font-size: 0.8rem;
  font-weight: 600;
  letter-spacing: 1px;
  text-transform: uppercase;
  border: none;
  cursor: pointer;
  transition: all 0.2s;
}
.links {
  text-align: center;
  margin-top: 1.5rem;
  font-size: 0.78rem;
}
.links a {
  color: var(--text-muted);
  text-decoration: none;
  font-family: var(--font-mono);
}
.links a:hover {
  color: var(--accent);
}
.alert {
  padding: 0.75rem;
  border-radius: 10px;
  margin-bottom: 1rem;
  font-size: 0.78rem;
  text-align: center;
}
.alert-success {
  background: rgba(67,233,123,0.1);
  border: 1px solid var(--accent-3);
  color: var(--accent-3);
}
.alert-error {
  background: rgba(248,113,113,0.1);
  border: 1px solid var(--accent-red);
  color: var(--accent-red);
}
.theme-toggle {
  position: fixed;
  top: 1rem;
  right: 1rem;
  width: 36px;
  height: 36px;
  border-radius: 8px;
  background: var(--bg-card);
  border: 1px solid var(--border);
  color: var(--text-secondary);
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
}
</style>
</head>
<body>
<button class="theme-toggle" id="themeToggle"><i class="fas fa-moon" id="themeIcon"></i></button>
<div class="forgot-container">
  <div class="forgot-card">
    <div class="logo">
      <div class="logo-icon">FSS</div>
      <h1>Forgot Password</h1>
    </div>
    
    <?php if(session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>
    
    <?php if(session()->getFlashdata('error')): ?>
    <div class="alert alert-error"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>
    
    <form action="/auth/forgot-password" method="POST">
      <div class="form-group">
        <label>EMAIL ADDRESS</label>
        <input type="email" name="email" placeholder="your@email.com" required>
      </div>
      <button type="submit" class="btn-submit">Send Reset Link</button>
      <div class="links">
        <a href="/auth/login">Back to Login</a>
      </div>
    </form>
  </div>
</div>
<script>
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
themeToggle.addEventListener('click', () => setTheme(!isDark));
</script>
</body>
</html>