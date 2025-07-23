class FormManager {
    constructor() {
        this.init();
    }

    init() {
        this.setupFormValidation();
        this.setupRealTimeValidation();
    }

    resetForm() {
        const form = document.getElementById('data-form');
        if (form) {
            form.reset();
            document.querySelector('input[name="action"]').value = 'create';
            document.getElementById('entry-id').value = '';
            document.querySelector('.btn-primary').textContent = 'Save Entry';
        }
    }

    fillEditForm(data) {
        document.getElementById('entry-id').value = data.id;
        document.getElementById('participant_id').value = data.participant_id;
        document.getElementById('first_name').value = data.first_name;
        document.getElementById('last_name').value = data.last_name;
        document.getElementById('email').value = data.email;
        document.getElementById('date_of_birth').value = data.date_of_birth;
        document.getElementById('gender').value = data.gender;
        document.getElementById('notes').value = data.notes;
        
        document.querySelector('input[name="action"]').value = 'update';
        document.querySelector('.btn-primary').textContent = 'Update Entry';
    }

    validateForm() {
        const participantId = document.getElementById('participant_id').value;
        const firstName = document.getElementById('first_name').value;
        const lastName = document.getElementById('last_name').value;
        const email = document.getElementById('email').value;
        
        // required field validation
        if (!participantId.trim() || !firstName.trim() || !lastName.trim() || !email.trim()) {
            alert('Please fill in all required fields');
            return false;
        }
        
        // participant ID validation
        if (!/^[A-Z0-9]{6,10}$/.test(participantId)) {
            alert('Participant ID must be 6-10 uppercase letters and numbers');
            return false;
        }
        
        // email validation
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            alert('Please enter a valid email address');
            return false;
        }
        
        return true;
    }

    setupFormValidation() {
        const form = document.getElementById('data-form');
        
        if (form) {
            form.addEventListener('submit', (e) => {
                if (!this.validateForm()) {
                    e.preventDefault();
                    return false;
                }
            });
        }
    }

    setupRealTimeValidation() {
        const participantIdInput = document.getElementById('participant_id');
        const emailInput = document.getElementById('email');
        
        if (participantIdInput) {
            participantIdInput.addEventListener('input', function() {
                const value = this.value.toUpperCase();
                this.value = value;
                
                if (value.length > 0 && !/^[A-Z0-9]+$/.test(value)) {
                    this.setCustomValidity('Only uppercase letters and numbers allowed');
                } else {
                    this.setCustomValidity('');
                }
            });
        }
        
        if (emailInput) {
            emailInput.addEventListener('input', function() {
                const email = this.value;
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                
                if (email.length > 0 && !emailRegex.test(email)) {
                    this.setCustomValidity('Please enter a valid email address');
                } else {
                    this.setCustomValidity('');
                }
            });
        }
    }
}

// export functions for global access
window.resetForm = () => window.formManager.resetForm();