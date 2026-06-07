<!DOCTYPE html>
<html lang="id" data-theme="dark">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Login | Finti Portfolio</title>
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
  --border-accent: rgba(99,179,237,0.3);
  --text-primary: #e8f0fe;
  --text-secondary: #8da3c4;
  --text-muted: #4a6080;
  --accent: #4facfe;
  --accent-2: #00f2fe;
  --accent-3: #43e97b;
  --accent-red: #f87171;
  --glow: rgba(79,172,254,0.15);
  --gradient-accent: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
}
[data-theme="light"] {
  --bg-primary: #f0f4ff;
  --bg-secondary: #e4ecff;
  --bg-card: #ffffff;
  --border: rgba(79,172,254,0.15);
  --text-primary: #0d1a2d;
  --text-secondary: #3a5a8c;
  --text-muted: #7a9abf;
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
  position: relative;
  overflow: hidden;
}
body::before {
  content: '';
  position: fixed;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.03'/%3E%3C/svg%3E");
  pointer-events: none;
  opacity: 0.4;
}
.login-container {
  width: 100%;
  max-width: 460px;
  padding: 1.5rem;
  position: relative;
  z-index: 2;
}
.login-card {
  background: var(--bg-card);
  border: 1px solid var(--border);
  border-radius: 24px;
  padding: 2rem;
  backdrop-filter: blur(10px);
  box-shadow: 0 25px 50px -12px rgba(0,0,0,0.5);
}
.logo {
  text-align: center;
  margin-bottom: 2rem;
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
  letter-spacing: -0.5px;
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
  font-family: var(--font-body);
  font-size: 0.88rem;
  transition: all 0.2s;
  outline: none;
}
.form-group input:focus {
  border-color: var(--accent);
  box-shadow: 0 0 0 3px var(--glow);
}
.btn-login {
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
.btn-login:hover {
  transform: translateY(-2px);
  box-shadow: 0 10px 30px var(--glow);
}
.links {
  display: flex;
  justify-content: space-between;
  margin-top: 1.5rem;
  font-size: 0.78rem;
}
.links a {
  color: var(--text-muted);
  text-decoration: none;
  transition: color 0.2s;
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
  font-size: 0.8rem;
  transition: all 0.2s;
  z-index: 10;
}
.theme-toggle:hover {
  border-color: var(--accent);
  color: var(--accent);
}
</style>
</head>
<body>
<button class="theme-toggle" id="themeToggle"><i class="fas fa-moon" id="themeIcon"></i></button>
<div class="login-container">
  <div class="login-card">
    <div class="logo">
      <div class="logo-icon">FSS</div>
      <h1>Admin Login</h1>
    </div>
    
    <?php if(session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>
    
    <?php if(session()->getFlashdata('error')): ?>
    <div class="alert alert-error"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>
    
    <?php if(isset($errors) && !empty($errors)): ?>
    <div class="alert alert-error"><?= implode('<br>', $errors) ?></div>
    <?php endif; ?>
    
    <form action="/auth/login" method="POST">
      <div class="form-group">
        <label>EMAIL / USERNAME</label>
        <input type="text" name="email" placeholder="admin@portfolio.com" required>
      </div>
      <div class="form-group">
        <label>PASSWORD</label>
        <input type="password" name="password" placeholder="••••••" required>
      </div>
      <button type="submit" class="btn-login">Login</button>
      <div class="links">
        <a href="/auth/forgot-password">Forgot Password?</a>
        <a href="/auth/register">Create Account</a>
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