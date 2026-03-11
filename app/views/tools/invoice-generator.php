<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
    <div class="pro-app-main-full animate-fade-up">
        <div class="pro-card">
            

            <div id="currency-selector"></div>

            <!-- Logo Upload (Premium) -->
            <div style="margin-bottom:2rem;padding:1.25rem;border:2px dashed var(--border);border-radius:16px;background:var(--bg-body);text-align:center;">
                <label for="invoiceLogo" style="cursor:pointer;display:block;">
                    <div id="logo-preview" style="max-width:180px;margin:0 auto 0.75rem;">
                        <i class="fa-solid fa-image" style="font-size:2rem;color:var(--text-muted);"></i>
                    </div>
                    <div style="font-weight:600;font-size:0.9rem;color:var(--primary);">Upload Company Logo (optional)</div>
                </label>
                <input type="file" id="invoiceLogo" accept="image/*" style="display:none;" onchange="previewLogo(this)">
            </div>

            <div style="display:grid; grid-template-columns:1fr 1fr; gap:2rem; margin-bottom:2rem;">
                <!-- From -->
                <div>
                    <h4 style="font-weight:700;margin-bottom:1rem;color:var(--text-main);">From (Your Business)</h4>
                    <div style="display:grid;gap:1rem;">
                        <input type="text" id="invFromName" class="form-control" placeholder="Business Name">
                        <input type="text" id="invFromAddress" class="form-control" placeholder="Address">
                        <input type="text" id="invFromEmail" class="form-control" placeholder="Email">
                        <input type="text" id="invFromPhone" class="form-control" placeholder="Phone">
                    </div>
                </div>
                <!-- To -->
                <div>
                    <h4 style="font-weight:700;margin-bottom:1rem;color:var(--text-main);">To (Client)</h4>
                    <div style="display:grid;gap:1rem;">
                        <input type="text" id="invToName" class="form-control" placeholder="Client Name">
                        <input type="text" id="invToAddress" class="form-control" placeholder="Address">
                        <input type="text" id="invToEmail" class="form-control" placeholder="Email">
                        <input type="text" id="invToPhone" class="form-control" placeholder="Phone">
                    </div>
                </div>
            </div>

            <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(200px,1fr)); gap:1rem; margin-bottom:2rem;">
                <div>
                    <label style="display:block;font-weight:600;margin-bottom:0.5rem;font-size:0.9rem;">Invoice Number</label>
                    <input type="text" id="invNumber" class="form-control" value="INV-001">
                </div>
                <div>
                    <label style="display:block;font-weight:600;margin-bottom:0.5rem;font-size:0.9rem;">Invoice Date</label>
                    <input type="date" id="invDate" class="form-control">
                </div>
                <div>
                    <label style="display:block;font-weight:600;margin-bottom:0.5rem;font-size:0.9rem;">Due Date</label>
                    <input type="date" id="invDue" class="form-control">
                </div>
                <div>
                    <label style="display:block;font-weight:600;margin-bottom:0.5rem;font-size:0.9rem;">Tax Rate (%)</label>
                    <input type="number" id="invTax" class="form-control" value="0" min="0" max="100" step="0.01">
                </div>
            </div>

            <!-- Line Items -->
            <h4 style="font-weight:700;margin-bottom:1rem;color:var(--text-main);">Line Items</h4>
            <div id="inv-items" style="margin-bottom:1rem;">
                <div style="display:grid;grid-template-columns:2fr 1fr 1fr 40px;gap:0.75rem;font-weight:600;font-size:0.85rem;color:var(--text-muted);margin-bottom:0.5rem;padding:0 0.5rem;">
                    <div>Description</div><div>Quantity</div><div>Unit Price</div><div></div>
                </div>
                <div class="inv-item-row" style="display:grid;grid-template-columns:2fr 1fr 1fr 40px;gap:0.75rem;margin-bottom:0.5rem;">
                    <input type="text" class="form-control item-desc" placeholder="Service / Product">
                    <input type="number" class="form-control item-qty" value="1" min="0" step="any">
                    <input type="number" class="form-control item-price" value="0" min="0" step="0.01">
                    <button type="button" onclick="this.closest('.inv-item-row').remove()" style="border:none;background:#fee2e2;color:#dc2626;border-radius:8px;cursor:pointer;font-weight:700;">×</button>
                </div>
            </div>
            <button type="button" onclick="addInvItem()" style="border:none;background:var(--primary-glow);color:var(--primary);font-weight:600;padding:0.75rem 1.5rem;border-radius:12px;cursor:pointer;font-size:0.9rem;margin-bottom:2rem;">+ Add Item</button>

            <div style="margin-bottom:2rem;">
                <label style="display:block;font-weight:600;margin-bottom:0.5rem;font-size:0.9rem;">Notes (optional)</label>
                <textarea id="invNotes" class="form-control" rows="3" placeholder="Payment terms, thank you note..."></textarea>
            </div>

            <div style="display: flex; align-items: center; gap: 1.5rem; padding-top: 1rem; border-top: 1px solid var(--border);">
                <button type="button" onclick="generateInvoicePDF()" class="btn btn-primary" style="padding: 1rem 3rem; font-size: 1.15rem; font-weight: 700; border-radius: 14px; box-shadow: 0 10px 15px -3px var(--primary-glow);">
                    Generate PDF Invoice 📄
                </button>
            </div>
        </div>
    </div>

    </div>
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12" id="seo-article-content">
            
            <!-- Features Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12 not-prose mt-8 mb-8">
                <div class="bg-gray-50 border border-gray-200 rounded-xl p-6 text-center shadow-sm">
                    <div class="w-12 h-12 bg-white text-primary rounded-full flex items-center justify-center text-xl mx-auto mb-4 border border-gray-100"><i class="fa-solid fa-bolt"></i></div>
                    <h4 class="font-bold text-gray-900 mb-2">Lightning Fast</h4>
                    <p class="text-sm text-gray-500">Get your results instantly without waiting or reloading.</p>
                </div>
                <div class="bg-gray-50 border border-gray-200 rounded-xl p-6 text-center shadow-sm">
                    <div class="w-12 h-12 bg-white text-primary rounded-full flex items-center justify-center text-xl mx-auto mb-4 border border-gray-100"><i class="fa-solid fa-shield-halved"></i></div>
                    <h4 class="font-bold text-gray-900 mb-2">100% Secure</h4>
                    <p class="text-sm text-gray-500">All data processing happens securely in your own browser.</p>
                </div>
                <div class="bg-gray-50 border border-gray-200 rounded-xl p-6 text-center shadow-sm">
                    <div class="w-12 h-12 bg-white text-primary rounded-full flex items-center justify-center text-xl mx-auto mb-4 border border-gray-100"><i class="fa-solid fa-wand-magic-sparkles"></i></div>
                    <h4 class="font-bold text-gray-900 mb-2">Easy to Use</h4>
                    <p class="text-sm text-gray-500">No complex settings, just drop your data and execute.</p>
                </div>
            </div>
        </article>
    </div>
</section>

<!-- Suggested Tools Strip -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-suggested.php'; ?>

<!-- Popular Tools Section -->
<section class="bg-white py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-100">
    <div class="max-w-7xl mx-auto">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl font-bold text-gray-900 tracking-tight">Most Popular Tools</h2>
            <a href="<?php echo URL_ROOT; ?>" class="text-sm font-medium text-primary hover:text-primary-hover transition-colors">See All &rarr;</a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <?php 
            $allToolsRegistry = require CONFIG . DS . 'tools_registry.php';
            $popularTools = array_slice($allToolsRegistry, 0, 4, true); 
            foreach ($popularTools as $pSlug => $pTool): 
            ?>
            <a href="<?php echo URL_ROOT; ?>/<?php echo $pSlug; ?>" class="group bg-gray-50 border border-gray-200 rounded-xl p-5 flex gap-4 items-start hover:border-primary/50 hover:shadow-lg hover:shadow-primary/5 transition-all duration-200">
                <div class="flex-shrink-0 w-12 h-12 bg-white text-primary rounded-lg flex items-center justify-center text-xl group-hover:bg-primary group-hover:text-white transition-colors duration-200 shadow-sm border border-gray-100">
                    <?php echo render_tool_icon($pTool['icon']); ?>
                </div>
                <div class="flex-grow min-w-0">
                    <h3 class="text-base font-semibold text-gray-900 truncate mb-1 group-hover:text-primary transition-colors"><?php echo htmlspecialchars($pTool['title']); ?></h3>
                    <p class="text-xs text-gray-500 line-clamp-2 leading-relaxed"><?php echo htmlspecialchars($pTool['desc']); ?></p>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>



<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="<?php echo URL_ROOT; ?>/assets/js/business-tools.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const today = new Date().toISOString().split('T')[0];
    document.getElementById('invDate').value = today;
    const due = new Date(); due.setDate(due.getDate() + 30);
    document.getElementById('invDue').value = due.toISOString().split('T')[0];
    BizTools.buildCurrencySelector('currency-selector');
});

let logoDataUrl = null;
function previewLogo(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => {
            logoDataUrl = e.target.result;
            document.getElementById('logo-preview').innerHTML = `<img src="${e.target.result}" style="max-width:180px;max-height:80px;border-radius:8px;">`;
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function addInvItem() {
    const html = `<div class="inv-item-row" style="display:grid;grid-template-columns:2fr 1fr 1fr 40px;gap:0.75rem;margin-bottom:0.5rem;">
        <input type="text" class="form-control item-desc" placeholder="Service / Product">
        <input type="number" class="form-control item-qty" value="1" min="0" step="any">
        <input type="number" class="form-control item-price" value="0" min="0" step="0.01">
        <button type="button" onclick="this.closest('.inv-item-row').remove()" style="border:none;background:#fee2e2;color:#dc2626;border-radius:8px;cursor:pointer;font-weight:700;">×</button>
    </div>`;
    document.getElementById('inv-items').insertAdjacentHTML('beforeend', html);
}

function generateInvoicePDF() {
    const curr = BizTools.currencies[BizTools.activeCurrency];
    const sym = curr ? curr.symbol : '$';
    const rows = document.querySelectorAll('.inv-item-row');
    const items = [];
    let subtotal = 0;

    rows.forEach(row => {
        const desc = row.querySelector('.item-desc').value || 'Item';
        const qty = parseFloat(row.querySelector('.item-qty').value) || 0;
        const price = parseFloat(row.querySelector('.item-price').value) || 0;
        const total = qty * price;
        subtotal += total;
        items.push([desc, qty.toString(), sym + price.toFixed(2), sym + total.toFixed(2)]);
    });

    const taxRate = parseFloat(document.getElementById('invTax').value) || 0;
    const taxAmount = subtotal * (taxRate / 100);
    const grandTotal = subtotal + taxAmount;

    const content = [
        { columns: [
            logoDataUrl ? { image: logoDataUrl, width: 120 } : { text: document.getElementById('invFromName').value || 'Your Business', style: 'companyName' },
            { text: 'INVOICE', style: 'invoiceTitle', alignment: 'right' }
        ], marginBottom: 20 },
        { columns: [
            { stack: [
                { text: 'From:', style: 'label' },
                { text: document.getElementById('invFromName').value || '', bold: true },
                document.getElementById('invFromAddress').value || '',
                document.getElementById('invFromEmail').value || '',
                document.getElementById('invFromPhone').value || ''
            ]},
            { stack: [
                { text: 'Bill To:', style: 'label' },
                { text: document.getElementById('invToName').value || '', bold: true },
                document.getElementById('invToAddress').value || '',
                document.getElementById('invToEmail').value || '',
                document.getElementById('invToPhone').value || ''
            ]},
            { stack: [
                { text: 'Invoice #: ' + (document.getElementById('invNumber').value || 'INV-001'), bold: true },
                'Date: ' + (document.getElementById('invDate').value || ''),
                'Due: ' + (document.getElementById('invDue').value || '')
            ], alignment: 'right' }
        ], marginBottom: 30 },
        { table: {
            headerRows: 1,
            widths: ['*', 'auto', 'auto', 'auto'],
            body: [
                [{ text: 'Description', style: 'tableHeader' }, { text: 'Qty', style: 'tableHeader' }, { text: 'Price', style: 'tableHeader' }, { text: 'Total', style: 'tableHeader' }],
                ...items
            ]
        }, layout: 'lightHorizontalLines', marginBottom: 20 },
        { columns: [
            { text: '' },
            { stack: [
                { columns: [{ text: 'Subtotal:', width: 100 }, { text: sym + subtotal.toFixed(2), alignment: 'right' }] },
                { columns: [{ text: `Tax (${taxRate}%):`, width: 100 }, { text: sym + taxAmount.toFixed(2), alignment: 'right' }] },
                { canvas: [{ type: 'line', x1: 0, y1: 5, x2: 200, y2: 5, lineWidth: 1, lineColor: '#999' }] },
                { columns: [{ text: 'Total:', width: 100, bold: true, fontSize: 14 }, { text: sym + grandTotal.toFixed(2), alignment: 'right', bold: true, fontSize: 14, color: '#2563eb' }], marginTop: 5 }
            ], width: 200 }
        ], marginBottom: 30 }
    ];

    const notes = document.getElementById('invNotes').value;
    if (notes) content.push({ text: 'Notes:', style: 'label', marginTop: 10 }, { text: notes, color: '#666' });

    pdfMake.createPdf({
        content,
        styles: {
            companyName: { fontSize: 20, bold: true, color: '#2563eb' },
            invoiceTitle: { fontSize: 28, bold: true, color: '#2563eb' },
            label: { fontSize: 10, color: '#888', marginBottom: 4 },
            tableHeader: { bold: true, fontSize: 10, color: '#fff', fillColor: '#2563eb' }
        },
        defaultStyle: { fontSize: 10 }
    }).download(`invoice-${document.getElementById('invNumber').value || 'INV-001'}.pdf`);

    BizTools.saveHistory('invoice-generator', { invNumber: document.getElementById('invNumber').value, total: grandTotal });
    BizTools.toast('Invoice PDF generated!');
}
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>