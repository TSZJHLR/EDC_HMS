let currentEntries = [];

// navigation functions
function showDataTable() {
    hideAllSections();
    document.getElementById('data-table-section').classList.add('active');
    updateActiveNav('View Data');
}

function showAddForm() {
    hideAllSections();
    document.getElementById('add-form-section').classList.add('active');
    resetForm();
    updateActiveNav('Add Entry');
}

function showStats() {
    hideAllSections();
    document.getElementById('stats-section').classList.add('active');
    updateActiveNav('Statistics');
}

function hideAllSections() {
    const sections = document.querySelectorAll('.content-section');
    sections.forEach(section => {
        section.classList.remove('active');
    });
}

function updateActiveNav(text) {
    const navLinks = document.querySelectorAll('.sidebar-menu a');
    navLinks.forEach(link => {
        link.classList.remove('active');
        if (link.textContent === text) {
            link.classList.add('active');
        }
    });
}

// form functions
function resetForm() {
    document.getElementById('data-form').reset();
    document.querySelector('input[name="action"]').value = 'create';
    document.getElementById('entry-id').value = '';
    document.querySelector('.btn-primary').textContent = 'Save Entry';
}

// CRUD operations with AJAX
let isSubmitting = false;

function editEntry(id) {
    if (isSubmitting) return;
    
    isSubmitting = true;
    fetch(`api/data_entries.php?id=${id}`)
        .then(response => response.json())
        .then(data => {
            isSubmitting = false;
            if (data && data.id) {
                fillEditForm(data);
                showAddForm();
            } else {
                alert('Error loading entry data');
            }
        })
        .catch(error => {
            isSubmitting = false;
            console.error('Error:', error);
            alert('Error loading entry data');
        });
}

function fillEditForm(data) {
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

function deleteEntry(id) {
    if (isSubmitting) return;
    
    if (confirm('Are you sure you want to delete this entry?')) {
        isSubmitting = true;
        fetch('api/data_entries.php', {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id: id })
        })
        .then(response => response.json())
        .then(data => {
            isSubmitting = false;
            if (data.message === 'Entry deleted successfully') {
                const row = document.querySelector(`tr[data-id="${id}"]`);
                if (row) {
                    row.remove();
                }
                alert('Entry deleted successfully');
            } else {
                alert('Error deleting entry');
            }
        })
        .catch(error => {
            isSubmitting = false;
            console.error('Error:', error);
            alert('Error deleting entry');
        });
    }
}

// client-side form validation
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('data-form');
    
    if (form) {
        form.addEventListener('submit', function(e) {
            if (!validateForm()) {
                e.preventDefault();
                return false;
            }
        });
        
        // real-time validation
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
    
    // auto-hide alerts after 5 seconds
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.style.opacity = '0';
            setTimeout(() => {
                alert.remove();
            }, 300);
        }, 5000);
    });
});

function validateForm() {
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

// API functions for additional AJAX operations
function loadEntriesViaAPI() {
    fetch('api/data_entries.php')
        .then(response => response.json())
        .then(data => {
            currentEntries = data;
            updateDataTable(data);
        })
        .catch(error => {
            console.error('Error loading entries:', error);
        });
}

function updateDataTable(entries) {
    const tbody = document.querySelector('.data-table tbody');
    if (!tbody) return;
    
    tbody.innerHTML = '';
    
    entries.forEach(entry => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${escapeHtml(entry.participant_id)}</td>
            <td>${escapeHtml(entry.first_name + ' ' + entry.last_name)}</td>
            <td>${escapeHtml(entry.email)}</td>
            <td>${escapeHtml(entry.date_of_birth || 'N/A')}</td>
            <td>${escapeHtml(entry.gender || 'N/A')}</td>
            <td>
                <button onclick="editEntry(${entry.id})" class="btn btn-edit">Edit</button>
                <button onclick="deleteEntry(${entry.id})" class="btn btn-delete">Delete</button>
            </td>
        `;
        tbody.appendChild(row);
    });
}

function escapeHtml(text) {
    const div = document.createElement('div');
    div.textContent = text;
    return div.innerHTML;
}

// initialize dashboard
document.addEventListener('DOMContentLoaded', function() {
    // set initial active section
    showDataTable();
    
    // Load entries via API (optional alternative to server-side rendering)
    // loadEntriesViaAPI();
});