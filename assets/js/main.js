/**
 * ToolMaster Infrastructure - Main Interactivity Logic
 * Vanilla JavaScript implementation for search, filtering, and UI toggles.
 */

document.addEventListener('DOMContentLoaded', () => {
    // Assets & Nodes
    const toolsGrid = document.getElementById('toolsGrid');
    const toolContainers = document.querySelectorAll('.tool-container');
    const emptyState = document.getElementById('emptyState');
    const commandOverlay = document.getElementById('commandOverlay');
    const commandInput = document.getElementById('commandInput');
    const commandResults = document.getElementById('commandResults');
    const commandClose = document.getElementById('commandClose');
    const searchTrigger = document.getElementById('searchTrigger');
    const searchItemTemplate = document.getElementById('searchItemTemplate');

    let allTools = [];

    /**
     * Fetch all tools for the search index
     */
    async function initSearchIndex() {
        try {
            const response = await fetch(`${SITE_URL}api/list_tools.php`);
            const data = await response.json();
            if (data.status === 'success') {
                allTools = Object.entries(data.tools).map(([slug, val]) => ({ slug, ...val }));
            }
        } catch (err) {
            console.error('[System] Failed to initialize search index:', err);
        }
    }

    /**
     * UI Logic: Command Bar (Ctrl+K)
     */
    function toggleCommandBar(show = true) {
        if (!commandOverlay) return;
        if (show) {
            commandOverlay.classList.add('active');
            commandInput.focus();
            document.body.style.overflow = 'hidden';
        } else {
            commandOverlay.classList.remove('active');
            commandInput.value = '';
            renderSearchResults([]);
            document.body.style.overflow = '';
        }
    }

    function renderSearchResults(results) {
        if (!commandResults) return;
        commandResults.innerHTML = '';
        
        if (results.length === 0 && commandInput.value.trim() !== '') {
            commandResults.innerHTML = `
                <div class="text-center py-5">
                    <i class="bi bi-search text-zinc-100 mb-3" style="font-size: 48px; opacity: 0.5;"></i>
                    <p class="text-uppercase fw-bold text-zinc-900 mb-1" style="font-size: 11px; letter-spacing: 0.1em;">No matching nodes</p>
                    <p class="text-uppercase fw-bold text-zinc-400" style="font-size: 10px; letter-spacing: 0.1em;">Awaiting valid query</p>
                </div>
            `;
            return;
        }

        if (results.length === 0) {
            commandResults.innerHTML = `
                <div class="text-center py-5">
                    <i class="bi bi-command text-zinc-100 mb-3" style="font-size: 48px; opacity: 0.5;"></i>
                    <p class="text-uppercase fw-bold text-zinc-900 mb-1" style="font-size: 11px; letter-spacing: 0.1em;">System Search</p>
                    <p class="text-uppercase fw-bold text-zinc-400" style="font-size: 10px; letter-spacing: 0.1em;">Input identifier to locate resource</p>
                </div>
            `;
            return;
        }

        const label = document.createElement('p');
        label.className = 'px-4 py-3 text-zinc-400 fw-bold text-uppercase';
        label.style.cssText = 'font-size: 9px; letter-spacing: 0.25em;';
        label.textContent = 'Validated Resources';
        commandResults.appendChild(label);

        results.slice(0, 5).forEach(tool => {
            const clone = searchItemTemplate.content.cloneNode(true);
            const btn = clone.querySelector('button');
            clone.querySelector('.tool-title').textContent = tool.title;
            clone.querySelector('.tool-category').textContent = tool.category.replace(/-/g, ' ');
            
            btn.addEventListener('click', () => {
                window.location.href = `${SITE_URL}tool/${tool.slug}`;
            });
            commandResults.appendChild(clone);
        });
    }

    // Keyboard Shortcuts
    window.addEventListener('keydown', (e) => {
        if (e.key === 'k' && (e.metaKey || e.ctrlKey)) {
            e.preventDefault();
            toggleCommandBar(!commandOverlay.classList.contains('active'));
        }
        if (e.key === 'Escape' && commandOverlay.classList.contains('active')) {
            toggleCommandBar(false);
        }
    });

    // Event Listeners
    if (searchTrigger) searchTrigger.addEventListener('click', () => toggleCommandBar(true));
    if (commandClose) commandClose.addEventListener('click', () => toggleCommandBar(false));
    const commandBackdrop = document.getElementById('commandBackdrop');
    if (commandBackdrop) commandBackdrop.addEventListener('click', () => toggleCommandBar(false));

    if (commandInput) {
        commandInput.addEventListener('input', (e) => {
            const query = e.target.value.toLowerCase().trim();
            if (query === '') {
                renderSearchResults([]);
                return;
            }
            const filtered = allTools.filter(t => 
                t.title.toLowerCase().includes(query) || 
                t.category.toLowerCase().includes(query)
            );
            renderSearchResults(filtered);
        });
    }

    /**
     * Real-time Tool Interactions
     */
    function initToolLogic() {
        const textarea = document.querySelector('.form-textarea');
        const outputText = document.getElementById('outputText');
        const outputPlaceholder = document.getElementById('outputPlaceholder');
        const outputResult = document.getElementById('outputResult');
        const outputActions = document.getElementById('outputActions');

        if (!textarea || !outputText || !window.TOOL_SLUG) return;

        textarea.addEventListener('input', () => {
            const val = textarea.value;
            if (val.trim() === '') {
                outputResult.style.display = 'none';
                outputPlaceholder.style.display = 'flex';
                outputActions.style.display = 'none';
                return;
            }

            let result = '';
            switch (window.TOOL_SLUG) {
                case 'word-counter-pro':
                    const words = val.trim().split(/\s+/).filter(w => w.length > 0).length;
                    const lines = val.split('\n').length;
                    result = `Words: ${words} | Characters: ${val.length} | Lines: ${lines}`;
                    break;
                case 'uppercase-converter':
                    result = val.toUpperCase();
                    break;
                case 'lowercase-converter':
                    result = val.toLowerCase();
                    break;
                case 'bionic-reading':
                    // Simple bionic reading (first 3 chars bold)
                    result = val.split(/\s+/).map(word => {
                        if (word.length <= 3) return `<strong>${word}</strong>`;
                        return `<strong>${word.slice(0, 3)}</strong>${word.slice(3)}`;
                    }).join(' ');
                    break;
                default:
                    return;
            }

            if (result) {
                outputText.innerHTML = result;
                outputResult.style.display = 'block';
                outputPlaceholder.style.display = 'none';
                outputActions.style.display = 'flex';
            }
        });
    }

    // Mobile Menu Fix: Close on link click
    const mobileLinks = document.querySelectorAll('#mobileMenu .list-group-item, #mobileMenu a');
    mobileLinks.forEach(link => {
        link.addEventListener('click', () => {
            const menuEl = document.getElementById('mobileMenu');
            const bsCollapse = bootstrap.Collapse.getInstance(menuEl) || new bootstrap.Collapse(menuEl);
            bsCollapse.hide();
        });
    });

    // Initialize
    initSearchIndex();
    initToolLogic();
    
    // Log System Status
    console.log('%c[ToolMaster]%c Infrastructure Online', 'color: #4f46e5; font-weight: bold', 'color: #71717a');
});
