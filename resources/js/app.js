import './bootstrap';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', () => {
    const passwordInput = document.getElementById('password');
    const toggleButton = document.getElementById('togglePassword');
    const eyeOpen = document.getElementById('eyeOpen');
    const eyeClosed = document.getElementById('eyeClosed');

    // supaya aman di halaman lain
    if (!passwordInput || !toggleButton) return;

    toggleButton.addEventListener('click', () => {
        const isPassword = passwordInput.type === 'password';

        passwordInput.type = isPassword ? 'text' : 'password';

        if (eyeOpen && eyeClosed) {
            eyeOpen.classList.toggle('hidden', !isPassword);
            eyeClosed.classList.toggle('hidden', isPassword);
        }
    });
});
