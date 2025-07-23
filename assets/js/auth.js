class AuthManager {
    constructor() {
        this.init();
    }

    init() {
        this.setupTabs();
        this.setupFormValidation();
        this.setupFormSubmission();
    }

    setupTabs() {
        const tabs = document.querySelectorAll('.auth-tab');
        const forms = document.querySelectorAll('.auth-form');

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                // Remove active class from all tabs and forms
                tabs.forEach(t => t.classList.remove('active'));
                forms.forEach(f => f.classList.remove('active'));

                // Add active class to clicked tab and corresponding form
                tab.classList.add('active');
                document.getElementById(`${tab.dataset.tab}-form`).classList.add('active');
            });
        });
    }

    setupFormValidation() {
        const forms = document.querySelectorAll('.auth-form form');
        forms.forEach(form => {
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                this.handleSubmit(form);
            });
        });
    }

    async handleSubmit(form) {
        const formData = new FormData(form);
        const action = form.id === 'login' ? 'login' : 'register';
        const url = `api/auth.php?action=${action}`;

        try {
            const response = await fetch(url, {
                method: 'POST',
                body: formData
            });

            const data = await response.json();

            if (response.ok) {
                if (action === 'login') {
                    window.location.href = 'dashboard.php';
                } else {
                    this.showSuccessMessage('Registration successful! Please login.');
                    document.querySelector('[data-tab="login"]').click();
                }
            } else {
                this.showErrorMessage(data.message || 'An error occurred');
            }
        } catch (error) {
            this.showErrorMessage('Network error occurred');
            console.error('Error:', error);
        }
    }

    showErrorMessage(message) {
        const errorDiv = document.createElement('div');
        errorDiv.className = 'alert error';
        errorDiv.textContent = message;
        document.querySelector('.auth-content').insertBefore(errorDiv, document.querySelector('.auth-form'));
        
        setTimeout(() => errorDiv.remove(), 5000);
    }

    showSuccessMessage(message) {
        const successDiv = document.createElement('div');
        successDiv.className = 'alert success';
        successDiv.textContent = message;
        document.querySelector('.auth-content').insertBefore(successDiv, document.querySelector('.auth-form'));
        
        setTimeout(() => successDiv.remove(), 5000);
    }
}

// initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    new AuthManager();
});
