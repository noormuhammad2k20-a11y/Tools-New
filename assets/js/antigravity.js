/**
 * Antigravity Pro - Professional Interactions
 */

document.addEventListener('DOMContentLoaded', () => {
    // Search Functionality
    const searchInput = document.getElementById('searchInput');
    if (searchInput) {
        searchInput.addEventListener('input', (e) => {
            const term = e.target.value.toLowerCase();
            const cards = document.querySelectorAll('.card-tool');
            let globalMatch = false;

            cards.forEach(card => {
                const title = card.querySelector('h3').textContent.toLowerCase();
                const desc = card.querySelector('p').textContent.toLowerCase();
                const isMatch = title.includes(term) || desc.includes(term);

                card.parentElement.style.display = isMatch ? 'block' : 'none';
                if (isMatch) globalMatch = true;
            });

            // Handle Section Visibility
            document.querySelectorAll('section.container[id]').forEach(section => {
                const visibleCards = section.querySelectorAll('.card-tool').length > 0;
                const matchesInSection = Array.from(section.querySelectorAll('.card-tool'))
                    .some(c => c.parentElement.style.display !== 'none');
                
                section.style.display = (matchesInSection || term === '') ? 'block' : 'none';
            });

            const noResults = document.getElementById('noResults');
            if (noResults) {
                noResults.style.display = (globalMatch || term === '') ? 'none' : 'block';
            }
        });
    }

    // Keyboard Shortcuts
    document.addEventListener('keydown', (e) => {
        if ((e.metaKey || e.ctrlKey) && e.key === 'k') {
            e.preventDefault();
            searchInput?.focus();
        }
    });

    // Dropdown Logic
    const dropdowns = document.querySelectorAll('.dropdown');
    dropdowns.forEach(dropdown => {
        const link = dropdown.querySelector('.nav-item-link');
        const menu = dropdown.querySelector('.dropdown-menu');

        if (link && menu) {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                e.stopPropagation();
                
                // Close others
                dropdowns.forEach(other => {
                    if (other !== dropdown) other.querySelector('.dropdown-menu')?.classList.remove('show');
                });

                menu.classList.toggle('show');
            });
        }
    });

    // Unified Copy Helper
    window.copyToClipboard = (text, btn) => {
        navigator.clipboard.writeText(text).then(() => {
            if (!btn) return;
            const originalHtml = btn.innerHTML;
            btn.innerHTML = '<i class="fa-solid fa-check"></i> Copied!';
            btn.classList.add('btn-success-temporary');
            
            setTimeout(() => {
                btn.innerHTML = originalHtml;
                btn.classList.remove('btn-success-temporary');
            }, 2000);
        });
    };

    // Tool Page Copy Button integration
    const toolCopyBtn = document.getElementById('copyBtn');
    if (toolCopyBtn) {
        toolCopyBtn.addEventListener('click', () => {
            const outputText = document.getElementById('outputText')?.textContent;
            if (outputText) copyToClipboard(outputText, toolCopyBtn);
        });
    }
});
