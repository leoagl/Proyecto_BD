function togglePasswordVisibility() {
    const passwordInput = document.getElementById('password');
  
    // Cambiar el tipo de entrada de contraseña entre 'password' y 'text'
    passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';
  
    // Cambiar el ícono de ojo según el estado actual de la contraseña
    const eyeIcon = document.querySelector('.toggle-password i');
    if (passwordInput.type === 'password') {
      eyeIcon.className = 'fa fa-eye';
    } else {
      eyeIcon.className = 'fa fa-eye-slash';
    }
  }