/**
 * ToolMaster - Vanilla JS Application
 * Replaces React state, routing, and interactivity
 */

// Toast Notification System
window.showToast = (message, type = 'success') => {
    let container = document.querySelector('.toast-container');
    if (!container) {
        container = document.createElement('div');
        container.className = 'toast-container';
        document.body.appendChild(container);
    }

    const toast = document.createElement('div');
    toast.className = `toast ${type}`;
    const icon = type === 'success' ? '✅' : (type === 'error' ? '❌' : 'ℹ️');

    toast.innerHTML = `
        <span>${icon}</span>
        <div style="font-weight: 500;">${message}</div>
    `;

    container.appendChild(toast);

    setTimeout(() => {
        toast.style.opacity = '0';
        toast.style.transform = 'translateY(10px)';
        toast.style.transition = 'all 0.3s ease';
        setTimeout(() => toast.remove(), 300);
    }, 3000);
};

window.copyPremiumResult = (btn) => {
    const card = btn.closest('.premium-result-card, .code-result');
    // Support both result-payload (for AI) and outputText (for standard tools)
    const target = card ? card.querySelector('.result-payload, .prompt-box, code') : document.getElementById('outputText');
    const text = target ? (target.innerText || target.value) : '';
    if (text) {
        navigator.clipboard.writeText(text.trim()).then(() => {
            showToast('Copied to clipboard!');
        });
    }
};

// ============================================
// Tool Processing Engine (from toolLogic.js)
// ============================================
const textLogic = {
  upperCase: (i) => i.toUpperCase(),
  lowerCase: (i) => i.toLowerCase(),
  titleCase: (i) => i.replace(/\w\S*/g, t => t.charAt(0).toUpperCase() + t.substr(1).toLowerCase()),
  sentenceCase: (i) => i.toLowerCase().replace(/(^\s*\w|[\.!\?]\s*\w)/g, c => c.toUpperCase()),
  wordCount: (i) => { const w = i.trim().split(/\s+/).filter(x => x.length > 0); return `Words: ${w.length}\nCharacters: ${i.length}\nLines: ${i.split(/\n/).length}`; },
  reverseText: (i) => i.split('').reverse().join(''),
  removeDuplicateLines: (i) => [...new Set(i.split('\n'))].join('\n'),
  slugify: (i) => i.toLowerCase().replace(/[^\w ]+/g, '').replace(/ +/g, '-'),
  truncate: (i) => i.length > 200 ? i.substring(0, 200) + '...' : i,
};
const encoderLogic = {
  base64Encode: (i) => btoa(i),
  base64Decode: (i) => { try { return atob(i); } catch(e) { return 'Error: Invalid Base64 input.'; } },
  urlEncode: (i) => encodeURIComponent(i),
  urlDecode: (i) => decodeURIComponent(i),
};
const webLogic = {
  cssMinify: (i) => i.replace(/\s+/g,' ').replace(/\/\*.*?\*\//g,'').replace(/ ?\{ ?/g,'{').replace(/ ?\} ?/g,'}').replace(/ ?: ?/g,':').replace(/ ?; ?/g,';'),
  htmlMinify: (i) => i.replace(/\s+/g,' ').replace(/>\s+</g,'><').replace(/<!--.*?-->/g,''),
};
const devLogic = {
  jsonFormat: (i) => { try { return JSON.stringify(JSON.parse(i), null, 2); } catch(e) { return `Error: Invalid JSON - ${e.message}`; } },
  jsonMinify: (i) => { try { return JSON.stringify(JSON.parse(i)); } catch(e) { return `Error: Invalid JSON - ${e.message}`; } },
};

const toolRegistry = {
  'uppercase-converter': textLogic.upperCase, 'lowercase-converter': textLogic.lowerCase,
  'title-case-converter': textLogic.titleCase, 'sentence-case-converter': textLogic.sentenceCase,
  'word-counter': textLogic.wordCount, 'text-reverser': textLogic.reverseText,
  'remove-duplicate-lines': textLogic.removeDuplicateLines, 'slug-generator': textLogic.slugify,
  'text-truncator': textLogic.truncate,
  'base64-encoder': encoderLogic.base64Encode, 'base64-decoder': encoderLogic.base64Decode,
  'url-encoder': encoderLogic.urlEncode, 'url-decoder': encoderLogic.urlDecode,
  'css-minifier': webLogic.cssMinify, 'html-minifier': webLogic.htmlMinify,
  'json-formatter': devLogic.jsonFormat, 'json-minifier': devLogic.jsonMinify,
};

// ============================================
// DOM Ready
// ============================================
document.addEventListener('DOMContentLoaded', () => {
  initNavbar();
  initCommandBar();
  initToolPage();
  initFAQ();
});

// ============================================
// Navbar
// ============================================
function initNavbar() {
  const dropdown = document.getElementById('navDropdown');
  const trigger = document.getElementById('dropdownTrigger');
  const mobileToggle = document.getElementById('mobileToggle');
  const mobileMenu = document.getElementById('mobileMenu');

  if (dropdown && trigger) {
    trigger.addEventListener('mouseenter', () => dropdown.classList.add('open'));
    dropdown.addEventListener('mouseleave', () => dropdown.classList.remove('open'));
  }

  if (mobileToggle && mobileMenu) {
    mobileToggle.addEventListener('click', () => {
      mobileMenu.classList.toggle('open');
    });
  }
}

// ============================================
// Command Bar (Ctrl+K Search)
// ============================================
let allTools = [];

function initCommandBar() {
  const overlay = document.getElementById('commandOverlay');
  const input = document.getElementById('commandInput');
  const results = document.getElementById('commandResults');
  const backdrop = document.getElementById('commandBackdrop');
  const closeBtn = document.getElementById('commandClose');
  const searchTrigger = document.getElementById('searchTrigger');
  const mobileSearchTrigger = document.getElementById('mobileSearchTrigger');

  if (!overlay) return;

  // Fetch tools for search
  fetchToolsForSearch();

  const openSearch = () => { overlay.classList.add('open'); if (input) input.focus(); };
  const closeSearch = () => { overlay.classList.remove('open'); if (input) { input.value = ''; renderSearchResults(''); } };

  // Keyboard shortcuts
  document.addEventListener('keydown', (e) => {
    if (e.key === 'k' && (e.metaKey || e.ctrlKey)) { e.preventDefault(); openSearch(); }
    if (e.key === 'Escape') closeSearch();
  });

  if (searchTrigger) searchTrigger.addEventListener('click', openSearch);
  if (mobileSearchTrigger) mobileSearchTrigger.addEventListener('click', () => {
    const mobileMenu = document.getElementById('mobileMenu');
    if (mobileMenu) mobileMenu.classList.remove('open');
    openSearch();
  });
  if (backdrop) backdrop.addEventListener('click', closeSearch);
  if (closeBtn) closeBtn.addEventListener('click', closeSearch);
  if (input) input.addEventListener('input', (e) => renderSearchResults(e.target.value));
}

async function fetchToolsForSearch() {
  try {
    const response = await fetch(window.APP_BASE + 'api/list_tools.php');
    const data = await response.json();
    if (data.status === 'success' && data.tools) {
      allTools = Object.entries(data.tools).map(([slug, val]) => ({ slug, ...val }));
    }
  } catch (err) { console.error('Failed to fetch tools for search', err); }
}

function renderSearchResults(query) {
  const results = document.getElementById('commandResults');
  const defaultEl = document.getElementById('commandDefault');
  if (!results) return;

  if (!query.trim()) {
    results.innerHTML = '';
    if (defaultEl) results.appendChild(defaultEl);
    if (defaultEl) defaultEl.style.display = '';
    return;
  }

  const filtered = allTools.filter(t =>
    t.title.toLowerCase().includes(query.toLowerCase()) ||
    (t.desc && t.desc.toLowerCase().includes(query.toLowerCase()))
  ).slice(0, 5);

  if (filtered.length === 0) {
    results.innerHTML = `<div class="command-empty"><svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg><p class="command-empty-title">No matching nodes</p><p class="command-empty-desc">Awaiting valid query</p></div>`;
    return;
  }

  results.innerHTML = `<p class="command-results-label">Validated Resources</p>` +
    filtered.map(t => `<a href="${window.APP_BASE}tool/${t.slug}" class="command-result-item"><div class="command-result-left"><div class="command-result-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/></svg></div><div><p class="command-result-title">${escapeHtml(t.title)}</p><p class="command-result-cat">${escapeHtml((t.category||'').replace(/-/g,' '))}</p></div></div><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="command-result-arrow"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg></a>`).join('');
}

function escapeHtml(str) {
  const div = document.createElement('div');
  div.textContent = str;
  return div.innerHTML;
}

// ============================================
// Tool Page (Form, Local Processing, Copy)
// ============================================
function initToolPage() {
  const form = document.getElementById('toolForm');
  const resetBtn = document.getElementById('resetBtn');
  const copyBtn = document.getElementById('copyBtn');
  const clearBtn = document.getElementById('clearOutput');

  if (!form) return;

  const slug = window.TOOL_SLUG;
  const isLocal = slug && toolRegistry[slug];

  // Real-time processing for local tools with textarea
  if (isLocal) {
    const inputEl = document.getElementById('input-data');
    if (inputEl) {
      inputEl.addEventListener('input', () => {
        const val = inputEl.value;
        if (val && val.trim() !== '') {
          try {
            const result = toolRegistry[slug](val);
            showOutput(result);
          } catch(e) { /* ignore */ }
        } else {
          hideOutput();
        }
      });
    }
  }

  // Form submit
  form.addEventListener('submit', async (e) => {
    e.preventDefault();
    const submitBtn = document.getElementById('submitBtn');
    const submitText = document.getElementById('submitText');
    const submitIcon = document.getElementById('submitIcon');

    if (submitBtn) submitBtn.disabled = true;
    if (submitText) submitText.textContent = 'Executing...';

    const fd = new FormData(form);

    try {
      if (isLocal) {
        const inputEl = document.getElementById('input-data');
        const input = inputEl ? inputEl.value : '';
        const result = toolRegistry[slug](input.toString());
        showOutput(result);
      } else {
        const response = await fetch(form.action, { method: 'POST', body: fd });
        const contentType = response.headers.get('content-type');
        if (contentType && contentType.includes('application/json')) {
          let data = await response.json();
          // Handle array wrapper if present
          if (Array.isArray(data) && data.length > 0) {
            data = data[0];
          }
          
          if (data.status === 'error') { 
            showOutput(data.message, true); 
          } else {
            const output = data.result || (typeof data === 'string' ? data : JSON.stringify(data, null, 2));
            showOutput(output);
          }
        } else {
          const text = await response.text();
          showOutput(text);
        }
      }
    } catch (err) {
      showOutput(err.message || 'Execution failed.', true);
    } finally {
      setTimeout(() => {
        if (submitBtn) submitBtn.disabled = false;
        if (submitText) submitText.textContent = 'Run Operation';
      }, 200);
    }
  });

  // Reset
  if (resetBtn) {
    resetBtn.addEventListener('click', () => { form.reset(); hideOutput(); });
  }

  // Copy
  if (copyBtn) {
    copyBtn.addEventListener('click', () => {
      const outputText = document.getElementById('outputText');
      if (!outputText) return;
      const text = outputText.textContent || outputText.innerText;
      navigator.clipboard.writeText(text);
      const copyTextEl = document.getElementById('copyText');
      if (copyTextEl) {
        copyBtn.classList.add('copied');
        copyTextEl.textContent = 'Buffer Copied';
        setTimeout(() => { copyBtn.classList.remove('copied'); copyTextEl.textContent = 'Copy to Clipboard'; }, 2000);
      }
    });
  }

  // Clear
  if (clearBtn) { clearBtn.addEventListener('click', hideOutput); }
}

function showOutput(content, isError = false) {
  const placeholder = document.getElementById('outputPlaceholder');
  const resultEl = document.getElementById('outputResult');
  const textEl = document.getElementById('outputText');
  const actions = document.getElementById('outputActions');

  if (placeholder) placeholder.style.display = 'none';
  if (resultEl) resultEl.style.display = 'flex';
  if (textEl) {
    textEl.className = 'output-text' + (isError ? ' error' : '');
    // Check if content is HTML
    if (typeof content === 'string' && content.includes('<')) {
      textEl.innerHTML = content;
      // Premium Mode: If content contains premium card, strip parent styling
      if (content.includes('premium-result-card')) {
        textEl.classList.add('premium-mode');
        const parentModule = textEl.closest('.output-module');
        if (parentModule) parentModule.classList.add('is-premium');
        if (textEl.parentElement) textEl.parentElement.classList.add('premium-mode');
      } else {
        textEl.classList.remove('premium-mode');
        const parentModule = textEl.closest('.output-module');
        if (parentModule) parentModule.classList.remove('is-premium');
        if (textEl.parentElement) textEl.parentElement.classList.remove('premium-mode');
      }
    } else {
      textEl.textContent = content;
      textEl.classList.remove('premium-mode');
      const parentModule = textEl.closest('.output-module');
      if (parentModule) parentModule.classList.remove('is-premium');
      if (textEl.parentElement) textEl.parentElement.classList.remove('premium-mode');
    }
  }
  if (actions && !isError && !content.toString().includes('premium-result-card')) actions.style.display = 'flex';

  // Re-initialize Lucide icons for new content
  if (window.lucide) {
    window.lucide.createIcons();
  }
}

function hideOutput() {
  const placeholder = document.getElementById('outputPlaceholder');
  const resultEl = document.getElementById('outputResult');
  const actions = document.getElementById('outputActions');

  if (placeholder) placeholder.style.display = '';
  if (resultEl) resultEl.style.display = 'none';
  if (actions) actions.style.display = 'none';
}

// ============================================
// FAQ Accordion
// ============================================
function initFAQ() {
  document.querySelectorAll('[data-faq-toggle]').forEach(btn => {
    btn.addEventListener('click', () => {
      const item = btn.closest('[data-faq]');
      if (!item) return;
      const wasOpen = item.classList.contains('open');

      // Close all
      document.querySelectorAll('[data-faq]').forEach(f => f.classList.remove('open'));

      // Toggle current
      if (!wasOpen) item.classList.add('open');
    });
  });
}

// ============================================
// Global: Set APP_BASE for AJAX calls
// ============================================
(function() {
  const path = window.location.pathname;
  const match = path.match(/^(\/[^\/]+\/)/);
  window.APP_BASE = match ? match[1] : '/';
})();
