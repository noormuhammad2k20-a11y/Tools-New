

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
    <div class="pro-app-main-full animate-fade-up">
        <div class="pro-card">
            

            <div id="currency-selector"></div>

            <div style="display:grid; grid-template-columns:1fr 1fr; gap:2rem; margin-bottom:2rem;">
                <div>
                    <h4 style="font-weight:700;margin-bottom:1rem;color:var(--text-main);">Buyer (Your Company)</h4>
                    <div style="display:grid;gap:1rem;">
                        <input type="text" id="poBuyer" class="form-control" placeholder="Company Name">
                        <input type="text" id="poBuyerAddr" class="form-control" placeholder="Address">
                        <input type="text" id="poBuyerContact" class="form-control" placeholder="Contact Person">
                        <input type="email" id="poBuyerEmail" class="form-control" placeholder="Email">
                    </div>
                </div>
                <div>
                    <h4 style="font-weight:700;margin-bottom:1rem;color:var(--text-main);">Vendor / Supplier</h4>
                    <div style="display:grid;gap:1rem;">
                        <input type="text" id="poVendor" class="form-control" placeholder="Vendor Name">
                        <input type="text" id="poVendorAddr" class="form-control" placeholder="Address">
                        <input type="text" id="poVendorContact" class="form-control" placeholder="Contact Person">
                        <input type="email" id="poVendorEmail" class="form-control" placeholder="Email">
                    </div>
                </div>
            </div>

            <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(200px,1fr)); gap:1rem; margin-bottom:2rem;">
                <div>
                    <label style="display:block;font-weight:600;margin-bottom:0.5rem;font-size:0.9rem;">PO Number</label>
                    <input type="text" id="poNumber" class="form-control" value="PO-001">
                </div>
                <div>
                    <label style="display:block;font-weight:600;margin-bottom:0.5rem;font-size:0.9rem;">Date</label>
                    <input type="date" id="poDate" class="form-control">
                </div>
                <div>
                    <label style="display:block;font-weight:600;margin-bottom:0.5rem;font-size:0.9rem;">Delivery Date</label>
                    <input type="date" id="poDelivery" class="form-control">
                </div>
                <div>
                    <label style="display:block;font-weight:600;margin-bottom:0.5rem;font-size:0.9rem;">Shipping Method</label>
                    <select id="poShipping" class="form-control">
                        <option>Standard Shipping</option>
                        <option>Express Shipping</option>
                        <option>Freight</option>
                        <option>Pickup</option>
                    </select>
                </div>
            </div>

            <h4 style="font-weight:700;margin-bottom:1rem;color:var(--text-main);">Order Items</h4>
            <div id="po-items" style="margin-bottom:1rem;">
                <div style="display:grid;grid-template-columns:2fr 1fr 1fr 40px;gap:0.75rem;font-weight:600;font-size:0.85rem;color:var(--text-muted);margin-bottom:0.5rem;padding:0 0.5rem;">
                    <div>Item Description</div><div>Quantity</div><div>Unit Price</div><div></div>
                </div>
                <div class="po-item-row" style="display:grid;grid-template-columns:2fr 1fr 1fr 40px;gap:0.75rem;margin-bottom:0.5rem;">
                    <input type="text" class="form-control po-desc" placeholder="Product / Material">
                    <input type="number" class="form-control po-qty" value="1" min="0" step="any">
                    <input type="number" class="form-control po-price" value="0" min="0" step="0.01">
                    <button type="button" onclick="this.closest('.po-item-row').remove()" style="border:none;background:#fee2e2;color:#dc2626;border-radius:8px;cursor:pointer;font-weight:700;">×</button>
                </div>
            </div>
            <button type="button" onclick="addPOItem()" style="border:none;background:var(--primary-glow);color:var(--primary);font-weight:600;padding:0.75rem 1.5rem;border-radius:12px;cursor:pointer;font-size:0.9rem;margin-bottom:2rem;">+ Add Item</button>

            <div style="margin-bottom:2rem;">
                <label style="display:block;font-weight:600;margin-bottom:0.5rem;font-size:0.9rem;">Terms &amp; Conditions</label>
                <textarea id="poTerms" class="form-control" rows="3" placeholder="Net 30, FOB Destination...">Payment is due within 30 days of delivery. All goods must meet quality standards.</textarea>
            </div>

            <div style="display: flex; align-items: center; gap: 1.5rem; padding-top: 1rem; border-top: 1px solid var(--border);">
                <button type="button" onclick="generatePO()" class="btn btn-primary" style="padding: 1rem 3rem; font-size: 1.15rem; font-weight: 700; border-radius: 14px; box-shadow: 0 10px 15px -3px var(--primary-glow);">
                    Generate PO PDF 📋
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
    document.getElementById('poDate').value = new Date().toISOString().split('T')[0];
    const d = new Date(); d.setDate(d.getDate() + 14);
    document.getElementById('poDelivery').value = d.toISOString().split('T')[0];
    BizTools.buildCurrencySelector('currency-selector');
});

function addPOItem() {
    document.getElementById('po-items').insertAdjacentHTML('beforeend', `<div class="po-item-row" style="display:grid;grid-template-columns:2fr 1fr 1fr 40px;gap:0.75rem;margin-bottom:0.5rem;">
        <input type="text" class="form-control po-desc" placeholder="Product / Material">
        <input type="number" class="form-control po-qty" value="1" min="0" step="any">
        <input type="number" class="form-control po-price" value="0" min="0" step="0.01">
        <button type="button" onclick="this.closest('.po-item-row').remove()" style="border:none;background:#fee2e2;color:#dc2626;border-radius:8px;cursor:pointer;font-weight:700;">×</button>
    </div>`);
}

function generatePO() {
    const f = id => document.getElementById(id).value || '';
    const sym = BizTools.currencies[BizTools.activeCurrency]?.symbol || '$';
    const items = [];
    let total = 0;
    document.querySelectorAll('.po-item-row').forEach(row => {
        const desc = row.querySelector('.po-desc').value || 'Item';
        const qty = parseFloat(row.querySelector('.po-qty').value) || 0;
        const price = parseFloat(row.querySelector('.po-price').value) || 0;
        const lineTotal = qty * price;
        total += lineTotal;
        items.push([desc, qty.toString(), sym + price.toFixed(2), sym + lineTotal.toFixed(2)]);
    });

    pdfMake.createPdf({
        content: [
            { text: 'PURCHASE ORDER', style: 'title', alignment: 'center' },
            { columns: [
                { stack: [{ text: 'Buyer:', style: 'label' }, { text: f('poBuyer'), bold: true }, f('poBuyerAddr'), f('poBuyerContact'), f('poBuyerEmail')] },
                { stack: [{ text: 'Vendor:', style: 'label' }, { text: f('poVendor'), bold: true }, f('poVendorAddr'), f('poVendorContact'), f('poVendorEmail')] },
                { stack: [{ text: 'PO #: ' + f('poNumber'), bold: true }, 'Date: ' + f('poDate'), 'Delivery: ' + f('poDelivery'), 'Shipping: ' + f('poShipping')], alignment: 'right' }
            ], marginTop: 20, marginBottom: 25 },
            { table: { headerRows: 1, widths: ['*','auto','auto','auto'], body: [
                [{text:'Description',style:'th'},{text:'Qty',style:'th'},{text:'Price',style:'th'},{text:'Total',style:'th'}],
                ...items
            ]}, layout: 'lightHorizontalLines', marginBottom: 15 },
            { columns: [{ text: '' }, { text: 'TOTAL: ' + sym + total.toFixed(2), bold: true, fontSize: 14, color: '#4f46e5', alignment: 'right' }], marginBottom: 25 },
            { text: 'Terms & Conditions:', style: 'label' },
            { text: f('poTerms'), color: '#666', marginBottom: 30 },
            { columns: [
                { stack: [{ text: '____________________________', marginBottom: 5 }, 'Authorized Signature (Buyer)', 'Date: _______________'] },
                { stack: [{ text: '____________________________', marginBottom: 5 }, 'Authorized Signature (Vendor)', 'Date: _______________'] }
            ]}
        ],
        styles: { title: { fontSize: 20, bold: true, color: '#4f46e5', marginBottom: 5 }, label: { fontSize: 9, color: '#888', marginBottom: 4 }, th: { bold: true, fontSize: 10, color: '#fff', fillColor: '#4f46e5' } },
        defaultStyle: { fontSize: 10 }
    }).download(`purchase-order-${f('poNumber')}.pdf`);
    BizTools.toast('Purchase Order PDF generated!');
}
</script>






