function openModal(userId, userName, userRole) {
    const modal = document.getElementById('deleteModal');
    const form = document.getElementById('deleteForm');
    const modalText = document.getElementById('modalText');
    
    const displayRole = userRole.charAt(0).toUpperCase() + userRole.slice(1);

    form.action = `/admin/users/${userId}`;
    modalText.textContent = `Are you sure you want to delete ${displayRole} "${userName}"?`;
    modal.classList.remove('hidden');
}

function closeModal() {
    document.getElementById('deleteModal').classList.add('hidden');
}

function openAddAdminModal() {
    document.getElementById('addAdminModal').classList.remove('hidden');
}

function closeAddAdminModal() {
    document.getElementById('addAdminModal').classList.add('hidden');
}

function showPopup() {
    const popup = document.getElementById('popup');
    if (!popup) return;

    const content = document.getElementById('popup-content');
    if (content) {
        popup.classList.remove('hidden');
        requestAnimationFrame(() => {
            content.classList.remove('scale-95', 'opacity-0');
            content.classList.add('scale-100', 'opacity-100');
        });
    } else {
        popup.classList.remove('hidden');
    }
}

function hidePopup() {
    const popup = document.getElementById('popup');
    if (!popup) return;

    const content = document.getElementById('popup-content');
    if (content) {
        content.classList.remove('scale-100', 'opacity-100');
        content.classList.add('scale-95', 'opacity-0');
        setTimeout(() => {
            popup.classList.add('hidden');
        }, 300); 
    } else {
        popup.classList.add('hidden');
    }
}

window.openModal = openModal;
window.closeModal = closeModal;
window.openAddAdminModal = openAddAdminModal;
window.closeAddAdminModal = closeAddAdminModal;
window.showPopup = showPopup;
window.hidePopup = hidePopup;

function showAlert() {
    const alert = document.getElementById('alertBox');
    if (!alert) return;

    requestAnimationFrame(() => {
        alert.classList.remove('-translate-y-full', 'opacity-0');
    });

    setTimeout(() => {
        alert.classList.add('-translate-y-full', 'opacity-0');
    }, 5000);

    setTimeout(() => {
        alert.remove();
    }, 5500);
}

window.showAlert = showAlert;

document.addEventListener('DOMContentLoaded', function() {

    const alertBox = document.getElementById('alertBox');
    if (alertBox) {
        showAlert();
    }
    
    if (typeof hasErrors !== 'undefined' && hasErrors) {
        requestAnimationFrame(() => {
            openAddAdminModal();
        });
    }
    
    const addAdminForm = document.getElementById('addAdminForm');
    if (addAdminForm) {
        addAdminForm.addEventListener('submit', function() {
            if (!addAdminForm.querySelector('input[name="role"]')) {
                const roleInput = document.createElement('input');
                roleInput.type = 'hidden';
                roleInput.name = 'role';
                roleInput.value = 'admin';
                addAdminForm.appendChild(roleInput);
            }
        });
    }

    const togglePassword = document.getElementById('togglePassword');
    if (togglePassword) {
        togglePassword.addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const eyeOpen = document.getElementById('eyeOpen');
            const eyeClosed = document.getElementById('eyeClosed');
            
            if (passwordInput && eyeOpen && eyeClosed) {
                const isHidden = passwordInput.type === 'password';
                passwordInput.type = isHidden ? 'text' : 'password';

                eyeOpen.classList.toggle('hidden', !isHidden);
                eyeClosed.classList.toggle('hidden', isHidden);
            }
        });
    }

    const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
    if (toggleConfirmPassword) {
        toggleConfirmPassword.addEventListener('click', function() {
            const input = document.getElementById('password_confirmation');
            const eyeOpen = document.getElementById('eyeOpenConfirm');
            const eyeClosed = document.getElementById('eyeClosedConfirm');
            
            if (input && eyeOpen && eyeClosed) {
                const isHidden = input.type === 'password';
                input.type = isHidden ? 'text' : 'password';
                eyeOpen.classList.toggle('hidden', !isHidden);
                eyeClosed.classList.toggle('hidden', isHidden);
            }
        });
    }
});