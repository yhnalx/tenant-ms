document.addEventListener('DOMContentLoaded', () => {
  const loginForm = document.getElementById('loginForm');
  const registerForm = document.getElementById('registerForm');
  const showRegisterBtn = document.getElementById('showRegisterBtn');
  const backToLoginBtn = document.getElementById('backToLoginBtn');
  const formTitle = document.getElementById('formTitle');

  if (showRegisterBtn) {
    showRegisterBtn.addEventListener('click', () => {
      loginForm.classList.add('d-none');
      registerForm.classList.remove('d-none');
      formTitle.textContent = 'Register';
    });
  }

  if (backToLoginBtn) {
    backToLoginBtn.addEventListener('click', () => {
      registerForm.classList.add('d-none');
      loginForm.classList.remove('d-none');
      formTitle.textContent = 'Log In';
    });
  }

  // Optional: prevent form submission for demo
  loginForm.addEventListener('submit', (e) => {
    e.preventDefault();
    alert('Logging in... (demo only)');
  });

  registerForm.addEventListener('submit', (e) => {
    e.preventDefault();
    alert('Registering... (demo only)');
  });
});
