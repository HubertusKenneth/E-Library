 function openModal(userId, userName) {
        const modal = document.getElementById('deleteModal');
        const form = document.getElementById('deleteForm');
        const modalText = document.getElementById('modalText');

        form.action = `/admin/users/${userId}`;
        modalText.textContent = `Are you sure you want to delete user "${userName}"?`;
        modal.classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }
    document.addEventListener('DOMContentLoaded', function() {
    if (hasErrors) {
        window.addEventListener('load', function() {
            openAddAdminModal();
        });     
        }
    });
    function openAddAdminModal() {
        document.getElementById('addAdminModal').classList.remove('hidden');
    }

    function closeAddAdminModal() {
        document.getElementById('addAdminModal').classList.add('hidden');
    }
         document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const eyeOpen = document.getElementById('eyeOpen');
            const eyeClosed = document.getElementById('eyeClosed');

            const isHidden = passwordInput.type === 'password';
            passwordInput.type = isHidden ? 'text' : 'password';

            eyeOpen.classList.toggle('hidden', !isHidden);
            eyeClosed.classList.toggle('hidden', isHidden);
        });
    document.getElementById('togglePassword').addEventListener('click', function() {
            const input = document.getElementById('password');
            const eyeOpen = document.getElementById('eyeOpen');
            const eyeClosed = document.getElementById('eyeClosed');
            const isHidden = input.type === 'password';
            input.type = isHidden ? 'text' : 'password';
            eyeOpen.classList.toggle('hidden', !isHidden);
            eyeClosed.classList.toggle('hidden', isHidden);
        });

        document.getElementById('toggleConfirmPassword').addEventListener('click', function() {
            const input = document.getElementById('password_confirmation');
            const eyeOpen = document.getElementById('eyeOpenConfirm');
            const eyeClosed = document.getElementById('eyeClosedConfirm');
            const isHidden = input.type === 'password';
            input.type = isHidden ? 'text' : 'password';
            eyeOpen.classList.toggle('hidden', !isHidden);
            eyeClosed.classList.toggle('hidden', isHidden);
        });
    function showPopup() {
      const popup = document.getElementById('popup');
      const content = document.getElementById('popup-content');
      popup.classList.remove('hidden');

      requestAnimationFrame(() => {
        content.classList.remove('scale-95', 'opacity-0');
        content.classList.add('scale-100', 'opacity-100');
      });
    }

    function hidePopup() {
      const popup = document.getElementById('popup');
      const content = document.getElementById('popup-content');

      content.classList.remove('scale-100', 'opacity-100');
      content.classList.add('scale-95', 'opacity-0');
      popup.classList.add('hidden');
    }
    function showPopup() {
        document.getElementById('popup').classList.remove('hidden');
    }
    function hidePopup() {
        document.getElementById('popup').classList.add('hidden');
    }

    

 