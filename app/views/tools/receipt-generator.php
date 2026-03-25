

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
    <div class="pro-app-main-full animate-fade-up">
        <div class="pro-card">
            

            <div id="currency-selector"></div>

            <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(250px,1fr)); gap:1.5rem; margin-bottom:2rem;">
                <div>
                    <label style="display:block;font-weight:600;margin-bottom:0.5rem;font-size:0.9rem;">Business Name</label>
                    <input type="text" id="rcBusiness" class="form-control" placeholder="Your Business Name">
                </div>
                <div>
                    <label style="display:block;font-weight:600;margin-bottom:0.5rem;font-size:0.9rem;">Business Address</label>
                    <input type="text" id="rcAddress" class="form-control" placeholder="123 Main St, City">
                </div>
                <div>
                    <label style="display:block;font-weight:600;margin-bottom:0.5rem;font-size:0.9rem;">Customer Name</label>
                    <input type="text" id="rcCustomer" class="form-control" placeholder="Customer Name">
                </div>
                <div>
                    <label style="display:block;font-weight:600;margin-bottom:0.5rem;font-size:0.9rem;">Receipt Number</label>
                    <input type="text" id="rcNumber" class="form-control" value="REC-001">
                </div>
                <div>
                    <label style="display:block;font-weight:600;margin-bottom:0.5rem;font-size:0.9rem;">Date</label>
                    <input type="date" id="rcDate" class="form-control">
                </div>
                <div>
                    <label style="display:block;font-weight:600;margin-bottom:0.5rem;font-size:0.9rem;">Payment Method</label>
                    <select id="rcPayment" class="form-control">
                        <option>Cash</option>
                        <option>Credit Card</option>
                        <option>Debit Card</option>
                        <option>Bank Transfer</option>
                        <option>PayPal</option>
                        <option>Check</option>
                    </select>
                </div>
                <div>
                    <label style="display:block;font-weight:600;margin-bottom:0.5rem;font-size:0.9rem;">Tax Rate (%)</label>
                    <input type="number" id="rcTax" class="form-control" value="0" min="0" max="100" step="0.01">
                </div>
            </div>

            <h4 style="font-weight:700;margin-bottom:1rem;color:var(--text-main);">Items</h4>
            <div id="rc-items" style="margin-bottom:1rem;">
                <div style="display:grid;grid-template-columns:2fr 1fr 1fr 40px;gap:0.75rem;font-weight:600;font-size:0.85rem;color:var(--text-muted);margin-bottom:0.5rem;padding:0 0.5rem;">
                    <div>Description</div><div>Qty</div><div>Price</div><div></div>
                </div>
                <div class="rc-item-row" style="display:grid;grid-template-columns:2fr 1fr 1fr 40px;gap:0.75rem;margin-bottom:0.5rem;">
                    <input type="text" class="form-control rc-desc" placeholder="Item">
                    <input type="number" class="form-control rc-qty" value="1" min="0" step="any">
                    <input type="number" class="form-control rc-price" value="0" min="0" step="0.01">
                    <button type="button" onclick="this.closest('.rc-item-row').remove()" style="border:none;background:#fee2e2;color:#dc2626;border-radius:8px;cursor:pointer;font-weight:700;">×</button>
                </div>
            </div>
            <button type="button" onclick="addRCItem()" style="border:none;background:var(--primary-glow);color:var(--primary);font-weight:600;padding:0.75rem 1.5rem;border-radius:12px;cursor:pointer;font-size:0.9rem;margin-bottom:2rem;">+ Add Item</button>

            <div style="display: flex; align-items: center; gap: 1.5rem; padding-top: 1rem; border-top: 1px solid var(--border);">
                <button type="button" onclick="generateReceiptPDF()" class="btn btn-primary" style="padding: 1rem 3rem; font-size: 1.15rem; font-weight: 700; border-radius: 14px; box-shadow: 0 10px 15px -3px var(--primary-glow);">
                    Generate Receipt PDF 🧾
                </button>
            </div>
        </div>
    </div>

    </div>


<!-- Content + Sidebar (SEO, FAQ) -->
<div id="unique-article-content" class="article-content">
            
            

<!-- Suggested Tools Strip -->


<!-- Popular Tools Section -->




<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="<?php echo URL_ROOT; ?>/assets/js/business-tools.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('rcDate').value = new Date().toISOString().split('T')[0];
    BizTools.buildCurrencySelector('currency-selector');
});

function addRCItem() {
    document.getElementById('rc-items').insertAdjacentHTML('beforeend', `<div class="rc-item-row" style="display:grid;grid-template-columns:2fr 1fr 1fr 40px;gap:0.75rem;margin-bottom:0.5rem;">
        <input type="text" class="form-control rc-desc" placeholder="Item">
        <input type="number" class="form-control rc-qty" value="1" min="0" step="any">
        <input type="number" class="form-control rc-price" value="0" min="0" step="0.01">
        <button type="button" onclick="this.closest('.rc-item-row').remove()" style="border:none;background:#fee2e2;color:#dc2626;border-radius:8px;cursor:pointer;font-weight:700;">×</button>
    </div>`);
}

function generateReceiptPDF() {
    const f = id => document.getElementById(id).value || '';
    const sym = BizTools.currencies[BizTools.activeCurrency]?.symbol || '$';
    const items = [];
    let subtotal = 0;
    document.querySelectorAll('.rc-item-row').forEach(row => {
        const desc = row.querySelector('.rc-desc').value || 'Item';
        const qty = parseFloat(row.querySelector('.rc-qty').value) || 0;
        const price = parseFloat(row.querySelector('.rc-price').value) || 0;
        const t = qty * price;
        subtotal += t;
        items.push([desc, qty.toString(), sym + price.toFixed(2), sym + t.toFixed(2)]);
    });

    const taxRate = parseFloat(f('rcTax')) || 0;
    const tax = subtotal * (taxRate / 100);
    const total = subtotal + tax;

    pdfMake.createPdf({
        content: [
            { text: f('rcBusiness') || 'Business Name', style: 'bizName', alignment: 'center' },
            { text: f('rcAddress'), alignment: 'center', color: '#888', fontSize: 9, marginBottom: 15 },
            { canvas: [{ type: 'line', x1: 0, y1: 0, x2: 515, y2: 0, lineWidth: 1, lineColor: '#ddd' }], marginBottom: 15 },
            { text: 'PAYMENT RECEIPT', alignment: 'center', fontSize: 16, bold: true, color: '#059669', marginBottom: 15 },
            { columns: [
                { stack: [{ text: 'Receipt #: ' + f('rcNumber'), bold: true }, 'Date: ' + f('rcDate')] },
                { stack: [{ text: 'Customer: ' + f('rcCustomer'), bold: true }, 'Payment: ' + f('rcPayment')], alignment: 'right' }
            ], marginBottom: 20 },
            { table: { headerRows: 1, widths: ['*','auto','auto','auto'], body: [
                [{text:'Item',style:'th'},{text:'Qty',style:'th'},{text:'Price',style:'th'},{text:'Total',style:'th'}],
                ...items
            ]}, layout: 'lightHorizontalLines', marginBottom: 15 },
            { columns: [{ text: '' }, { stack: [
                { columns: [{ text: 'Subtotal:', width: 80 }, { text: sym + subtotal.toFixed(2), alignment: 'right' }] },
                { columns: [{ text: `Tax (${taxRate}%):`, width: 80 }, { text: sym + tax.toFixed(2), alignment: 'right' }] },
                { canvas: [{ type: 'line', x1: 0, y1: 5, x2: 180, y2: 5, lineWidth: 1, lineColor: '#999' }] },
                { columns: [{ text: 'TOTAL:', width: 80, bold: true, fontSize: 13 }, { text: sym + total.toFixed(2), alignment: 'right', bold: true, fontSize: 13, color: '#059669' }], marginTop: 5 }
            ], width: 180 }], marginBottom: 30 },
            { text: 'Thank you for your payment!', alignment: 'center', color: '#888', italics: true }
        ],
        styles: { bizName: { fontSize: 18, bold: true, color: '#1e293b', marginBottom: 3 }, th: { bold: true, fontSize: 10, color: '#fff', fillColor: '#059669' } },
        defaultStyle: { fontSize: 10 }
    }).download(`receipt-${f('rcNumber')}.pdf`);
    BizTools.toast('Receipt PDF generated!');
}
</script>






