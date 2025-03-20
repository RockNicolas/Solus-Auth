const togglePassword = document.getElementById('togglePassword');
const passwordField = document.getElementById('senha');

togglePassword.addEventListener('click', function () {
    const type = passwordField.type === 'password' ? 'text' : 'password';
    passwordField.type = type;
    this.classList.toggle('fa-eye-slash');
});

window.addEventListener('DOMContentLoaded', function () {
    const errorMessage = document.getElementById('error-message');
    if (errorMessage) {
        setTimeout(function () {
            errorMessage.style.display = 'none';
        }, 5000);
    }
});

const senhaInput = document.getElementById('senha');
const capsWarning = document.getElementById('capsWarning');

senhaInput.addEventListener('keydown', function (event) {
    if (event.getModifierState('CapsLock')) {
        capsWarning.classList.remove('hidden');
    } else {
        capsWarning.classList.add('hidden');
    }
});