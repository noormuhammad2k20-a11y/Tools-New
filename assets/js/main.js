/**
 * ProTools - Professional Utility Suite
 * Main Interactivity Logic
 */

document.addEventListener('DOMContentLoaded', () => {
    // Dropdown Logic
    const dropdowns = document.querySelectorAll('.dropdown');

    dropdowns.forEach(dropdown => {
        const link = dropdown.querySelector('.nav-item-link');
        const menu = dropdown.querySelector('.dropdown-menu');

        if (link && menu) {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                e.stopPropagation();

                // Close other dropdowns
                dropdowns.forEach(d => {
                    if (d !== dropdown) {
                        d.querySelector('.dropdown-menu').classList.remove('show');
                    }
                });

                menu.classList.toggle('show');
            });
        }
    });

    // Close dropdowns on outside click
    document.addEventListener('click', (e) => {
        dropdowns.forEach(dropdown => {
            const menu = dropdown.querySelector('.dropdown-menu');
            if (menu && !dropdown.contains(e.target)) {
                menu.classList.remove('show');
            }
        });
    });

    // Search Logic
    const searchInput = document.getElementById('searchInput');
    const toolsGrid = document.getElementById('toolsGrid');
    const noResults = document.getElementById('noResults');
    const toolCards = document.querySelectorAll('.card-tool');
    const sections = document.querySelectorAll('section.container[id]');

    if (searchInput) {
        searchInput.addEventListener('input', (e) => {
            const query = e.target.value.toLowerCase().trim();
            let hasVisibleCards = false;

            toolCards.forEach(card => {
                const title = card.querySelector('h3').textContent.toLowerCase();
                const desc = card.querySelector('p').textContent.toLowerCase();

                if (title.includes(query) || desc.includes(query)) {
                    card.parentElement.style.display = 'block';
                    hasVisibleCards = true;
                } else {
                    card.parentElement.style.display = 'none';
                }
            });

            // Handle sections and "No results"
            sections.forEach(section => {
                const visibleCardsInSection = section.querySelectorAll('.card-tool').length > 0 && 
                                              Array.from(section.querySelectorAll('.card-tool')).some(c => c.parentElement.style.display !== 'none');
                
                if (visibleCardsInSection || query === '') {
                    section.style.display = 'block';
                } else {
                    section.style.display = 'none';
                }
            });

            if (noResults) {
                noResults.style.display = hasVisibleCards ? 'none' : 'block';
            }
        });

        // Keyboard Shortcut (Ctrl+K or Cmd+K)
        document.addEventListener('keydown', (e) => {
            if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
                e.preventDefault();
                searchInput.focus();
            }
        });
    }
});

