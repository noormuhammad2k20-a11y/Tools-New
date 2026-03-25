

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
    <div class="pro-app-main-full animate-fade-up">
        <div class="pro-card">
            <!-- Header -->
            

            <div class="row g-4">
                <div class="col-lg-5">
                    <div class="bg-light p-4 rounded-4 border">
                        <h5 class="fw-bold mb-4">Schema Details</h5>
                        
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Schema Type</label>
                            <select id="sch-type" class="form-select rounded-3">
                                <option value="Article">Article</option>
                                <option value="LocalBusiness">Local Business</option>
                                <option value="Product">Product</option>
                                <option value="Event">Event</option>
                                <option value="Organization">Organization</option>
                            </select>
                        </div>

                        <div id="fields-container">
                            <!-- Dynamic fields will be injected here -->
                        </div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="bg-dark p-4 rounded-4 shadow-lg h-100">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="text-white fw-bold mb-0">JSON-LD Snippet</h5>
                            <button id="copy-btn" class="btn btn-primary btn-sm rounded-pill px-3">
                                <i class="fa-solid fa-copy me-1"></i> Copy JSON
                            </button>
                        </div>
                        <pre id="output-code" class="text-success m-0" style="font-family: 'Fira Code', monospace; font-size: 0.85rem; overflow-x: auto; white-space: pre-wrap; min-height: 300px;"></pre>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>


<!-- Content + Sidebar (SEO, FAQ) -->
<div id="unique-article-content" class="article-content">
            
            

<!-- Suggested Tools Strip -->


<!-- Popular Tools Section -->


<script>
document.addEventListener('DOMContentLoaded', () => {
    const typeSelect = document.getElementById('sch-type');
    const container = document.getElementById('fields-container');
    const output = document.getElementById('output-code');
    const copyBtn = document.getElementById('copy-btn');

    const schemaConfigs = {
        Article: [
            { id: 'headline', label: 'Headline', placeholder: 'The Future of AI' },
            { id: 'author', label: 'Author Name', placeholder: 'John Doe' },
            { id: 'date', label: 'Date Published', type: 'date' },
            { id: 'image', label: 'Image URL', placeholder: 'https://...' },
        ],
        LocalBusiness: [
            { id: 'name', label: 'Business Name', placeholder: 'City Coffee' },
            { id: 'street', label: 'Street Address', placeholder: '123 Main St' },
            { id: 'city', label: 'City', placeholder: 'New York' },
            { id: 'phone', label: 'Phone Number', placeholder: '+1...' },
        ],
        Product: [
            { id: 'name', label: 'Product Name', placeholder: 'Smart Watch X' },
            { id: 'price', label: 'Price', type: 'number', placeholder: '199.99' },
            { id: 'currency', label: 'Currency', placeholder: 'USD' },
            { id: 'brand', label: 'Brand', placeholder: 'TechCo' },
        ],
        Event: [
            { id: 'name', label: 'Event Name', placeholder: 'Tech Summit 2026' },
            { id: 'start', label: 'Start Date', type: 'date' },
            { id: 'location', label: 'Venue Name', placeholder: 'Convention Center' },
        ],
        Organization: [
            { id: 'name', label: 'Org Name', placeholder: 'Google' },
            { id: 'url', label: 'Website URL', placeholder: 'https://...' },
            { id: 'logo', label: 'Logo URL', placeholder: 'https://...' },
        ]
    };

    const updateFields = () => {
        const type = typeSelect.value;
        const config = schemaConfigs[type];
        container.innerHTML = '';

        config.forEach(f => {
            const div = document.createElement('div');
            div.className = 'mb-3';
            div.innerHTML = `
                <label class="form-label small fw-bold">${f.label}</label>
                <input type="${f.type || 'text'}" id="f-${f.id}" class="form-control rounded-3 schema-input" placeholder="${f.placeholder || ''}">
            `;
            container.appendChild(div);
        });

        document.querySelectorAll('.schema-input').forEach(el => {
            el.addEventListener('input', generate);
        });
        generate();
    };

    const generate = () => {
        const type = typeSelect.value;
        const inputs = document.querySelectorAll('.schema-input');
        const data = {
            "@context": "https://schema.org",
            "@type": type
        };

        inputs.forEach(input => {
            const key = input.id.replace('f-', '');
            if (input.value) {
                // Special mapping for complex schemas nested objects
                if (type === 'LocalBusiness' && (key === 'street' || key === 'city')) {
                    if (!data.address) data.address = { "@type": "PostalAddress" };
                    if (key === 'street') data.address.streetAddress = input.value;
                    if (key === 'city') data.address.addressLocality = input.value;
                } else if (type === 'Product' && (key === 'price' || key === 'currency')) {
                    if (!data.offers) data.offers = { "@type": "Offer" };
                    if (key === 'price') data.offers.price = input.value;
                    if (key === 'currency') data.offers.priceCurrency = input.value;
                } else {
                    data[key] = input.value;
                }
            }
        });

        output.textContent = `<script type="application/ld+json">\n${JSON.stringify(data, null, 4)}\n<\/script>`;
    };

    typeSelect.addEventListener('change', updateFields);
    copyBtn.addEventListener('click', () => {
        navigator.clipboard.writeText(output.textContent).then(() => showToast('Schema copied!'));
    });

    updateFields();
});
</script>







