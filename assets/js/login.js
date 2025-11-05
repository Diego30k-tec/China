// login.js - Funcionalidad de Login y Logout

document.addEventListener('DOMContentLoaded', () => {
  const loginForm = document.getElementById('loginForm');
  if (!loginForm) return;
  const loginButton = loginForm.querySelector('button[type="submit"]');
  loginForm.addEventListener('submit', () => {
    if (loginButton) {
      loginButton.disabled = true;
      loginButton.textContent = 'Iniciando sesión...';
    }
  });
});


