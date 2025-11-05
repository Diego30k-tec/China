// register.js - Funcionalidad de Registro

document.addEventListener('DOMContentLoaded', () => {
  const registerForm = document.getElementById('registerForm');
  if (!registerForm) return;
  const registerButton = registerForm.querySelector('button[type="submit"]');
  registerForm.addEventListener('submit', () => {
    if (registerButton) {
      registerButton.disabled = true;
      registerButton.textContent = 'Registrando...';
    }
  });
});

