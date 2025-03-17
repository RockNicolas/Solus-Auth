const togglePassword = document.getElementById('togglePassword');
const passwordField = document.getElementById('senha');

togglePassword.addEventListener('click', function () {
    const type = passwordField.type === 'password' ? 'text' : 'password';
    passwordField.type = type;
    this.classList.toggle('fa-eye-slash');
});

passwordField.addEventListener('keyup', function (event) {
    const capsLockWarning = document.getElementById('capsLockWarning');
    const isCapsLock = event.getModifierState && event.getModifierState('CapsLock');
    
    if (isCapsLock) {
        
        capsLockWarning.classList.remove('hidden');
        capsLockWarning.classList.remove('error-message'); 
        void capsLockWarning.offsetWidth; 
        capsLockWarning.classList.add('error-message'); 

        setTimeout(function() {
            capsLockWarning.classList.remove('error-message');
            capsLockWarning.classList.add('hidden');  
        }, 5000);  
        capsLockWarning.classList.add('hidden');
    }
}); 

window.addEventListener('DOMContentLoaded', function() {
    const errorMessage = document.getElementById('error-message');
    if (errorMessage) {
        setTimeout(function() {
            errorMessage.style.display = 'none'; 
        }, 5000);
    }
});
