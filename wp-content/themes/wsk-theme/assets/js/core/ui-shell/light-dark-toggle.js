const body = document.body;
const toggle = document.getElementById('theme-toggle');
const root = document.documentElement;

// Check saved theme or system preference
const savedTheme = localStorage.getItem('theme');
const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

if (savedTheme === 'dark' || (!savedTheme && systemPrefersDark)) {
  body.classList.add('dark');
  root.style.colorScheme = 'dark';
  toggle.checked = true;
} else {
  body.classList.remove('dark');
  root.style.colorScheme = 'light';
  toggle.checked = false;
}

// Toggle event
toggle.addEventListener('change', () => {
  if (toggle.checked) {
    body.classList.add('dark');
    root.style.colorScheme = 'dark';
    localStorage.setItem('theme', 'dark');
  } else {
    body.classList.remove('dark');
    root.style.colorScheme = 'light';
    localStorage.setItem('theme', 'light');
  }
});
