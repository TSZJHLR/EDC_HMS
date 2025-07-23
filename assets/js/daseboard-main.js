class Dashboard {
    constructor() {
        this.init();
    }

    init() {
        this.initializeManagers();
        this.setupEventListeners();
    }

    initializeManagers() {
        // initialize all manager classes
        window.navigationManager = new NavigationManager();
        window.formManager = new FormManager();
        window.apiManager = new APIManager();
    }

    setupEventListeners() {
        // any additional dashboard-specific event listeners can go here
        document.addEventListener('keydown', (e) => {
            // add keyboard shortcuts
            if (e.ctrlKey && e.key === 'n') {
                e.preventDefault();
                window.showAddForm();
            }
        });
    }
}

// initialize dashboard when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    new Dashboard();
});