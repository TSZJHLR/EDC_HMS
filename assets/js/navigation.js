class NavigationManager {
    constructor() {
        this.init();
    }

    init() {
        this.setupSidebarNavigation();
    }

    showDataTable() {
        this.hideAllSections();
        document.getElementById('data-table-section').classList.add('active');
        this.updateActiveNav('View Data');
    }

    showAddForm() {
        this.hideAllSections();
        document.getElementById('add-form-section').classList.add('active');
        this.updateActiveNav('Add Entry');
    }

    showStats() {
        this.hideAllSections();
        document.getElementById('stats-section').classList.add('active');
        this.updateActiveNav('Statistics');
    }

    hideAllSections() {
        const sections = document.querySelectorAll('.content-section');
        sections.forEach(section => {
            section.classList.remove('active');
        });
    }

    updateActiveNav(text) {
        const navLinks = document.querySelectorAll('.sidebar-menu a');
        navLinks.forEach(link => {
            link.classList.remove('active');
            if (link.textContent === text) {
                link.classList.add('active');
            }
        });
    }

    setupSidebarNavigation() {
        // set initial active section
        this.showDataTable();
    }
}

// export functions for global access
window.showDataTable = () => window.navigationManager.showDataTable();
window.showAddForm = () => window.navigationManager.showAddForm();
window.showStats = () => window.navigationManager.showStats();
