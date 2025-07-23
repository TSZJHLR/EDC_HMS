class APIManager {
    constructor() {
        this.currentEntries = [];
    }

    async editEntry(id) {
        try {
            const response = await fetch(`api/data_entries.php?id=${id}`);
            const data = await response.json();
            
            if (data && data.id) {
                window.formManager.fillEditForm(data);
                window.navigationManager.showAddForm();
            } else {
                alert('Error loading entry data');
            }
        } catch (error) {
            console.error('Error:', error);
            alert('Error loading entry data');
        }
    }

    async deleteEntry(id) {
        if (confirm('Are you sure you want to delete this entry?')) {
            try {
                const formData = new FormData();
                formData.append('action', 'delete');
                formData.append('id', id);
                
                const response = await fetch(window.location.href, {
                    method: 'POST',
                    body: formData
                });
                
                location.reload(); // Simple reload for now
            } catch (error) {
                console.error('Error:', error);
                alert('Error deleting entry');
            }
        }
    }

    async loadEntriesViaAPI() {
        try {
            const response = await fetch('api/data_entries.php');
            const data = await response.json();
            this.currentEntries = data;
            this.updateDataTable(data);
        } catch (error) {
            console.error('Error loading entries:', error);
        }
    }

    updateDataTable(entries) {
        const tbody = document.querySelector('.data-table tbody');
        if (!tbody) return;
        
        tbody.innerHTML = '';
        
        entries.forEach(entry => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${this.escapeHtml(entry.participant_id)}</td>
                <td>${this.escapeHtml(entry.first_name + ' ' + entry.last_name)}</td>
                <td>${this.escapeHtml(entry.email)}</td>
                <td>${this.escapeHtml(entry.date_of_birth || 'N/A')}</td>
                <td>${this.escapeHtml(entry.gender || 'N/A')}</td>
                <td>
                    <button onclick="editEntry(${entry.id})" class="btn btn-edit">Edit</button>
                    <button onclick="deleteEntry(${entry.id})" class="btn btn-delete">Delete</button>
                </td>
            `;
            tbody.appendChild(row);
        });
    }

    escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }
}

// Export functions for global access
window.editEntry = (id) => window.apiManager.editEntry(id);
window.deleteEntry = (id) => window.apiManager.deleteEntry(id);