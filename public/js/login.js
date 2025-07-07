function showLogin() {
            document.getElementById('modalOverlay').style.display = 'block';
            document.getElementById('loginModal').style.display = 'block';
            document.getElementById('registerModal').style.display = 'none';
            document.body.style.overflow = 'hidden';
        }

        function showRegister() {
            document.getElementById('modalOverlay').style.display = 'block';
            document.getElementById('registerModal').style.display = 'block';
            document.getElementById('loginModal').style.display = 'none';
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            document.getElementById('modalOverlay').style.display = 'none';
            document.getElementById('loginModal').style.display = 'none';
            document.getElementById('registerModal').style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        function showForgotPassword() {
            alert('Forgot password functionality would be implemented here');
        }

        function togglePassword(inputId) {
            const input = document.getElementById(inputId);
            const icon = document.getElementById(inputId + 'Icon');

            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }

        // Close modal when clicking overlay
        document.getElementById('modalOverlay').addEventListener('click', closeModal);

        //confirm password harus sama dengan password, jika tidak sama tampilkan alert
        // document.getElementById('registerForm').addEventListener('submit', function(e) {
        //     e.preventDefault();
        //     const password = document.getElementById('registerPassword').value;
        //     const confirmPassword = document.getElementById('registerConfirmPassword').value;
        //     if (password !== confirmPassword) {
        //         alert('Passwords do not match!');
        //         return;
        //     }
        //     // Proceed with form submission

        // Handle form submissions
        // document.getElementById('loginForm').addEventListener('submit', function(e) {
        //     e.preventDefault();
        //     const formData = new FormData(this);
        //     console.log('Login form submitted:', Object.fromEntries(formData));
        //     alert('Login form submitted! Check console for form data.');
        //     // Here you would typically send the data to your Laravel backend
        // });

        // document.getElementById('registerForm').addEventListener('submit', function(e) {
        //     e.preventDefault();
        //     const formData = new FormData(this);
        //     const data = Object.fromEntries(formData);

        //     // Check if passwords match
        //     if (data.password !== data.confirmPassword) {
        //         alert('Passwords do not match!');
        //         return;
        //     }

        //     console.log('Register form submitted:', data);
        //     alert('Registration form submitted! Check console for form data.');
        //     // Here you would typically send the data to your Laravel backend
        // });

        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeModal();
            }
        });
