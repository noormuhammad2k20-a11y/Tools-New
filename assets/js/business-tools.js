/**
 * Business Tools — Shared Utilities
 * Currency formatting, LocalStorage history, multi-currency support
 */
const BizTools = {
    currencies: {
        USD: { symbol: '$', name: 'US Dollar', rate: 1 },
        EUR: { symbol: '€', name: 'Euro', rate: 0.92 },
        GBP: { symbol: '£', name: 'British Pound', rate: 0.79 },
        INR: { symbol: '₹', name: 'Indian Rupee', rate: 83.5 },
        CAD: { symbol: 'C$', name: 'Canadian Dollar', rate: 1.36 },
        AUD: { symbol: 'A$', name: 'Australian Dollar', rate: 1.54 },
        JPY: { symbol: '¥', name: 'Japanese Yen', rate: 149.5 }
    },

    activeCurrency: 'USD',

    fmt(amount, currency) {
        const c = this.currencies[currency || this.activeCurrency];
        const converted = amount * (c ? c.rate : 1);
        return (c ? c.symbol : '$') + converted.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    },

    fmtRaw(amount) {
        return amount.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    },

    saveHistory(toolSlug, entry) {
        try {
            const key = 'biz_history_' + toolSlug;
            let history = JSON.parse(localStorage.getItem(key) || '[]');
            entry.timestamp = new Date().toISOString();
            history.unshift(entry);
            if (history.length > 20) history = history.slice(0, 20);
            localStorage.setItem(key, JSON.stringify(history));
        } catch(e) { /* quota exceeded or private mode */ }
    },

    getHistory(toolSlug) {
        try {
            return JSON.parse(localStorage.getItem('biz_history_' + toolSlug) || '[]');
        } catch(e) { return []; }
    },

    clearHistory(toolSlug) {
        localStorage.removeItem('biz_history_' + toolSlug);
    },

    buildCurrencySelector(containerId, onChange) {
        const container = document.getElementById(containerId);
        if (!container) return;
        let html = '<div style="display:flex;gap:0.5rem;flex-wrap:wrap;margin-bottom:1.5rem;">';
        for (const [code, info] of Object.entries(this.currencies)) {
            const active = code === this.activeCurrency ? 'background:var(--primary);color:#fff;border-color:var(--primary);' : '';
            html += `<button type="button" class="curr-btn" data-curr="${code}" style="padding:0.5rem 1rem;border-radius:10px;border:1px solid var(--border);font-weight:600;font-size:0.85rem;cursor:pointer;transition:all 0.2s;${active}">${info.symbol} ${code}</button>`;
        }
        html += '</div>';
        container.innerHTML = html;
        container.querySelectorAll('.curr-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                BizTools.activeCurrency = btn.dataset.curr;
                container.querySelectorAll('.curr-btn').forEach(b => {
                    b.style.background = '';
                    b.style.color = '';
                    b.style.borderColor = 'var(--border)';
                });
                btn.style.background = 'var(--primary)';
                btn.style.color = '#fff';
                btn.style.borderColor = 'var(--primary)';
                if (onChange) onChange(btn.dataset.curr);
            });
        });
    },

    toast(msg) {
        if (window.showToast) { window.showToast(msg); return; }
        const t = document.createElement('div');
        t.textContent = msg;
        Object.assign(t.style, {position:'fixed',bottom:'2rem',right:'2rem',background:'#1e293b',color:'#fff',padding:'1rem 1.5rem',borderRadius:'12px',fontWeight:'600',zIndex:'9999',fontSize:'0.95rem',boxShadow:'0 10px 25px rgba(0,0,0,0.15)'});
        document.body.appendChild(t);
        setTimeout(() => t.remove(), 3000);
    }
};
